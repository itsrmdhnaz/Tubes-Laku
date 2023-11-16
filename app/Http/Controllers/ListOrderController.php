<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListOrderController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $orders = Order::where('user_id', $user->user_id)
        ->select('order_id', 'status')
        ->take(4)
        ->get();

    $data = [
        "title" => "Daftar Pesanan",
        "nav" => "customer",
        "aside" => "yes",
    ];

    return view('user/listOrder', compact('data', 'orders'));
}




public function detailPesanan($order_id)
{
    $order = Order::where('order_id', $order_id)->first();

    $order->load('orderItems');

    $data = [
        "title" => "Detail Pesanan",
        "nav" => "customer",
        "aside" => "yes",
    ];

    return view('user/detailOrder', compact('data', 'order'));
}



}
