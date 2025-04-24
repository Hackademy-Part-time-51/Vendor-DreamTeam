
<nav class="navbar py-0">
    <div class="container-fluid  fs-2 d-flex justify-content-between navbar">
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
                    <a class="nav-link text-blu scalebig  fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <a class="nav-link text-blu scalebig  fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <a class="nav-link text-blu scalebig  fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Area personale
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-blu" href="#">Action</a></li>
                    <li><a class="dropdown-item text-blu" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-blu" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-blu scalebig  fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Assistenza
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-blu" href="#">Action</a></li>
                    <li><a class="dropdown-item text-blu" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-blu" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-blu scalebig  fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Contatti
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-blu" href="#">Action</a></li>
                    <li><a class="dropdown-item text-blu" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-blu" href="#">Something else here</a></li>
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
{{-- menu offcanvas menu --}}
<div class="offcanvas offcanvas-start text-blu" tabindex="-1" id="menuOffCanvas" aria-labelledby="menuOffCanvasLabel">
    <div class="offcanvas-header">
      <a href="/">
        <img src="/IMAGES/LOGO-SENZA-SFONDO.png" alt="" class="" height="50">
      </a>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body text-blu">
      <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header text-blu">
            <button class="accordion-button collapsed fs-4 text-blu" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              <i class="bi bi-box-seam me-2"></i> Prodotti
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <ul class="list-unstyled fs-4">
                <li><a class="dropdown-item text-blu nav-link" href="#"><i class="bi bi-piggy-bank-fill me-2"></i> Prodotti in promo</a></li>
                <li><a class="dropdown-item text-blu nav-link" href="#"><i class="bi bi-award"></i> Trend della settimana</a></li>
                <li><a class="dropdown-item text-blu nav-link" href="#"><i class="bi bi-list-task me-2"></i> Tutti i prodotti</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed fs-4 text-blu" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              <i class="bi bi-tags-fill me-2"></i> Categorie
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <ul class="list-unstyled fs-4">
                <li><a class="dropdown-item nav-link text-blu" href="#"><i class="bi bi-folder-fill me-2"></i> Foreach di categorie</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed fs-4 text-blu" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              <i class="bi bi-person-circle me-2"></i> Area personale
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <ul class="list-unstyled fs-4">
                <li><a class="dropdown-item nav-link text-blu" href="#"><i class="bi bi-gear-fill me-2"></i> Action</a></li>
                <li><a class="dropdown-item nav-link text-blu" href="#"><i class="bi bi-arrow-right-square-fill me-2"></i> Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item nav-link text-blu" href="#"><i class="bi bi-three-dots me-2"></i> Something else here</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed fs-4 text-blu" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
              <i class="bi bi-question-circle-fill me-2"></i> Assistenza
            </button>
          </h2>
          <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <ul class="list-unstyled fs-4">
                <li><a class="dropdown-item nav-link text-blu" href="#"><i class="bi bi-info-circle-fill me-2"></i> Action</a></li>
                <li><a class="dropdown-item nav-link text-blu" href="#"><i class="bi bi-life-preserver me-2"></i> Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item nav-link text-blu" href="#"><i class="bi bi-wrench-adjustable-circle-fill me-2"></i> Something else here</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed fs-4 text-blu" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
              <i class="bi bi-envelope-fill me-2"></i> Contatti
            </button>
          </h2>
          <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <ul class="list-unstyled fs-4">
                <li><a class="dropdown-item nav-link text-blu" href="#"><i class="bi bi-telephone-fill me-2"></i> Action</a></li>
                <li><a class="dropdown-item nav-link text-blu" href="#"><i class="bi bi-chat-dots-fill me-2"></i> Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item nav-link text-blu" href="#"><i class="bi bi-geo-alt-fill me-2"></i> Something else here</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
{{-- menu offcanvas utente --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="userOffCanvas" aria-labelledby="userOffCanvasLabel">
    @guest
    <div class="offcanvas-header">
      <a href="/">
        <img src="/IMAGES/LOGO-SENZA-SFONDO.png" alt="" class="" height="50">
      </a>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body py-0 text-center">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center w-100 align-items-center h-75">
        <li class="nav-item">
          <a href="{{route('login')}}">
            <button class="btn btn-register text-blu fs-3">Login <i class="bi bi-box-arrow-in-right"></i></button>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('register')}}">
            <button class="btn btn-register text-blu fs-3">Registrati <i class="bi bi-person-plus"></i></button>
          </a>
        </li>
      </ul>
      </div>
      <div class="offcanvas-footer">
        <br>
      </div>
    </div>
    @endguest
    @auth
        <div class="offcanvas-header">
          <a href="/">
            <img src="/IMAGES/LOGO-SENZA-SFONDO.png" alt="" class="" height="50">
          </a>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center w-100 align-items-center h-75">
            <h2 class="offcanvas-title text-blu" id="userOffCanvasLabel">Benvenuto <span class="text-verde">{{Auth::user()->name}}</span></h2>
            <li class="nav-item">
              <a class="nav-link text-blu scalebig fs-3"  role="button" aria-expanded="false">
                <i class="bi bi-person-lines-fill"></i>  Profilo
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-blu scalebig fs-3" href="#" role="button" aria-expanded="false">
                <i class="bi bi-cart"></i>  Ordini
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-blu scalebig fs-3" href="#" role="button" aria-expanded="false">
                <i class="bi bi-heart"></i>  Preferiti
              </a>
            </li>
            <button type="button" class="btn scalebig btn-register text-blu fs-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              <i class="bi bi-box-arrow-left"></i> Esci 
            </button>
          </ul>
        </div>
        <div class="offcanvas-footer text-blu">

        </div>
    </div>

    {{-- modal logout --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-4 text-center" id="staticBackdropLabel">Vuoi uscire?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-footer justify-content-start">
            <button type="button" class="btn btn-base " data-bs-dismiss="modal">Torna indietro.</button>
            <form action="{{route('logout')}}" method="POST">
              @csrf
              <button class="btn btn-rosso bg-rosso text-white" data-bs-dismiss="modal">Si, esci.</button>
            </form>
          </div>
        </div>
      </div>
    @endauth

  </div>
