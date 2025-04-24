<?php

namespace App\Livewire\Products;

use Livewire\Component;

class Index extends Component
{
    public $products;
    public function render()
    {
        return view('livewire.products.index');
    }
}
