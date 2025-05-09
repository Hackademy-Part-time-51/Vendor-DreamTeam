<x-layout>
    
    <div class="container-fluid">
        <div class="row vh-100">
            <!-- SIDEBAR CHAT LIST -->
            
            @livewire('user.list-chat')

            <!-- CHAT AREA -->
            @livewire('user.chat-area')
            {{-- <div class="col bg-white d-flex flex-column p-0">
                <div class="tab-content h-100" id="v-pills-tabContent">
                    @foreach ($chats as $i => $chat)
                        @if ($chat['product']['user_id'] === Auth::user()->id)
                        <div class="tab-pane fade {{ $i === 0 ? 'show active' : '' }} h-100"
                             id="v-pills-{{$chat['product']['id']}}"
                             role="tabpanel"
                             aria-labelledby="v-pills-{{$chat['product']['id']}}-tab"
                             tabindex="0"
                             style="height: 100%;">
                            <!-- Chat Header -->
                            <div class="border-bottom p-3 d-flex align-items-center flex-shrink-0" style="height:56px;">
                                <img src="https://picsum.photos/seed/{{$chat['user']['id'] ?? $i}}/40" alt="avatar" class="rounded-circle me-2" width="40" height="40">
                                <div>
                                    <div class="fw-bold">{{$chat['user']['name']}}</div>
                                    {{dd($chat['last_message'])}}
                                </div>
                            </div>
                            <!-- Chat Messages -->
                            <div class="flex-grow-1 overflow-auto p-3 d-flex flex-column" style="background: #f8f9fa; min-height:0; height:calc(100vh - 56px - 72px);">
                                @if(isset($chat['messages']))
                                    @foreach ($chat['messages'] as $message)
                                        <div class="mb-2 {{ $message['from_me'] ? 'text-end' : 'text-start' }}">
                                            <span class="d-inline-block px-3 py-2 rounded-pill {{ $message['from_me'] ? 'bg-primary text-white' : 'bg-light' }}">
                                                {{ $message['body'] }}
                                            </span>
                                            <br>
                                            <small class="text-muted fst-italic" style="font-size:11px;">
                                                {{ $message['created_at'] ?? '' }}
                                            </small>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center text-muted my-5">Nessun messaggio ancora.</div>
                                @endif
                            </div>
                            <!-- Chat Input -->
                            <form action="#" method="POST" class="border-top p-3 d-flex bg-white flex-shrink-0" style="height:72px;">
                                <input type="text" class="form-control me-2" placeholder="Scrivi un messaggio..." autocomplete="off">
                                <button class="btn btn-primary" type="submit">Invia</button>
                            </form>
                        </div>                            
                        @endif
                    @endforeach
                </div>
            </div> --}}
        </div>
    </div>
</x-layout>
