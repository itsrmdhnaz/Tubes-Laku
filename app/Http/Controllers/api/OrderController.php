<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with('orderItems.item')->findOrFail($id);

        if ($order) {
            return response()->json([
                'status' => 'success',
                'data' => $order
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Order not found'
        ], 404);
    }

    public function allItems()
    {
        $items = Item::latest()->get();
        if ($items) {
            return response()->json([
                'status' => 'success',
                'data' => $items
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Order not found'
        ], 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
