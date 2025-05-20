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

        Mail::to('vendortestingdreamteam@gmail.com')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('lavoraConNoi')->with('message', __('message.becomeReviewer'));
        
    }

    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor', ['email'=> $user->email]);
        return redirect()->route('revisor.index');
    }

    public function index(){
        $product_to_check=Product::where('is_accepted', null)->first();
        $allProductsToCheck=Product::where('is_accepted', null)->get(); 
        $refusedProducts=Product::where('is_accepted', 0)->get();
        $acceptedProducts=Product::where('is_accepted', 1)->get();
        return view('revisor.index', compact('product_to_check', 'allProductsToCheck', 'refusedProducts', 'acceptedProducts'));
    }

    public function accept(Product $product) 
    {
        $product->setAccepted(true); 
        return redirect()
            ->back()
            ->with('message', __("message.acceptedArticle") . " {$product->name}");
    }

    public function reject(Product $product) 
    {
        $product->setAccepted(false); 
        return redirect()
            ->back()
            ->with('message', __('message.rejectedArticle') . "{$product->name}"); 
    }
}
