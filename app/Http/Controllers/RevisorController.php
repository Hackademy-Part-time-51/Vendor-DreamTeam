<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function becomeRevisor(){
        Mail::to('simodami90@hotmail.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('home')->with('message','Complimenti,Hai richiesto di diventare revisore');

    }
}
