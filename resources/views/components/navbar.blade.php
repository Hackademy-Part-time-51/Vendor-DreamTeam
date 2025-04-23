
<nav class="navbar py-0">
    <div class="container-fluid  fs-2 d-flex justify-content-between navbar ">
        <button class="btn fs-2 text-blu" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuOffCanvas" aria-controls="menuOffCanvas">
            <i class="bi bi-list" ></i>
        </button>
            <img src="/IMAGES/LOGO-SENZA-SFONDO.png" alt="" class="" height="90">
        <button class="btn fs-2 text-blu" type="button" data-bs-toggle="offcanvas" data-bs-target="#userOffCanvas" aria-controls="userOffCanvas">
          <i class="bi bi-person-fill"></i>
        </button>
    </div>
  </nav>
<div class="secondary-navbar-sticky d-none d-lg-block">
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid ">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-evenly w-100">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
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