<x-layout>
        <div class="container text-blu mb-3">
            <hr>
            {{-- sezione benefici --}}
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card bg-blu text-white border-0">
                        <div class="card-body p-5">
                            <h1 class="card-title mb-4 text-center">Perché lavorare con noi?</h1>
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-laptop fs-3 me-3 text-white"></i>
                                        <div>
                                            <h5>Smart Working</h5>
                                            <p>Flessibilità lavorativa e possibilità di lavoro da remoto</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-graph-up fs-3 me-3 text-success"></i>
                                        <div>
                                            <h5>Crescita Professionale</h5>
                                            <p>Formazione continua e opportunità di carriera</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-people fs-3 me-3 text-info"></i>
                                        <div>
                                            <h5>Team Dinamico</h5>
                                            <p>Ambiente giovane e stimolante</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row my-3">
                <div class="col-12 text-center">
                    <h1 class="mb-3">Lavora con Noi</h1>
                    <p class=" fs-4">Entra a far parte del nostro team e aiutaci a contribuire al nostro progetto.</p>
                </div>
            </div>
            {{-- form per candidarsi --}}
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card bg-blu text-white border-0">
                        <div class="card-body">
                            <h2 class="card-title text-center mb-4">Candidati</h2>
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control bg-blu text-white" id="name" name="name" placeholder="Nome" required>
                                            <label for="name" class="text-white">Nome</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control bg-blu text-white" id="surname" name="surname" placeholder="Cognome" required>
                                            <label for="surname" class="text-white">Cognome</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control bg-blu text-white" id="email" name="email" placeholder="Email" required>
                                            <label for="email" class="text-white">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="tel" class="form-control bg-blu text-white" id="phone" name="phone" placeholder="Telefono">
                                            <label for="phone" class="text-white">Telefono</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select bg-blu text-white" id="position" name="position" required>
                                                <option value=""></option>
                                                <option value="developer">Revisore</option>
                                            </select>
                                            <label for="position" class="text-white">Posizione di interesse</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-2">
                                            <textarea class="form-control  text-blu" id="experience" name="experience" style="height: 100px" placeholder="Esperienza"></textarea>
                                            <label for="experience" class="text-blu fs-6">Raccontaci di te...</label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label text-white">CV (PDF)</label>
                                        <input type="file" class="form-control bg-blu text-white" id="cv" name="cv" accept=".pdf" required>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-add text-white border scalebig btn-lg w-100">
                                            Invia Candidatura
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Open Positions Section -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card bg-blu text-white border-0">
                        <div class="card-body">
                            <h2 class="card-title mb-4">Posizioni Aperte</h2>
                            <div class="accordion" id="openPositions">
                                <!-- Position 1 -->
                                <div class="accordion-item bg-blu text-white border-secondary">
                                    <h3 class="accordion-header">
                                        <button class="accordion-button bg-blu text-white" type="button" data-bs-toggle="collapse" data-bs-target="#position1">
                                            Revisore
                                        </button>
                                    </h3>
                                    <div id="position1" class="accordion-collapse collapse show" data-bs-parent="#openPositions">
                                        <div class="accordion-body">
                                            <p></p>
                                            <ul>
                                                <li>Modificare e eliminare gli articoli</li>
                                                <li>Revisione di post e accettazioni di post nel sito</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-layout>