<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Product;

class Create extends Component
{   public $categories;
      #[Validate(['required|string|max:50'])]
    public $name;
    #[Validate(['required|string|max:2048'])]
    public $description;
    #[Validate(['required|numeric|float'])]
    public $price;
    #[Validate(['required|exists:categories,id'])]
    public $category_id;

    public function create() {
        $this->validate();
        $this->only('name','description','price','category_id');
        Product::create(
            $this->only('name','description','price','category_id') 
        );
        session()->flash('status', 'Annuncio creato correttamente.');

 
        return $this->redirect('/products/index');
    }
    public function render()
    {
        
           return view('livewire.products.create');
    }
}
