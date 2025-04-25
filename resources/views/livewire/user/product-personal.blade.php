<div class="col-12">
    <h2 class="text-center mb-3">Articoli creati</h2>
    <div class="row g-3">
        @foreach ($products as $product) 
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                <div class="card card-personal-area-product h-100 w-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        @if ($product->description) 
                            <p class="card-text">{{ Str::limit($product->description, 50) }}</p>
                        @endif
                        @if ($product->category) 
                            <p class="card-text">
                                <strong>Categoria:</strong> {{ $product->category->name }}
                            </p>
                        @endif
                        <p class="card-text">
                            <strong>Data:</strong> {{ $product->created_at->format('d/m/Y') }}
                        </p>
                        @if ($product->price)
                            <p class="card-text">
                                <strong>Prezzo:</strong> € {{ number_format($product->price, 2, ',', '.') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-3">
        {{$products->links()}}
    </div>
</div>
