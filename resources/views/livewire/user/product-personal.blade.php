<div>
    <div>
        @foreach ($products as $product)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        @if ($product->description)
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        @endif
                        @if ($product->category)
                            <p class="card-text"><strong>Categoria:</strong> {{ $product->category->name }}</p>
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
    {{ $products->links() }}
</div>
