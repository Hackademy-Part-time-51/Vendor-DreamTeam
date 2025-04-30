<div class="col-12">
    <div class="accordion" id="accordionExample">
        {{-- articoli creati --}}
        <div class="accordion-item">
          <h2 class="accordion-header ">
            <button class="accordion-button collapsed fs-3 text-center mb-4" type="button" data-bs-toggle="collapse" data-bs-target="#articolicreati" aria-expanded="true" aria-controls="articolicreati">
              Articoli Creati
            </button>
          </h2>
          <div id="articolicreati" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row g-3">
                    @foreach ($products as $product) 
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                            <div class="card p-1" >
                                <img src="https://picsum.photos/id/{{ rand(1, 50) }}/1920/1080" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                  <h5 class="card-title">{{Str::limit( $product->title, 21) }} </h5>
                                  <p class="card-text">{{ Str::limit($product->description, 20) }}</p>
                                </div>
                                <ul class="list-group list-group-flush text-center">
                                  <li class="list-group-item text-center">
                                    <span class="badge rounded-pill text-bg-warning "> <i class="bi bi-tags-fill me-2"></i>{{ $product->category->name }}</span>
                                </li>
                                  <li class="list-group-item">
                                    <strong>Data:</strong> {{ $product->created_at->format('d/m/Y') }}</li>
                                  <li class="list-group-item fw-bold fs-5">
                                    € {{ number_format($product->price, 2, ',', '.') }}
                                  </li>
                                  <li class="list-group-item">
                                    <strong>Creato da:</strong> <span class="text-blu">{{ $product->user->name }}</span>
                                  </li>
                                </ul>
                                <div class="card-body d-flex justify-content-evenly align-items-center">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-base">Modifica</a>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalDeleteProduct" class="btn btn-rosso">Elimina</button>
                                    <div class="modal fade" id="modalDeleteProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDeleteProductLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h1 class="modal-title fs-4 text-center" id="modalDeleteProductLabel">Vuoi eliminare l'articolo?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-footer justify-content-start">
                                            <button type="button" class="btn btn-base " data-bs-dismiss="modal">Torna indietro.</button>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-rosso">Elimina</button>
                                          </form>
                                      </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-3">
                    {{$products->links()}}
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
              <h2 class="accordion-header ">
                <button class="accordion-button collapsed fs-3 text-center mb-4" type="button" data-bs-toggle="collapse" data-bs-target="#articolipreferiti" aria-expanded="true" aria-controls="articolipreferiti">
                  Articoli Preferiti
                </button>
              </h2>
              <div id="articolipreferiti" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row g-3">
                        @foreach ($favorites as $product) 
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex" wire:key="{{ $product->id }}" >
                                <x-card :product="$product"></x-card>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-3">
                        {{-- {{$favorites->links()}} --}}
                    </div>
                </div>
              </div>
      </div>
    </div>    
</div>
