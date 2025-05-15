<?php

namespace App\Livewire\Products;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\ResizeImage;
use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Product;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;


class Create extends Component
{

    use WithFileUploads;

    public $categories;
    #[Validate('required|string|max:50')]
    public $title;
    #[Validate('required|string|max:2048')]
    public $description;
    #[Validate('required|numeric|decimal:0,2|min:0')]
    public $price;
    #[Validate('required|exists:categories,id')]
    public $category_id;


    #[Validate('required|array|min:1', message: 'Devi caricare almeno un\'immagine.')]

    #[Validate(['images.*' => 'image|max:2048'], message: ['images.*.image' => 'Il file caricato non è un\'immagine valida.', 'images.*.max' => 'L\'immagine supera la dimensione massima di 2MB.'])]

    public $images = [];

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

        $createdProduct = Product::create(
            $this->only('title', 'description', 'price', 'category_id', 'user_id', 'city', 'latitudine', 'longitudine')
        );

        if ($createdProduct && $this->images) {
            foreach ($this->images as $imageFile) {
                $directory = "products/{$createdProduct->id}"; 
                $newImage= $createdProduct->images()->create(['path'=>$imageFile->store($directory, 'public')]);
                dispatch(new ResizeImage(300,300,$newImage->path));
                dispatch(new GoogleVisionSafeSearch($newImage->id)); 
                dispatch(new GoogleVisionLabelImage($newImage->id));   

            }
        }

        session()->flash('status', 'Annuncio creato correttamente, in attesa di approvazione');
        return $this->redirect('/products/index');
    }


    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }


    public function updateTemporaryImages(){
        if ($this->validate(['temporary_images.*' => 'image|max:1024','temporary_images.*' => 'max:6'])) {
           foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function render()
    {
        return view('livewire.products.create');
    }
}