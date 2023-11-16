<?php

namespace App\Http\Livewire;


use Illuminate\Http\Request;

use Livewire\Component;


class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $address;
    public $phone;
    public $gender;
    public function render()
    {
        return view('livewire.register');
    }

    protected $rules = [
        'name' => ['required', 'string', 'max:255', 'unique:users'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/\.com$|\.gmail\.com$/i'],
        'password' => ['required', 'string', 'min:8',],
        'password_confirmation' => ['required', 'same:password'],
        'address' => ['required', 'string'],
        'phone' => ['required', 'string', 'regex:/^(\\+62|0[8])[0-9]{9,12}$/'], // Format nomor telepon Indonesia
        'gender' => ['required', 'in:L,P'],
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    // public function updatingPassword(){
    //     $this->resetValidation('password_confirmation');
    //     $this->resetErrorBag('password_confirmation');
    // }


}
