<?php

namespace App\Livewire\Products;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $products;
    public $categories;
    public $favorites = '';
    public $orderbydate = '';
    public $orderbyaz = '';
    public $search = '';
    public $category;
    public $scroll = 18;
    

  

    public function mount()
    {
        $this->categories = Category::orderBy('name')->get();

        if (request()->filled('category') && is_numeric(request()->query('category'))) {
            $categoryId = request()->query('category');

            if (Category::where('id', $categoryId)->exists()) {
                $this->category = $categoryId;
            }
        }
    }

    public function orderByDateFunction()
    {
        if (empty($this->orderbydate)) {
            $this->orderbydate = true;
        } else {

            $this->orderbydate = !$this->orderbydate;
        }
        $this->orderbyaz = '';
    }
    public function orderByAZFunction()
    {
        if (empty($this->orderbyaz)) {
            $this->orderbyaz = true;
        } else {

            $this->orderbyaz = !$this->orderbyaz;
        }
        $this->orderbydate = '';
    }


    public function scrollFunction()
    {
        if (($this->scroll + 18) < count($this->products)) {
            $this->scroll += 18;
        } else {
            $this->scroll = count($this->products) - 1;
        }
    }

    public function resetFilter()
    {
        $this->search = '';
        $this->category='';
        $this->orderbydate = '';
        $this->orderbyaz = '';
        $this->scroll = 18;
    }

    public function toggleFavorite()
    {   
        if(empty($this->favorites)){

        $this->favorites = true;

    }
        else{
        
        $this->favorites = !$this->favorites;

    }}   

    public function render()
    {

        $query = Product::with('category')
            ->when(!empty($this->search), function ($product) {
                $product->where('title', 'like', '%' . $this->search . '%');
            })
            ->when(!empty($this->category), function ($product) {
                $product->where('category_id', $this->category);
            });

        // Ordine di creazione
        if ($this->orderbydate !== '') {
            if ($this->orderbydate) {
                $query->orderBy('created_at', 'asc');
            } else {
                $query->orderBy('created_at', 'desc');
            }
        }

        // Ordine alfabetico solo se diverso da stringa vuota
        if ($this->orderbyaz !== '') {
            if ($this->orderbyaz) {
                $query->orderBy('title', 'asc');
            } else {
                $query->orderBy('title', 'desc');
            }
        }
        

        $this->products = $query->get();


        if ($this->scroll > count($this->products) - 1) {
            $this->scroll = count($this->products) - 1;
        }
        if ($this->scroll <= 0 && count($this->products) > 0) {
            $this->scroll = count($this->products) - 1;
        }



        return view('livewire.products.index', [
            'scroll' => $this->scroll,
            'orderByAZ' => $this->orderbyaz,
            'orderByDate' => $this->orderbydate,
            'favorites'=>$this->favorites
        ]);
    }
}
