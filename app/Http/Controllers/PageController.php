<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    public function home() {
        return view('welcome');
    }

    public function index() {
        // $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function edit(Product $product) {
        return view('products.edit', compact('product'));
    }

    public function show(Product $product) {
        return view('products.show', compact('product'));
    }

    public function store(Request $request) {
        $product = Product::create($request->all());
        return redirect()->route('products.index', $product)->with('success', 'Prodotto creato con successo');
    }

    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Prodotto eliminato con successo');
    }

    public function update(Request $request, Product $product) {
        $product->update($request->all());
        return redirect()->route('products.index', $product)->with('success', 'Prodotto aggiornato con successo');
    }
}
