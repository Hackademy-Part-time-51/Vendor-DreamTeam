<x-layout>
    <div class="container-fluid">
        @foreach ($chats as $chat)
            {{$chat['user']['name']}} - {{$chat['product']['id']}}
            <br>
        @endforeach
        {{-- <div class="row vh-100">
            <nav id="sidebar" class="col-md-4 col-lg-3 bg-light border-end p-0 collapse show">
                <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
                    <h5 class="mb-0">Messaggi 
                        @if ($chats->count() == 0)
                            <span class="badge bg-danger">{{$chats}}</span>
                        @else
                            <span class="badge bg-success">{{$chats}}</span>                            
                        @endif
                    </h5>
                    <button class="btn btn-outline-secondary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-expanded="true" aria-controls="sidebar">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                </div>
                <div class="list-group list-group-flush overflow-auto" style="height: calc(100vh - 56px);">
                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                        <img src="https://via.placeholder.com/40" alt="avatar" class="rounded-circle me-2" width="40" height="40">
                        <div>
                            <div class="fw-bold">Nome Utente</div>
                            <small class="text-muted">Ultimo messaggio...</small>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                        <img src="https://via.placeholder.com/40" alt="avatar" class="rounded-circle me-2" width="40" height="40">
                        <div>
                            <div class="fw-bold">Nome Utente 2</div>
                            <small class="text-muted">Ultimo messaggio...</small>
                        </div>
                    </a>
                </div>
            </nav>
            <main class="col bg-white d-flex flex-column p-0">
                <div class="border-bottom p-3 d-flex align-items-center">
                    <img src="https://via.placeholder.com/40" alt="avatar" class="rounded-circle me-2" width="40" height="40">
                    <div>
                        <div class="fw-bold">Nome Utente </div>
                        <small class="text-muted">Online</small>
                    </div>
                </div>
                <div class="flex-grow-1 overflow-auto p-3" style="background: #f8f9fa;">
                    <div class="mb-2 text-start">
                        <span class="d-inline-block px-3 py-2 rounded-pill bg-light">
                            Ciao, come stai?
                        </span>
                    </div>
                    <div class="mb-2 text-end">
                        <span class="d-inline-block px-3 py-2 rounded-pill bg-primary text-white">
                            Tutto bene, grazie!
                        </span>
                    </div>
                    <div class="mb-2 text-start">
                        <span class="d-inline-block px-3 py-2 rounded-pill bg-light">
                            Perfetto, allora a dopo!
                        </span>
                    </div>
                </div>
                <form action="#" method="POST" class="border-top p-3 d-flex">
                    <input type="text" class="form-control me-2" placeholder="Scrivi un messaggio..." autocomplete="off">
                    <button class="btn btn-primary" type="submit">Invia</button>
                </form>
            </main>
        </div> --}}
    </div>
</x-layout>
