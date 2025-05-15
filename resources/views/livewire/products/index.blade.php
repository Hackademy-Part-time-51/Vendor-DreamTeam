<div>
    <hr>
    <h2 class="text-center display-4 ">{{ __('ui.allArticles') }}</h2>
    <hr>
    <div class="row g-1 mt-3">
        {{-- sezione filtri a sinistra lg/xl schermo intero sm/md --}}
        <section class="col-12 col-lg-3">
            <div id="sezione-filtri">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body p-4">
                        <hr>
                        <div class="mb-3">
                            <label class="form-label small text-center w-100 fs-5 fw-light">{{ __('ui.searchProduct') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" wire:model.live="search" class="form-control border-start-0 ps-0"
                                    placeholder="{{ __('ui.allArticles') }}">
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label small text-center w-100 fs-5 fw-light">{{ __('ui.category') }}</label>
                            <select wire:model.live="category" class="form-select">
                                <option value="">{{ __('ui.allCategory') }}</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" @selected($cat->id == $category)>
                                        {{ __('category.' . $cat->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label small text-center w-100 fs-5 fw-light">{{ __('ui.searchLocation') }}</label>

                            <input type="text" id="myInput" class="form-control mb-2"
                                placeholder="{{ __('ui.city') }}">
                            <input type="hidden" id="idCity" wire:model.live="myCity">
                            @if ($myCity)
                                <label class="form-label fs-5 fw-light" id="labelRaggio">
                                    <span wire:loading.remove wire:target="myRadius">
                                        {{ __('ui.searchLocation') }}: {{ $myRadius }}km
                                    </span>
                                    <span wire:loading wire:target="myRadius">
                                        <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                        {{ __('ui.searchProgress') }}...
                                    </span>
                                </label>

                                <input type="range" name="myRadius" id="raggioLocale" wire:model.live="myRadius"
                                    class="form-range" min="25" max="250" step="25"
                                    wire:loading.attr="disabled" wire:loading.class="opacity-50">
                            @else
                                <label class="form-label text-center fs-5 fw-light">{{ __('ui.searchRadiusAll') }}</label>
                                <input type="range" name="myRadius" id="raggioLocale" wire:model.live="myRadius"
                                    class="form-range" min="25" max="250" step="25" disabled>
                            @endif
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label small text-center w-100 fs-5 fw-light">{{ __('ui.sortBy') }}</label>
                            <div class="d-flex gap-2">
                                <button
                                    class="btn btn-base flex-grow-1 d-flex align-items-center justify-content-center sort-btn"
                                    wire:click="orderByDateFunction">
                                    <span>
                                        @if ($orderByDate)
                                            <i class="bi bi-sort-down me-2"></i>
                                            <i class="bi bi-calendar-date-fill"></i>
                                        @else
                                            <i class="bi bi-sort-up me-2"></i>
                                            <i class="bi bi-calendar-date"></i>
                                        @endif
                                    </span>

                                </button>

                                <button
                                    class="btn btn-base flex-grow-1 d-flex align-items-center justify-content-center sort-btn"
                                    wire:click="orderByAZFunction">
                                    <span>
                                        @if ($orderByAZ)
                                            <i class="bi bi-sort-alpha-down me-2"></i>
                                            <strong>A-Z</strong>
                                        @else
                                            <i class="bi bi-sort-alpha-up me-2"></i>
                                            <strong>Z-A</strong>
                                        @endif
                                    </span>
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label small fs-5 fw-light text-center w-100">{{ __('ui.priceRange') }}</label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent">€</span>
                                        <input type="number" min="0" class="form-control"
                                            wire:model.live="minPrice" placeholder="Min">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent">€</span>
                                        <input type="number" min="0" class="form-control"
                                            wire:model.live="maxPrice" placeholder="Max">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button wire:click="resetFilter"
                            class="btn btn-base w-100 d-flex align-items-center justify-content-center reset-btn">
                            <span>
                                <i class="bi bi-arrow-counterclockwise me-2"></i>
                                {{ __('ui.resetFilter') }}
                            </span>
                        </button>
                        <hr>
                        @auth
                            <button wire:click="saveFilter"
                                class="btn btn-base w-100 mt-1 d-flex align-items-center justify-content-center save-btn">
                                <span>
                                    <i class="bi bi-bookmark-check me-2"></i>
                                    {{ __('ui.saveFilter') }}
                                </span>
                            </button>
                        @endauth
                    </div>
                </div>
            </div>
        </section>



        {{-- sezione articoli --}}
        <section class="col-12 col-lg-9 d-flex flex-wrap justify-content-around gx-1 gy-1 pb-3">
            @if (count($products) == 0)
                <div class="alert  text-center w-100 d-flex justify-content-center align-items-center flex-column fs-3"
                    wire:loading.attr="disabled" wire:loading.class="d-none">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>{{ __('ui.noArticleFound') }}</strong>
                    @auth
                        <button wire:click="saveFilter"
                            class="btn btn-base  mt-1 d-flex align-items-center justify-content-center save-btn">
                            <span>
                                <i class="bi bi-bookmark-check me-2"></i>
                                {{ __('ui.saveFilter') }}
                            </span>
                        </button>
                    @endauth
                </div>
            @endif

            <div wire:loading wire:key= "products">
                <div class="d-flex h-100 justify-content-center align-items-center my-5">
                    <div class="loader "></div>
                </div>
            </div>
            <div wire:loading.remove wire:key= "products" class="d-flex flex-wrap" wire:loading.attr="disabled"
                wire:loading.class="d-none">
                @foreach ($products as $product)
                    <div class="col-12 col-md-6 col-lg-4 p-2 scalebig" wire:key="{{ $product->id }}">
                        <x-card :product="$product"></x-card>
                    </div>
                @endforeach
            </div>




            @if ($scroll < $count - 1)
                <span wire:loading.remove wire:key="products" wire:loading.attr="disabled"
                    wire:loading.class="d-none">
                    <button class="btn btn-baseblu  mt-3" wire:click="scrollFunction">
                        <span>
                            {{ __('ui.seeOthers') }}...
                        </span>
                    </button>
                </span>
            @endif
            <div class="position-fixed torna-su">
                <a href="#" aria-label="Torna su" data-bs-toggle="backtotop" class="back-to-top"
                    id="example">
                    <button class="btn-baseblu btn">
                        <span>
                            <i class="bi bi-chevron-up"></i>
                        </span>
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
