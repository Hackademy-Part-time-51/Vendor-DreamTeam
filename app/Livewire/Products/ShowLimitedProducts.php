<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ShowLimitedProducts extends Component
{
    public $products = [];
    


    public function mount()
    {
        $this->products = Product::query()
            ->orderBy('created_at', 'desc')
            ->take(6) 
            ->get();
    }

    public function render()
    {  
        return view('livewire.products.show-limited-products');
    }
}
