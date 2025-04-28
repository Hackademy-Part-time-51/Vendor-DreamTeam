<x-layout>
    @if($product->user_id !==Auth::id()) 
        <div class="alert alert-danger text-center d-flex justify-content-center align-items-center" style="height: 100vh;">
            <h1><strong>Accesso Negato!</strong> <br> Non hai i permessi per modificare questo prodotto.</h1>
        </div>
    @else
    
        @livewire('products.edit', ['product' => $product], ['categories' => $categories])
    @endif
</x-layout>