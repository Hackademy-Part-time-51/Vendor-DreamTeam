<div class="container-fluid py-4">
    @if ($product)
        <div class="d-block d-lg-none mb-4">
            <div class="text-center">
                <h1 class="display-6 text-blu text-capitalize mb-3">{{ $product->title }}</h1>
                @if ($product->category)
                    <span class="badge bg-warning px-3 py-2 rounded-pill">
                        <i class="bi bi-tag-fill me-2"></i>{{__("category.". $product->category->name)}}
                    </span>
                @endif
            </div>
        </div>
        <div class="row g-2">
            <div class="col-12 col-lg-7">
                <div class="border-0 shadow-sm">
                <div class="card-header bg-transparent border-0 d-none d-lg-block">
                    <div class="text-center">
                        <h1 class="display-6 text-blu text-capitalize mb-3">{{ $product->title }}</h1>
                        <div class="d-flex justify-content-center gap-2">
                            @if ($product->category)
                                <span class="badge bg-warning px-3 py-2 rounded-pill">
                                    <a href="{{ route('products.index', ['category' => $product->category->id]) }}" 
                                    class="text-decoration-none text-blu">
                                        <i class="bi bi-tag-fill me-2"></i>{{__($product->category->name)}}
                                    </a>
                                </span>
                            @endif
                            @if ($product->city)
                                <p class="text-muted mb-0">
                                    <i class="bi bi-geo-alt me-2"></i>{{ $product->city }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body p-2">
                    <div id="productImageCarousel{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @for ($i = 0; $i < max(3, count($product->images)); $i++)
                                <button type="button" data-bs-target="#productImageCarousel{{ $product->id }}" 
                                        data-bs-slide-to="{{ $i }}" 
                                        class="@if($i == 0) active @endif"
                                        aria-label="Slide {{ $i + 1 }}">
                                </button>
                            @endfor
                        </div>
                        <div class="carousel-inner rounded-3">
                            @if ($product->images()->count() > 0)
                                @foreach ($product->images as $key => $image)
                                    <div class="carousel-item @if($key == 0) active @endif">
                                        
                                        <img src="{{ Storage::url($image->path) }}"
                                            class="d-block w-100"
                                            style="aspect-ratio: 16/9; object-fit: contain;"
                                            alt="Immagine prodotto {{ $key + 1 }}">
                                    </div>
                                @endforeach
                            @else
                                @for ($i = 0; $i < 3; $i++)
                                    <div class="carousel-item @if($i == 0) active @endif">
                                        <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/2160"
                                            class="d-block w-100"
                                            style="aspect-ratio: 16/9; object-fit: contain;"
                                            alt="Immagine placeholder {{ $i + 1 }}">
                                    </div>
                                @endfor
                            @endif
                        </div>
                        <button class="carousel-control-prev" type="button" 
                                data-bs-target="#productImageCarousel{{ $product->id }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" 
                                data-bs-target="#productImageCarousel{{ $product->id }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 p-3 d-none d-md-block">
                    <div class="row g-2">
                        @if ($product->images()->count() > 0)
                            @foreach ($product->images as $key => $image)
                                <div class="col-4">
                                    <img src="{{ Storage::url($image->path) }}"
                                        class="img-fluid rounded cursor-pointer"
                                        style="aspect-ratio: 16/9; object-fit: contain;"
                                        data-bs-target="#productImageCarousel{{ $product->id }}"
                                        data-bs-slide-to="{{ $key }}"
                                        alt="Thumbnail {{ $key + 1 }}">
                                </div>
                            @endforeach
                        @else
                            @for ($i = 0; $i < 3; $i++)
                                <div class="col-4">
                                    <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/2160"
                                        class="img-fluid rounded cursor-pointer"
                                        style="aspect-ratio: 16/9; object-fit: contain;"
                                        data-bs-target="#productImageCarousel{{ $product->id }}"
                                        data-bs-slide-to="{{ $i }}"
                                        alt="Thumbnail {{ $i + 1 }}">
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>
            </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="d-flex border-0 shadow-sm h-100">
                    <div class="card-body d-flex flex-column justify-content-center p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            @if (!is_null($product->price))
                                <h2 class="display-5 text-blu mb-0">
                                    € {{ number_format($product->price, 2, ',', '.') }}
                                </h2>
                            @endif
                            @if ($product->user)
                                <div class="text-end">
                                    <p class="fs-5 text-blu mb-1">
                                        <a href="{{ route('personalArea', $product->user->id) }}" class="text-decoration-none"> {{ $product->user->name }}</a>
                                    </p>
                                    <span class="badge bg-secondary">{{__('product.salesperson')}}</span>
                                </div>
                            @endif
                        </div>
                        <div class="card bg-light border-0 ">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title text-blu mb-0">{{__('product.description')}}</h5>
                                    <button wire:click="translate" class="btn btn-base btn-sm">
                                        <span>
                                        <i class="bi bi-translate me-2"></i>
                                        {{ $setTranslate ? 'Originale' : 'Traduci' }}
                                        </span>
                                    </button>
                                </div>
                                <p class="card-text">
                                    {{ $setTranslate ? $descri : $product->description }}
                                </p>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="text-muted small">
                                <i class="bi bi-calendar-event me-2"></i>
                                {{__('product.publishedOn')}} {{ $product->created_at->translatedFormat('d F Y') }}
                                <br>
                                <small>({{ $product->created_at->diffForHumans() }})</small>
                            </p>
                        </div>
                        <div class="d-grid gap-2">
                            @if ($product->user_id !== Auth::id())
                            <a href="{{route('messaggi', $product->id)}}" class="btn btn-base py-3 scalebig">
                                <span>
                                    <i class="bi bi-chat-dots me-2"></i>{{__('product.contactSeller')}}
                                </span>
                            </a >                                
                            @endif
                            <a href="{{ route('products.index') }}" 
                               class="btn btn-base py-3 scalebig">
                               <span>
                                   <i class="bi bi-arrow-left me-2"></i>{{__('product.returnProducts')}}
                               </span>
                            </a>
                        </div>
                        @if (Auth::user()->is_revisor === 1 )

                        <div class="row g-2 mt-1">
                            @if ($product->is_accepted === 1)
                                <div class="col-12 my-1">
                                    <span class="badge bg-success w-100 fs-3 text-center">{{__('revisor.accepted')}}</span>
                                </div>
                            @elseif ($product->is_accepted === 0)
                                <div class="col-12 mb-2">
                                    <span class="badge bg-danger fs-3 w-100 text-center">{{__('revisor.refused')}}</span>
                                </div>
                            @else
                                <div class="col-12 mb-2">
                                    <span class="badge bg-warning w-100 fs-3 text-center">{{__('revisor.awaitingReview')}}</span>
                                </div>                        
                            @endif
                            @if ($product->is_accepted === null)
                            <div class="col-6">
                                <form action="{{ route('accept', $product) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-base w-100 d-flex align-items-center justify-content-center">
                                        <span class="d-none d-sm-inline"><i class="bi bi-check-lg me-2"></i> {{__('revisor.accept')}}</span>
                                    </button>
                                </form>
                            </div>
                            <div class="col-6">
                                <form action="{{ route('reject', $product) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-rosso w-100 d-flex align-items-center justify-content-center">
                                        <i class="bi bi-x-lg me-2"></i>
                                        <span class="d-none d-sm-inline">{{__('revisor.refuse')}}</span>
                                    </button>
                                </form>
                            </div>
                            @elseif ($product->is_accepted === 0)
                            <form action="{{ route('accept', $product) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-base w-100 d-flex align-items-center justify-content-center">
                                    <span class="d-none d-sm-inline">
                                        <i class="bi bi-check-lg me-2"></i>{{__('revisor.accept')}}
                                    </span>
                                </button>
                            </form>
                            @elseif ($product->is_accepted === 1)
                            <form action="{{ route('reject', $product) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-rosso w-100 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-x-lg me-2"></i>
                                    <span class="d-none d-sm-inline">{{__('revisor.refuse')}}</span>
                                </button>
                            </form>
                            @else
                            @endif
                            <a href="{{route('revisor.index')}}" class="text-decoration-none">
                                <button class="btn btn-baseblu  w-100  d-flex align-items-center justify-content-center">                                    
                                    <span class="fs-5"><i class="bi bi-grid-3x3-gap  me-2"></i>{{__('product.returnArticle')}}</span>
                                </button>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm text-center p-5">
                    <div class="card-body">
                        <i class="bi bi-exclamation-circle text-warning display-1 mb-4"></i>
                        <h2 class="text-blu mb-4">{{__('product.productNotAvailable')}}</h2>
                        <p class="text-muted mb-4">
                           {{__('product.productlookingNotAvariabile')}}
                        </p>
                        <a href="{{ route('products.index') }}" 
                           class="btn btn-base py-3 px-4 scalebig">
                           <span>
                               <i class="bi bi-arrow-left me-2"></i>{{__('product.returnProducts')}}
                           </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
