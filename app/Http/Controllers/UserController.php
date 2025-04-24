<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function personalArea (User $user,$id){
        $user = User::find($id); 
        return view('personalArea', compact('user'));
    }
}
