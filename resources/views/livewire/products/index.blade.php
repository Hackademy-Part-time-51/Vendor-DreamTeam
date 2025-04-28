<div>
    <hr>
    <h2 class="text-center">Tutti gli articoli</h2>
    <hr>
    <div class="row g-1 mt-3">
        {{-- sezione filtri a sinistra lg/xl schermo intero sm/md --}}
        <section class="col-12 col-lg-3 ">
            <div class="container-fluid section-filter card p-4 scalebig d-flex flex-column">
                <hr>
                    <input type="text" wire:model.live="search" class="form-control w-100 " placeholder="Cerca il tuo prodotto..">
                <hr>
                <div class="col-12 ">
                    <select wire:model.live="category" class="form-select w-100 mt-1">
                        <option value="">Tutte le categorie</option>
                        @foreach ($categories as $cat)
                           
                            <option value="{{ $cat->id }}" @selected($cat->id == $category)>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <hr>
                <div class="d-flex mt-0 ">
                    <button class="btn btn-base w-50" wire:click="orderByDateFunction">
                        @if ($orderByDate)
                            <i class="bi bi-sort-down"></i> <i class="bi bi-calendar-date-fill"></i>
                        @else
                            <i class="bi bi-sort-up"></i> <i class="bi bi-calendar-date"></i>
                        @endif
        
                    </button>
                    <button class="btn btn-base mx-1 w-50" wire:click="orderByAZFunction">
                        @if ($orderByAZ)
                            <i class="bi bi-sort-alpha-down"></i> <strong>a-z</strong>
                        @else
                            <i class="bi bi-sort-alpha-up"></i> <strong>z-a</strong>
                        @endif
                    </button>
                </div>
                <button wire:click="resetFilter" class="btn btn-base w-100 mt-1">Resetta filtri  </button>
                <hr>
            </div>
        </section>
        {{-- sezione articoli --}}
        <section class="col-12 col-lg-9 d-flex flex-wrap justify-content-around gx-1 gy-1 pb-3">
            @if (count($products) == 0)
                <div class="alert alert-warning text-center w-100 d-flex justify-content-center align-items-center fs-3">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>Non sono stati trovati articoli</strong>
                </div>
            @endif
            @for ($i=0; $i < $scroll; $i++)
            <x-card></x-card>
                <div class="col-12 col-md-6 col-lg-4 p-2 scalebig">
                    <div class="card p-1" >
                        <div id="productImageCarousel{{$products[$i]->id}}" class="carousel slide shadow-sm " data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#productImageCarousel{{$products[$i]->id}}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#productImageCarousel{{$products[$i]->id}}" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#productImageCarousel{{$products[$i]->id}}" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
            
                            <div class="carousel-inner rounded"> 
                                <div class="carousel-item active">
                                    <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/720" class="d-block w-100" alt="Immagine casuale 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/720" class="d-block w-100" alt="Immagine casuale 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/720" class="d-block w-100" alt="Immagine casuale 3">
                                </div>
                            </div>
            
                            <button class="carousel-control-prev" type="button" data-bs-target="#productImageCarousel{{$products[$i]->id}}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Precedente</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productImageCarousel{{$products[$i]->id}}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Successivo</span>
                            </button>
                        </div>
                        <div class="card-body text-center">
                          <h5 class="card-title">{{Str::limit( $products[$i]->title, 21) }}</h5>
                          <p class="card-text">{{ Str::limit($products[$i]->description, 20) }}</p>
                        </div>
                        <ul class="list-group list-group-flush text-center">
                          <li class="list-group-item text-center">
                            <span class="badge rounded-pill text-bg-warning "> <i class="bi bi-tags-fill me-2"></i>{{ $products[$i]->category->name }}</span>
                        </li>
                          <li class="list-group-item">
                            <strong>Data:</strong> {{ $products[$i]->created_at->format('d/m/Y') }}
                        </li>
                          <li class="list-group-item">
                            <strong>Creato da:</strong> <span class="text-blu">{{ $products[$i]->user->name }}</span>
                          </li>
                        </ul>
                        <li class="list-group-item fw-bold text-center fs-6">
                            € {{ number_format($products[$i]->price, 2, ',', '.') }}
                          </li>
                        <div class="card-body d-flex justify-content-evenly align-items-center">
                            <a href="{{ route('products.show', ['product' => $products[$i]->id]) }}"
                                class="btn btn-base ">
                                <i class="bi bi-person-fill"></i>
                             </a>
                            <a href="{{ route('products.show', ['product' => $products[$i]->id]) }}"
                                class="btn btn-base ">
                                 Vedi Dettagli
                             </a>
                             {{-- @livewire('products.favorite') --}}
                        </div>
                      </div>
                </div>
            @endfor

            @if ($scroll < count($products)-1)
                <button wire:click="scrollFunction" class="btn btn-base w-50 mt-3">Vedi altri...</button>
            @endif
            <div class="position-fixed torna-su">
                <a href="#" aria-label="Torna su" data-bs-toggle="backtotop" class="back-to-top" id="example">
                    <button class="btn-base btn"><use href="/bootstrap-italia/dist/svg/sprites.svg#it-arrow-up"><i class="bi bi-chevron-up"></i></use></button>
                </a>
            </div>
        </section>
    </div>
</div>
