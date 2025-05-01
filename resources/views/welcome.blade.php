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
    <div class="text-center my-5 vh-100 align-content-center">
        <h1 class="display-1 mb-3" id="titoloWelcome"></span></h1>
    </div>

    <div class=" p-3">
        @livewire('products.show-limited-products')
    </div>

    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

    <script>

        let titoloWelcome = document.getElementById('titoloWelcome');
        function animazioneTitoloWelcome(element) {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        var titoloAcomparsa = new Typed(element, {
                            strings: ['Benvenuto <br>su <br> <span class="fw-bold noto-sans">Vendor'],
                            typeSpeed: 50
                            }
                    );
                    observer.unobserve(element);
                    }
                });
            });
            
            observer.observe(element);
        }
    
            animazioneTitoloWelcome(titoloWelcome);

    </script>
</x-layout>