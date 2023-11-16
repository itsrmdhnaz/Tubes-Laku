<?php

namespace App\Http\Livewire;


use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;
    public $search = '';
    public $role = "0";
    public $managemen = "userTable";
    protected $listeners = ['userAdded' => '$refresh'];


    public function render()
    {
        $user = Auth::user();
        $userTable = User::where('role', $this->role)->where('name', 'like', '%' . $this->search . '%')->orderBy('created_at', 'desc')->paginate(10);
        $barangTable = Item::orderBy('created_at', 'desc')->where('name', 'like', '%' . $this->search . '%')->paginate(10);
        $orderTable = Order::orderBy('created_at', 'desc')->where('order_id', 'like', '%' . $this->search . '%')->paginate(10);


        return view('livewire.user-table', compact($this->managemen));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function setRoleAndManagemen($role, $managemen)
    {
        $this->role = $role;
        $this->managemen = $managemen;
        $this->reset('search');
    }
}
