<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    // public function __construct()
    // {
    //     $this->authorizeResource(Product::class, 'product', [
    //         'except' => ['index', 'show', 'home']
    //     ]);
    // }

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

        $product = Auth::user()->products->create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('product_images', 'public'); 
        
                $product->images()->create([
                    'path' => $path,
                ]);
            } // Fine del ciclo foreach per ogni file
        }

        return redirect()->route('products.show', $product)
            ->with('success', __('message.productSuccessfully'));
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
            ->with('success', __('message.productUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product)
    {
        $product = Product::findOrFail($product);
       $product->users()->detach();
        $product->delete();
        return back()->with('success', __('message.productDeleted'));
        
    }

    public function faq() {
        return view('faq');
    }
    public function privacy() {
        return view('privacy');
    }
    public function terms() {
        return view('terms');
    }
    public function contact() {
        return view('contact');
    }
    public function aboutUs(){
        return view("aboutUs");
    }

    public function sendemail(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $mail = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to($mail['email'])->send(new ContactMail($mail));
        return redirect()->route('contact')->with('success', __('message.emailSent'));
        
    }

    public function setLanguage($lang){
        session()->put('locale',$lang);
        return redirect()->back();
    }

}
