<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class NotificationController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        // Menandai semua notifikasi sebagai terbaca (is_read = 0)
        Order::where('user_id', $user->user_id)
            ->where('is_read', 1)
            ->update(['is_read' => 0]);

        $Orders = Order::where('user_id', $user->user_id)
            ->select('status')
            ->get();

        $data = [
            "title" => "notifikasi",
            "nav" => "customer",
            "aside" => "yes",
        ];

        return view('user.notification', compact('Orders', 'data','user'));
    }

    public function updateNotification()
{
    $user = Auth::user();

    // Lakukan pembaruan notifikasi di sini
    Order::where('user_id', $user->user_id)
        ->where('is_read', 1)
        ->update(['is_read' => 0]);

    return response()->json(['message' => 'Pembaruan berhasil']);
}



}


