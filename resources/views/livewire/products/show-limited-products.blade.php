<div>
    <h2 class="mb-4">I nostri ultimi 6 prodotti</h2>

    @if ($products->isNotEmpty())
        <div class="row g-4">
            @foreach ($products as $product)
                <div class="col-12 col-md-6 col-lg-4 scalebig">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex mt-auto  justify-content-between align-items-center">
                                <h5 class="card-title text-capitalize">{{ $product->title }}</h5>
                                @livewire('products.favorite')
                            </div>
                            @if ($product->description)
                                <p class="card-text">{{ Str::limit($product->description, 20) }}</p>
                            @endif
                            @if ($product->category)
                                <p class="card-text"><strong>Categoria:</strong> {{ $product->category->name }}
                                    <span class="d-inline-block align-middle" style="width: 1rem; height: 1rem;">
                                        {!! $product->category->svg_icon !!}
                                    </span>
                                </p>
                            @endif
                            <p class="card-text">
                                <strong>Data:</strong> {{ $product->created_at->format('d/m/Y') }}
                            </p>
                            <p class="card-text">
                                <strong>Creato da:</strong> {{ $product->user->name }}
                            </p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                @if ($product->price)
                                    <p class="card-text fw-bold fs-5 mb-0">
                                        € {{ number_format($product->price, 2, ',', '.') }}
                                    </p>
                                @else
                                    <span></span>
                                @endif
                                <a href="{{ route('products.show', ['product' => $product->id]) }}"
                                   class="btn btn-base btn-sm">
                                    Vedi Dettagli
                                </a>
                            </div>
                        </div>
                    </div>
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
