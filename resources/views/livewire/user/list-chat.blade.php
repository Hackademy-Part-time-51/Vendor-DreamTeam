
<div class="row">
    {{-- MOBILE: Pulsante chat + Modal contatti --}}
    <div class="d-md-none">
        <!-- Pulsante chat fisso in basso a destra -->
        <button class="btn btn-blu rounded-circle shadow-lg position-fixed" style="bottom: 24px; right: 24px; z-index: 1050;" data-bs-toggle="modal" data-bs-target="#chatContactsModal">
            <i class="bi bi-chat-dots fs-2"></i>
        </button>
        <!-- Modal contatti/chat -->
        <div class="modal fade" id="chatContactsModal" tabindex="-1" aria-labelledby="chatContactsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-blu" id="chatContactsModalLabel">Le tue chat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="list-group list-group-flush">
                            @foreach ($chats as $i => $chat)
                                @if ($chat['product']['user_id'] === Auth::user()->id || $chat['product']['user_id'] === $chat['user']['id'])
                                    <button
                                        wire:click="selectChat({{ $chat['product']['id'] }}, {{ $chat['user']['id'] }})"
                                        class="list-group-item list-group-item-action d-flex align-items-center gap-2 py-3"
                                        data-bs-dismiss="modal"
                                    >
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($chat['user']['name']) }}&size=40&background=random"
                                            alt="avatar"
                                            class="rounded-circle border shadow-sm"
                                            width="40" height="40">
                                        <div>
                                            <div class="fw-semibold text-truncate">{{ $chat['user']['name'] }}</div>
                                            <small class="text-muted">Prodotto: #{{ $chat['product']['id'] }}</small>
                                        </div>
                                    </button>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- DESKTOP/TABLET: Sidebar chat stile WhatsApp --}}
    <div class="d-none d-md-flex flex-column bg-light col-4 border-end p-0" style=" height: 100vh;">
        <div class="p-3 border-bottom bg-white">
            <h5 class="mb-0 text-blu fw-bold">Chat</h5>
        </div>
        <div class="flex-grow-1 overflow-auto">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                @foreach ($chats as $i => $chat)
                    @if ($chat['product']['user_id'] === Auth::user()->id || $chat['product']['user_id'] === $chat['user']['id'])
                        <button
                            wire:click="selectChat({{ $chat['product']['id'] }}, {{ $chat['user']['id'] }})"
                            class="nav-link text-start d-flex align-items-center gap-2 py-2 px-3 border-0 bg-transparent"
                            id="v-pills-{{ $chat['product']['id'] }}-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#v-pills-{{ $chat['product']['id'] }}"
                            type="button"
                            role="tab"
                            aria-controls="v-pills-{{ $chat['product']['id'] }}"
                            aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                        >
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($chat['user']['name']) }}&size=40&background=random"
                                alt="avatar"
                                class="rounded-circle border shadow-sm me-2"
                                width="40" height="40">
                            <div class="flex-grow-1 min-w-0">
                                <div class="fw-semibold text-blu text-truncate">{{ $chat['user']['name'] }}</div>
                                <small class="text-muted text-truncate d-block">Prodotto: #{{ $chat['product']['id'] }}</small>
                            </div>
                        </button>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @livewire('user.chat-area')
</span>

