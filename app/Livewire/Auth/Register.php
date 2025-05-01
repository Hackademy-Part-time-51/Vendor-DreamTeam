<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Register extends Component
{   
    use WithFileUploads;
    #[Validate('required|max:255', message: 'Il nome è obbligatorio')]
    public $name='';
    #[Validate('required|email|min:2',message: 'Email non valida')]
    public $email='';
    #[Validate('required|min:6',message: 'Password non valida')]
    public $password='';
    #[Validate('required|max:20',message: 'Telefono non valido')]
    public $phone='';
    #[Validate('required|in:male,female',message: 'Sesso obbligatorio')]
    public $gender='';
    #[Validate('required_with:password|same:password|min:6',message: 'Conferma password non valida')]
    public $password_confirmation='';
    #[Validate('required|image|mimes:jpeg,png,jpg,svg',message: 'Immagine non valida')]
    public $profile_photo='';

    public function validazione(){
        $this->validate();
    }
  
    public function render()
    {        
       
        return view('livewire.auth.register');
    }
    
}
