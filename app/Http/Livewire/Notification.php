<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Order;

class Notification extends Component
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

        $this->notification = Order::where('user_id', $user->user_id)
            ->where('is_read', 1)
            ->count();
    }

    public function render()
    {
        return view('livewire.notification');
    }
}
