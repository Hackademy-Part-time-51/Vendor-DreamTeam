<div class="col bg-white d-flex flex-column p-0">
    <div class="tab-content h-100 d-flex flex-column" id="v-pills-tabContent">
        @if (!$messages->isEmpty())
            <!-- Chat Messages -->
            <div class="flex-grow-1 overflow-auto p-3" style="background: #f8f9fa; height: calc(100vh - 128px);">
                @foreach ($messages as $message)
                    <div class="mb-2 d-flex 
                        @if ($message->sender_id == Auth::id()) justify-content-end @else justify-content-start @endif">
                        <div class="d-inline-block px-3 py-2 rounded-pill shadow-sm
                            @if ($message->sender_id == Auth::id()) bg-primary text-white @else bg-light text-dark @endif">
                            <div class="small fw-bold">
                                @if ($message->sender_id == Auth::id()) Tu
                                @else {{$message->sender->name}} @endif
                            </div>
                            <span>{{ $message->message }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center my-5 text-muted">Nessun messaggio ancora.</div>
        @endif
    </div>

    <!-- Chat Input -->
    <form wire:submit="sendMessage" class="border-top p-3 d-flex bg-white flex-shrink-0" style="height: 72px;">
        <input type="text" wire:model.live="text" class="form-control me-2 rounded-pill shadow-sm" placeholder="Scrivi un messaggio..." autocomplete="off">
        <button class="btn btn-primary rounded-pill px-4 shadow-sm" type="submit">Invia</button>
    </form>
</div>

 {{-- @endif --}}

