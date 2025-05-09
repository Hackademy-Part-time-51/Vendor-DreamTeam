 <div class="col bg-white d-flex flex-column p-0">
     <div class="tab-content h-100" id="v-pills-tabContent">
         @if ($messages)

            

                 @foreach ($messages as $message)
                     <div
                         class="mb-2
                             @if ($message->sender_id == Auth::id()) text-end bg-primary 
                                     @else
                                     text-start bg-light @endif
                             ">
                         <div class=" fst-italic">@if ($message->sender_id == Auth::id())
                             Tu
                         @else
                             {{$message->sender->name}}
                         @endif </div>
                         {{-- {{dd($message)}} --}}
                         <span>{{ $message->message }}</span>
                     </div>
                 @endforeach
             @else
                 <div class="text-center  my-5">Nessun messaggio ancora.</div>
         @endif
     </div>
     <!-- Chat Input -->
     <form wire:submit="sendMessage" class="border-top p-3 d-flex bg-white flex-shrink-0" style="height:72px;">
         <input type="text" wire:model.live="text" class="form-control me-2" placeholder="Scrivi un messaggio..." autocomplete="off">
         <button class="btn btn-primary" type="submit">Invia</button>
     </form>
 </div>
 {{-- @endif --}}

 </div>
 </div>
