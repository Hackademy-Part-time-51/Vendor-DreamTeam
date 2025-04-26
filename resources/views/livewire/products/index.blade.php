<div>
    <hr>
    <h2 class="text-center">Tutti gli articoli</h2>
    <hr>
    <div class="row g-1 mt-3">
        {{-- sezione filtri a sinistra lg/xl schermo intero sm/md --}}
        <section class="col-12 col-lg-3 ">
            <div class="container-fluid section-filter card p-4  d-flex flex-column">
                    <input type="text" wire:model.live="search" class="form-control w-100 " placeholder="Cerca il tuo prodotto..">

                <div class="col-12 my-4">
                    <select wire:model.live="category" class="form-select w-100 mt-1">
                        <option value="">Tutte le categorie</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex mt-1 ">
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
                <button wire:click="resetFilter" class="btn btn-base w-50 mt-3">Resetta filtri <i class="bi bi-x-lg"></i> </button>
            </div>
        </section>
        {{-- sezione articoli --}}
        <section class="col-12 col-lg-9 d-flex flex-wrap justify-content-around gx-1 gy-1 pb-3">
            @for ($i=0; $i < $scroll; $i++)
                <div class="col-12 col-md-6 col-lg-4 p-2">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $products[$i]->title }}</h5>
                            @if ($products[$i]->description)
                                <p class="card-text">{{ Str::limit($products[$i]->description, 20) }}</p>
                            @endif
                            @if ($products[$i]->category)
                                <p class="card-text"><strong>Categoria:</strong> {{ $products[$i]->category->name }}
                                    <span class="d-inline-block align-middle" style="width: 1rem; height: 1rem;">
                                        {!! $products[$i]->category->svg_icon !!}
                                    </span>
                                </p>
                            @endif
                            <p class="card-text">
                                <strong>Data:</strong> {{ $products[$i]->created_at->format('d/m/Y') }}
                            </p>
                            <p class="card-text">
                                <strong>Creato da:</strong> {{ $products[$i]->user->name }}
                            </p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                @if ($products[$i]->price)
                                    <p class="card-text fw-bold fs-5 mb-0">
                                        € {{ number_format($products[$i]->price, 2, ',', '.') }}
                                    </p>
                                @else
                                    <span></span>
                                @endif
                                <a href="{{ route('products.show', ['product' => $products[$i]->id]) }}"
                                   class="btn btn-base btn-sm">
                                    Vedi Dettagli
                                </a>
                            </div>
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
