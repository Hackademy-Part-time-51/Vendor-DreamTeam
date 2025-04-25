<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Livewire\WithPagination;



class ProductPersonal extends Component
{
    use WithPagination;

    public $user;
    public $perPage = 12;
    public function render()
    {   
        $products = Product::where('user_id', Auth::user()->id)->paginate($this->perPage);

        return view('livewire.user.product-personal', ['products'=>$products]);
    }
}
