<div>
    <h2 class="mb-4">I nostri ultimi 6 prodotti</h2>

    @if($products->isNotEmpty())
        <div class="row g-4">
            @foreach ($products as $product)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->title }}</h5>

                            @if($product->description)
                                <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            @endif
                            @if($product->price)
                                <p class="card-text mt-auto">
                                    <strong>Prezzo:</strong> € {{ number_format($product->price, 2, ',', '.') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="alert alert-info">Nessun prodotto da mostrare al momento.</p>
    @endif

</div>
