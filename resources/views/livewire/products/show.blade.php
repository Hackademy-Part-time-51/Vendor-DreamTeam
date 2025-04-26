<div>
    <hr>
    @if ($product)
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <div id="productImageCarousel" class="carousel slide shadow-sm" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#productImageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#productImageCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#productImageCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>

                        <div class="carousel-inner rounded"> 
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/4320" class="d-block w-100" alt="Immagine casuale 1">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/4320" class="d-block w-100" alt="Immagine casuale 2">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/4320" class="d-block w-100" alt="Immagine casuale 3">
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#productImageCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Precedente</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productImageCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Successivo</span>
                        </button>
                    </div>
                </div>

                <div class="col-md-6 align-content-center">
                    <h1 class="mb-3 text-capitalize">{{ $product->title }}</h1>

                    <div class="mb-3 text-muted">
                        @if ($product->category)
                        <span>Categoria: 
                            <a href="{{ route('products.index', ['category' => $product->category->id]) }}" class="text-decoration-none text-primary">
                                {{ $product->category->name }} 
                            </a>
                        </span>
                    @endif
                        @if ($product->user)
                            <span class="">Venditore: {{ $product->user->name }}</span>
                        @endif
                    </div>
                    
                    @if($product->description)
                        <div class="mb-3">
                            <h5 class="border-bottom pb-1 mb-2">Descrizione</h5>
                            <p class="mb-0">{{($product->description)}}</p> 
                            <button class="btn btn-base btn-sm mt-0 ">Traduci...</button>
                        </div>
                    @endif

                     <p class="text-muted small">
                        Aggiunto il: {{ $product->created_at->translatedFormat('d F Y') }} 
                        ({{ $product->created_at->diffForHumans() }})
                     </p>
                     @if(!is_null($product->price))
                     <p class="fs-3 fw-bold mb-2">
                         € {{ number_format($product->price, 2, ',', '.') }}
                     </p>
                 @endif
                 <div class="d-flex gap-2 justify-content-center mt-3">  
                    <a href="{{ route('products.index') ?? url('/') }}" class="btn btn-base">Contatta il venditore</a>   
                    <a href="{{ route('products.index') ?? url('/') }}" class="btn btn-base">Torna ai Prodotti</a>
                </div>
                </div>

            </div>
        </div>

    @else
        <div class="container mt-5">
            <div class="alert alert-warning text-center" role="alert">
                Il prodotto richiesto non è al momento disponibile.
            </div>
            <div class="text-center">
                <a href="{{ route('products.index') ?? url('/') }}" class="btn btn-primary">Torna ai Prodotti</a>
            </div>
        </div>
    @endif
</div>