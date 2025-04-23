<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Validate;

class Register extends Component
{   #[Validate('required|max:255')]
    public $name;
    #[Validate('required|email|max:255')]
    public $email;
    #[Validate('required|min:6')]
    public $password;
    #[Validate('required_with:password|same:password|min:6')]
    public $password_confirmation;
    #[Validate('required|image|mimes:jpeg,png,jpg,gif,svg|max:2048')]
    public $prophile_photo;
    public function render()
    {   $this->validate();
        $this->only('name','email','password','password_confirmation','prophile_photo');
        return view('livewire.auth.register');
    }
    
}
