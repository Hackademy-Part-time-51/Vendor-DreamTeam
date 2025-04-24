<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Validate;

class Edit extends Component
{   
    public $product;
    public $categories;

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

    public function store() {
        $this->validate();
        $this->product->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price
        ]);
        session()->flash('status', 'Annuncio modificato correttamente.');
        return $this->redirect('/products/index');
    }
    public function render()
    {
        return view('livewire.products.edit');
    }
}
