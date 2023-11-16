<?php

namespace App\Http\Livewire;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditProfile extends Component
{
    protected $listeners = ['userAdded' => 'refreshPage'];

public function render()
{
    $user = Auth::user();
    $address = Address::where('user_id', $user->user_id)->where('is_default', 1)->first();
    $anotherAddress = Address::where('user_id', $user->user_id)->where('is_default', 0)->get();
    return view('livewire.edit-profile', compact('user', 'address', 'anotherAddress'));
}

public function refreshPage()
{
    $this->emit('refreshPage');
}

}
