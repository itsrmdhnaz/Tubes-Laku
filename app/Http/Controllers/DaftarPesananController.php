<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DaftarPesananController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = [
            "title" => "Daftar Pesanan",
            "nav" => "admin",
            "aside" => "yes",
        ];

        return view('admin/daftar-pesanan', compact('data','user'));
    }

    public function getPesanan($id) {
        $order = Order::with([
            'orderItems',
            'orderItems.item',
            'user',
            'address'
        ])->find($id);

        if ($order) {
            return response()->json([
                'status' => 200,
                'order' => $order
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Order not found'
            ]);
        }
    }

    public function assignKurir(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'kurir_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $order = Order::find($id);
            if($order) {
                if($order->status == 1) {
                    $order->pickup_date = Carbon::now();
                } elseif ($order->status == 2) {
                    $order->process_date = Carbon::now();
                } elseif ($order->status == 3) {
                    $order->delivery_date = Carbon::now();
                }
                $order->status = $order->status + 1;
                $order->is_read = 1;
                $order->is_read_kurir = 1;
                if ($request->filled('kurir_id')) {
                    $order->courier_id = $request->input('kurir_id');
                }
                $order->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Update status succesfully'
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'update status failed'
                ]);
            }
        }
    }

    public function updateStatus($id) {
        $order = Order::find($id);
            if($order) {
                if($order->status == 1) {
                    $order->pickup_date = Carbon::now();
                } elseif ($order->status == 2) {
                    $order->process_date = Carbon::now();
                } elseif ($order->status == 3) {
                    $order->delivery_date = Carbon::now();
                }
                $order->status = $order->status + 1;
                $order->is_read = 1;
                $order->is_read_kurir = 1;
                $order->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'update status succesfully'
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'update status failed'
                ]);
            }
    }


}
