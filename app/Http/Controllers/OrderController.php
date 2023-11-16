<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use \App\Models\Item;
// use Illuminate\Support\Facades\Cache;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $items = Item::all();
        // Cache::remember('items', now()->addDays(30), function () {
        //     return
        // });

        $data = [
            "title" => "pemesanan",
            "nav" => "customer",
            "aside" => "no",
            "main" => "mid"
        ];

        return view('user/order', compact('data', 'items'));
    }


    public function orderStepOne(Request $request)
    {
        $user = Auth::user();

        $address = Address::where('user_id', $user->user_id)->where('is_default', 1)->first();


        $order_id = 'LK' . date('Ymd')  . str_pad(Order::count() + 1, 4, '0', STR_PAD_LEFT);
        $total_price = $request->total_price;
        $address_id = $address->address_id;
        $user_id = $user->user_id;
        $status = 0;

        // Create the order
        $order = Order::create([
            'order_id' => $order_id,
            'order_date' => null,
            'total_price' => $total_price,
            'address_id' => $address_id,
            'user_id' => $user_id,
            'status' => $status,
            'courier_id' => null,
            'is_read' => 0
        ]);

        if ($request->has('items') && is_array($request->items)) {
            foreach ($request->items['quantity'] as $key => $quantity) {
                // Periksa apakah quantity lebih dari 0
                if ($quantity <= 0) {
                    continue; // Melanjutkan iterasi ke item berikutnya jika quantity 0
                }

                $item_id = $request->items['item_id'][$key];
                $price = $request->items['price'][$key];

                // Mengalikan harga dengan quantity
                $total_price_item = $price * $quantity;

                // Simpan OrderItem hanya jika quantity lebih dari 0
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->order_id;
                $orderItem->item_id = $item_id;
                $orderItem->quantity = $quantity;
                $orderItem->price = $total_price_item;
                $orderItem->save();
            }
        } else {
            // Handle jika $request->items tidak valid
            return redirect()->back()->with('error', 'Item yang dipilih tidak valid');
        }



        // Redirect to the next step of the order process or to the order completion page
        return redirect()->route('order.StepTwo', ['order_id' => $order->order_id]);

    }


    public function orderStepTwoView($order_id)
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->user_id)->orderBy('created_at', 'desc')->first();


        if (!$order) {
            // Handle jika pesanan tidak ditemukan
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan');
        }

        $order_id = $order->order_id;

        $address = Address::where('user_id', $user->user_id)->where('is_default', true)->first();
        $addresses = Address::where('user_id', $user->user_id)
        ->where('is_default', 0)
        ->get();


        $data = [
            "title" => "pemesanan2",
            "nav" => "customer",
            "aside" => "no",
            "main" => "mid"
        ];

        return view('user.orderSecond', compact('order_id', 'data', 'address', 'addresses'));

    }

    public function orderStepTwo(Request $request)
{
    $user = Auth::user();
    $order = Order::where('user_id', $user->user_id)->orderBy('created_at', 'desc')->first();

    $address_id = $request->input('address_id');
    $order_date = Carbon::now();
    $message_order = $request->input('message_order');
    $method_order = $request->input('method_order');

    // Validasi nilai method_order
    if ($method_order == 0 || $method_order == 1) {
        $total_price = $order->total_price + 5000;
    } elseif ($method_order == 2) {
        $total_price = $order->total_price + 7000;
    } else {
        // Handle jika nilai method_order tidak valid
        return redirect()->back()->with('error', 'Metode pemesanan tidak valid');
    }

    // Update order dengan data tambahan
    $order->address_id = $address_id;
    $order->order_date = $order_date;
    $order->message_order = $message_order;
    $order->method_order = $method_order;
    $order->total_price = $total_price;
    $order->is_read = 1;
    $order->is_read_kurir = 1;
    $order->save();

    // Redirect ke halaman penyelesaian pemesanan atau langkah berikutnya
    return redirect()->back()->with('success' , 'Pesanan telah dibuat');
}
}


