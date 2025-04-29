<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function becomeRevisor(){
        Mail::to('simodami90@hotmail.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('lavoraConNoi')->with('message','Complimenti,Hai richiesto di diventare revisore');

    }

    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor', ['email'=> $user->email]);
    }
}
