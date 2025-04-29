<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index()
    {
        $product_to_check= Product::where('is_accepted', null)->first();
        return view('revisor.index', compact('product_to_check'));
    }

    public function accept(Product $product)
    {
        $product->setAccepted(true);
        return redirect()->back()->with('message',"Hai accettato il prodotto $product->name");
    }

    public function reject(Product $product)
    {
        $product->setAccepted(false);
        return redirect()->back()->with('message',"Hai rifiutato il prodotto $product->name");
    }
}
