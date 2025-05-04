<div class="card mt-4">
    <div class="card-header bg-white">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">
                <i class="bi bi-heart-fill text-danger me-2"></i>Articoli Preferiti
            </h5>
            <span class="badge bg-danger rounded-pill px-3 py-2">
                {{ Auth::user()->favorites->count() }}
            </span>
        </div>
    </div>

    <div class="card-body">
        @if(Auth::user()->favorites->count() > 0)

        <div class="row g-4">
            @foreach (Auth::user()->favorites as $product)
            <div class="col-12 col-md-6 col-lg-4 p-2 scalebig" wire:key="{{ $product->id }}">
                <x-card :product="$product"></x-card>
        
            </div>
            @endforeach
        </div>
            @if($favoriteProducts->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $favoriteProducts->links() }}
                </div>
            @endif

        @else
            <div class="text-center py-5">
                <i class="bi bi-heart display-1 text-muted mb-4"></i>
                <h4 class="text-muted">Non hai ancora articoli preferiti</h4>
                <p class="text-muted mb-4">Esplora il catalogo e aggiungi gli articoli che ti piacciono ai preferiti</p>
                <a href="{{ route('products.index') }}" class="btn btn-base">
                    <i class="bi bi-search me-2"></i>Esplora Articoli
                </a>
            </div>
        @endif
    </div>
</div>
