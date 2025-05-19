<x-layout>
    <header class="py-5 bg-blu text-white text-center">
        <div class="container">
            <i class="bi bi-people-fill display-1 mb-3"></i>
            <h1 class="display-4 fw-bold">{{ __('navbar.whoWeAre') }}</h1>
            <p class="lead">{{__('user.webStudents')}}
            </p>
        </div>
    </header>
    <section class="py-5 section-bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="fw-bold mb-3">{{__('user.ourMission')}}</h2>
                    <p class="lead text-muted">
                       {{__('user.collectiveOfCreative')}}
                    </p>
                    <p class="lead text-muted">
                       {{__('user.believeInCollaboration')}}
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
                <h2 class=" display-4 ">{{__('user.meetTheTeam')}}</h2>
                <p class="fs-4  text-muted">{{__('user.creativeMinds')}}</p>
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
                            <p class="card-text text-muted small">{{__('user.mirko')}}</p>
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
                            <p class="card-text text-muted small">{{__('user.simone')}}</p>
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
                            <p class="card-text text-muted small">{{__('user.jader')}}</p>
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
                            <p class="card-text text-muted small">{{__('user.filippo')}}</p>
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
                <h2 class="fw-bold">{{__('user.ourSkills')}}</h2>
                <p class="lead text-muted">{{__('user.createdProgect')}} <strong>Vendor</strong></p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center p-3">
                        <i class="bi bi-lightbulb-fill display-3 text-blu mb-3"></i>
                        <h4 class="fw-semibold">{{__('user.Innovation')}}</h4>
                        <p class="text-muted">{{__('user.lookingNewTechnologies')}}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-3">
                        <i class="bi bi-shield-check display-3 text-blu mb-3"></i>
                        <h4 class="fw-semibold">{{__('user.quality')}}</h4>
                        <p class="text-muted">{{__('user.attentionToDetail')}}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-3">
                        <i class="bi bi-person-hearts display-3 text-blu mb-3"></i>
                        <h4 class="fw-semibold">{{__('user.Collaboration')}}</h4>
                        <p class="text-muted">{{__('user.fundamentalPartners')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
