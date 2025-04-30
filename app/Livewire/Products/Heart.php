<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class Heart extends Component
{   
    public $product;

    public function toggleFavorite() {
        if(Auth::user()->favorites->contains($this->product->id)) {
            Auth::user()->favorites()->detach($this->product->id);
        } else {
            Auth::user()->favorites()->attach($this->product->id);
        }
        $this->dispatch('fresh');
    }

    #[On('fresh')]
    public function render()
    {   
        // $favorites = false;
        if(!Auth::guest()) {
            if(Auth::user()->favorites->contains($this->product->id)) {
                $favorites = true;
            }else {
                $favorites = false;
            }
    
        }
       
        return view('livewire.products.heart',compact('favorites'));
    }
}
