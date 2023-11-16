<?php

namespace App\Http\Controllers;


use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Item;


class ManagemenController extends Controller
{

    public function managemen()
    {
        $user = Auth::user();
        $data = [
            "title" => "Admin managemen",
            "nav" => "admin",
            "aside" => "yes",
        ];

        return view('admin/managemen', compact('data', 'user'));
    }
    public function storeUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'same:password'],
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
            $role = 0; // Menggunakan nilai default 1 jika 'role' tidak ada dalam data
            $currentDate = date('d');
            $prefix = '';
            $usersAddress = $request->input('address');
            $usersPhone = $request->input('phone');


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

            $userId = $prefix . strtoupper(substr($request->input('name'), 0, 2)) . $currentDate . str_pad(User::count() + 1, 4, '0', STR_PAD_LEFT);

            $avatar = "";
            if ($request->input('gender') == 'L') {
                $avatar = "avatar_l.svg";
            } else {
                $avatar = "avatar_p.svg";
            }

            $users = new User;
            $users->user_id = $userId;
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->role = $role;
            $users->password = Hash::make($request->input('password'));
            $users->gender = $request->input('gender');
            $users->avatar = $avatar;
            $users->save();

            $addressPrefix = substr($userId, 2, 2); // Mengambil 2 karakter dari ID pengguna sebagai awalan alamat
            $addressId = $addressPrefix . substr($request->input('name'), 0, 2) . $currentDate . str_pad(Address::count() + 1, 4, '0', STR_PAD_LEFT);
            $user = User::latest()->first();

            $address = new Address();
            $address->address_id = $addressId;
            $address->user_id = $user->user_id; // Menggunakan ID pengguna yang baru dibuat
            $address->address = $usersAddress;
            $address->phone = $usersPhone;
            $address->is_default = 1; // Atur alamat sebagai default
            $address->save();
            return response()->json([
                'status' => 200,
                'message' => "Add User succesfully"
            ]);
        }
    }

    public function editUser($id)
    {
        $user = User::find($id);
        $barang = Item::find($id);
        $address = Address::where('user_id', $id)
            ->where('is_default', 1)
            ->first();
        if ($user) {
            return response()->json([
                'status' => 200,
                'user' => $user,
                'addresses' => $address,
                'managemen' => 'user'
            ]);
        } else if ($barang) {
            return response()->json([
                'status' => 200,
                'barang' => $barang,
                'managemen' => 'barang'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'errors' => "User not found"
            ]);
        }
    }

    public function updateUser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:users,name,' . $id . ',user_id'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id . ',user_id'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['same:password'],
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
                if ($request->filled('password')) {
                    $users->password = Hash::make($request->input('password'));
                }
                $users->gender = $request->input('gender');

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
                } else {
                    return response()->json([
                        'status' => 400,
                        'errors' => "User not found"
                    ]);
                }
            }
        }
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        if ($user->role == "user") {
            return response()->json([
                'status' => 200,
                'message' => 'User Delete successfully'
            ]);
        } else if ($user->role == "kurir") {
            return response()->json([
                'status' => 200,
                'message' => 'Kurir Delete successfully'
            ]);
        }
    }

    public function storeKurir(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'same:password'],
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
            $role = 2; // Menggunakan nilai default 1 jika 'role' tidak ada dalam data
            $currentDate = date('d');
            $prefix = '';
            $usersAddress = $request->input('address');
            $usersPhone = $request->input('phone');


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

            $userId = $prefix . strtoupper(substr($request->input('name'), 0, 2)) . $currentDate . str_pad(User::count() + 1, 4, '0', STR_PAD_LEFT);

            $avatar = "";
            if ($request->input('gender') == 'L') {
                $avatar = "avatar_l.svg";
            } else {
                $avatar = "avatar_p.svg";
            }

            $users = new User;
            $users->user_id = $userId;
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->role = $role;
            $users->password = Hash::make($request->input('password'));
            $users->gender = $request->input('gender');
            $users->avatar = $avatar;
            $users->save();

            $addressPrefix = substr($userId, 2, 2); // Mengambil 2 karakter dari ID pengguna sebagai awalan alamat
            $addressId = $addressPrefix . substr($request->input('name'), 0, 2) . $currentDate . str_pad(Address::count() + 1, 4, '0', STR_PAD_LEFT);
            $user = User::latest()->first();

            $address = new Address;
            $address->address_id = $addressId;
            $address->user_id = $user->user_id; // Menggunakan ID pengguna yang baru dibuat
            $address->address = $usersAddress;
            $address->phone = $usersPhone;
            $address->is_default = 1; // Atur alamat sebagai default
            $address->save();
            return response()->json([
                'status' => 200,
                'message' => "Add Kurir succesfully"
            ]);
        }
    }

    public function storeBarang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:png,svg,jpg,jpeg|max:5120',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {

            $totalItem = Item::count() + 1;
            $item_id = 'LK' . str_pad($totalItem, 4, '0', STR_PAD_LEFT);

            $existingItem = Item::where('item_id', $item_id)->first();

            if ($existingItem) {
                $totalItem += 1;
                $item_id = 'LK' . str_pad($totalItem, 4, '0', STR_PAD_LEFT);
            }

            // Simpan item ke dalam database
            $item = new Item;
            $item->item_id = $item_id;
            $item->name = request()->input('name');
            $item->price = request()->input('price');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $request->file('image')->move('products/', time() . "_" . $request->file('image')->getClientOriginalName());
                $item->image = time() . "_" . $request->file('image')->getClientOriginalName();
            }
            $item->save();

            return response()->json([
                'message' => 'Barang created successfully.',
                'status' => 200
            ]);
        }
    }

    public function updateBarang(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'image' => 'nullable', 'image|mimes:png,svg,jpg,jpeg|max:5120',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            // Save the record to the database
            $item = Item::find($id);
            if ($item) {
                $item->name = request()->input('name');
                $item->price = request()->input('price');
                if ($request->hasFile('image')) {
                    $request->file('image')->move('products/', time() . "_" . $request->file('image')->getClientOriginalName());
                    $item->image = time() . "_" . $request->file('image')->getClientOriginalName();
                }
                $item->update();

                return response()->json([
                    'message' => 'Barang Updated successfully.',
                    'status' => 200
                ]);
            } else {
                return response()->json([
                    'message' => 'Barang not found.',
                    'status' => 400
                ]);
            }
        }
    }

    public function deleteBarang($id)
    {
        // Mengecek apakah item ada dalam tabel order_items
        $itemInOrder = DB::table('order_items')
            ->where('item_id', $id)
            ->exists();
    
        if ($itemInOrder) {
            return response()->json([
                'status' => 400,
                'message' => 'Barang gabisa di hapus karena sudah di pesan'
            ]);
        }
        $barang = Item::find($id);
        $barang->delete();
    
        return response()->json([
            'status' => 200,
            'message' => 'Barang berhasil di hapus'
        ]);
    }
}
