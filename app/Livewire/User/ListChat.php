<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Message;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use function Livewire\livewire;

class ListChat extends Component
{   
    public $chats = [];
    public $messages = [];
    public $products = [];

    public function mount(){
        $this->messages = Message::where('receiver_id', Auth::id() || 'sender_id', Auth::id())->get();
        
        
        $this->products = Product::where('user_id', Auth::id())->get();

        foreach ($this->messages as $msg) {
            $otherUserId = $msg->sender_id === Auth::id() ? $msg->receiver_id : $msg->sender_id;
            $key = $msg->product_id . '-' . $otherUserId;
    
            if (!isset($this->chats[$key])) {
                $this->chats[$key] = [
                    'product' => $msg->product,
                    'user' => $msg->sender_id === Auth::id() ? $msg->receiver : $msg->sender,
                    'last_message' => $msg,
                ];
            }
        }
    }

    public function selectChat($product, $user){
        $this->dispatch('selectChat',product_id:$product, user_id:$user);
    

    }
    public function render()
    {
       
        return view('livewire.user.list-chat');
    }
}
