<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }

    public function home() {
        return view('welcome');
    }

    public function index() {
        $products = Product::all();
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            
        ]);
        $product = auth()->user()->products()->create($validated);
        return redirect()->route('products.index', $product)
            ->with('success', 'Prodotto creato con successo!');
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
