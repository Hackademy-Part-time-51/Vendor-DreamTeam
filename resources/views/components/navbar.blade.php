{{-- navbar statica con apertura dei modal --}}
@php
    use App\Models\Category;
@endphp
<nav class="navbar py-0" id="bigNavbar">
    
  
    <div class="container-fluid  d-flex justify-content-center d-none d-lg-flex navbar">
      <a href="/">
        <img src="/IMAGES/LOGO-SENZA-SFONDO.png" alt="" class="" height="100rem">
    </a>
    </div>
    <div class="container-fluid  display-2 d-flex justify-content-between navbar d-lg-none d-xl-none">
        <button class="btn fs-1 text-blu border-0 scalesmall" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuOffCanvas" aria-controls="menuOffCanvas">
            <i class="bi bi-list" ></i>
        </button>
        <a href="/">
            <img src="/IMAGES/LOGO-SENZA-SFONDO.png" alt="" class="" height="50">
        </a>
        <button class="btn fs-1 text-blu border-0 scalesmall" type="button" data-bs-toggle="offcanvas" data-bs-target="#userOffCanvas" aria-controls="userOffCanvas">
          @guest
            <i class="bi bi-person-fill"></i>
          @endguest
          @auth
          @if (Auth::user()->profile_image === null)
            <img src="/IMAGES/LOGO-SENZA-SFONDO.png" alt="" class="rounded-circle" height="55" width="50">
          @else
          <img src="{{asset('storage/'.Auth::user()->profile_image) }}" alt="" class="rounded-circle" height="55" width="50">
          @endif
          @endauth
        </button>
    </div>
</nav>


<!-- MENU OFFCANVAS PRINCIPALE -->
<div class="offcanvas offcanvas-start border-0 shadow-lg" tabindex="-1" id="menuOffCanvas">
  <!-- Header -->
  <div class="offcanvas-header py-4 d-flex justify-content-between align-items-center border-bottom">
    <a href="/" class="d-flex align-items-center text-decoration-none">
      <img src="/IMAGES/LOGO-SENZA-SFONDO.png" alt="Logo" height="60" class="me-2">
    </a>
    <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <!-- Corpo -->
  <div class="offcanvas-body d-flex flex-column justify-content-between p-0">
    <nav class="list-group list-group-flush flex-grow-1">
      <button type="button" class="list-group-item list-group-item-action text-blu d-flex align-items-center py-4 fs-3 border-0"
        data-bs-toggle="modal" data-bs-target="#productsModal">
        <i class="bi bi-box-seam fs-2 me-3"></i>{{ __('navbar.product') }}
      </button>
      <button type="button" class="list-group-item list-group-item-action text-blu d-flex align-items-center py-4 fs-3 border-0"
        data-bs-toggle="modal" data-bs-target="#categoriesModal">
        <i class="bi bi-tags-fill fs-2 me-3"></i>{{ __('navbar.categories') }}
      </button>
      <button type="button" class="list-group-item list-group-item-action text-blu d-flex align-items-center py-4 fs-3 border-0"
        data-bs-toggle="modal" data-bs-target="#helpModal">
        <i class="bi bi-question-circle-fill fs-2 me-3"></i>{{ __('navbar.assistance') }}
      </button>
      <button type="button" class="list-group-item list-group-item-action text-blu d-flex align-items-center py-4 fs-3 border-0"
        data-bs-toggle="modal" data-bs-target="#contactModal">
        <i class="bi bi-envelope-fill fs-2 me-3"></i>{{ __('navbar.contacts') }}
      </button>
    </nav>
    <!-- Footer -->
    <footer class="offcanvas-footer border-top p-4">
      <div class="text-center">
        <p class="fs-4 mb-0">
          Vendor.it<br>
          <span class="fs-5 text-muted">{{ __('navbar.footer') }}</span>
        </p>
      </div>
    </footer>
  </div>
</div>

