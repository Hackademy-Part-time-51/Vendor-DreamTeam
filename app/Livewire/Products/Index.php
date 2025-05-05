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
    public $myRadius=50;


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
        $this->myRadius = 50;
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
        
        if (!empty($this->search)) {
            // Scout search
            $products = Product::search($this->search)->get();
        
            // Filtri aggiuntivi in PHP
            $products = $products->filter(function ($product) {
                if ($product->is_accepted != 1) return false;
        
                if (!empty($this->category) && $product->category_id != $this->category) return false;
        
                if (!empty($this->minPrice) && $product->price < $this->minPrice) return false;
        
                if (!empty($this->maxPrice) && $product->price > $this->maxPrice) return false;
        
                if (!empty($this->myCity) && !empty($this->myRadius)) {
                    $lat1 = deg2rad($this->comuni[$this->myCity]->lat);
                    $lon1 = deg2rad($this->comuni[$this->myCity]->lon);
                    $lat2 = deg2rad($product->latitudine);
                    $lon2 = deg2rad($product->longitudine);
        
                    $distance = 6371 * acos(
                        cos($lat1) * cos($lat2) * cos($lon2 - $lon1) +
                        sin($lat1) * sin($lat2)
                    );
        
                    if ($distance >= $this->myRadius) return false;
                }
        
                return true;
            });
        
            // Eager load relazioni dopo la ricerca
            $products->load('category');
        
            // Ordinamento
            if ($this->orderbydate !== '') {
                $products = $products->sortBy('created_at', SORT_REGULAR, !$this->orderbydate);
            }
        
            if ($this->orderbyaz !== '') {
                $products = $products->sortBy('title', SORT_REGULAR, !$this->orderbyaz);
            }
        
            // Riassegna a proprietà
            $this->products = $products->values();
        } else {
            // Eloquent fallback
            $query = Product::with('category')
                ->where('is_accepted', 1)
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
        
            if ($this->orderbydate !== '') {
                $query->orderBy('created_at', $this->orderbydate ? 'asc' : 'desc');
            }
        
            if ($this->orderbyaz !== '') {
                $query->orderBy('title', $this->orderbyaz ? 'asc' : 'desc');
            }
        
            $this->products = $query->get();
        }
        
        // Gestione scroll
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
            // 'favorites'=>$favorites
        ]);
    }
}
