<x-layout>
    
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{session('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1 class="text-center py-3 display-2">Area Revisore <br> Utente: <span class="text-verde">{{Auth::user()->name}}</span></h1>
    <div class="container-fluid py-4">
        <div class="row g-4 mb-5">
            <div class="col-12 col-lg-3 mt-3 d-flex flex-column align-self-center">
                <div class="card border-0  shadow-sm position-sticky top-0">
                    <div class="card-body text-center py-4">
                        <h2 class="display-6 text-blu mb-0">{{__('user.articles')}}</h2>
                    </div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="text-blu">{{__('revisor.toReviewed')}}</span>
                            <span class="badge bg-blu rounded-pill">{{ \App\Models\Product::toBeRevisedCount() }}</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="text-blu">{{__('revisor.accepted')}}</span>
                            <span class="badge bg-verde rounded-pill">{{ \App\Models\Product::acceptedCount() }}</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="text-blu">{{__('revisor.refused')}}</span>
                            <span class="badge bg-rosso rounded-pill">{{ \App\Models\Product::rejectedCount() }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="container-fluid py-3">
                            
                            <div class="row justify-content-center mb-2">
                                @for ($i = 0; $i < 3; $i++)
                                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                                        <div class="position-relative">
                                            <img src="https://picsum.photos/1080/720?random={{ $i }}"
                                                 class="img-fluid rounded shadow-sm w-100"
                                                 style="aspect-ratio: 16/9; object-fit: cover;"
                                                 alt="Product image">
                                        </div>
                                    </div>
                                @endfor
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <h2 class="display-6 text-blu mb-4">{{__('product.title')}}: <strong> {{ $product_to_check->title }}</strong></h2>
            
                                    
                                    <div class="d-flex  align-items-center mb-4">
                                        <div class="text-center">
                                            <h3 class="mb-1 text-blu">{{ $product_to_check->user->name }}</h3>
                                        </div>
                                    </div>
            
                                    <div class="mb-4">
                                        <h3 class="display-6 text-blu mb-3 ">{{ $product_to_check->price }}€</h3>
                                        <span class="badge rounded-pill bg-warning px-4 py-2">
                                            <i class="bi bi-tags-fill me-2"></i>
                                            {{ $product_to_check->category->name }}
                                        </span>
                                    </div>
            
                                    <div class="mb-2">
                                        <p class="lead text-muted">{{ $product_to_check->description }}</p>
                                    </div>
            
                                    
                                    <div class="row justify-content-center gx-4">
                                        <div class="col-12 col-sm-6 mb-3">
                                            <form action="{{ route('accept', ['product' => $product_to_check]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button class="btn btn-base w-100 py-3">
                                                    <span>
                                                        <i class="bi bi-check-lg me-2"></i>{{__('revisor.accept')}}
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-3">
                                            <form action="{{ route('reject', ['product' => $product_to_check]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button class="btn btn-rosso w-100 py-3">
                                                    <i class="bi bi-x-lg me-2"></i>{{__('revisor.refuse')}}
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
        <div class="container-fluid py-4">
            <div class="row justify-content-center mb-4">
                <div class="col-12 text-center">
                    <button class="btn btn-baseblu btn-lg w-100 py-3 d-flex align-items-center justify-content-center" 
                            data-bs-toggle="modal" 
                            data-bs-target="#productsRevisorModal">

                        <span class="fs-5"><i class="bi bi-grid-3x3-gap fs-4 me-2"></i> {{__('user.articleManagement')}}</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="productsRevisorModal" tabindex="-1">
            <div class="modal-dialog modal-fullscreen m-0">
                <div class="modal-content">
                    <div class="modal-header bg-light border-bottom-0 py-3">
                        <div class="container-fluid px-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="modal-title fs-4 mb-0">{{__('user.articleManagement')}}</h5>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body p-0">
                        <ul class="nav nav-tabs nav-fill border-0" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active border-0 rounded-0 py-3" 
                                        data-bs-toggle="tab" 
                                        data-bs-target="#toReview">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="bi bi-hourglass d-none d-sm-block me-2"></i>
                                        <span class="d-block">{{__('revisor.toReviewed')}}</span>
                                        <span class="badge bg-blu rounded-pill ms-2">
                                            {{ \App\Models\Product::toBeRevisedCount() }}
                                        </span>
                                    </div>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link border-0 rounded-0 py-3" 
                                        data-bs-toggle="tab" 
                                        data-bs-target="#accepted">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="bi bi-check-circle d-none d-sm-block me-2"></i>
                                        <span class="d-block">{{__('revisor.accepted')}}</span>
                                        <span class="badge bg-success rounded-pill ms-2">
                                            {{ \App\Models\Product::acceptedCount() }}
                                        </span>
                                    </div>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link border-0 rounded-0 py-3" 
                                        data-bs-toggle="tab" 
                                        data-bs-target="#refused">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="bi bi-x-circle d-none d-sm-block me-2"></i>
                                        <span class="d-block">{{__('revisor.refused')}}</span>
                                        <span class="badge bg-danger rounded-pill ms-2">
                                            {{ \App\Models\Product::rejectedCount() }}
                                        </span>
                                    </div>
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="toReview">
                                <div class="container-fluid p-4">
                                    <div class="row g-4">
                                         @forelse($allProductsToCheck as $product)
                                        <x-cardForRevisor :product="$product"/>
                                        @empty
                                            <div class="col-12 text-center py-5">
                                                <i class="bi bi-inbox display-1 text-muted mb-3"></i>
                                                <h4 class="text-muted">{{__('revisor.noItemReview')}}</h4>
                                            </div>
                                        @endforelse 
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="accepted">
                                <div class="container-fluid p-4">
                                    <div class="row g-4">
                                         @forelse($acceptedProducts as $product)
                                        <x-cardForRevisor :product="$product"/>
                                        @empty
                                            <div class="col-12 text-center py-5">
                                                <i class="bi bi-inbox display-1 text-muted mb-3"></i>
                                                <h4 class="text-muted">{{__('revisor.noItemReview')}}</h4>
                                            </div>
                                        @endforelse 
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="refused">
                                <div class="container-fluid p-4">
                                    <div class="row g-4">
                                         @forelse($refusedProducts as $product)
                                        <x-cardForRevisor :product="$product"/>
                                        @empty
                                            <div class="col-12 text-center py-5">
                                                <i class="bi bi-inbox display-1 text-muted mb-3"></i>
                                                <h4 class="text-muted">{{__('revisor.noItemReview')}}</h4>
                                            </div>
                                        @endforelse 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top bg-light py-3">
                        <div class="container-fluid">
                            <div class="row row-cols-3 text-center g-3">
                                <div class="col">
                                    <small class="d-block text-muted">{{__('revisor.toReviewed')}}</small>
                                    <span class="fw-bold text-blu">{{ \App\Models\Product::toBeRevisedCount() }}</span>
                                </div>
                                <div class="col">
                                    <small class="d-block text-muted">{{__('revisor.accepted')}}</small>
                                    <span class="fw-bold text-success">{{ \App\Models\Product::acceptedCount() }}</span>
                                </div>
                                <div class="col">
                                    <small class="d-block text-muted">{{__('revisor.refused')}}</small>
                                    <span class="fw-bold text-danger">{{ \App\Models\Product::rejectedCount() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</x-layout>
