<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListOrders extends Component
{
    public $count = 4;
    public function render()
    {
        $user = Auth::user();
        $listOrders = Order::where('user_id', $user->user_id)
        ->select('order_id', 'status')
        ->orderByDesc('created_at')
        ->take($this->count)
        ->get();
        $totalOrder = Order::where('user_id', $user->user_id)->count();
        return view('livewire.list-orders', compact('listOrders', 'totalOrder'));
    }

    public function loadmore(){
        $this->count += 4;
        sleep(1);
    }
}
