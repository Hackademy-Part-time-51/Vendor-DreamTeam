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

        <section class="min-vh-100 d-flex align-items-center justify-content-center bg-white">
            <div class="text-center" id="titoloWelcome">
            </div>
        </section>

        <section class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
            <div class="text-center px-4" id="sloganWelcome">
            </div>
        </section>

        <section class="min-vh-100 d-flex align-items-center justify-content-center bg-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="text-center" id="prodottoWelcome">
                    </div>
                </div>
            </div>
        </section>

        <section class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
            <div class="text-center px-2" id="venditoriWelcome">
            </div>
        </section>

        <!-- Quinta Sezione - Preferiti -->
        <section class="min-vh-100 d-flex align-items-center justify-content-center bg-white">
            <div class="text-center p-4" id="preferitiWelcome">

            </div>
        </section>

        <!-- Sesta Sezione - Contatti -->
        <section class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
            <div class="text-center px-4" id="contattiWelcome">

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
                                '<h1 class="display-1 text-blu montserrat mb-0">Benvenuto</h1><h1 class="display-1 text-blu noto-sans mb-0">su</h1><h1 class="display-1 fw-bold handlee-regular">Vendor</h1>'
                                ],
                            typeSpeed: 40
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
                                '<h2 class="display-2 noto-sans text-blu mb-4">Fare affari non è mai stato così facile. <br><i class="bi bi-cash-coin text-success ms-3 display-1"></i><i class="bi bi-cash-coin text-success ms-3 display-1"></i><i class="bi bi-cash-coin text-success ms-3 display-1"></i></h2>'
                                ],
                            typeSpeed: 40
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
                                '<h2 class="display-3 montserrat text-blu mb-4">Sfoglia migliaia di articoli, nuovi e usati<br><i class="bi bi-box-seam text-success ms-3 display-1"></i></h2>'
                                ],
                            typeSpeed: 40
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
                                '<h2 class="display-3 montserrat text-blu mb-4">Scopri i venditori più gettonati<br><i class="bi bi-star-fill text-warning ms-3 display-1"></i></h2>'
                                ],
                            typeSpeed: 40
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
                                '<h2 class="display-1 noto-sans text-blu mb-0">Aggiungi ai preferiti <br><i class="bi bi-heart-fill text-danger ms-3 display-1"></i><br>Oppure al carrello<br><i class="bi bi-cart-fill text-success ms-3 display-1"></i><br>E comprali con un click<br><i class="bi bi-check-circle-fill text-success ms-3 display-1"></i><br></h2>'
                                ],
                            typeSpeed: 40
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
                                '<h2 class="display-1 montserrat text-blu mb-0">Vuoi lavorare con noi?<br><a href="{{route("lavoraConNoi")}}" class="btn display-1 btn-baseblu"><span class="display-4">Clicca qui per contattarci</span></a><br></h2>'
                                ],
                            typeSpeed: 40
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