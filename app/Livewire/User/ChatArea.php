<?php

namespace App\Livewire\User;

use App\Events\MessageEvent;
use Livewire\Component;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use App\Models\Product;
use App\Models\User;

class ChatArea extends Component
{
    public $messages = '';
    public $reicever_id;
    public $sender_id;
    public $product_id;
    public $text = '';
    public $user_id;
    public $product;
    public $loginId;
    public $userSelected;
    public $user;
    
    public function mount()
    {   

        $this->loginId = Auth::id();

        if($this->product && $this->user){
           
            $this->selectChat($this->product, $this->user);
        }elseif($this->product){
                  
            $prodotto = Product::find($this->product);
            $this->selectChat($prodotto->id, $prodotto->user_id);
        }
    }


    #[On('selectChat')]
    public function selectChat($product_id=null, $user_id=null)
    {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        
        $this->userSelected = User::find($user_id);

        $this->messages = Message::where('product_id', $product_id)
            ->where(function ($query) use ($user_id) {
                $authId = Auth::id();
                $query->where(function ($q) use ($authId, $user_id) {
                    $q->where('sender_id', $authId)->where('receiver_id', $user_id);
                })->orWhere(function ($q) use ($authId, $user_id) {
                    $q->where('sender_id', $user_id)->where('receiver_id', $authId);
                });
            })
            ->orderBy('created_at', 'asc')
            ->get();
        // dd($this->messages);
       

        foreach ($this->messages as $msg) {
            $msg->sender_id = $msg->sender_id;
            $msg->receiver_id = $msg->receiver_id;
            $msg->product_id = $msg->product_id;
            $msg->message = $msg->message;
            $msg->is_read = 1;
            $msg->save();
        }

        
        $this->dispatch('updatelist', product: $this->product_id);
    }


    public function sendMessage()
    {
       $message= Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $this->user_id,
            'product_id' => $this->product_id,
            'message' => $this->text,
        ]);
        $this->text = '';
        // MessageEvent::dispatch($this->product_id, $this->user_id);
        broadcast(new MessageEvent($message));

        $this->dispatch('selectChat', $this->product_id, $this->user_id);
    }

public function getListeners(){
    return [
        "echo-private:chat.{$this->loginId},MessageEvent" => 'newmessage',
    ];
}

    public function newmessage($message){
        if($message['user_id']==$this->user_id){
            
            $this->dispatch('selectChat', $message['product_id'], $message['user_id']);
        }else{
            $this->dispatch('updatelist');
        }

    }
    

    #[On('refresh')]
    public function render()
    {
        return view('livewire.user.chat-area');
    }
}
