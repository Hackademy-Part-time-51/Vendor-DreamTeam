<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Message;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class ListChat extends Component
{
    public $chats = [];
    public $messages = [];
    public $products = [];
    #[On('updatelist')]
    public function mount()
    {   
        $this->chats = [];
        $this->messages = [];

        $this->messages = Message::where('receiver_id', Auth::id())
            ->orWhere('sender_id', Auth::id())->get();


        $this->products = Product::where('user_id', Auth::id())->get();

        foreach ($this->messages as $msg) {
            $otherUserId = $msg->sender_id === Auth::id() ? $msg->receiver_id : $msg->sender_id;
            $key = $msg->product_id . '-' . $otherUserId;

            // if($msg->is_read==0){$msg->is_read=1;}
            if (!isset($this->chats[$key])) {
                $this->chats[$key] = [
                    'product' => $msg->product,
                    'user' => $msg->sender_id === Auth::id() ? $msg->receiver : $msg->sender,
                    'last_message' => $msg,
                    'msgNotRead' => $msg->is_read == false ? 1 : 0
                ];
            } else {
                $this->chats[$key]['msgNotRead'] += $msg->is_read == false ? 1 : 0;
            }
        }
    }

    

    public function selectChat($product, $user)
    {
        $this->dispatch('selectChat', product_id: $product, user_id: $user);
    }
    // #[On('selectChat')]
    public function render()
    {
        

        return view('livewire.user.list-chat');
    }
}
