<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    public $categories;
    #[Validate('required|string|max:50')]
    public $title;
    #[Validate('required|string|max:2048')]
    public $description;
    #[Validate('required|numeric|decimal:0,2|min:0')]
    public $price;
    #[Validate('required|exists:categories,id')]
    public $category_id;

    public $user_id;
    public $myCity;
    public $city;
    public $latitudine;
    public $longitudine;

    public function create()
    {
        $this->validate();
        $json = Storage::disk('public')->get('comuni.json');
        $comuni = json_decode($json);
        $this->city = $comuni[$this->myCity]->denominazione_ita;
        $this->latitudine = $comuni[$this->myCity]->lat;
        $this->longitudine = $comuni[$this->myCity]->lon;
        $this->user_id = Auth::id();


        Product::create(
            $this->only('title', 'description', 'price', 'category_id', 'user_id', 'city', 'latitudine', 'longitudine')
        );
        session()->flash('status', 'Annuncio creato correttamente, in attesa di approvazione');
        return $this->redirect('/products/index');
    }
    public function render()
    {

        return view('livewire.products.create');
    }
}
