<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function personalArea (User $user,$id){
        $user = User::find($id); 
        $products= Product::all();
        return view('user.personalArea', compact('user', 'products'));
    }
}
