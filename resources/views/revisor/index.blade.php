<x-layout>

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1 class="text-center pb-2 pt-5 display-2">{{ __('revisor.user') }}: <span
            class="text-verde">{{ Auth::user()->name }}</span></h1>
    @if (!$product_to_check)
        <hr>
        <div class="vh-100 d-flex flex-column align-items-center justify-content-center">
            <h3 class="text-center display-3" id="BigWelcome"></h3>
            <h3 class="text-center display-6" id="SmallWelcome"></h3>
            <button class="btn btn-base btn-lg"
                onclick="launchFuoco()"><span>{{ __('revisor.celebrate') }}</span></button>
        </div>
        <hr>
    @else
        <div class="container-fluid py-3">
            <div class="row g-4 mb-5">
                <div class="col-12 col-lg-3 mt-3 d-flex flex-column align-self-center">
                    <div class="card border-0  shadow-sm position-sticky top-0">
                        <div class="card-body text-center py-4">
                            <h2 class="display-6 text-blu mb-0">{{ __('user.articles') }}</h2>
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="text-blu fs-5 fw-light">{{ __('revisor.toReviewed') }}</span>
                                <span
                                    class="badge bg-blu fs-6 fw-light rounded-pill">{{ \App\Models\Product::toBeRevisedCount() }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="text-blu fs-5 fw-light">{{ __('revisor.accepted') }}</span>
                                <span
                                    class="badge bg-verde fs-6 fw-light rounded-pill">{{ \App\Models\Product::acceptedCount() }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="text-blu fs-5 fw-light">{{ __('revisor.refused') }}</span>
                                <span
                                    class="badge bg-rosso fs-6 fw-light rounded-pill">{{ \App\Models\Product::rejectedCount() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="container-fluid py-3">

                                <div class="row justify-content-center mb-2">
                                    @if ($product_to_check->images()->count() > 0)
                                        @foreach ($product_to_check->images as $key => $image)
                                            <div class="col-12 col-md-4">
                                                <div class="card mb-3">
                                                    <div class="row g-0">
                                                        <div class="col-12">
<<<<<<< HEAD
                                                            <img src="{{ Storage::url($image->path) }}"
                                                                class="img-fluid rounded-start"
                                                                alt="Immagine {{ $key + 1 }} dell'articolo '{{ $product_to_check->title }}'">
=======
                                                            <img src="{{ $image->getUrl(1000, 1000) }}"
                                                                class=" rounded-start img-fluid"
                                                                alt="Immagine {{ $key + 1 }} dell'articolo '{{ $product_to_check->title }}'" >
>>>>>>> 4bbc62ec48fe27d8cab266a026d2d3aa5aa21c3a
                                                        </div>
                                                        <div class="col-12 ">
                                                            <div class="card-body">
                                                                <h5 class="">{{ __('revisor.safety') }}</h5>
                                                                <div class="row align-items-center mb-2">
                                                                    <div class="col-2 text-center">
                                                                        <i class="{{ $image->adult }}"></i>
                                                                    </div>
                                                                    <div class="col-10">{{ __('revisor.forAdults') }}
                                                                    </div>
                                                                </div>
                                                                <div class="row align-items-center mb-2">
                                                                    <div class="col-2 text-center">
                                                                        <i class="{{ $image->violence }}"></i>
                                                                    </div>
                                                                    <div class="col-10">{{ __('revisor.violence') }}
                                                                    </div>
                                                                </div>
                                                                <div class="row align-items-center mb-2">
                                                                    <div class="col-2 text-center">
                                                                        <i class="{{ $image->spoof }}"></i>
                                                                    </div>
                                                                    <div class="col-10">{{ __('revisor.spoof') }}</div>
                                                                </div>
                                                                <div class="row align-items-center mb-2">
                                                                    <div class="col-2 text-center">
                                                                        <i class="{{ $image->racy }}"></i>
                                                                    </div>
                                                                    <div class="col-10">{{ __('revisor.racism') }}
                                                                    </div>
                                                                </div>
                                                                <div class="row align-items-center mb-2">
                                                                    <div class="col-2 text-center">
                                                                        <i class="{{ $image->medical }}"></i>
                                                                    </div>
                                                                    <div class="col-10">{{ __('revisor.medicines') }}
                                                                    </div>
                                                                </div>
                                                                <h5 class="mt-4">{{ __('revisor.labels') }}</h5>
                                                                @if ($image->labels && count($image->labels))
                                                                    @foreach ($image->labels as $label)
                                                                        <span
                                                                            class="badge bg-success me-1 mb-1">{{ $label }}</span>
                                                                    @endforeach
                                                                @else
                                                                    <span
                                                                        class="badge bg-secondary">{{ __('revisor.noLabels') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        @for ($i = 0; $i < 3; $i++)
                                            <div class="col-12 col-md-4">
                                                <div class="card mb-3">
                                                    <div class="row g-0">
<<<<<<< HEAD
                                                        <div class="col-12">
                                                            <img src="https://picsum.photos/seed/{{ random_int(1, 1000) }}/500/500"
=======
                                                        <div class="col-md-4">
                                                            <img src="https://picsum.photos/seed/{{ random_int(1, 1000) }}/1000/1000"
>>>>>>> 4bbc62ec48fe27d8cab266a026d2d3aa5aa21c3a
                                                                class="img-fluid rounded-start"
                                                                alt="Immagine placeholder {{ $i + 1 }}">
                                                        </div>
                                                        <div class=" ps-3">
                                                            <div class="card-body">
                                                                <h5 class="">{{ __('revisor.ratings') }}</h5>
                                                                <div class="row align-items-center mb-2">
                                                                    <div class="col-2 text-center">
                                                                        <i
                                                                            class="bi bi-question-circle text-secondary"></i>
                                                                    </div>
                                                                    <div class="col-10">{{ __('revisor.forAdults') }}
                                                                    </div>
                                                                </div>
                                                                <div class="row align-items-center mb-2">
                                                                    <div class="col-2 text-center">
                                                                        <i
                                                                            class="bi bi-question-circle text-secondary"></i>
                                                                    </div>
                                                                    <div class="col-10">{{ __('revisor.violence') }}
                                                                    </div>
                                                                </div>
                                                                <div class="row align-items-center mb-2">
                                                                    <div class="col-2 text-center">
                                                                        <i
                                                                            class="bi bi-question-circle text-secondary"></i>
                                                                    </div>
                                                                    <div class="col-10">{{ __('revisor.spoof') }}</div>
                                                                </div>
                                                                <div class="row align-items-center mb-2">
                                                                    <div class="col-2 text-center">
                                                                        <i
                                                                            class="bi bi-question-circle text-secondary"></i>
                                                                    </div>
                                                                    <div class="col-10">{{ __('revisor.racism') }}
                                                                    </div>
                                                                </div>
                                                                <div class="row align-items-center mb-2">
                                                                    <div class="col-2 text-center">
                                                                        <i
                                                                            class="bi bi-question-circle text-secondary"></i>
                                                                    </div>
                                                                    <div class="col-10">{{ __('revisor.medicines') }}
                                                                    </div>
                                                                </div>
                                                                <h5 class="mt-4">{{ __('revisor.labels') }}</h5>
                                                                <span
                                                                    class="badge bg-secondary me-1 mb-1">Placeholder</span>
                                                                <span class="badge bg-secondary me-1 mb-1">Demo</span>
                                                                <span
                                                                    class="badge bg-secondary me-1 mb-1">Sample</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    @endif
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <h2 class="display-6 text-blu mb-4">{{ __('product.title') }}:
                                            <strong>{{ $product_to_check->title }}</strong>
                                        </h2>
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="text-center">
                                                <h3 class="mb-1 text-blu">{{ $product_to_check->user->name }}</h3>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <h3 class="display-6 text-blu mb-3 ">{{ $product_to_check->price }}€</h3>
                                            <span class="badge rounded-pill bg-warning px-4 py-2">
                                                <i class="bi bi-tags-fill me-2"></i>
                                                {{ __('category.' . $product_to_check->category->name) }}
                                            </span>
                                        </div>
                                        <div class="mb-2">
                                            <p class="lead text-muted">{{ $product_to_check->description }}</p>
                                        </div>
                                        <div class="row justify-content-center gx-4">
                                            <div class="col-12 col-sm-6 mb-3">
                                                <form action="{{ route('accept', ['product' => $product_to_check]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-base w-100 py-3">
                                                        <span>
                                                            <i
                                                                class="bi bi-check-lg me-2"></i>{{ __('revisor.accept') }}
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-12 col-sm-6 mb-3">
                                                <form action="{{ route('reject', ['product' => $product_to_check]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-rosso w-100 py-3">
                                                        <i class="bi bi-x-lg me-2"></i>{{ __('revisor.refuse') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>

    @endif
    <div class="container-fluid py-4">
        <div class="row justify-content-center mb-4">
            <div class="col-12 text-center">
                <button class="btn btn-baseblu btn-lg w-100 py-3 d-flex align-items-center justify-content-center"
                    data-bs-toggle="modal" data-bs-target="#productsRevisorModal">

                    <span class="fs-5"><i class="bi bi-grid-3x3-gap fs-4 me-2"></i>
                        {{ __('user.articleManagement') }}</span>
                </button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="productsRevisorModal" tabindex="-1" aria-labelledby="productsRevisorModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen m-0">
            <div class="modal-content">
                <div class="modal-header bg-light border-bottom-0 py-3">
                    <h5 class="modal-title fs-4" id="productsRevisorModalLabel">{{ __('user.articleManagement') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <ul class="nav nav-tabs nav-fill border-0" id="revisorTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active py-3" id="toReview-tab" data-bs-toggle="tab"
                                data-bs-target="#toReview" type="button" role="tab" aria-controls="toReview"
                                aria-selected="true">
                                <i class="bi bi-hourglass me-2 d-none d-sm-inline"></i>
                                {{ __('revisor.toReviewed') }}
                                <span class="badge bg-blu ms-2">{{ \App\Models\Product::toBeRevisedCount() }}</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link py-3" id="accepted-tab" data-bs-toggle="tab"
                                data-bs-target="#accepted" type="button" role="tab" aria-controls="accepted"
                                aria-selected="false">
                                <i class="bi bi-check-circle me-2 d-none d-sm-inline"></i>
                                {{ __('revisor.accepted') }}
                                <span class="badge bg-success ms-2">{{ \App\Models\Product::acceptedCount() }}</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link py-3" id="refused-tab" data-bs-toggle="tab"
                                data-bs-target="#refused" type="button" role="tab" aria-controls="refused"
                                aria-selected="false">
                                <i class="bi bi-x-circle me-2 d-none d-sm-inline"></i>
                                {{ __('revisor.refused') }}
                                <span class="badge bg-danger ms-2">{{ \App\Models\Product::rejectedCount() }}</span>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="toReview" role="tabpanel"
                            aria-labelledby="toReview-tab">
                            <div class="container-fluid p-4">
                                <div class="row g-4">
                                    @forelse ($allProductsToCheck as $product)
                                        <x-cardForRevisor :product="$product" />
                                    @empty
                                        <div class="col-12 text-center py-5">
                                            <i class="bi bi-inbox display-1 text-muted mb-3"></i>
                                            <h4 class="text-muted">{{ __('revisor.noItemReview') }}</h4>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="accepted" role="tabpanel" aria-labelledby="accepted-tab">
                            <div class="container-fluid p-4">
                                <div class="row g-4">
                                    @forelse ($acceptedProducts as $product)
                                        <x-cardForRevisor :product="$product" />
                                    @empty
                                        <div class="col-12 text-center py-5">
                                            <i class="bi bi-inbox display-1 text-muted mb-3"></i>
                                            <h4 class="text-muted">{{ __('revisor.noItemReview') }}</h4>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="refused" role="tabpanel" aria-labelledby="refused-tab">
                            <div class="container-fluid p-4">
                                <div class="row g-4">
                                    @forelse ($refusedProducts as $product)
                                        <x-cardForRevisor :product="$product" />
                                    @empty
                                        <div class="col-12 text-center py-5">
                                            <i class="bi bi-inbox display-1 text-muted mb-3"></i>
                                            <h4 class="text-muted">{{ __('revisor.noItemReview') }}</h4>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light border-top py-3">
                    <div class="container-fluid">
                        <div class="row row-cols-3 text-center g-3">
                            <div class="col">
                                <small class="d-block text-muted">{{ __('revisor.toReviewed') }}</small>
                                <span class="fw-bold text-blu">{{ \App\Models\Product::toBeRevisedCount() }}</span>
                            </div>
                            <div class="col">
                                <small class="d-block text-muted">{{ __('revisor.accepted') }}</small>
                                <span class="fw-bold text-success">{{ \App\Models\Product::acceptedCount() }}</span>
                            </div>
                            <div class="col">
                                <small class="d-block text-muted">{{ __('revisor.refused') }}</small>
                                <span class="fw-bold text-danger">{{ \App\Models\Product::rejectedCount() }}</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/@tsparticles/confetti@3.0.3/tsparticles.confetti.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    <script>
        function animazioneWelcomeBig() {
            const animWelcomeBig = document.getElementById('BigWelcome');
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        new Typed('#BigWelcome', {
                            strings: ['{{__('revisor.noItemsReview')}}'],
                            typeSpeed: 20,
                        });
                        animWelcomeBig.classList.add('on');
                        observer.unobserve(animWelcomeBig); // Smette di osservare
                    }
                });
            });

            observer.observe(animWelcomeBig);
        }

        function animazioneWelcomeSmall() {
            const animWelcomeSmall = document.getElementById('SmallWelcome');
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        new Typed('#SmallWelcome', {
                            strings: ['{{__('revisor.jobDone')}}'],
                            typeSpeed: 20,
                        });
                        observer.unobserve(animWelcomeSmall); // Smette di osservare
                    }
                });
            });

            observer.observe(animWelcomeSmall);
        }

        document.addEventListener('DOMContentLoaded', animazioneWelcomeBig);
        document.addEventListener('DOMContentLoaded', animazioneWelcomeSmall);

        const end = Date.now() + 15 * 1000;
        const count = 200,
            defaults = {
                origin: {
                    y: 0.7
                },
            };

        function fire(particleRatio, opts) {

            confetti(
                Object.assign({}, defaults, opts, {
                    particleCount: Math.floor(count * particleRatio),
                })
            );
        }

        function launchFuoco() {

            fire(0.25, {
                spread: 26,
                startVelocity: 55,
            });

            fire(0.2, {
                spread: 60,
            });

            fire(0.35, {
                spread: 100,
                decay: 0.91,
                scalar: 0.8,
            });

            fire(0.1, {
                spread: 120,
                startVelocity: 25,
                decay: 0.92,
                scalar: 1.2,
            });

            fire(0.1, {
                spread: 120,
                startVelocity: 45,
            });
        }
    </script>
</x-layout>
