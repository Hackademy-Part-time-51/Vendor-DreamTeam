<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class PageController extends Controller
{
    public function home() {
        return view('welcome');
    }

    public function index() {
        $categories = Category::all();
        $products = Product::all();
        return view('products.index', compact('products', 'categories'));
    }

    public function create() {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function edit(Product $product) {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function show(Product $product) {
        return view('products.show', compact('product'));
    }

    public function store(Request $request) {
        
    }

    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Prodotto eliminato con successo');
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            
        ]);

        $product->update($validated);

        return redirect()->route('products.show', $product)
            ->with('success', 'Prodotto aggiornato con successo!');
    }
}
