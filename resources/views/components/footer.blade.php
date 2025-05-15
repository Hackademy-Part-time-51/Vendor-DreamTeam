<footer class="border-top border-3 bg-white mt-auto pt-5 pb-4 bg-light shadow-sm">
    <div class="container">
        <div class="row mb-4 align-items-center text-center text-md-start">
            <div class="col-12 col-md-4 mb-4 mb-md-3">
                <h2 class="display-5 text-blu mb-1">Vendor.it</h2>
                <p class="lead text-muted mb-0">{{__('navbar.footer')}}</p>
            </div>
            <div class="col-12 col-md-4 mb-4 mb-md-3 d-flex flex-column justify-content-center align-items-center">
                
                <img src="/IMAGES/LOGO-SENZA-SFONDO.png" alt="Vendor.it Logo" height="80" class="mb-2">
                <h6 class="text-uppercase fs-2  text-blu my-3">{{__('navbar.followUs')}}</h6>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="#" class="text-blu fs-3 scalebig social-link" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="text-blu fs-3 scalebig social-link" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="text-blu fs-3 scalebig social-link" aria-label="Twitter">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="#" class="text-blu fs-3 scalebig social-link" aria-label="Linkedin">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-4 d-flex flex-column align-items-center align-items-md-end">
                <hr class="mb-4">
                <h6 class="text-uppercase display-6 text-blu mb-1">{{__('navbar.contactUs')}}</h6>
                <p class="mb-1 text-muted ">
                    <i class="bi bi-envelope me-2"></i> <a class="text-blu text-muted text-decoration-none" href="mailto:vendortestingdreamteam@gmail.com">Vendor.it</a>
                </p>
                <p class="mb-0 text-muted ">
                    <i class="bi bi-geo-alt me-2"></i> {{__('navbar.digitalNomads')}}
                </p>
            </div>
        </div>
        <hr class="mb-4">
        <div class="row">
            <div class="col-12 text-center">
                <p class="text-muted mb-0 small">
                    © {{ date('Y') }} <span class="fw-bold text-blu">Vendor.it</span> - {{__('navbar.otherFooter')}}
                </p>
            </div>
        </div>
    </div>
</footer>