<!-- MODAL PRODOTTI -->
<div class="modal fade" id="productsModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header d-flex justify-content-between align-items-center py-4 border-0">
        <h5 class="modal-title fs-1 text-blu">
          <i class="bi bi-box-seam me-2"></i>{{ __('navbar.product') }}
        </h5>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-4">
        <nav class="list-group list-group-flush">
          <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action text-blu d-flex align-items-center py-4 fs-4">
            <i class="bi bi-list-task fs-3 me-3"></i>{{ __('navbar.allProducts') }}
          </a>
          <a href="{{ route('products.create') }}" class="list-group-item list-group-item-action text-blu d-flex align-items-center py-4 fs-4">
            <i class="bi bi-plus-lg fs-3 me-3"></i>{{ __('navbar.addArticle') }}
          </a>
        </nav>
      </div>
    </div>
  </div>
</div>

<!-- MODAL CATEGORIE -->
<div class="modal fade" id="categoriesModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header d-flex justify-content-between align-items-center py-4 border-0">
        <h5 class="modal-title fs-1 text-blu">
          <i class="bi bi-tags-fill me-2"></i>{{ __('navbar.categories') }}
        </h5>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-4">
        <nav class="list-group list-group-flush">
          @foreach (Category::all() as $category)
            <a href="{{ route('products.index', ['category' => $category->id]) }}"
              class="list-group-item list-group-item-action text-blu d-flex align-items-center py-4 fs-4">
              {{__('category.' . $category->name)}}
            </a>
          @endforeach
        </nav>
      </div>
    </div>
  </div>
</div>

<!-- MODAL ASSISTENZA -->
<div class="modal fade" id="helpModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header d-flex justify-content-between align-items-center py-4 border-0">
        <h5 class="modal-title fs-1 text-blu">
          <i class="bi bi-question-circle-fill me-2"></i>{{ __('navbar.assistance') }}
        </h5>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-4">
        <nav class="list-group list-group-flush">
          <a href="{{route('faq')}}" class="list-group-item list-group-item-action text-blu d-flex align-items-center py-4 fs-4">
            <i class="bi bi-info-circle-fill fs-3 me-3"></i>FAQ
          </a>
          <a href="{{route('privacy')}}" class="list-group-item list-group-item-action text-blu d-flex align-items-center py-4 fs-4">
            <i class="bi bi-life-preserver fs-3 me-3"></i>Privacy
          </a>
          <a href="{{route('terms')}}" class="list-group-item list-group-item-action text-blu d-flex align-items-center py-4 fs-4">
            <i class="bi bi-wrench-adjustable-circle-fill fs-3 me-3"></i>{{__('navbar.termsAndConditions')}}
          </a>
        </nav>
      </div>
    </div>
  </div>
</div>

<!-- MODAL CONTATTI -->
<div class="modal fade" id="contactModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header d-flex justify-content-between align-items-center py-4 border-0">
        <h5 class="modal-title fs-1 text-blu">
          <i class="bi bi-envelope-fill me-2"></i>{{ __('navbar.contacts') }}
        </h5>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-4">
        <nav class="list-group list-group-flush">
          <a href="{{route('lavoraConNoi')}}" class="list-group-item list-group-item-action text-blu d-flex align-items-center py-4 fs-4">
            <i class="bi bi-laptop me-3"></i>{{ __('navbar.workWithUs') }}
          </a>
           <a href="{{route('contact')}}" class="list-group-item list-group-item-action text-blu d-flex align-items-center py-4 fs-4">
            <i class="bi bi-chat-dots-fill fs-3 me-3"></i>Contattaci
          </a> 
          <a href="{{route('aboutUs')}}" class="list-group-item list-group-item-action text-blu d-flex align-items-center py-4 fs-4">
            <i class="bi bi-geo-alt-fill fs-3 me-3"></i>{{ __('navbar.whoWeAre') }}
          </a>
        </nav>
      </div>
    </div>
  </div>
</div>

