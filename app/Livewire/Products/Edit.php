<?php

namespace App\Livewire\Products;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class Edit extends Component
{   
    public $product;

    #[Validate('required|string')]
    public $title;
    #[Validate('required|string|max:2048')]
    public $description;
    #[Validate('required|numeric|decimal:0,2|min:0')]
    public $price;
    #[Validate('required')]
    public $category_id;
    public $user_id;
    public $myCity;
    public $city;
    public $latitudine;
    public $longitudine;

    public function mount(Product $product) {
        $this->product = $product;
        $this->title = $product->title;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->category_id = $product->category_id;
        $this->city = $product->city;
    }

    public function update() {
        $this->validate();
        $json = Storage::disk('public')->get('comuni.json');
        $comuni = json_decode($json);
        $this->city = $comuni[$this->myCity]->denominazione_ita;
        $this->latitudine = $comuni[$this->myCity]->lat;
        $this->longitudine = $comuni[$this->myCity]->lon;
        $this->product->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id'=> $this->category_id,
            'user_id' => Auth::id(),
            'city' => $this->city,
            'latitudine' => $this->latitudine,
            'longitudine' => $this->longitudine
        ]);
        session()->flash('status', 'Annuncio modificato correttamente.');
        return redirect()->route('personalArea', Auth::id());
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.products.edit', compact('categories'));
    }
}
