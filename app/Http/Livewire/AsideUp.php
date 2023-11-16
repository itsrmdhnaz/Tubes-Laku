<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AsideUp extends Component
{
    protected $listeners = ['userAdded' => '$refresh'];
    public function render()
    {
        $user = Auth::user();
        return view('livewire.aside-up', compact('user'));
    }
}