<!-- MENU OFFCANVAS UTENTE -->
<div class="offcanvas offcanvas-end  border-0 shadow-lg" tabindex="-1" id="userOffCanvas">
  @guest
    <div class="offcanvas-header py-4 d-flex justify-content-between align-items-center border-bottom">
      <a href="/" class="d-flex align-items-center text-decoration-none">
        <img src="/IMAGES/LOGO-SENZA-SFONDO.png" alt="Logo" height="60" class="me-2">
        <span class="fs-3 text-blu">Vendor.it</span>
      </a>
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column justify-content-center align-items-center p-4">
      <div class="text-center mb-5">
        <h2 class="fs-1 text-blu mb-4">{{ __('auth.welcomeTO') }} Vendor.it</h2>
        <p class="fs-4 text-muted">{{ __('auth.loginOrRegister') }}</p>
      </div>
      <div class="d-flex flex-column gap-3 w-100">
        <a href="{{ route('login') }}" class="btn btn-baseblu btn-lg fs-3 py-3 w-100">
          <span>
            <i class="bi bi-box-arrow-in-right me-2"></i>Login
          </span>
        </a>
        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg fs-3 py-3 w-100">
          <span>
            <i class="bi bi-person-plus me-2"></i>{{ __('auth.register') }}
          </span>
        </a>
      </div>
    </div>
  @endguest

  @auth
    <div class="offcanvas-header py-4 d-flex justify-content-between align-items-center border-bottom">
      <div class="d-flex align-items-center">
        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" class="rounded-circle me-3" width="60" height="60" alt="Profile">
        <div>
          <h5 class="mb-0 fs-3">{{ __('ui.welcome') }}</h5>
          <p class="mb-0 fs-4 text-primary">{{ Auth::user()->name }}</p>
        </div>
      </div>
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column justify-content-between p-0">
      <nav class="list-group list-group-flush" id="userMenu">
        <a href="{{ route('personalArea', Auth::user()->id) }}"
          class="list-group-item list-group-item-action text-blu d-flex align-items-center py-4 fs-3">
          <i class="bi bi-person-lines-fill fs-2 me-3"></i>{{ __('navbar.profile') }}
        </a>
        <a href="#" class="list-group-item list-group-item-action text-blu d-flex align-items-center py-4 fs-3">
          <i class="bi bi-cart fs-2 me-3"></i>{{ __('navbar.orders') }}
        </a>
        <a href="#" class="list-group-item list-group-item-action text-blu d-flex align-items-center py-4 fs-3">
          <i class="bi bi-heart fs-2 me-3"></i>{{ __('navbar.favorites') }}
        </a>
        <a href="#" class="list-group-item list-group-item-action text-blu d-flex align-items-center py-4 fs-3">
          <i class="bi bi-gear fs-2 me-3"></i>{{ __('navbar.settings') }}
        </a>
        <button type="button"
          class="list-group-item list-group-item-action text-danger d-flex align-items-center py-4 fs-3 border-0"
          data-bs-toggle="modal" data-bs-target="#logoutModal">
          <i class="bi bi-box-arrow-left fs-2 me-3"></i>{{ __('navbar.logout') }}
        </button>
      </nav>
      <footer class="offcanvas-footer border-top p-4">
        <div class="text-center">
          <p class="fs-4 mb-0">
            Vendor.it<br>
            <span class="fs-5 text-muted">{{ __('navbar.footer') }}</span>
          </p>
        </div>
      </footer>
    </div>
  @endauth
</div>

  

{{--  Logout Modal  --}}
<div class="modal fade" id="logoutModal" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header border-0">
              <h5 class="modal-title display-2">{{__('navbar.goOut')}}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body text-center pb-4">
              <i class="bi bi-exclamation-circle text-warning display-1 mb-4"></i>
              <p class="fs-4 text-muted">{{__('navbar.wantLogout')}}</p>
          </div>
          <div class="modal-footer border-0 justify-content-center gap-2">
              <button type="button" class="btn btn-outline-secondary btn-lg px-4 fs-4" data-bs-dismiss="modal">
                  {{__('navbar.cancel')}}
              </button>
              <form action="{{route('logout')}}" method="POST" class="d-inline">
                  @csrf
                  <button class="btn btn-danger btn-lg px-4 fs-4">
                      {{__('navbar.confirmLogout')}}
                  </button>
              </form>
          </div>
      </div>
  </div>
</div>



