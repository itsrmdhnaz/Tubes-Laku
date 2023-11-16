<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationList extends Component
{
    public $count = 4;
    protected $listeners = ['userAdded' => '$refresh'];
    public function render()
{
    $user = Auth::user();
        $listOrders = Order::where('user_id', $user->user_id)
        ->select('status')
        ->orderByDesc('created_at') // Order the results by 'created_at' column in descending order
        ->take($this->count)
        ->get();
    $totalOrder = Order::where('user_id', $user->user_id)->count();

    return view('livewire.notification-list', compact('listOrders', 'totalOrder'));
}


    public function loadmore(){
        $this->count += 4;
        sleep(1);
    }
}
