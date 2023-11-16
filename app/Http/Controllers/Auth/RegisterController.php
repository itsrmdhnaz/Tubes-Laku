<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string', 'regex:/^(\\+62|0[8])[0-9]{9,12}$/'], // Format nomor telepon Indonesia
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $role = $data['role'] ?? 0;

        $currentDate = date('d');
        $prefix = '';

        switch ($role) {
            case 0:
                $prefix = 'LKPD';
                break;
            case 1:
                $prefix = 'LKAD';
                break;
            case 2:
                $prefix = 'LKKR';
                break;
            default:
                $prefix = 'LKPD';
                break;
        }

        $userId = $prefix . substr($data['name'], 0, 2) . $currentDate . str_pad(User::count() + 1, 4, '0', STR_PAD_LEFT);

        $avatar = "";
        if ($data['gender'] == 'L') {
            $avatar = "avatar_l.svg";
        } else {
            $avatar = "avatar_p.svg";
        }

        $user = User::create([
            'user_id' => $userId,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $role,
            'gender' => $data['gender'],
            'avatar' => $avatar,
            'email_verified_at' => Carbon::now(),
        ]);

        if (!$user) {
            return redirect()->back();
        }
        $user = User::latest()->first();

        // Create address for the user
        $addressPrefix = substr($userId, 2, 2); // Mengambil 2 karakter dari ID pengguna sebagai awalan alamat
        $addressId = $addressPrefix . substr($data['name'], 0, 2) . $currentDate . str_pad(Address::count() + 1, 4, '0', STR_PAD_LEFT);
        $user = User::latest()->first();

        $address = new Address();
        $address->address_id = $addressId;
        $address->user_id = $user->user_id; // Menggunakan ID pengguna yang baru dibuat
        $address->address = $data['address'];
        $address->phone = $data['phone'];
        $address->is_default = 1; // Atur alamat sebagai default

        $address->save();

        return $user;
    }




    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        if ($user) {
            return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login untuk mengakses akun Anda.');
        } else {
            return back()->with('error', 'Registrasi gagal. Silakan coba lagi.');
        }
    }
}
