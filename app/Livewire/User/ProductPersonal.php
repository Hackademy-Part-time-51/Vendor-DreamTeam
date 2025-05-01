<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Attributes\On;


class ProductPersonal extends Component
{
    use WithPagination; 

    public $user;
    public $perPage = 12;

    public $showAll = false;

    public function showAllFunction(){
        $this->showAll = !$this->showAll;
        $this->dispatch('showAll');
    }

    #[On('showAll')]
    public function render()
    {   
        if($this->showAll){
            $products = Product::where('user_id', $this->user)->paginate($this->perPage);
        }else{
            $products = Product::where('user_id', $this->user)->latest()->take(3)->get();
        }

        return view('livewire.user.product-personal', ['products'=>$products]);
    }
}
