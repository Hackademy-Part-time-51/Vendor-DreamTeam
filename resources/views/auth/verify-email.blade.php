<x-layout>
    <div class="verification-overlay">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow border-0 rounded-3">
                        <div class="card-header bg-primary text-white py-3">
                            <h2 class="text-center mb-0 fw-bold">Verifica Email</h2>
                        </div>
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <i class="bi bi-envelope-check fs-1 text-primary"></i>
                            </div>
                            
                            @if (session('status') == 'verification-link-sent')
                                <div class="alert alert-success mb-4">
                                    Un nuovo link di verifica è stato inviato al tuo indirizzo email.
                                </div>
                            @endif
                            
                            <div class="alert alert-info mb-4">
                                <strong>Verifica richiesta</strong>
                                <p class="mb-0">Per accedere a tutte le funzionalità del sito, devi verificare il tuo indirizzo email.</p>
                            </div>
                            
                            <p class="mb-4">
                                Abbiamo inviato un link di verifica al tuo indirizzo email. 
                                Controlla la tua casella di posta e clicca sul link per completare la verifica.
                                Se non hai ricevuto l'email, puoi richiederne un'altra usando il pulsante qui sotto.
                            </p>
                            
                            <div class="d-grid gap-3">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary w-100 py-2">
                                        <i class="bi bi-envelope me-2"></i> Invia di nuovo l'email
                                    </button>
                                </form>
                                
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-secondary w-100 py-2">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>