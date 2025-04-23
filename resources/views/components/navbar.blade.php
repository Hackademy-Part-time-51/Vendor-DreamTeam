
<nav class="navbar py-0">
    <div class="container-fluid  fs-2 d-flex justify-content-between navbar ">
        <button class="btn fs-1 text-blu border-0 scalesmall" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuOffCanvas" aria-controls="menuOffCanvas">
            <i class="bi bi-list" ></i>
        </button>
        <a href="/">
            <img src="/IMAGES/LOGO-SENZA-SFONDO.png" alt="" class="" height="50">
        </a>
        <button class="btn fs-1 text-blu border-0 scalesmall" type="button" data-bs-toggle="offcanvas" data-bs-target="#userOffCanvas" aria-controls="userOffCanvas">
          <i class="bi bi-person-fill"></i>
        </button>
    </div>
  </nav>
<div class="secondary-navbar-sticky d-none d-lg-block ">
    <nav class="navbar navbar-expand-lg p-2">
        <div class="container-fluid ">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-evenly w-100 align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link text-blu scalebig dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Prodotti
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item " href="#">Prodotti in promo <i class="bi bi-piggy-bank"></i></a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Trend della settimana <i class="bi bi-calendar4-week"></i></a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Tutti i prodotti <i class="bi bi-list-task"></i></a></li>
                    </ul>
                  </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-blu scalebig dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Categorie
                    </a>
                    <ul class="dropdown-menu">
                        {{-- foreach di categorie --}}
                        {{-- @foreach ($categories as $category)
                        <li><a class="dropdown-item " href="#">Prodotti in promo <i class="bi bi-piggy-bank"></i></a></li>
                        <li><hr class="dropdown-divider"></li>
                        @endforeach --}}
                      <li><a class="dropdown-item" href="#">Foreach di categorie</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-blu scalebig dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Area personale
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-blu scalebig dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Assistenza
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-blu scalebig dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Contatti
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-blu scalebig " href="#" >
                        <button class="btn btn-add text-blu fs-5">
                            <span>Aggiungi un articolo <i class="bi bi-plus-lg"></i></span>
                        </button>
                    </a>
                </li>
            </ul>
        </div>
      </nav>
</div>
  
<div class="offcanvas offcanvas-start" tabindex="-1" id="menuOffCanvas" aria-labelledby="menuOffCanvasLabel">
    <div class="offcanvas-header">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
    </div>
</div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="userOffCanvas" aria-labelledby="userOffCanvasLabel">
    @guest
    <div class="offcanvas-header">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body py-0 text-center">
      </div>
      <div class="offcanvas-footer">
        <a href="{{route('register')}}">
          <button class="btn btn-register text-blu fs-1">Registrati <i class="bi bi-person-plus"></i></button>
        </a>
        <a href="{{route('login')}}">
          <button class="btn btn-register text-blu fs-1">Login <i class="bi bi-box-arrow-in-right"></i></button>
        </a>
      </div>
    </div>
    @endguest
    @auth
        <div class="offcanvas-header">
        </div>
        <div class="offcanvas-body p-0">
        </div>
        <div class="offcanvas-footer">
        </div>
    </div>
    @endauth

  </div>