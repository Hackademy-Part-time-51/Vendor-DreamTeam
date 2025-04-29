<x-layout>
    <!-- Alert Message -->
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{session('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid py-4">
        <div class="row g-4">
            <div class="col-12 col-lg-3 mt-3 d-flex flex-column align-self-center">
                <div class="card border-0  shadow-sm position-sticky top-0">
                    <div class="card-body text-center py-4">
                        <h2 class="display-6 text-blu mb-0">Articoli</h2>
                    </div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="text-blu">Da revisionare</span>
                            <span class="badge bg-blu rounded-pill">{{ \App\Models\Product::toBeRevisedCount() }}</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="text-blu">Accettati</span>
                            <span class="badge bg-verde rounded-pill">{{ \App\Models\Product::acceptedCount() }}</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="text-blu">Rifiutati oggi</span>
                            <span class="badge bg-rosso rounded-pill">{{ \App\Models\Product::rejectedCount() }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <!-- Container principale con margini automatici -->
                        <div class="container-fluid py-3">
                            <!-- Sezione Immagini -->
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
            
                            <!-- Sezione Dettagli Prodotto -->
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <!-- Titolo -->
                                    <h2 class="display-6 text-blu mb-4">Titolo: <strong> {{ $product_to_check->title }}</strong></h2>
            
                                    <!-- Info Autore -->
                                    <div class="d-flex  align-items-center mb-4">
                                        <div class="text-center">
                                            <h3 class="mb-1 text-blu">{{ $product_to_check->user->name }}</h3>
                                        </div>
                                    </div>
            
                                    <!-- Prezzo e Categoria -->
                                    <div class="mb-4">
                                        <h3 class="display-6 text-blu mb-3 ">{{ $product_to_check->price }}€</h3>
                                        <span class="badge rounded-pill bg-warning px-4 py-2">
                                            <i class="bi bi-tags-fill me-2"></i>
                                            {{ $product_to_check->category->name }}
                                        </span>
                                    </div>
            
                                    <!-- Descrizione -->
                                    <div class="mb-2">
                                        <p class="lead text-muted">{{ $product_to_check->description }}</p>
                                    </div>
            
                                    <!-- Bottoni Azione -->
                                    <div class="row justify-content-center gx-4">
                                        <div class="col-12 col-sm-6 mb-3">
                                            <form action="{{ route('accept', ['product' => $product_to_check]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button class="btn btn-base w-100 py-3">
                                                    <i class="bi bi-check-lg me-2"></i>Accetta
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-3">
                                            <form action="{{ route('reject', ['product' => $product_to_check]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button class="btn btn-rosso w-100 py-3">
                                                    <i class="bi bi-x-lg me-2"></i>Rifiuta
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
    </div>
</x-layout>
