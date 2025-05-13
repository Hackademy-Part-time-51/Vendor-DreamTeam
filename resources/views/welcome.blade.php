<x-layout>

    @if (session()->has('message'))
        <div class="alert alert-success text-center shadow rounded w-50 mx-auto my-3">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded w-50 mx-auto my-3">
            {{ session('errorMessage') }}
        </div>
    @endif
    <div class="container-fluid p-0">
        <section class="hero-section bg-blu d-flex align-items-center justify-content-center text-center min-vh-100">
            <div class="container">
                <h1 class="display-1 fw-bold  text-white">
                    {{ __('ui.welcome') }} {{ __('ui.to') }} <span class="fw-bold">Vendor</span>
                </h1>
                <p class="lead text-white-50">{{ __('navbar.footer') }}</p>
            </div>
        </section>
        <section class="info-section d-flex align-items-center justify-content-center text-center bg-white min-vh-100">
            <div class="container">
                <h2 class="display-2 text-blu fw-semibold">
                    {{ __('ui.browseItems') }}
                </h2>
                <p class="lead text-muted">
                    Esplora la nostra vasta gamma di articoli e trova ciò che cerchi.
                </p>
            </div>
        </section>
        <section class="sellers-section d-flex align-items-center justify-content-center text-center bg-light min-vh-100">
            <div class="container">
                <h2 class="display-2 text-blu fw-semibold">
                    {{ __('ui.popularSellers') }}
                </h2>
                <p class="lead text-muted">
                    Scopri i venditori più affidabili e apprezzati della nostra community.
                </p>
            </div>
        </section>
        <section class="favorites-section d-flex align-items-center justify-content-center text-center bg-white min-vh-100">
            <div class="container">
                <h2 class="display-2 text-blu fw-semibold">
                    {{ __('ui.addTofavourites') }}
                </h2>
                <p class="lead text-muted">
                    Salva i tuoi articoli preferiti o aggiungili al carrello con un click.
                </p>
            </div>
        </section>
        <section class="contacts-section d-flex align-items-center justify-content-center text-center bg-light min-vh-100">
            <div class="container">
                <h2 class="display-2 text-blu fw-semibold">
                    {{ __('ui.workWithUs') }}
                </h2>
                <a href="{{ route('lavoraConNoi') }}" class="btn btn-lg btn-baseblu mt-4">
                    <span>
                        {{ __('ui.clickContact') }}
                    </span>
                </a>
            </div>
        </section>
    </div>

    <div class="p-3">
        @livewire('products.show-limited-products')
    </div>

    
</x-layout>
