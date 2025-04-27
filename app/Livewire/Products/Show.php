<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product; 
use Stichoza\GoogleTranslate\GoogleTranslate;

class Show extends Component
{
    public Product $product;

    public function translate(Product $product) {
        $locale = app()->getLocale();
        // dd($locale);
        $tr = new GoogleTranslate($locale); // Translates into English
        $this->product->description = $tr->translate($this->product->description);
    }

    public function render()
    {
       
        return view('livewire.products.show');    }
}
