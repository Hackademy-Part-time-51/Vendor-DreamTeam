<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product', [
            'except' => ['index', 'show', 'home']
        ]);
    }

    public function home() {
        return view('welcome');
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $categories = Category::all();
        $products = Product::with('user')->latest()->paginate(10);
        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product = Auth::user()->products()->create($validated);

        return redirect()->route('products.show', $product)
            ->with('success', 'Prodotto creato con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product->update($validated);

        return redirect()->route('products.show', $product)
            ->with('success', 'Prodotto aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Prodotto eliminato con successo');
    }
}
