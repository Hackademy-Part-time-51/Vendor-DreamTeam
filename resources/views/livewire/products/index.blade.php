<div>
    <hr>
    <h2 class="text-center">{{__('ui.allArticles')}}</h2>
    <hr>
    <div class="row g-1 mt-3">
        {{-- sezione filtri a sinistra lg/xl schermo intero sm/md --}}
        <section class="col-12 col-lg-3">
            <div id="sezione-filtri">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body p-4">
                        <div class="mb-4">
                            <label class="form-label small text-muted fw-semibold">{{ __('ui.searchProduct') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" wire:model.live="search" class="form-control border-start-0 ps-0" placeholder="{{ __('ui.allArticles') }}">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small text-muted fw-semibold">{{ __('ui.category') }}</label>
                            <select wire:model.live="category" class="form-select">
                                <option value="">{{ __('ui.allCategory') }}</option>
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" @selected($cat->id == $category)>
                                    {{__("category.$cat->name")  }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small text-muted fw-semibold">{{ __('ui.searchLocation') }}</label>
                            <input type="text" id="myInput" class="form-control mb-2" placeholder="{{ __('ui.city') }}">
        
                            @if ($myCity)
                            <label class="form-label fw-semibold" id="labelRaggio">
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
                            @else
                            <label class="form-label fw-semibold">{{ __('ui.searchRadiusAll') }}</label>
                            <input type="range" name="myRadius" id="raggioLocale" wire:model.live="myRadius" class="form-range"
                                min="25" max="250" step="25" disabled>
                            @endif
                        </div>
                        <div class="mb-4">
                            <label class="form-label small text-muted fw-semibold">{{ __('ui.sortBy') }}</label>
                            <div class="d-flex gap-2">
                                <button class="btn btn-base flex-grow-1 d-flex align-items-center justify-content-center sort-btn"
                                    wire:click="orderByDateFunction">
                                    @if ($orderByDate)
                                    <i class="bi bi-sort-down me-2"></i>
                                    <i class="bi bi-calendar-date-fill"></i>
                                    @else
                                    <i class="bi bi-sort-up me-2"></i>
                                    <i class="bi bi-calendar-date"></i>
                                    @endif
                                </button>
                                <button class="btn btn-base flex-grow-1 d-flex align-items-center justify-content-center sort-btn"
                                    wire:click="orderByAZFunction">
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
                            <label class="form-label small text-muted fw-semibold">{{ __('ui.priceRange') }}</label>
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
                        <button wire:click="resetFilter"
                            class="btn btn-base w-100 d-flex align-items-center justify-content-center reset-btn">
                            <i class="bi bi-arrow-counterclockwise me-2"></i>
                            {{ __('ui.resetFilter') }}
                        </button>
        
                        @auth
                        <button wire:click="saveFilter"
                            class="btn btn-base w-100 mt-1 d-flex align-items-center justify-content-center save-btn">
                            <i class="bi bi-bookmark-check me-2"></i>
                            {{ __('ui.saveFilter') }}
                        </button>
                        @endauth
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
            
            @foreach ($products as $product )
                
            
                <div class="col-12 col-md-6 col-lg-4 p-2 scalebig" wire:key="{{ $product->id }}">
                    <x-card :product="$product"></x-card>

                </div>
                
                @endforeach

            @if ($scroll < $count - 1)
                <button wire:click="scrollFunction" class="btn btn-base w-50 mt-3">{{__('ui.seeOthers')}}...</button>
            @endif
            <div class="position-fixed torna-su">
                <a href="#" aria-label="Torna su" data-bs-toggle="backtotop" class="back-to-top" id="example">
                    <button class="btn-base btn">
                        <use href="/bootstrap-italia/dist/svg/sprites.svg#it-arrow-up"><i class="bi bi-chevron-up"></i>
                        </use>
                    </button>
                    @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
                </a>
            </div>
        </section>
    </div>
</div>
