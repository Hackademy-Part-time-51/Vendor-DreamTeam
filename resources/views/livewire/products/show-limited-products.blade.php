<div>
    <hr>
    <h2 class="mb-4 text-center">I nostri ultimi 6 prodotti</h2>
    <hr>
    @if ($products->isNotEmpty())
        <div class="row g-4">
            @foreach ($products as $product)
                <div class="col-12 col-md-6 col-lg-4 scalebig">
                    <x-card :product="$product" :favorites="$favorites"></x-card>
                </div>
            @endforeach
        </div>
    @else
        <p class="alert alert-info">Nessun prodotto da mostrare al momento.</p>
    @endif
    <div class="d-flex justify-content-center mt-4">
        <a href="{{ route('products.index') }}" class="btn btn-base">Visualizza tutti i prodotti</a>
    </div>
</div>
