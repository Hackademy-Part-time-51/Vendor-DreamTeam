<div class="col-12">
    <div class="card h-100 border-0">
        <div class="position-relative">
            <div id="productImageCarouselCollapse{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded-top">
                    @if ($product->images()->count() == 0)
                        @for ($i = 0; $i < 3; $i++)
                            <!-- Mostro 3 immagini casuali -->
                            <div class="carousel-item @if ($i == 0) active @endif"
                                data-bs-interval="5000">
                                <img src="https://picsum.photos/1080/1080?random={{ random_int(1, 1000) }}"
                                    class="img-fluid d-block w-100 object-fit-cover"
                                    alt="Immagine Placeholder {{ $i + 1 }}" loading="lazy" width="300"
                                    height="300">
                            </div>
                        @endfor
                </div>
                <button class="carousel-control-prev" type="button"
                    data-bs-target="#productImageCarouselCollapse{{ $product->id }}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button"
                    data-bs-target="#productImageCarouselCollapse{{ $product->id }}" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            @else
                @foreach ($product->images as $key => $image)
                    <div class="carousel-item @if ($key == 0) active @endif" data-bs-interval="5000">
                        <img src="{{$product->images->isNotEmpty() ? Storage::url($image->path) : 'https://picsum.photos/300'}}" class="img-fluid d-block w-100 object-fit-cover"
                            alt="{{ $product->name ?? 'Immagine Prodotto' }} {{ $key + 1 }}" loading="lazy"
                            width="300" height="300">
                    </div>
                @endforeach
               
            </div>
            <div class="carousel-indicators">
                @foreach ($product->images as $key => $image)
                    <button type="button" data-bs-target="#productImageCarouselCollapse{{ $product->id }}"
                        data-bs-slide-to="{{ $key }}" class="@if ($key == 0) active @endif"
                        aria-current="@if ($key == 0) true @endif"
                        aria-label="Slide {{ $key + 1 }}"></button>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button"
                data-bs-target="#productImageCarouselCollapse{{ $product->id }}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button"
                data-bs-target="#productImageCarouselCollapse{{ $product->id }}" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            @endif

        </div>

        <div class="position-absolute top-0 start-0 m-2 z-1">
            <span class="badge rounded-pill bg-warning text-dark px-3 py-2">
                <i class="bi bi-tags-fill me-1"></i>{{__("category.". $product->category->name)}}
            </span>
        </div>
    </div>
    <div class="card-body p-3 d-flex flex-column">
        <h5 class="card-title fw-bold mb-2 text-truncate">{{ Str::limit($product->title, 20) }}</h5>
        {{-- <p class="card-text text-muted small mb-3">{{ Str::limit($product->description, 20) }}</p> --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="fw-bold fs-5 text-blu">€ {{ number_format($product->price, 2, ',', '.') }}</span>
            <span class="text-muted small"><i class="bi bi-geo-alt me-1"></i>{{ Str::limit($product->city, 8) }}</span>
        </div>
        <div class="collapse" id="userInfoCollapse{{ $product->id }}">
            <div class="bg-light p-3 rounded mb-3 text-center">
                @if ($product->user->profile_image)
                    <img src="{{ asset('storage/' . $product->user->profile_image) }}" class="rounded-circle mb-2"
                        width="60" height="60" alt="User Avatar">
                @else
                    <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/480" class="rounded-circle mb-2"
                        width="60" height="60" alt="User Avatar">
                @endif

                <p class="mb-0 fw-semibold text-blu"></p>
                <a href="{{ route('personalArea', $product->user->id) }}"
                    class="mb-0 fw-semibold text-blu text-decoration-none">{{ $product->user->name }}</a>
            </div>

        </div>
        <div class="mt-auto d-flex justify-content-center align-items-center gap-2">
            <button class="btn btn-base bounceleft" type="button" data-bs-toggle="collapse"
                data-bs-target="#userInfoCollapse{{ $product->id }}" aria-expanded="false"
                aria-controls="userInfoCollapse{{ $product->id }}">
                <span>
                    <i class="bi bi-person-fill"></i>
                </span>
            </button>
            <a href="{{ route('products.show', ['product' => $product->id]) }}" class="bouncetop btn btn-base">
                <span>
                    <i class="bi bi-eye"></i>
                </span>
            </a>
            @auth
                <div wire:key="heart-collapse-{{ $product->id }}">
                    <button class="btn btn-base bounceright" wire:click="toggleFavorite({{ $product->id }})">
                        <span>
                            @if (Auth::user()->favorites->contains($product->id))
                                <i class="bi bi-heart-fill text-danger"></i>
                            @else
                                <i class="bi bi-heart"></i>
                            @endif
                        </span>
                    </button>
                </div>
            @endauth
        </div>
    </div>
</div>
</div>
