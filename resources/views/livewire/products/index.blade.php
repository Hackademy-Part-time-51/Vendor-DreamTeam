<div>
    <h2 class="text-center">Tutti gli articoli</h2>
    <hr>
    <div class="row g-1 mt-3">
        <section class="col-12 col-lg-4 ">
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
                            <i class="bi bi-sort-down"></i> Dal piu recente
                        @else
                            <i class="bi bi-sort-up"></i> Dal piu vecchio
                        @endif
        
                    </button>
                    <button class="btn btn-base mx-1 w-50" wire:click="orderByAZFunction">
                        @if ($orderByAZ)
                            <i class="bi bi-sort-alpha-down"></i> Da A-Z
                        @else
                            <i class="bi bi-sort-alpha-up"></i> Da Z-A
                        @endif
                    </button>
                </div>
            </div>
        </section>
        <div class="col-12 col-lg-8 d-flex flex-wrap">
            @for ($i=0; $i < $scroll; $i++)
                
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $products[$i]->title }}</h5>
                        @if ($products[$i]->description)
                            <p class="card-text">{{ Str::limit($products[$i]->description, 100) }}</p>
                        @endif
                        @if ($products[$i]->category)
                            <p class="card-text"><strong>Categoria:</strong> {{ $products[$i]->category->name }}</p>
                            <div class="d-inline-block" style="width: 40px; height: 40px;"> {{-- <--- IMPOSTA QUI LE DIMENSIONI --}}
                                {!! $products[$i]->category->svg_icon !!}
                            </div>
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
                              class="btn btn-outline-primary btn-sm">
                                Vedi Dettagli
                           </a>
                       </div>
                    </div>
                </div>
            </div>
            @endfor
            @if ($scroll < count($products)-1)
                
            <button wire:click="scrollFunction" class="btn btn-base w-100">Vedi altri...</button>
            @endif
        
        </div>
    </div>
</div>
