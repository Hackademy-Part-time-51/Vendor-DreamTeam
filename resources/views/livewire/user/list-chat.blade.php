<div class="row">
    <div class="col-12  border-bottom d-flex flex-column px-3" >
        <div class="d-flex justify-content-between align-items-center p-3 border-bottom flex-shrink-0">
            <h5 class="mb-0 display-4 text-center w-100">Lista chat 
                {{-- <span>{{$messages->where('is_read',false)->where('receiver_id',Auth::user()->id or 'sender_id',Auth::user()->id)->count() }}</span> --}}
             </h5>
        </div>
        <div class="nav nav-pills flex-row overflow-auto flex-nowrap px-2 py-2 rounded" 
        id="v-pills-tab" role="tablist" aria-orientation="horizontal" style="gap: 1rem;">

    @foreach ($chats as $i => $chat)
        @if ($chat['product']['user_id'] === Auth::user()->id || $chat['product']['user_id'] === $chat['user']['id'])
            <button 
                wire:click="selectChat({{ $chat['product']['id'] }},{{ $chat['user']['id'] }})"
                class="nav-link position-relative text-start d-flex flex-column align-items-center justify-content-between p-2 border-0 
                      {{ $i === 0 ? 'active' : '' }}"
                id="v-pills-{{ $chat['product']['id'] }}-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-{{ $chat['product']['id'] }}" type="button" role="tab"
                aria-controls="v-pills-{{ $chat['product']['id'] }}"
                aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                style="min-width: 110px; max-width: 140px; transition: box-shadow 0.2s;">
                
                <!-- Avatar con bordo -->
                <div class="position-relative mb-2">
                    <img src="https://picsum.photos/seed/{{ $chat['user']['id'] ?? $i }}/1000"
                         alt="avatar"
                         class="rounded-circle border  border-primary shadow-sm"
                         width="48" height="48">
                    @if ($chat['msgNotRead'] > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger fs-6">
                            {{ $chat['msgNotRead'] }}
                        </span>
                    @endif
                </div>
                <div class="text-center w-100" data-bs-toggle="tooltip" title="{{ $chat['user']['name'] }}">
                    <div class="fw-semibold small text-truncate" style="max-width: 100px;">
                        {{ $chat['user']['name'] }}
                    </div>
                    <div class="text-muted small text-truncate" style="max-width: 100px;">
                        <i class="bi bi-box-seam me-1"></i>
                        {{ Str::limit($chat['product']['title'], 18) }}
                    </div>
                </div>
            </button>
            @if (!$loop->last)
                <div class="vr mx-1 d-none d-md-block"></div>
            @endif
        @endif
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>

    </div>
    <hr>
    @livewire('user.chat-area', compact('product', 'user'))
</div>
