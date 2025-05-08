<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function personalArea (User $user,$id){
        $user = User::find($id); 
        $products= Product::all();
        $favoriteProducts = $user->favorites()->paginate(12);
        // dd($favoriteProducts);
        return view('user.personalArea', compact('user', 'products', 'favoriteProducts'));
    }

    public function lavoraConNoi(){
        return view('user.lavoraConNoi');
    }

    public function messaggi(Message $message){
        $messages = Message::where('receiver_id', Auth::id() || 'sender_id', Auth::id())->get();
        $listMessages = [];
        $chats = [];

        foreach ($messages as $msg) {
            $otherUserId = $msg->sender_id === Auth::id() ? $msg->receiver_id : $msg->sender_id;
            $key = $msg->product_id . '-' . $otherUserId;
    
            if (!isset($chats[$key])) {
                $chats[$key] = [
                    'product' => $msg->product,
                    'user' => $msg->sender_id === Auth::id() ? $msg->receiver : $msg->sender,
                    'last_message' => $msg,
                ];
            }
        }
        return view('user.messaggi', compact('chats'));
    }
    
}
