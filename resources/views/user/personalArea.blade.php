<x-layout>
  {{-- prima sezione --}}
    <div class="container-fluid">
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
            <div class="col-12 col-lg-8">

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