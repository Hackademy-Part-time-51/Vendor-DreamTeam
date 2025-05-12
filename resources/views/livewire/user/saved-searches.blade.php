<div class="card mt-4">
    <div class="card-body">
        @if(Auth::user()->searches->count() > 0)
        <div class="row g-4">
            @foreach (Auth::user()->searches as $search)
            <div class="col-12 col-md-6 col-lg-4 p-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Ricerca</strong>:
                            @if ($search->search)
                            {{ $search->search }}
                            @else
                            Nessuna ricerca
                            @endif</h5>
                        <p class="card-text text-muted">{{ $search->created_at->format('d/m/Y H:i') }}</p>
                        @if ($search->category)
                        <p class="card-text"><strong>{{__('ui.category')}}:</strong> {{ $search->category->name }}</p>
                        @endif
                        <p class="card-text"><strong>{{__('product.price')}}:</strong> {{ $search->min_price ?? 0 }} - {{ $search->max_price ?? 9999 }} €</p>
                        <div class="d-flex justify-content-start gap-1">
                            <button class="btn btn-baseblu" wire:click="search({{ $search->id }})">
                                <i class="bi bi-search"></i> {{__('product.search')}}
                            </button>
                            <button class="btn btn-rosso" wire:click="deleteSearch({{ $search->id }})">
                                <i class="bi bi-trash"></i> {{__('revisor.delete')}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-star display-1 text-muted mb-4"></i>
            <h4 class="text-muted">{{__('user.noSaved')}}</h4>
            <p class="text-muted mb-4">{{__('user.searchEasly')}}</p>
            <a href="{{ route('products.index') }}" class="btn btn-warning">
                <i class="bi bi-search me-2"></i>{{__('user.startSearch')}}
            </a>
        </div>
        @endif
    </div>
</div>
