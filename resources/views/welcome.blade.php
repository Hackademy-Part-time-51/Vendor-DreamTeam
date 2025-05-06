<x-layout>
    @if (session()->has('message'))
    <div class="alert alert-success text-center shadow rounded w-50">
        {{session('message')}}
    </div>
    
    @endif
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded w-50">
            {{session('errorMessage')}}
        </div>
    @endif

    <div class="container-fluid p-0">
        
        <section class="min-vh-100 d-flex align-items-center justify-content-start bg-white px-3">
            <div class="text-start " id="titoloWelcome">
            </div>
        </section>

        <section class="min-vh-100 d-flex align-items-center justify-content-end bg-light px-3">
            <div class="text-end " id="sloganWelcome">
            </div>
        </section>

        <section class="min-vh-100 d-flex align-items-center justify-content-start bg-white px-3 ">
                <div class="text-start " id="prodottoWelcome">
                </div>
        </section>

        <section class="min-vh-100 d-flex align-items-center justify-content-end bg-light px-3">
            <div class="text-end " id="venditoriWelcome">
            </div>
        </section>

        <!-- Quinta Sezione - Preferiti -->
        <section class="min-vh-100 d-flex align-items-center justify-content-start bg-white px-3">
            <div class="text-start " id="preferitiWelcome">

            </div>
        </section>

        <!-- Sesta Sezione - Contatti -->
        <section class="min-vh-100 d-flex align-items-center justify-content-end bg-light px-3">
            <div class="text-end " id="contattiWelcome">

            </div>
        </section>
    </div>


    <div class=" p-3">
        @livewire('products.show-limited-products')
    </div>

    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>

        let titoloWelcome = document.getElementById('titoloWelcome');
        let sloganWelcome = document.getElementById('sloganWelcome');
        let prodottoWelcome = document.getElementById('prodottoWelcome');
        let venditoriWelcome = document.getElementById('venditoriWelcome');
        let preferitiWelcome = document.getElementById('preferitiWelcome');
        let contattiWelcome = document.getElementById('contattiWelcome');

        function TitoloWelcome(element) {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        var titoloAcomparsa = new Typed(element, {
                            strings: [
                                '<h1 class="display-1  text-blu montserrat mb-0">{{__('ui.welcome')}} {{__('ui.to')}}<h1 class="display-1 fw-bold handlee-regular">Vendor</h1>'
                                ],
                            typeSpeed: 20
                            }
                    );
                    observer.unobserve(element);
                    }
                });
            });
            
            observer.observe(element);
        }
        function SloganWelcome(element) {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        var titoloAcomparsa = new Typed(element, {
                            strings: [
                                '<h1 class="display-1 montserrat text-blu mb-4">{{__('navbar.footer')}}</h2>'
                                ],
                            typeSpeed: 20
                            }
                    );
                    observer.unobserve(element);
                    }
                });
            });
            
            observer.observe(element);
        }
        function ProdottoWelcome(element) {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        var titoloAcomparsa = new Typed(element, {
                            strings: [
                                '<h1 class="display-1 montserrat text-blu mb-4">{{__('ui.browseItems')}}</h2>'
                                ],
                            typeSpeed: 20
                            }
                    );
                    observer.unobserve(element);
                    }
                });
            });
            
            observer.observe(element);
        }
        function VenditoriWelcome(element) {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        var titoloAcomparsa = new Typed(element, {
                            strings: [
                                '<h2 class="display-1 montserrat text-blu mb-4">{{__('ui.popularSellers')}}</h2>'
                                ],
                            typeSpeed: 20
                            }
                    );
                    observer.unobserve(element);
                    }
                });
            });
            
            observer.observe(element);
        }
        function PreferitiWelcome(element) {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        var titoloAcomparsa = new Typed(element, {
                            strings: [
                                '<h2 class="display-1 montserrat text-blu mb-0">{{__('ui.addTofavourites')}}<br>{{__('ui.orCart')}}<br>{{__('ui.shopClick')}}<br></h2>'
                                ],
                            typeSpeed: 20
                            }
                    );
                    observer.unobserve(element);
                    }
                });
            });
            
            observer.observe(element);
        }
        function ContattiWelcome(element) {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        var titoloAcomparsa = new Typed(element, {
                            strings: [
                                '<h2 class="display-1 montserrat text-blu mb-0">{{__('ui.workWithUs')}}<br><a href="{{route("lavoraConNoi")}}" class="btn display-1 btn-baseblu"><span class="display-4">{{__('ui.clickContact')}}</span></a><br></h2>'
                                ],
                            typeSpeed: 20
                            }
                    );
                    observer.unobserve(element);
                    }
                });
            });
            
            observer.observe(element);
        }

        TitoloWelcome(titoloWelcome);
        SloganWelcome(sloganWelcome);
        ProdottoWelcome(prodottoWelcome);
        VenditoriWelcome(venditoriWelcome);
        PreferitiWelcome(preferitiWelcome);
        ContattiWelcome(contattiWelcome);

    </script>
</x-layout>