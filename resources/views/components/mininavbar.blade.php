  {{-- navbar fissa --}}
  <div class="secondary-navbar-sticky d-none d-lg-block z-3">
    <nav class="navbar navbar-expand-lg p-2">
        <div class="container-fluid ">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-evenly w-100 align-items-center">
                {{-- prodotti --}}
                <li class="nav-item dropdown">
                    <a class="nav-link text-blu scalebig  fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-box-seam me-2"></i> Prodotti
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item " href="#">Prodotti in promo <i class="bi bi-piggy-bank"></i></a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Trend della settimana <i class="bi bi-calendar4-week"></i></a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Tutti i prodotti <i class="bi bi-list-task"></i></a></li>
                    </ul>
                </li>
                {{-- categorie --}}
                <li class="nav-item dropdown">
                    <a class="nav-link text-blu scalebig  fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-tags-fill me-2"></i>  Categorie
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
                {{-- area personale --}}
                <li class="nav-item dropdown">
                    <a class="nav-link text-blu scalebig  fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-person-circle me-2"></i> Area personale
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item text-blu" href="#"><i class="bi bi-person-lines-fill"></i> Profilo</a>
                      </li>
                      <li>
                        <a class="dropdown-item text-blu" href="#"><i class="bi bi-cart"></i> Ordini</a>
                      </li>
                      <li>
                        <a class="dropdown-item text-blu" href="#"><i class="bi bi-heart"></i> Preferiti</a>
                      </li>
                      <li>
                        <a class="dropdown-item text-blu" href="#"><i class="bi bi-box-arrow-left"></i> Esci</a>
                      </li>
                    </ul>
                </li>
                {{-- assistenza --}}
                <li class="nav-item dropdown">
                    <a class="nav-link text-blu scalebig  fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-question-circle-fill me-2"></i> Assistenza
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-blu" href="#">Action</a></li>
                    <li><a class="dropdown-item text-blu" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-blu" href="#">Something else here</a></li>
                    </ul>
                </li>
                {{-- contatti --}}
                <li class="nav-item dropdown">
                    <a class="nav-link text-blu scalebig  fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-envelope-fill me-2"></i> Contatti
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-blu" href="#">Action</a></li>
                    <li><a class="dropdown-item text-blu" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-blu" href="#">Something else here</a></li>
                    </ul>
                </li>
                {{-- aggiungi articolo --}}
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