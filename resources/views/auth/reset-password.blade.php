<x-layout>
    {{-- Alert per messaggi di sessione o errori --}}
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show text-center display-6" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container text-blu mb-3 py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 text-center">
                <h1 class="card-title display-3 my-3">Imposta Nuova Password</h1>
                <p class="fs-4 text-muted mb-5">
                    Crea una nuova password sicura per il tuo account.
                </p>
                <hr class="mb-5">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card bg-blu text-white border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <i class="bi bi-shield-lock-fill display-3 text-white"></i>
                        </div>
                        <h2 class="card-title text-center mb-4">Crea la tua Nuova Password</h2>
                        
                        <form method="POST" action="{{ route('password.update') }}"> {{-- Rotta standard di Laravel per aggiornare la password --}}
                            @csrf

                            {{-- Token (nascosto) --}}
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            {{-- Campo Email (nascosto o readonly, precompilato) --}}
                            <div class="form-floating mb-4">
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email"
                                       placeholder="La tua email" 
                                       required 
                                       value="{{ old('email', $request->email) }}"
                                       readonly> {{-- O usa type="hidden" se non vuoi mostrarlo --}}
                                <label for="email">Indirizzo Email</label>
                                @error('email')
                                    <div class="invalid-feedback bg-white text-danger p-2 rounded mt-1">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Campo Nuova Password --}}
                            <div class="form-floating mb-4">
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password"
                                       placeholder="Nuova Password" 
                                       required 
                                       autofocus>
                                <label for="password">Nuova Password</label>
                                @error('password')
                                    <div class="invalid-feedback bg-white text-danger p-2 rounded mt-1">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Campo Conferma Nuova Password --}}
                            <div class="form-floating mb-4">
                                <input type="password" 
                                       class="form-control" 
                                       id="password_confirmation" 
                                       name="password_confirmation"
                                       placeholder="Conferma Nuova Password" 
                                       required>
                                <label for="password_confirmation">Conferma Nuova Password</label>
                                {{-- L'errore per password_confirmation è solitamente gestito insieme a quello di password --}}
                            </div>

                            {{-- Bottone Invio --}}
                            <div class="d-grid">
                                <button type="submit" class="btn btn-add text-white border scalebig btn-lg w-100 py-3">
                                    <i class="bi bi-check-circle-fill me-2"></i>Resetta Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
