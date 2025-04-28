<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class Favorite extends Component
{
    

    public function render()
    {
        return view('livewire.products.favorite', ['favorites'=>$this->favorites]);
    }
}
