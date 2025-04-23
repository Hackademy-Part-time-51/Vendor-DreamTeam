<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Validate;

class Login extends Component
{
    #[Validate('required|email|max:255')]
    public $email = "";
    #[Validate('required|min:6')]
    public $password = '';
    public function render()
    {
        return view('livewire.auth.login');
    }
}
