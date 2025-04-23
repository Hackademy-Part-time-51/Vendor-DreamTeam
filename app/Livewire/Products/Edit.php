<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Validate;

class Edit extends Component
{   
    public $product;
    #[Validate(['required|string|max:50'])]
    public $name;
    #[Validate(['required|string|max:2048'])]
    public $description;
    #[Validate(['required|numeric|float'])]
    public $price;

    public function mount(Product $product) {
        $this->product = $product;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
    }

    public function store() {
        $this->validate();
        $this->product->update([
            'name' => $this->name,
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
