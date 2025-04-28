<x-layout>
    @if($product->user_id !==Auth::id()) 
       <p>non sei autorizzato </p>
    @else
    
    @livewire('products.edit', ['product' => $product], ['categories' => $categories])
</x-layout>