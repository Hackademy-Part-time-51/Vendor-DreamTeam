<div class="row">
    <div class="col-12  bg-light border-bottom d-flex flex-column px-3" >
        <div class="d-flex justify-content-between align-items-center p-3 border-bottom flex-shrink-0">
            <h5 class="mb-0 fs-2 text-center w-100">Chat</h5>
        </div>
        <div class="nav nav-pills flex-row overflow-auto flex-nowrap  px-2" id="v-pills-tab" role="tablist" aria-orientation="horizontal" style="gap: 1rem;">
            @foreach ($chats as $i => $chat)
                @if ($chat['product']['user_id'] === Auth::user()->id || $chat['product']['user_id'] === $chat['user']['id'])
                    <button wire:click="selectChat({{ $chat['product']['id'] }},{{ $chat['user']['id'] }})"
                        class="nav-link text-start d-flex flex-column align-items-center {{ $i === 0 ? 'active' : '' }}"
                        id="v-pills-{{ $chat['product']['id'] }}-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-{{ $chat['product']['id'] }}" type="button" role="tab"
                        aria-controls="v-pills-{{ $chat['product']['id'] }}"
                        aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                        style="min-width: 100px;">
                        <img src="https://picsum.photos/seed/{{ $chat['user']['id'] ?? $i }}/40" alt="avatar"
                            class="rounded-circle mb-1" width="40" height="40">
                        <div class="text-center">
                            <div class="fw-bold small">{{ $chat['user']['name'] }}</div>
                            <span class="badge bg-success">{{ $chat['msgNotRead'] }}</span>
                            <div><small class="text-muted">Prodotto n°: {{ $chat['product']['id'] }}</small></div>
                        </div>
                    </button>
                @endif
            @endforeach
        </div>
    </div>
    @livewire('user.chat-area', compact('product'))
</div>
