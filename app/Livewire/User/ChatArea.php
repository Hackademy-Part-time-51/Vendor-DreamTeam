<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
class ChatArea extends Component
{   public $messages='';
    public $reicever_id;
    public $sender_id;
    public $product_id;
    public $text='';
    public $user_id;
   
    
    #[On('selectChat')]
    public function selectChat($product_id, $user_id)
{
    $this->user_id = $user_id;
    $this->product_id = $product_id;

    $this->messages = Message::where('product_id', $product_id)
        ->where(function ($query) use ($user_id) {
            $authId = Auth::id();
            $query->where(function ($q) use ($authId, $user_id) {
                $q->where('sender_id', $authId)->orWhere('receiver_id', $user_id);
            })->orWhere(function ($q) use ($authId, $user_id) {
                $q->where('sender_id', $user_id)->orWhere('receiver_id', $authId);
            });
        })
        ->orderBy('created_at', 'asc')
        ->get();
}


    public function sendMessage(){
        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $this->user_id,
            'product_id' => $this->product_id,
            'message' => $this->text,
            
        ]);
        $this->text='';
        $this->dispatch('selectChat', $this->product_id, $this->user_id);
    }

    public function render()
    {   
        


        return view('livewire.user.chat-area');
    }
}
