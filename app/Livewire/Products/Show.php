<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Stichoza\GoogleTranslate\GoogleTranslate;

class Show extends Component
{
    public Product $product;
    public $setTranslate = false;
    public $descri;
    public function translate()
    {
        if ($this->setTranslate) {
            // $this->descri=$this->product->description ;

        } else {
           
            $locale = app()->getLocale();
            $tr = new GoogleTranslate($locale); // Translates into English
            $this->descri = $tr->translate($this->product->description);
        }

        $this->setTranslate = !$this->setTranslate;
    }

    public function render()
    {

        return view('livewire.products.show', ['descri' => $this->descri, 'setTranslate' => $this->setTranslate]);
    }
}
