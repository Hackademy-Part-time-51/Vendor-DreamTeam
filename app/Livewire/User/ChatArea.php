<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
class ChatArea extends Component
{   public $messages;
    public $reicever_id;
    public $sender_id;
    public $product_id;
    public $text='';
    public $user_id;
    protected $listeners = ['selectChat'=>'selectChat'];

    public function mount(){
        $this->messages = Message::where('receiver_id', Auth::id() || 'sender_id', Auth::id())->where('product_id', $this->product_id)->orderBy('created_at', 'desc')->get();
        // dd($this->messages);
    }
    #[On('selectChat')]
    public function selectChat($product_id, $user_id){
       $this->user_id = $user_id;
       $this->product_id = $product_id;
        $this->messages = Message::where('receiver_id', Auth::id() || 'sender_id', Auth::id())
        ->where('receiver_id', $user_id|| 'sender_id', $user_id)
        ->where('product_id', $product_id)->orderBy('created_at', 'asc')->get();
        // dd($this->messages);
    }

    public function sendMessage(){
        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $this->user_id,
            'product_id' => $this->product_id,
            'message' => $this->text,
            
        ]);
        $this->dispatch('selectChat', $this->product_id, $this->user_id);
    }

    public function render()
    {   
        


        return view('livewire.user.chat-area');
    }
}
