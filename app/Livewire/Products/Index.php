<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $products;
    public $categories;
    public $orderbydate = true;
    public $orderbyaz = true;
    public $search = "";
    public $category;

    // public function mount()
    // {
    //     $this->products = Product::query()
    //         ->orderBy('created_at', 'desc')
    //         ->get();
    // }


    public function orderByDateFunction()
    {

        $this->orderbydate = !$this->orderbydate;
    }
    public function orderByAZFunction()
    {


        $this->orderbyaz = !$this->orderbyaz;
    }





    public function render()
    {
        
        $this->products = Product::with('category')
            ->when(!empty($this->search), function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->when(!empty($this->category), function ($query) {
                $query->where('category_id', $this->category);
            })
            ->when($this->orderbydate, function ($query) {
                $query->orderBy('created_at', 'desc');
            },function ($query) {
                $query->orderBy('created_at', 'asc');
            })->when($this->orderbyaz, function ($query) {
                $query->orderBy('title', 'desc');
            },function ($query) {
                $query->orderBy('title', 'asc');
            })
            
            ->get();

        




        

        return view('livewire.products.index', [

            'orderByAZ' => $this->orderbyaz,
            'orderByDate' => $this->orderbydate
        ]);
    }
}
