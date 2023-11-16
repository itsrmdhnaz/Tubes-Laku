<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationKurir extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Menandai semua notifikasi sebagai terbaca (is_read = 0)
        Order::where('courier_id', $user->user_id)
            ->where('is_read_kurir', 1)
            ->update(['is_read_kurir' => 0]);

        $Orders = Order::where('courier_id', $user->user_id)
            ->select('status')
            ->get();

        $data = [
            "title" => "notifikasi",
            "nav" => "kurir",
            "aside" => "yes",
        ];

        return view('kurir.notificationKurir', compact('Orders', 'data','user'));
    }
}
