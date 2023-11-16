<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class StatusOrder extends Component
{
    use WithPagination;
    public $search = '';
    public $search_kurir = '';

    public $status = 0;
    protected $listeners = ['userAdded' => '$refresh'];
    public function render()
    {
        $listOrder = Order::where(function ($query) {
            $query->whereHas('user', function ($subQuery) {
                $subQuery->where('name', 'like', '%' . $this->search . '%');
            })
                ->orWhere('order_id', 'like', '%' . $this->search . '%');
        })
            ->where('status', 'like', '%' . $this->status . '%')
            ->orderBy('created_at', 'asc')
            ->paginate(10);

            $listCourier = User::where('role', 2)
            ->withCount('ordersTaken as pesanan_diambil')
            ->get();

        $listCourier->each(function ($courier) {
            $courier->pesanan_diambil = $courier->pesanan_diambil ?? 0;
        });


        return view('livewire.status-order', compact('listOrder', 'listCourier'));
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
