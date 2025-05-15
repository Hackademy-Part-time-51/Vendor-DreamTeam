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
         $loadingProducts = Auth::user()->products()->where('is_accepted', null)->get();
        // dd($loadingProducts);
        // dd($favoriteProducts);
        return view('user.personalArea', compact('user', 'products', 'favoriteProducts', 'loadingProducts'));
    }

    public function lavoraConNoi(){
        return view('user.lavoraConNoi');
    }

    public function messaggi($id = null){
        
        $product = $id;
        return view('user.messaggi', compact('product'));
    }
    
}
