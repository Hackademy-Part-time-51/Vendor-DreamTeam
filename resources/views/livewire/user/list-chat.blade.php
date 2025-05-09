<div class="col-12 col-md-4 col-lg-3 sidebar-scroll h-100 bg-light border-end d-flex flex-column p-0" style="max-width:350px;">
    <div class="d-flex justify-content-between align-items-center p-3 border-bottom flex-shrink-0">
        <h5 class="mb-0">Chat</h5>
    </div>
    <div
        class="nav flex-column   nav-pills flex-grow-1"
        id="v-pills-tab"
        role="tablist"
        aria-orientation="vertical"
    >    @foreach ($chats as $i=>$chat)
            @if ($chat['product']['user_id'] === Auth::user()->id || $chat['product']['user_id'] === $chat['user']['id'])
                    <button wire:click="selectChat({{$chat['product']['id']}},{{$chat['user']['id']}})" class="nav-link text-start d-flex align-items-center {{ $i === 0 ? 'active' : '' }}"
                    id="v-pills-{{$chat['product']['id']}}-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#v-pills-{{$chat['product']['id']}}"
                    type="button"
                    role="tab"
                    aria-controls="v-pills-{{$chat['product']['id']}}"
                    aria-selected="{{ $i === 0 ? 'true' : 'false' }}">
                <img src="https://picsum.photos/seed/{{$chat['user']['id'] ?? $i}}/40" alt="avatar" class="rounded-circle me-2" width="40" height="40">
                <div>
                    <div class="fw-bold">{{$chat['user']['name']}}</div>
                    <small class="text-muted">Prodotto: {{$chat['product']['id']}}</small>
                </div>
            </button>
            @endif
        @endforeach
    </div>
</div>
