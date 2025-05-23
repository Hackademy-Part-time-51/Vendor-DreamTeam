<?php

namespace App\Livewire\Products;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use App\Models\Search;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;

class Index extends Component
{
    public $products;
    public $categories;
    protected $favorites = null;
    public $orderbydate = null;
    public $orderbyaz = null;
    public $search = '';
    public $category;
    protected $scroll = 18;
    #[Validate('min:0')]
    public $minPrice;
    #[Validate('min:0')]
    public $maxPrice;
    public $myCity;
    public $myRadius = 0;
    protected $json;
    public $comuni;
    public $count;

    public function mount()
    {
        // dd(request()->query());
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

        if (request()->filled('search')) {
            $this->search = request()->query('search');
        }

        if (request()->filled('minPrice')) {
            $this->minPrice = request()->query('minPrice');
        }

        if (request()->filled('maxPrice')) {
            $this->maxPrice = request()->query('maxPrice');
        }

        if (request()->filled('myCity')) {
            $this->myCity = request()->query('myCity');
        }
        if (request()->filled('myRadius')) {
            $this->myRadius = request()->query('myRadius');
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
        if (($this->scroll + 18) < $this->count)  {
            $this->scroll += 18;
        } else {
            $this->scroll = $this->count - 1;
        }
    }

    public function resetFilter()
    {
        $this->search = '';
        $this->category = null;
        $this->orderbydate = '';
        $this->orderbyaz = '';
        $this->minPrice =null;
        $this->maxPrice=null ;
        $this->scroll = 18;
        $this->myCity = null;
        $this->myRadius;
    }

    public function saveFilter()
    {   

        if($this->category == "") {
            $this->category = null;
        }
        Search::create([
            'user_id' => Auth::id(),
            'search' => $this->search,
            'category_id' => $this->category,
            'min_price' => $this->minPrice,
            'max_price' => $this->maxPrice,
            'city' => $this->myCity,
            'range' => $this->myRadius
        ]);
        session()->flash('status', 'Ricerca salvata correttamente');
        return redirect()->route('products.index', [
            'search' => $this->search,
            'minPrice' => $this->minPrice,
            'maxPrice' => $this->maxPrice,
            'myCity' => $this->myCity,
            'myRadius' => $this->myRadius,
            'category' => $this->category
        ]);
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


    #[On('fresh')]
    public function render()
    {

        if (!empty($this->search)) {
            // Scout search
            $products = Product::search($this->search)->get();
        } else {
            // Eloquent fallback
            $products = Product::all();
        };
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

        $this->count = count($products);
        $products = $products->take($this->scroll );
        $this->products = $products;
        // Gestione scroll
        if ($this->scroll > count($this->products) - 1) {
            $this->scroll = count($this->products) - 1;
        }
        if ($this->scroll <= 0 && count($this->products) > 0) {
            $this->scroll = count($this->products) ;
        }

        // dd($this->products);

        return view('livewire.products.index', [
            'products' => $this->products,
            'scroll' => $this->scroll,
            'orderByAZ' => $this->orderbyaz,
            'orderByDate' => $this->orderbydate,
            'myCity' => $this->myCity,
            'myRadius' => $this->myRadius,
            'count'=>$this->count
        ]);
    }
}
