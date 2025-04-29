<div>
    <hr>
    <h2 class="text-center">Tutti gli articoli</h2>
    <hr>
    <div class="row g-1 mt-3">
        {{-- sezione filtri a sinistra lg/xl schermo intero sm/md --}}
        <section class="col-12 col-lg-3 ">
            <div class="container-fluid section-filter card p-4 scalebig d-flex flex-column">
                <input type="text" wire:model.live="search" class="form-control w-100 "
                    placeholder="Cerca il tuo prodotto..">
                <hr>
                <div class="col-12 ">
                    <select wire:model.live="category" class="form-select w-100 ">
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
                <div class="d-flex justify-content-center align-items-center gap-1 my-1">
                    <input type="number" class="form-control" id="minPrice" wire:model.live="minPrice" placeholder="$Min">
                    <input type="number" class="form-control" id="maxPrice" wire:model.live="maxPrice" placeholder='$Max'>
                </div>
                <hr>
                <button wire:click="resetFilter" class="btn btn-base w-100 ">Resetta filtri </button>
            </div>
        </section>
        {{-- sezione articoli --}}
        <section class="col-12 col-lg-9 d-flex flex-wrap justify-content-around gx-1 gy-1 pb-3">
            @if (count($products) == 0)
                <div
                    class="alert alert-warning text-center w-100 d-flex justify-content-center align-items-center fs-3">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>Non sono stati trovati articoli</strong>
                </div>
            @endif
            @for ($i = 0; $i < $scroll; $i++)
                <div class="col-12 col-md-6 col-lg-4 p-2 scalebig" wire:key="{{ $products[$i]->id }}">
                    <x-card :product="$products[$i]" ></x-card>

                </div>
            @endfor

            @if ($scroll < count($products) - 1)
                <button wire:click="scrollFunction" class="btn btn-base w-50 mt-3">Vedi altri...</button>
            @endif
            <div class="position-fixed torna-su">
                <a href="#" aria-label="Torna su" data-bs-toggle="backtotop" class="back-to-top" id="example">
                    <button class="btn-base btn">
                        <use href="/bootstrap-italia/dist/svg/sprites.svg#it-arrow-up"><i class="bi bi-chevron-up"></i>
                        </use>
                    </button>
                </a>
            </div>
        </section>
    </div>
</div>
