<?php

namespace App\Livewire\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

use Livewire\Component;

class FavoritesProducts extends Component
{   

    public function toggleFavorite($id)
    {
        if (Auth::user()->favorites->contains($id)) {
            Auth::user()->favorites()->detach($id);
        } else {
            Auth::user()->favorites()->attach($id);
        }
        $this->dispatch('fresh');
    }


    #[On('fresh')]
    public function render()
    {
        return view('livewire.user.favorites-products');
    }
}
