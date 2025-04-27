<div class="col-12">
    <div class="accordion" id="accordionExample">
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
                            <div class="card card-personal-area-product h-100 w-100">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $product->title }}</h5>
                                    @if ($product->description) 
                                        <p class="card-text">{{ Str::limit($product->description, 50) }}</p>
                                    @endif
                                    @if ($product->category) 
                                        <p class="card-text">
                                            <strong>Categoria:</strong> {{ $product->category->name }}
                                        </p>
                                    @endif
                                    <p class="card-text">
                                        <strong>Data:</strong> {{ $product->created_at->format('d/m/Y') }}
                                    </p>
                                    @if ($product->price)
                                        <p class="card-text">
                                            <strong>Prezzo:</strong> € {{ number_format($product->price, 2, ',', '.') }}
                                        </p>
                                    @endif
                                    <div class="d-flex justify-content-between mt-auto">
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-base">Modifica</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo prodotto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-rosso">Elimina</button>
                                        </form>
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
        <div class="accordion-item">
            <h2 class="accordion-header ">
              <button class="accordion-button collapsed fs-3 text-center mb-4" type="button" data-bs-toggle="collapse" data-bs-target="#articolipreferiti" aria-expanded="true" aria-controls="articolipreferiti">
                Articoli Preferiti
              </button>
            </h2>
            <div id="articolipreferiti" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
              <div class="accordion-body">
                  <div class="row g-3">
                      @foreach ($products as $product) 
                          <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                              <div class="card card-personal-area-product h-100 w-100">
                                  <div class="card-body d-flex flex-column">
                                      <h5 class="card-title">{{ $product->title }}</h5>
                                      @if ($product->description) 
                                          <p class="card-text">{{ Str::limit($product->description, 50) }}</p>
                                      @endif
                                      @if ($product->category) 
                                          <p class="card-text">
                                              <strong>Categoria:</strong> {{ $product->category->name }}
                                          </p>
                                      @endif
                                      <p class="card-text">
                                          <strong>Data:</strong> {{ $product->created_at->format('d/m/Y') }}
                                      </p>
                                      @if ($product->price)
                                          <p class="card-text">
                                              <strong>Prezzo:</strong> € {{ number_format($product->price, 2, ',', '.') }}
                                          </p>
                                      @endif
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
</div>
