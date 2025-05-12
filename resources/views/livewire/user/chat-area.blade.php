<div class="col-12 col-md-8">
    <div class="d-md-none">
        <div class="d-flex flex-column h-100 min-vh-100 bg-white">
            @if ($messages)
                <div class="d-flex align-items-center gap-3 border-bottom bg-white px-3 py-2" style="min-height:64px;">
                    <button class="btn btn-link p-0 me-2" type="button" data-bs-toggle="modal" data-bs-target="#chatContactsModal">
                        <i class="bi bi-chevron-left fs-4"></i>
                    </button>
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
                <div class="flex-grow-1 overflow-auto px-2 py-3 d-flex flex-column-reverse" style="background: #f8f9fa;">
                    <div class="d-flex flex-column-reverse gap-2">
                        @foreach ($messages as $message)
                            <div class="d-flex @if ($message->sender_id == Auth::id()) justify-content-end @else justify-content-start @endif">
                                <div class="d-inline-block px-3 py-2 rounded-4 shadow-sm
                                    @if ($message->sender_id == Auth::id()) bg-primary text-white @else bg-white border text-dark @endif"
                                    style="max-width:80vw; word-break:break-word;">
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
                </div>
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
    </div>

    {{-- DESKTOP/TABLET: Area chat stile WhatsApp --}}
    <div class="d-none d-md-flex flex-column col-12 bg-white p-0 flex-grow-1" style="height: 100vh;">
        <div class="d-flex flex-column h-100">
            @if ($messages)
                <div class="d-flex align-items-center gap-3 border-bottom bg-white px-3 py-2" style="min-height:64px;">
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
                <div class="flex-grow-1 overflow-auto px-2 px-md-4 py-3 d-flex flex-column-reverse" style="background: #f8f9fa;">
                    <div class="d-flex flex-column gap-2">
                        @foreach ($messages as $message)
                            <div class="d-flex @if ($message->sender_id == Auth::id()) justify-content-end @else justify-content-start @endif">
                                <div class="d-inline-block px-3 py-2 rounded-4 shadow-sm
                                    @if ($message->sender_id == Auth::id()) bg-primary text-white @else bg-white border text-dark @endif"
                                    style="max-width:60vw; word-break:break-word;">
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
                </div>
                <form wire:submit="sendMessage" class="border-top bg-white p-2 px-md-4 d-flex align-items-center gap-2">
                    <input type="text"
                        wire:model.live="text"
                        class="form-control rounded-pill shadow-sm flex-grow-1"
                        placeholder="Scrivi un messaggio..."
                        autocomplete="off"
                        maxlength="500"
                        required
                    >
                    <button class="btn btn-primary rounded-pill px-4 shadow-sm" type="submit" @if(!$text) disabled @endif>
                        <i class="bi bi-send"></i> <span class="d-none d-lg-inline">Invia</span>
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
    </div>
</div>

