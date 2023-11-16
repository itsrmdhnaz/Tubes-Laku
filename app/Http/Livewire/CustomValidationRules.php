<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CustomValidationRules
{
    public static function validPassword($email)
    {
        return new class($email) implements Rule {
            protected $email;

            public function __construct($email)
            {
                $this->email = $email;
            }

            public function passes($attribute, $value)
            {
                $user = Auth::attempt(['email' => $this->email, 'password' => $value]);
                return $user !== false;
            }

            public function message()
            {
                return 'Password salah.';
            }
        };
    }
}
