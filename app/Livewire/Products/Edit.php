<?php

namespace App\Livewire\Products;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{   
    public $product;

    #[Validate('required|string')]
    public $title;
    #[Validate('required|string|max:2048')]
    public $description;
    #[Validate('required|numeric|decimal:0,2|min:0')]
    public $price;
    #[Validate('required|exists:categories,id')]
    public $category_id;
    public $user_id;

    public function mount(Product $product) {
        $this->product = $product;
        $this->title = $product->title;
        $this->description = $product->description;
        $this->price = $product->price;
    }

    public function update() {
        $this->validate();
        $this->product->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id'=> $this->category_id,
            'user_id' => Auth::id(),
        ]);
        session()->flash('status', 'Annuncio modificato correttamente.');
        return $this->redirect('/products/index');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.products.edit', compact('categories'));
    }
}
