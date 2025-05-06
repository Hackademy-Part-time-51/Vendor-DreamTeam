<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Search;

class SavedSearches extends Component
{
    
    


    public function search($id)
    { 
        $search = Search::find($id);
        
        
        return redirect()->route('products.index', [
            'search'=> $search->search,
            'minPrice'=> $search->min_price,
            'maxPrice'=> $search->max_price,
            'myCity'=> $search->city,
            'myRadius'=> $search->range,
            'category'=> $search->category
        ]);
        
    }
    public function deleteSearch($id)
    {
        $search = Search::find($id);
        $search->delete();
    }
    public function render()
    {
        return view('livewire.user.saved-searches');
    }
}
