<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Product;

class Create extends Component
{   #[Validate(['required|string|max:50'])]
    public $name;
    #[Validate(['required|string|max:2048'])]
    public $description;
    #[Validate(['required|numeric|float'])]
    public $price;

    public function create() {
        $this->validate();
        $this->only('name','description','price');
        Product::create(
            $this->form->all() 
        );
        session()->flash('status', 'Annuncio creato correttamente.');

 
        return $this->redirect('/products/index');
    }
    public function render()
    {
        return view('livewire.products.create');
    }
}
