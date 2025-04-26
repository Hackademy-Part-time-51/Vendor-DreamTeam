<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $products;
    public $categories;
    public $orderbydate = '';
    public $orderbyaz = '';
    public $search = "";
    public $category;

    // public function mount()
    // {
    //     $this->products = Product::query()
    //         ->orderBy('created_at', 'desc')
    //         ->get();
    // }


    public function orderByDateFunction()
    {   if(empty($this->orderbydate)){
        $this->orderbydate = true;
    }else{
        
        $this->orderbydate = !$this->orderbydate;
    }
    $this->orderbyaz = '';

    }
    public function orderByAZFunction()
    {
        if(empty($this->orderbyaz)){
            $this->orderbyaz = true;
        }else{
            
            $this->orderbyaz = !$this->orderbyaz;
        }
        $this->orderbydate = '';


    }





    public function render()
    {

        $this->products = Product::with('category')
            ->when(!empty($this->search), function ($product) {
                $product->where('title', 'like', '%' . $this->search . '%');
            })
            ->when(!empty($this->category), function ($product) {
                $product->where('category_id', $this->category);
            })
            ->when(!empty($this->orderbydate), function ($product) {
                $product->orderBy('created_at', 'asc');
            }, function ($product) {
                $product->orderBy('created_at', 'desc');
            })->when(!empty($this->orderbyaz), function ($product) {
                $product->orderBy('title', 'asc');
            }, function ($product) {
                $product->orderBy('title', 'desc');
            })
            ->get();

        return view('livewire.products.index', [

            'orderByAZ' => $this->orderbyaz,
            'orderByDate' => $this->orderbydate
        ]);
    }
}
