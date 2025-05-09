<div class="col-12">
    <div class="card h-100 border-0 shadow-sm">
        <div class="position-relative">
            <div id="productImageCarouselCollapse{{$product->id}}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded-top">
                    @for($i = 0; $i < 3; $i++)
                        <div class="carousel-item @if($i == 0) active @endif">
                            <div class="ratio ratio-4x3">
                                <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/480"
                                     class="img-fluid w-100 object-fit-cover"
                                     alt="Product image {{$i + 1}}">
                            </div>
                        </div>
                    @endfor
                </div>
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
                <span class="text-muted small"><i class="bi bi-geo-alt me-1"></i>{{Str::limit($product->city, 8)}}</span>
            </div>
            <div class="collapse" id="userInfoCollapse{{$product->id}}">
                <div class="bg-light p-3 rounded mb-3 text-center">
                    @if ($product->user->profile_image)
                    <img src="{{  asset('storage/'.$product->user->profile_image)}}"
                    class="rounded-circle mb-2" width="60" height="60" alt="User Avatar">
                    @else
                    <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/480"
                    class="rounded-circle mb-2" width="60" height="60" alt="User Avatar">
                    @endif

                    <p class="mb-0 fw-semibold text-blu"></p>
                    <a href="{{ route('personalArea', $product->user->id) }}" class="mb-0 fw-semibold text-blu text-decoration-none">{{ $product->user->name }}</a>
                </div>
                
            </div>
            <div class="mt-auto d-flex justify-content-between align-items-center gap-2">
                <a href="{{ route('products.show', ['product' => $product->id]) }}" class="btn btn-base flex-grow-1">
                    <i class="bi bi-eye"></i> <span class="d-none d-md-inline"></span>
                </a>
                <button class="btn btn-base" type="button" data-bs-toggle="collapse" data-bs-target="#userInfoCollapse{{$product->id}}" aria-expanded="false" aria-controls="userInfoCollapse{{$product->id}}">
                    <i class="bi bi-person-fill"></i>
                </button>
                @auth
                    <div wire:key="heart-collapse-{{ $product->id }}">
                        <button class="btn btn-base" wire:click="toggleFavorite({{ $product->id }})">
                            @if (Auth::user()->favorites->contains($product->id))
                                <i class="bi bi-heart-fill text-danger"></i>
                            @else
                                <i class="bi bi-heart"></i>
                            @endif
                        </button>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>


