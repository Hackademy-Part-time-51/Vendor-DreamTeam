<div class="col-12 col-sm-6 col-lg-4 col-xl-3">
    <div class="card h-100 border-0 shadow-sm">
        <div class="position-relative">
            <div id="carousel{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded-top">
                    @forelse ($product->images as $key => $image)
                        <div class="carousel-item @if ($key == 0) active @endif" data-bs-interval="5000">
                            <div class="ratio ratio-4x3">
                                <img src="{{Storage::url($image->path)}}" class="img-fluid w-100 object-fit-cover rounded-top" alt="{{ $product->title }} - {{ $key + 1 }}" loading="lazy">
                            </div>
                        </div>
                    @empty
                        @for ($i = 0; $i < 3; $i++)
                            <div class="carousel-item @if ($i == 0) active @endif" data-bs-interval="5000">
                                <div class="ratio ratio-4x3">
                                    <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/1080" class="img-fluid w-100 object-fit-cover rounded-top" alt="Placeholder {{ $i + 1 }}" loading="lazy">
                                </div>
                            </div>
                        @endfor
                    @endforelse
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $product->id }}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $product->id }}" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="position-absolute top-0 start-0 m-3">
                <span class="badge bg-warning px-3 py-2 rounded-pill">
                    <i class="bi bi-tag-fill me-1"></i>{{__("category." . $product->category->name)}}
                </span>
            </div>
        </div>

        <div class="card-body p-3 d-flex flex-column">
            <div class="mb-3">
                <h5 class="card-title fw-bold mb-2">{{ Str::limit($product->title, 20) }}</h5>
                <p class="card-text text-muted small mb-0">{{ Str::limit($product->description, 60) }}</p>
            </div>

            <div class="mb-3 text-end">
                <span class="fs-5 fw-bold text-primary">
                    € {{ number_format($product->price, 2, ',', '.') }}
                </span>
            </div>

            <div class="mt-auto">
                <div class="d-grid mb-2">
                    <a href="{{ route('products.show', $product) }}" class="btn btn-baseblu">
                        <span>
                            <i class="bi bi-eye me-2"></i>{{ __('revisor.details') }}
                        </span>
                    </a>
                </div>

                <div class="row g-2">
                    @if ($product->is_accepted === 1)
                        <div class="col-12">
                            <span class="badge bg-success w-100 text-center">{{ __('revisor.accepted') }}</span>
                        </div>
                        <form action="{{ route('reject', $product) }}" method="POST" class="col-12">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-rosso w-100 d-flex align-items-center justify-content-center">
                                <i class="bi bi-x-lg me-2"></i>{{ __('revisor.refuse') }}
                            </button>
                        </form>
                    @elseif ($product->is_accepted === 0)
                        <div class="col-12">
                            <span class="badge bg-danger w-100 text-center">{{ __('revisor.refused') }}</span>
                        </div>
                        <form action="{{ route('accept', $product) }}" method="POST" class="col-12">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-base w-100 d-flex align-items-center justify-content-center">
                                <span>
                                    <i class="bi bi-check-lg me-2"></i>{{ __('revisor.accept') }}
                                </span>
                            </button>
                        </form>
                    @else
                        <div class="col-12">
                            <span class="badge bg-warning w-100 text-center">{{ __('revisor.awaitingReview') }}</span>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('accept', $product) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-base w-100 btn-sm d-flex align-items-center justify-content-center">
                                    <span>
                                        <i class="bi bi-check-lg me-1"></i>{{ __('revisor.accept') }}
                                    </span>
                                </button>
                            </form>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('reject', $product) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-rosso btn-sm w-100  d-flex align-items-center justify-content-center">
                                    <i class="bi bi-x-lg me-2"></i>{{ __('revisor.refuse') }}
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
