<div>
    <hr>
    <h2 class="text-center">{{__('ui.allArticles')}}</h2>
    <hr>
    <div class="row g-1 mt-3">
        {{-- sezione filtri a sinistra lg/xl schermo intero sm/md --}}
        <section class="col-12 col-lg-3">
            <div id="sezione-filtri">
              <div class="card border-0 shadow-sm">
                <div class="card-body">
                  <!-- Ricerca Prodotto -->
                  <div class="mb-4">
                    <label class="form-label small text-muted">{{ __('ui.searchProduct') }}</label>
                    <div class="input-group">
                      <span class="input-group-text bg-transparent border-end-0">
                        <i class="bi bi-search"></i>
                      </span>
                      <input type="text" wire:model.live="search" class="form-control border-start-0 ps-0" placeholder="{{ __('ui.allArticles') }}">
                    </div>
                  </div>
                  <div class="mb-4">
                    <label class="form-label small text-muted">{{ __('ui.category') }}</label>
                    <select wire:model.live="category" class="form-select">
                      <option value="">{{ __('ui.allCategory') }}</option>
                      @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" @selected($cat->id == $category)>
                          {{ $cat->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-4">
                    <label for="myInput" class="form-label small text-muted">{{ __('ui.searchLocation') }}</label>
                    <input id="myInput" type="text" class="form-control mb-2" placeholder="{{ __('ui.city') }}">
                    
                    @if ($myCity)
                      <label for="raggioLocale" class="form-label" id="labelRaggio">
                        <span wire:loading.remove wire:target="myRadius">
                          {{ __('ui.searchLocation') }}: {{ $myRadius }}km
                        </span>
                        <span wire:loading wire:target="myRadius">
                          <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                          {{ __('ui.searchProgress') }}...
                        </span>
                      </label>
                      <input type="range" name="myRadius" id="raggioLocale" wire:model.live="myRadius" class="form-range"
                        min="25" max="250" step="25" wire:loading.attr="disabled" wire:loading.class="opacity-50">
                      <input type="hidden" wire:model.live="myCity" id="idCity">
                    @else
                      <label for="raggioLocale" class="form-label">{{ __('ui.searchRadiusAll') }}</label>
                      <input type="range" name="myRadius" id="raggioLocale" wire:model.live="myRadius" class="form-range"
                        min="25" max="250" step="25" disabled>
                      <input type="hidden" wire:model.live="myCity" id="idCity">
                    @endif
                  </div>
                  <div class="mb-4">
                    <label class="form-label small text-muted">{{ __('ui.sortBy') }}</label>
                    <div class="d-flex gap-2">
                      <button class="btn btn-base flex-grow-1 d-flex align-items-center justify-content-center" wire:click="orderByDateFunction">
                        @if ($orderByDate)
                          <i class="bi bi-sort-down me-2"></i>
                          <i class="bi bi-calendar-date-fill"></i>
                        @else
                          <i class="bi bi-sort-up me-2"></i>
                          <i class="bi bi-calendar-date"></i>
                        @endif
                      </button>
                      <button class="btn btn-base flex-grow-1 d-flex align-items-center justify-content-center" wire:click="orderByAZFunction">
                        @if ($orderByAZ)
                          <i class="bi bi-sort-alpha-down me-2"></i>
                          <strong>A-Z</strong>
                        @else
                          <i class="bi bi-sort-alpha-up me-2"></i>
                          <strong>Z-A</strong>
                        @endif
                      </button>
                    </div>
                  </div>
                  <div class="mb-4">
                    <label class="form-label small text-muted">{{ __('ui.priceRange') }}</label>
                    <div class="row g-2">
                      <div class="col-6">
                        <div class="input-group">
                          <span class="input-group-text bg-transparent">€</span>
                          <input type="number" class="form-control" wire:model.live="minPrice" placeholder="Min">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="input-group">
                          <span class="input-group-text bg-transparent">€</span>
                          <input type="number" class="form-control" wire:model.live="maxPrice" placeholder="Max">
                        </div>
                      </div>
                    </div>
                  </div>
                  <button wire:click="resetFilter" class="btn btn-base w-100 d-flex align-items-center justify-content-center">
                    <i class="bi bi-arrow-counterclockwise me-2"></i>
                    {{ __('ui.resetFilter') }}
                  </button>
                </div>
              </div>
            </div>
          </section>
          

        {{-- sezione articoli --}}
        <section class="col-12 col-lg-9 d-flex flex-wrap justify-content-around gx-1 gy-1 pb-3">
            @if (count($products) == 0)
                <div
                    class="alert alert-warning text-center w-100 d-flex justify-content-center align-items-center fs-3">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>{{__('ui.noArticleFound')}}</strong>
                </div>
            @endif
            @for ($i = 0; $i < $scroll; $i++)
                <div class="col-12 col-md-6 col-lg-4 p-2 scalebig" wire:key="{{ $products[$i]->id }}">
                    <x-card :product="$products[$i]"></x-card>

                </div>
            @endfor

            @if ($scroll < count($products) - 1)
                <button wire:click="scrollFunction" class="btn btn-base w-50 mt-3">{{__('ui.seeOthers')}}...</button>
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
