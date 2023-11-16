<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationKurir extends Component
{
    public $notification;
    protected $listeners = ['userAdded' => '$refresh'];

    public function mount()
    {
        $this->refreshNotifications();
    }

    public function refreshNotifications()
    {
        $user = Auth::user();

        $this->notification = Order::where('courier_id', $user->user_id)
            ->where('is_read_kurir', 1)
            ->count();
    }

    public function render()
    {
        return view('livewire.notification-kurir');
    }
}
