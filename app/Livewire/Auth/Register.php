<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Register extends Component
{   
    use WithFileUploads;
    #[Validate('required|max:255')]
    public $name='';
    #[Validate('required|email|max:255')]
    public $email='';
    #[Validate('required|min:6')]
    public $password='';
    #[Validate('required|max:20')]
    public $phone='';
    #[Validate('required|in:male,female')]
    public $gender='';
    #[Validate('required_with:password|same:password|min:6')]
    public $password_confirmation='';
    #[Validate('required|image|mimes:jpeg,png,jpg,gif,svg|max:2048')]
    public $profile_photo='';
  
    public function render()
    {        
       
        return view('livewire.auth.register');
    }
    
}
