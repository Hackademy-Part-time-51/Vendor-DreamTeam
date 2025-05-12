<div class="card mt-4">

    <div class="card-body">
        @if(Auth::user()->favorites->count() > 0)

        <div class="row g-4">
            @foreach (Auth::user()->favorites as $product)
            <div class="col-12 col-md-6 col-lg-4 p-2 scalebig" wire:key="{{ $product->id }}">
                <x-card :product="$product"></x-card>
        
            </div>
            @endforeach
        </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-heart display-1 text-muted mb-4"></i>
                <h4 class="text-muted">{{__('user.dontHaveFavorite')}}</h4>
                <p class="text-muted mb-4">{{__('user.exploreCatalog')}}</p>
                <a href="{{ route('products.index') }}" class="btn btn-base">
                    <i class="bi bi-search me-2"></i>{{__('user.exploreArticles')}}
                </a>
            </div>
        @endif
    </div>
</div>
