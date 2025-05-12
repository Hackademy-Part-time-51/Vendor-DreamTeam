<div class="col-12 col-md-8 d-flex flex-column p-0 bg-white">
    @if ($messages)
        <!-- Header chat -->
        <div class="d-flex align-items-center gap-3 border-bottom bg-white px-3 py-2" style="min-height:56px;">
            @if (isset($messages[0]))
                <img src="https://ui-avatars.com/api/?name={{ urlencode($messages[0]->sender_id == Auth::id() ? ($messages[0]->receiver->name ?? 'Utente') : ($messages[0]->sender->name ?? 'Utente')) }}&size=40&background=random"
                    alt="avatar"
                    class="rounded-circle border shadow-sm"
                    width="40" height="40">
                <div>
                    <div class="fw-bold mb-0">
                        {{ $messages[0]->sender_id == Auth::id() ? ($messages[0]->receiver->name ?? 'Utente') : ($messages[0]->sender->name ?? 'Utente') }}
                    </div>
                    <small class="text-muted">
                        Prodotto: #{{ $messages[0]->product_id ?? '' }}
                    </small>
                </div>
            @endif
        </div>
        <!-- Messaggi -->
        <div class="flex-grow-1 overflow-auto px-2 px-md-4 py-3" style="background: #f8f9fa; min-height:0;">
            @foreach ($messages as $message)
                <div class="mb-2 d-flex @if ($message->sender_id == Auth::id()) justify-content-end @else justify-content-start @endif">
                    <div class="d-inline-block px-3 py-2 rounded-4 shadow-sm
                        @if ($message->sender_id == Auth::id()) bg-primary text-white @else bg-white border text-dark @endif"
                        style="max-width:75vw; word-break:break-word;">
                        <div class="small fw-bold fst-italic mb-1">
                            @if ($message->sender_id == Auth::id()) Tu
                            @else {{ $message->sender->name ?? 'Utente' }} @endif
                            <span class="ms-2 text-muted small">{{ $message->created_at->format('H:i') }}</span>
                        </div>
                        <span>{{ $message->message }}</span>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Input chat -->
        <form wire:submit="sendMessage" class="border-top bg-white p-2 d-flex align-items-center gap-2">
            <input type="text"
                wire:model.live="text"
                class="form-control rounded-pill shadow-sm flex-grow-1"
                placeholder="Scrivi un messaggio..."
                autocomplete="off"
                maxlength="500"
                required
            >
            <button class="btn btn-primary rounded-pill px-4 shadow-sm" type="submit" @if(!$text) disabled @endif>
                <i class="bi bi-send"></i>
            </button>
        </form>
    @else
        <div class="flex-grow-1 d-flex flex-column align-items-center justify-content-center text-muted">
            <i class="bi bi-chat-dots fs-1 mb-2"></i>
            <h3 class="fw-bold fs-2">Nessun messaggio ancora.</h3>
            <p class="fs-5">Inizia una conversazione selezionando una chat.</p>
        </div>
    @endif
</div>
