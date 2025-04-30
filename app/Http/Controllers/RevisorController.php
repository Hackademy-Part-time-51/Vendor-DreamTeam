<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;

class RevisorController extends Controller
{
    public function becomeRevisor(){

        Mail::to('simodami90@hotmail.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('lavoraConNoi')->with('message','Complimenti,Hai richiesto di diventare revisore');
        
    }

    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor', ['email'=> $user->email]);
    }

    public function index(){
        $product_to_check=Product::where('is_accepted', null)->first();
        return view('revisor.index', compact('product_to_check'));
    }

    public function accept(Product $product) 
    {
        $product->setAccepted(true); 
        return redirect()
            ->back()
            ->with('message', "Hai accettato l'articolo {$product->name}"); 
    }

    public function reject(Product $product) 
    {
        $product->setAccepted(false); 
        return redirect()
            ->back()
            ->with('message', "Hai rifiutato l'articolo {$product->name}"); 
    }
}
