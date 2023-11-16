<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class KurirOrder extends Component
{
    public $search = '';
    public $status = '1';
    protected $listeners = ['userAdded' => '$refresh'];
    public function render()
    {
        $user = Auth::user();

        $listOrder = Order::where('courier_id', $user->user_id)
        ->where(function ($query) {
            $search = $this->search;
            $query->whereHas('user', function ($subQuery) use ($search) {
                $subQuery->where('name', 'like', '%' . $search . '%');
            })
            ->orWhere('order_id', 'like', '%' . $search . '%');
        })
        ->where('status', 'like', '%' . $this->status . '%')
        ->orderBy('created_at', 'asc')
        ->paginate(10);

        return view('livewire.kurir-order', compact('listOrder'));
    }
}
