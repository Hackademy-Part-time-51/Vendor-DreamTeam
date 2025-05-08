<x-layout>
    <div class="container py-5">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-blu text-white text-center py-4">
                <h2 class="card-title mb-0 noto-sans">
                    <i class="bi bi-file-text-fill me-2"></i> Termini e Condizioni d'Uso
                </h2>
            </div>
        
            <div class="card-body montserrat px-4">
                <p class="text-blu lead">
                    Leggi attentamente i Termini e Condizioni per comprendere le regole che governano l'utilizzo del nostro sito di compravendita tra privati.
                </p>

                <hr class="bg-blu">

                <div class="mb-4">
                    <h4 class="text-blu"><i class="bi bi-clipboard-check me-2"></i>Accettazione dei Termini</h4>
                    <p>Utilizzando il nostro sito, l'utente accetta di rispettare le condizioni qui indicate. Qualsiasi violazione può comportare la sospensione o il blocco dell'account.</p>
                </div>

                <div class="mb-4">
                    <h4 class="text-blu"><i class="bi bi-cart-check me-2"></i>Uso del Servizio</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Gli utenti possono pubblicare annunci per vendere o acquistare prodotti.</li>
                        <li class="list-group-item">È vietato l'uso del sito per attività fraudolente o ingannevoli.</li>
                        <li class="list-group-item">Gli utenti devono fornire informazioni veritiere e rispettare le normative vigenti.</li>
                    </ul>
                </div>

                <div class="mb-4">
                    <h4 class="text-blu"><i class="bi bi-exclamation-triangle-fill me-2"></i>Responsabilità dell'Utente</h4>
                    <p>Gli utenti sono responsabili del contenuto degli annunci pubblicati. La piattaforma non è responsabile per transazioni avvenute tra privati.</p>
                </div>

                <div class="mb-4">
                    <h4 class="text-blu"><i class="bi bi-shield-lock me-2"></i>Protezione dei Dati</h4>
                    <p>Il trattamento dei dati personali avviene nel rispetto della normativa vigente. Per maggiori dettagli, consulta la nostra <a href="/privacy" class="text-blu">Informativa sulla Privacy</a>.</p>
                </div>

                <div class="mb-4">
                    <h4 class="text-blu"><i class="bi bi-gear-fill me-2"></i>Modifiche ai Termini</h4>
                    <p>Ci riserviamo il diritto di aggiornare i Termini e Condizioni. Gli utenti saranno informati in caso di modifiche significative.</p>
                </div>

                <hr class="bg-blu">

                <div class="text-center mt-4">

                    @auth
                    <form action="">
                    <button class="btn btn-rosso px-4 py-2">
                        <i class="bi bi-person-x-fill me-2"></i>Disattiva il mio account
                    </button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-layout>
