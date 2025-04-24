<x-layout>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12 col-lg-4">
                <section class="card-user">
                    <div class="card z-1">
                        <img src="" class="card-img-top" alt="Immagine utente">
                        <div class="card-body d-flex flex-column justify-content-center text-center text-blu">
                          <h3 class="card-title text-capitalize fw-bold">{{$user->name}}</h3>
                          <p class="">Ruolo da aggiungere</p>
                          <p class="">{{$user->email}}</p>
                          <p class="">Genere da aggiungere</p>
                          <p class="">Telefono da aggiungere</p>
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
            <div class="col-12 col-lg-8">
                <section class="card-user">
            
                </section>
            </div>
        </div>
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