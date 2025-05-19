<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Notify extends Component
{
    public $user='';
    public $product='';
    
    public $loginId;

    public function mount(){
        $this->loginId = Auth::id();
    }

    public function getListeners()
    {
        return [
            "echo-private:chat.{$this->loginId},MessageEvent" => 'notify'
        ];
    }

    public function notify($message)
    {   
        $this->user=User::find($message['user_id']);
       
        $product=Product::find($message['product_id']);
        $this->product = $product;
        
        $this->dispatch('showNotification');
    }

    public function hideNotification(){
        $this->dispatch('hideNotification');
    }


    public function render()
    {
        return view('livewire.user.notify');
    }
}
