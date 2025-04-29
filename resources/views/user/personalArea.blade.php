<x-layout>
  <x-mininavbar></x-mininavbar>
  {{-- prima sezione --}}
    <div class="container-fluid">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
        <div class="row mt-3">
          {{-- card user --}}
            <div class="col-12 col-lg-4">
              {{-- card user --}}
                <section class="card-user animated__backInLeft">
                    <div class="card z-1 d-flex justify-content-center">
                        <div class="p-1 d-flex justify-content-center">
                            <img src="{{asset('storage/'.Auth::user()->profile_image) }}" class="card-img-top" id="foto-user-card">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center text-center text-blu">
                          <h2 class="card-title text-capitalize fw-bold">{{Auth::user()->name}}</h2>
                          <hr>
                          <p class="text-capitalize">Ruolo da aggiungere</p>
                          <p class="">{{Auth::user()->email}}</p>
                          <p class="text-capitalize">{{Auth::user()->gender}}</p>
                          <p class="">{{Auth::user()->phone}}</p>
                          <div class="d-flex justify-content-center gap-2">
                            <button class="btn btn-base w-100" data-bs-toggle="modal" data-bs-target="#editInfo">
                                <i class="bi bi-pencil-square"></i> Informazioni
                            </button>
                            <button class="btn btn-base w-100" data-bs-toggle="modal" data-bs-target="#editPass">
                                <i class="bi bi-pencil-square"></i>Password
                            </button>
                          </div>
                          <div class="d-flex justify-content-center">
                            <button class="btn  btn-rosso w-50 mt-1" data-bs-toggle="modal" data-bs-target="#deleteProfile">
                                <i class="bi bi-trash3"></i> Elimina profilo
                            </button>
                          </div>
                        </div>
                      </div>
                </section>
            </div>
            {{-- da definire --}}
            <!-- Sezione Dashboard -->
            <div class="col-12 col-lg-8">
              <div class="card shadow-sm">
                  <div class="card-body">
                      <!-- Stats Row -->
                      <div class="row g-3 mb-4">
                          <div class="col-md-4">
                              <div class="card bg-primary bg-gradient text-white">
                                  <div class="card-body">
                                      <div class="d-flex justify-content-between align-items-center">
                                          <div>
                                              <h6 class="card-subtitle mb-1">Articoli</h6>
                                              <h3 class="card-title mb-0">12</h3>
                                          </div>
                                          <i class="bi bi-file-text fs-1"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="card bg-success bg-gradient text-white">
                                  <div class="card-body">
                                      <div class="d-flex justify-content-between align-items-center">
                                          <div>
                                              <h6 class="card-subtitle mb-1">Commenti</h6>
                                              <h3 class="card-title mb-0">48</h3>
                                          </div>
                                          <i class="bi bi-chat-dots fs-1"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="card bg-info bg-gradient text-white">
                                  <div class="card-body">
                                      <div class="d-flex justify-content-between align-items-center">
                                          <div>
                                              <h6 class="card-subtitle mb-1">Likes</h6>
                                              <h3 class="card-title mb-0">156</h3>
                                          </div>
                                          <i class="bi bi-heart fs-1"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Recent Activity -->
                      <div class="card mb-4">
                          <div class="card-header bg-white">
                              <h5 class="card-title mb-0 text-center">Ultimi post</h5>
                          </div>
                          @livewire('user.product-personal', compact('products'))
                      </div>

                      <!-- Quick Actions -->
                      <div class="card">
                          <div class="card-header bg-white">
                              <h5 class="card-title mb-0">Azioni Rapide</h5>
                          </div>
                          <div class="card-body">
                              <div class="row g-3">
                                  <div class="col-md-6">
                                      <div class="d-grid">
                                          <button class="btn btn-primary">
                                              <i class="bi bi-plus-circle me-2"></i>Nuovo Articolo
                                          </button>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="d-grid">
                                          <button class="btn btn-success">
                                              <i class="bi bi-pencil-square me-2"></i>Modifica Profilo
                                          </button>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="d-grid">
                                          <button class="btn btn-info text-white">
                                              <i class="bi bi-bookmark me-2"></i>Salvati
                                          </button>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="d-grid">
                                          <button class="btn btn-warning text-white">
                                              <i class="bi bi-gear me-2"></i>Impostazioni
                                          </button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
        <hr>
        {{-- articoli creati --}}
        <div class="row">
          <div class="col-12 py-2">
            <section class="card-user row">
              <h2 class="text-center mb-3">I tuoi articoli</h2>
              @livewire('user.product-personal', compact('products'))
            </section>
          </div>
        </div>
        <hr>

        {{-- modal modifica informazioni --}}
        <div class="modal fade" id="editInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editInfoLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-2 text-center w-100" id="editInfoLabel">Modifica informazioni</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer justify-content-start">
                  <form action="{{route('user-profile-information.update')}}" method="POST" class=" d-flex flex-column justify-items-center align-content-center w-100">

                    @csrf 
                    @method('PUT')

                    <label class="fs-3 text-center mt-2" for="name">Nome:</label>
                    <input type="text" name="name" class="form-control mb-2 fs-4" value="{{Auth::user()->name}}">
                    {{ $errors->updateProfileInformation->first('name') ?? '' }}

                    <label class="fs-3 text-center mt-1" for="email">Email:</label>
                    <input type="text" name="email" class="form-control mb-2 fs-4" value="{{Auth::user()->email}}">
                    {{ $errors->updateProfileInformation->first('email') ?? '' }}

                    <button type="submit" class="btn btn-base fs-3">Aggiorna</button>

                  </form>
                </div>
              </div>
            </div>
        </div>
        {{-- modal modifica password --}}
        <div class="modal fade" id="editPass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editPassLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-2 text-center w-100" id="editPassLabel">Modifica password</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer justify-content-start">
                  <form action="{{route('user-profile-information.update')}}" method="POST" class=" d-flex flex-column justify-items-center align-content-center w-100">

                    @csrf 
                    @method('PUT')

                    <label class="fs-3 text-center mt-2" for="current_password">Vecchia password:</label>
                    <input type="password" name="current_password" class="form-control mb-2 fs-4" placeholder="Inserisci la tua password">
                    {{ $errors->updatePassword->first('current_password') ?? '' }}

                    <label class="fs-3 text-center mt-1" for="email">Nuova password:</label>
                    <input type="password" name="password" class="form-control mb-2 fs-4" placeholder="Inserisci la tua nuova password">
                    {{ $errors->updatePassword->first('password') ?? '' }}

                    <label class="fs-3 text-center mt-1" for="email">Conferma nuova password:</label>
                    <input type="password" name="password_confirmation" class="form-control mb-2 fs-4" placeholder="Conferma la tua nuova password">
                    {{ $errors->updatePassword->first('password_confirmation') ?? '' }}
                    <button type="submit" class="btn btn-base mt-1 fs-3">Aggiorna</button>

                  </form>
                </div>
              </div>
            </div>
        </div>
        {{-- modal elimina profilo --}}
        <div class="modal fade" id="deleteProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteProfileLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-2 text-center w-100" id="deleteProfileLabel">Elimina profilo</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer justify-content-start">
                    
                </div>
              </div>
            </div>
        </div>
    </div>
</x-layout>