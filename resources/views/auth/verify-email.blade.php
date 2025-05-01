<x-layout>
    <div class="min-vh-100 d-flex align-items-center py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <div class="position-relative bg-blu text-white py-4 px-3">
                            <div class="text-center position-relative" style="z-index: 2;">
                                <i class="bi bi-shield-check display-4 mb-2"></i>
                                <h2 class="fw-bold mb-0">Verifica la tua Email</h2>
                                <p class="mb-0 text-white-50">Un ultimo passo per completare la registrazione</p>
                            </div>
                            <div class="position-absolute bottom-0 start-0 w-100" style="transform: translateY(49%)">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                    <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="card-body p-4 p-md-5">
                            @if (session('status') == 'verification-link-sent')
                                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mb-4" role="alert">
                                    <i class="bi bi-check-circle-fill me-2 fs-4"></i>
                                    <div>
                                        Abbiamo inviato un nuovo link di verifica al tuo indirizzo email!
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="text-center mb-4">
                                <div class="position-relative d-inline-block">
                                    <i class="bi bi-envelope-paper text-blu display-1"></i>
                                    <i class="bi bi-check-circle-fill text-success position-absolute bottom-0 end-0 fs-2"></i>
                                </div>
                            </div>
                            <div class="bg-light rounded-4 p-4 mb-4 text-center">
                                <h5 class="fw-bold mb-3">
                                    <i class="bi bi-info-circle me-2 text-blu"></i>
                                    Controlla la tua casella email
                                </h5>
                                <p class="mb-0 text-muted">
                                    Abbiamo inviato un'email di verifica a:
                                    <br>
                                    <span class="fw-bold text-blu">{{ Auth::user()->email }}</span>
                                </p>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="badge bg-blu rounded-circle p-2 me-2">1</div>
                                    <span>Apri la tua casella email</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="badge bg-blu rounded-circle p-2 me-2">2</div>
                                    <span>Cerca l'email da Vendor.it</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="badge bg-blu rounded-circle p-2 me-2">3</div>
                                    <span>Clicca sul link di verifica</span>
                                </div>
                            </div>$
                            <div class="d-grid gap-2">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-baseblu btn-lg w-100">
                                        <i class="bi bi-envelope-paper me-2"></i>
                                        Invia nuovo link
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('logout') }}" class="mt-1">
                                    @csrf
                                    <button type="submit" class="btn btn-rosso btn-lg w-100">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <p class="text-muted mb-0">
                            Problemi con la verifica?
                            <a href="#" class="text-decoration-none">Contatta il supporto</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

