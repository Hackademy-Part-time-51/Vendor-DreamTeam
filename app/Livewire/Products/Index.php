<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    public $products;
    public $categories;
    public $orderbydate = true;
    public $orderbyaz = true;
    public $search = "";
    public $category;

    public function mount()
    {
        $this->products = Product::query()
            ->orderBy('created_at', 'desc')
            ->get();
    }


    public function orderByDateFunction(){
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
    public function orderByAZFunction(){

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

        if($this->category){
            $this->products = Product::where('category_id', $this->category)->get();
        }else {
            $this->products=Product::all();
        }

        if($this->search){
            $this->products = Product::where('title', 'LIKE', '%'.$this->search.'%')->get();
        } else {
            $this->products=Product::all();
        }

        return view('livewire.products.index', ['products'=>$this->products, 'orderByAZ'=>$this->orderbyaz, 'orderByDate'=>$this->orderbydate]);
    }
}
