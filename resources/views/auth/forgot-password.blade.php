<x-layout>
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show text-center h-4" role="alert">
            Email inviata
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container text-blu mb-3 py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 text-center">
                <h1 class="card-title display-3 my-3">Resetta Password</h1>
                <p class="fs-4 text-muted mb-5">
                    Hai dimenticato la password? Nessun problema. Inserisci la tua email e ti invieremo un link per resettarla.
                </p>
                <hr class="mb-5">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card bg-blu text-white border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <i class="bi bi-key-fill display-3 text-white"></i>
                        </div>
                        <h2 class="card-title text-center mb-4">Richiedi Link di Reset</h2>
                        
                        <form method="POST" action="{{ route('password.email') }}"> 
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email"
                                       placeholder="La tua email" 
                                       required 
                                       value="{{ old('email') }}"
                                       autofocus>
                                <label for="email">Indirizzo Email</label>
                                @error('email')
                                    <div class="invalid-feedback bg-white text-danger p-2 rounded mt-1">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-add text-white border scalebig btn-lg w-100 py-3">
                                    <i class="bi bi-envelope-arrow-up-fill me-2"></i>Invia Link di Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>