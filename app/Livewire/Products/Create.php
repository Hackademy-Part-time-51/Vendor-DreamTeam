<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
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



    public function create() {
         $this->validate();
         $this->user_id = Auth::id();
         $this->only('title','description','price', 'category_id', 'user_id');
    
        Product::create(
            $this->only('title','description','price', 'category_id', 'user_id')
        );
        session()->flash('status', 'Annuncio creato correttamente.');
        return $this->redirect('/products/index');
    }
    public function render()
    {
        
        return view('livewire.products.create');
    }
}
