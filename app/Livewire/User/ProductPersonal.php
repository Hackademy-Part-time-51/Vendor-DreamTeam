<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Livewire\WithPagination;



class ProductPersonal extends Component
{
    use WithPagination;

    public $products;
    public $user;
    public function render()
    {   
        $this->user=Auth::id();
        $this->products = Product::where('user_id', $this->user)->paginate(6);
        
        return view('livewire.user.product-personal');
    }
}
