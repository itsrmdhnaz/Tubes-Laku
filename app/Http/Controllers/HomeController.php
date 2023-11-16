<?php

namespace App\Http\Controllers;


use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();

        // $nav = "";

        // if($user->role == 'user'){
        //     $nav = 'customer';
        // } elseif ($user->role == 'admin') {
        //     $nav = 'admin';
        // } elseif ($user->role == 'kurir') {
        //     $nav = 'kurir';
        // }

        $data = [
            "title" => "Home",
            "nav" => "customer",
            "aside" => "yes",
        ];

        return view('user/home', compact('data', 'user'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $user = Auth::user();
        $data = [
            "title" => "Admin home",
            "nav" => "admin",
            "aside" => "yes",
        ];

        return view('admin/adminhome', compact('data','user'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function kurirHome()
    {
        $user = Auth::user();

        // $nav = "";

        // if($user->role == 'user'){
        //     $nav = 'customer';
        // } elseif ($user->role == 'admin') {
        //     $nav = 'admin';
        // } elseif ($user->role == 'kurir') {
        //     $nav = 'kurir';
        // }

        $data = [
            "title" => "Kurir home",
            "nav" => "kurir",
            "aside" => "yes",
        ];
        return view('kurir/kurirhome', compact('user','data'));
    }

    public function detailProfile(){
        $user = Auth::user();
        $address = Address::where('user_id', $user->user_id)->where('is_default', 1)->first();
        $anotherAddress = Address::where('user_id', $user->user_id)->where('is_default',0)->get();

        $nav = "";

        if($user->role == 'user'){
            $nav = 'customer';
        } elseif ($user->role == 'admin') {
            $nav = 'admin';
        } elseif ($user->role == 'kurir') {
            $nav = 'kurir';
        }

        $data = [
            "title" => "User profile",
            "nav" => $nav,
            "aside" => "yes",
        ];
        return view('user/detailprofile', compact('user','data','address','anotherAddress'));
    }

    public function editProfile(){
        $user = Auth::user();

        $nav = "";

        if($user->role == 'user'){
            $nav = 'customer';
        } elseif ($user->role == 'admin') {
            $nav = 'admin';
        } elseif ($user->role == 'kurir') {
            $nav = 'kurir';
        }

        $data = [
            "title" => "User profile",
            "nav" => $nav,
            "aside" => "yes",
        ];
        return view('editprofile', compact('data','user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:users,name,' . $id . ',user_id'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id . ',user_id'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['same:password'],
            'image' => 'nullable','image|mimes:png,svg,jpg,jpeg|max:5120',
            'address' => ['required', 'string'],
            'phone' => ['required', 'string', 'regex:/^(\\+62|0[8])[0-9]{9,12}$/'], // Format nomor telepon Indonesia
            'gender' => ['required', 'in:L,P'], // Format nomor telepon Indonesia
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $usersAddress = $request->input('address');
            $usersPhone = $request->input('phone');

            $users = User::find($id);
            if ($users) {
                $users->name = $request->input('name');
                $users->email = $request->input('email');

                //jika ingin ada ganti password
                if ($request->filled('password')) {
                    $users->password = Hash::make($request->input('password'));
                }

                $users->gender = $request->input('gender');

                //jika update avatar
                if($request->hasFile('image') ){
                    $request->file('image')->move('avatar/', time()."_".$request->file('image')->getClientOriginalName());
                    $users->avatar = time()."_".$request->file('image')->getClientOriginalName();
                }
                $users->update();

                $addressDefault = Address::where('user_id', $id)
                    ->where('is_default', 1)
                    ->first();

                // Jika alamat default tidak diganti, hanya update nomor telepon
                if ($addressDefault && $addressDefault->address === $usersAddress) {
                    $addressDefault->phone = $usersPhone;
                    $addressDefault->update();
                } else {
                    // Ubah alamat default menjadi bukan default
                    if ($addressDefault) {
                        $addressDefault->is_default = 0;
                        $addressDefault->update();
                    }

                    $currentDate = date('d');
                    $addressPrefix = substr($id, 2, 2);
                    $addressId = $addressPrefix . substr($request->input('name'), 0, 2) . $currentDate . str_pad(Address::count() + 1, 4, '0', STR_PAD_LEFT);

                    $address = new Address;
                    $address->address_id = $addressId;
                    $address->user_id = $id;
                    $address->address = $usersAddress;
                    $address->phone = $usersPhone;
                    $address->is_default = 1;
                    $address->save();
                }
                if ($users->role == "user") {
                    return response()->json([
                        'status' => 200,
                        'message' => 'User Update successfully'
                    ]);
                } else if ($users->role == "kurir") {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Kurir Update successfully'
                    ]);
                } else if ($users->role == "admin") {
                    return response()->json([
                        'status' => 200,
                        'message' => 'admin Update successfully'
                    ]);
                }else {
                    return response()->json([
                        'status' => 400,
                        'errors' => "User not found"
                    ]);
                }
            }
        }
    }


}
