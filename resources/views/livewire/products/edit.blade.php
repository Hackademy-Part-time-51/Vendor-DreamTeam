<div class="container">
    <hr>
    <form wire:submit="store">
        <div class="row mt-3" >
            <div class="col-md-6 mb-4 mb-md-0 ">
                <div id="productImageCarousel" class="carousel slide shadow-sm " data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#productImageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#productImageCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#productImageCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
    
                    <div class="carousel-inner rounded"> 
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/1080" class="d-block w-100" alt="Immagine casuale 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/1080" class="d-block w-100" alt="Immagine casuale 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/1080" class="d-block w-100" alt="Immagine casuale 3">
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
                <h1 class="mb-3 text-capitalize">{{ $product->title }} <i class="bi bi-pencil-fill fs-6 btn "></i></h1>
                <div class="mb-3 text-muted">
                @if ($product->category)
                    <span class="fs-5">Categoria: 
                        <a href="{{ route('products.index', ['category' => $product->category->id]) }}" class="text-decoration-none text-primary">
                            {{ $product->category->name }} 
                        </a> <i class="bi bi-pencil-fill  btn  btn-sm"></i></h1>
                    </span>
                @endif
                <br>
                    @if ($product->user)
                        <span class="fs-5">Venditore: {{ $product->user->name }}</span>
                    @endif
                </div>
                
                <div class="mb-3">
                    <h5 class="border-bottom fs-3 pb-1 mb-2">Descrizione <i class="bi bi-pencil-fill fs-6 btn "></i></h1></h5>
                    <p class="mb-0">{{($product->description)}}</p> 
                </div>
                
                 <p class="text-muted small">
                    Aggiunto il: {{ $product->created_at->translatedFormat('d F Y') }} 
                    ({{ $product->created_at->diffForHumans() }})
                 </p>
                 @if(!is_null($product->price))
                 <p class="fs-3 fw-bold mb-2">
                     € {{ number_format($product->price, 2, ',', '.') }} <i class="bi bi-pencil-fill fs-6 btn "></i></h1>
                 </p>
             @endif
            </div>
        </div>
    </form>
</div>

