<?php

namespace App\Livewire\Products;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


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
    public $minPrice;
    public $maxPrice;
    public $myCity='';
    public $myRadius=0;
    public $json;
    public $comuni;

    public function mount()
    {
        $this->categories = Category::orderBy('name')->get();
        $this->json = Storage::disk('public')->get('comuni.json');
        $this->comuni = json_decode($this->json);
        // dd($this->comuni);
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
        $this->category = '';
        $this->orderbydate = '';
        $this->orderbyaz = '';
        $this->minPrice = '';
        $this->maxPrice = '';
        $this->scroll = 18;
        $this->myCity = '';
        $this->myRadius;
    }

    public function toggleFavorite($id)
    {
        if (Auth::user()->favorites->contains($id)) {
            Auth::user()->favorites()->detach($id);
        } else {
            Auth::user()->favorites()->attach($id);
        }
        $this->dispatch('fresh');
    }

    // public function toggleFavorite()
    // {   
    //     if(empty($this->favorites)){

    //     $this->favorites = true;

    // }
    //     else{

    //     $this->favorites = !$this->favorites;

    // }}   
    #[On('fresh')]
    public function render()
    {

        $query = Product::with('category')
            ->where('is_accepted', 1)
            ->when(!empty($this->search), function ($product) {
                $product->where('title', 'like', '%' . $this->search . '%');
            })
            ->when(!empty($this->category), function ($product) {
                $product->where('category_id', $this->category);
            })
            ->when(!empty($this->minPrice), function ($product) {
                $product->where('price', '>=', $this->minPrice);
            })
            ->when(!empty($this->maxPrice), function ($product) {
                $product->where('price', '<=', $this->maxPrice);
            })
            ->when(!empty($this->myCity) && !empty($this->myRadius), function ($product) {
                $lat = $this->comuni[$this->myCity]->lat;
                $lon = $this->comuni[$this->myCity]->lon;
                $radius = $this->myRadius;
        
                $product->whereRaw("
                    (6371 * acos(
                        cos(radians(?)) *
                        cos(radians(latitudine)) *
                        cos(radians(longitudine) - radians(?)) +
                        sin(radians(?)) *
                        sin(radians(latitudine))
                    )) < ?
                ", [$lat, $lon, $lat, $radius]);
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

        // if(!Auth::guest()) {
        //     if(Auth::user()->favorites->contains($this->products->id)) {
        //         $favorites = true;
        //     }else {
        //         $favorites = false;
        //     }

        // }



        return view('livewire.products.index', [
            'scroll' => $this->scroll,
            'orderByAZ' => $this->orderbyaz,
            'orderByDate' => $this->orderbydate,
            'myCity' => $this->myCity,
            'myRadius' => $this->myRadius,
            // 'favorites'=>$favorites
        ]);
    }
}
