<?php

namespace App\Http\Livewire;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public function render()
    {
        return view('livewire.login');
    }

    // protected $rules = [
    //     'email' => ['required', 'string', 'email', 'max:255', 'regex:/\.com$|\.gmail\.com$/i' , 'exists:users,email'],
    //     'password' => ['required', 'string', 'min:8',],
    // ];

    protected $messages = [
        'email.exists' => 'The email address not found'
    ];

    public function updated($propertyName)
    {
        if ($propertyName === 'email') {
            $this->validateOnly($propertyName, [
                'email' => ['required', 'string', 'email', 'max:255', 'regex:/\.com$|\.gmail\.com$/i', 'exists:users,email'],
            ]);
            $this->reset('password');
        }

        if ($propertyName === 'password') {
            $this->validateOnly($propertyName, [
                'password' => ['required', 'string', 'min:8'],
            ]);
            // Lakukan pengecekan password sesuai dengan email jika email dan password tidak kosong
            if (!empty($this->email) && !empty($this->password)) {
                $user = User::where('email', $this->email)->first();

                if ($user && Hash::check($this->password, $user->password)) {

                } else {
                    $this->addError('password', 'Password does not match email');
                }
            }
        }
    }

    public function updatingEmail(){
        $this->resetValidation('password');

        if(!empty($this->password)) {
            $this->addError('password', 'Password does not match email.');
        }
    }
}
