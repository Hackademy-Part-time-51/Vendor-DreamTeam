<x-layout>
    <header class="py-5 bg-blu text-white text-center">
        <div class="container">
            <i class="bi bi-people-fill display-1 mb-3"></i>
            <h1 class="display-4 fw-bold">{{ __('navbar.whoWeAre') }}</h1>
            <p class="lead">4 studenti di sviluppo web uniti dalla passione per la tecnologia e il mondo di internet.
            </p>
        </div>
    </header>
    <section class="py-5 section-bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="fw-bold mb-3">La Nostra Missione</h2>
                    <p class="lead text-muted">
                        Siamo un collettivo di sviluppatori web creativi e orientati ai risultati, spinti dalla passione
                        per la tecnologia e l'innovazione. La nostra missione è creare una piattaforma di vendita che
                        connetta privati e aziende in un ambiente sicuro e affidabile, dove ogni articolo viene
                        controllato da un team di revisori esperti.
                    </p>
                    <p class="lead text-muted">
                        Crediamo nella collaborazione, nella trasparenza e nell'apprendimento continuo per offrire una
                        soluzione intuitiva e performante. La nostra piattaforma favorisce un dialogo diretto tra
                        venditori e acquirenti grazie a una chat in tempo reale, garantendo un'esperienza fluida e
                        sicura per tutti.
                    </p>

                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 text-center">
                    <img src="{{ asset('IMAGES/LOGO-SENZA-SFONDO.png') }}" class="img-fluid rounded " alt="Vendor">
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class=" display-4 ">Incontra il Team</h2>
                <p class="fs-4  text-muted">Le menti creative dietro Vendor.</p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Membro Team 1 -->
                <div class="col-md-6 col-lg-3 d-flex">
                    <div class=" border-0 text-center flex-fill">
                        <div class="card-body p-4">
                            <img src="{{ asset('IMAGES/Mirko.jpg') }}"
                                class="rounded-circle img-thumbnail team-member-img mb-3" alt="Mirko Allocca">
                            <h4 class="card-title fw-bold mb-1">Mirko Allocca</h4>
                            <p class=" mb-2">Backend Developer</p>
                            <p class="card-text text-muted small">Ho progettato e ottimizzato la gestione dei dati con
                                MySQL, garantendo prestazioni elevate, sicurezza e scalabilità per un'infrastruttura
                                solida ed efficiente.</p>
                            <div class="mt-3">
                                <a target="_blank" href="https://www.linkedin.com/in/mirko-allocca-945bbb336/"
                                    class="text-secondary social-icon me-3"><i class="bi bi-linkedin"></i></a>
                                <a target="_blank" href="https://github.com/mirkoall04"
                                    class="text-secondary social-icon me-3"><i class="bi bi-github"></i></a>
                                <a target="_blank" href="tel:+39 3347239152" class="text-secondary social-icon me-3"><i
                                        class="bi bi-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Membro Team 2 -->
                <div class="col-md-6 col-lg-3 d-flex">
                    <div class=" border-0 text-center flex-fill">
                        <div class="card-body p-4">
                            <img src="{{ asset('IMAGES/Simo.jpg') }}"
                                class="rounded-circle img-thumbnail team-member-img mb-3" alt="Simone D'Amico">
                            <h4 class="card-title fw-bold mb-1">Simone D'Amico</h4>
                            <p class=" mb-2">Backend Developer</p>
                            <p class="card-text text-muted small">Ho sviluppato la logica backend con PHP e Livewire,
                                creando un sistema reattivo e performante che gestisce in modo fluido le operazioni e
                                l'interazione utente.</p>
                            <div class="mt-3">
                                <a target="_blank" href="https://www.linkedin.com/in/simone-d-amico-b42851343/"
                                    class="text-secondary social-icon me-3"><i class="bi bi-linkedin"></i></a>
                                <a target="_blank" href="https://github.com/symon90"
                                    class="text-secondary social-icon me-3"><i class="bi bi-github"></i></a>
                                <a target="_blank" href="tel:+39 3457776417" class="text-secondary social-icon me-3"><i
                                        class="bi bi-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Membro Team 3 -->
                <div class="col-md-6 col-lg-3 d-flex">
                    <div class=" border-0 text-center flex-fill">
                        <div class="card-body p-4">
                            <img src="{{ asset('IMAGES/Jader.jpg') }}"
                                class="rounded-circle img-thumbnail team-member-img mb-3" alt="Jader Daniotti">
                            <h4 class="card-title fw-bold mb-1">Jader Daniotti</h4>
                            <p class=" mb-2">Frontend Developer</p>
                            <p class="card-text text-muted small">Ho progettato la grafica e ottimizzato l'interfaccia
                                per un'esperienza fluida e performante, integrando Livewire, JavaScript e Bootstrap per
                                una struttura dinamica e reattiva con tempi di caricamento ridotti.</p>
                            <div class="mt-3">
                                <a target="_blank" href="https://www.linkedin.com/in/jader-daniotti-0a00b9328/"
                                    class="text-secondary social-icon me-3"><i class="bi bi-linkedin"></i></a>
                                <a target="_blank" href="https://github.com/jaderdaniotti"
                                    class="text-secondary social-icon me-3"><i class="bi bi-github"></i></a>
                                <a target="_blank" href="tel:+39 3513152008" class="text-secondary social-icon me-3"><i
                                        class="bi bi-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Membro Team 4 -->
                <div class="col-md-6 col-lg-3 d-flex">
                    <div class=" border-0 text-center flex-fill">
                        <div class="card-body p-4">
                            <img src="{{ asset('IMAGES/Filippo.jpg') }}"
                                class="rounded-circle img-thumbnail team-member-img mb-3" alt="Filippo ferrari">
                            <h4 class="card-title fw-bold mb-1">Filippo Ferrari</h4>
                            <p class=" mb-2">Backend Developer</p>
                            <p class="card-text text-muted small">Ho implementato il sistema di autenticazione con
                                Fortify, assicurando sicurezza e accessibilità, oltre a gestire le traduzioni per
                                un'esperienza multilingua intuitiva.</p>
                            <div class="mt-3">
                                <a target="_blank" href="https://www.linkedin.com/in/filippo-ferrari-dev-web-developer"
                                    class="text-secondary social-icon me-3"><i class="bi bi-linkedin"></i></a>
                                <a target="_blank" href="https://github.com/filippo-ferrari420"
                                    class="text-secondary social-icon me-3"><i class="bi bi-github"></i></a>
                                <a target="_blank" href="tel:+39 3295717988"
                                    class="text-secondary social-icon me-3"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="py-5 section-bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Le nostre Skills</h2>
                <p class="lead text-muted">Con la quale abbiamo creato il progetto <strong>Vendor</strong></p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center p-3">
                        <i class="bi bi-lightbulb-fill display-3 text-blu mb-3"></i>
                        <h4 class="fw-semibold">Innovazione</h4>
                        <p class="text-muted">Siamo costantemente alla ricerca di nuove tecnologie e approcci per
                            offrire soluzioni all'avanguardia.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-3">
                        <i class="bi bi-shield-check display-3 text-blu mb-3"></i>
                        <h4 class="fw-semibold">Qualità</h4>
                        <p class="text-muted">Poniamo la massima attenzione ai dettagli per garantire prodotti software
                            robusti, sicuri e performanti.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-3">
                        <i class="bi bi-person-hearts display-3 text-blu mb-3"></i>
                        <h4 class="fw-semibold">Collaborazione</h4>
                        <p class="text-muted">Lavoriamo a stretto contatto con i nostri clienti, considerandoli partner
                            fondamentali nel processo creativo.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
