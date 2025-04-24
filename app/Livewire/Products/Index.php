<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    public $products;
    public $orderbydate = true;
    public $orderbyaz = true;
    public $search = "";

    public function mount()
    {
        $this->products = Product::query()
            ->orderBy('created_at', 'desc')
            ->get();
    }


    public function orderByDate(){
        if($this->orderbydate){  
            $this->products = Product::query()
            ->orderBy('created_at', 'asc')
            ->get();
        } else {
            $this->products = Product::query()
            ->orderBy('created_at', 'desc')
            ->get();
        }        
        $this->orderbydate = !$this->orderbydate;
    }
    public function orderByAZ(){
        if($this->orderbyaz){
            $this->products = Product::query()
            ->orderBy('title', 'asc')
            ->get();
            
        } else {
            $this->products = Product::query()
            ->orderBy('title', 'desc')
            ->get();
            
        }
        $this->orderbyaz = !$this->orderbyaz;
    }
    public function render()
    {
        if($this->search){
            $this->products = Product::where('title', 'LIKE', '%'.$this->search.'%')->get();
        } else {
            $this->products;
        }

        return view('livewire.products.index');
    }
}
