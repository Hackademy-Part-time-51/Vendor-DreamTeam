@php
    use App\Models\Product;
@endphp
<?php
$product = Product::all()->where('id', $product_id)->first();
?>
<div class="col-12 d-flex flex-column min-vh-50 px-3 py-2 overflow-scroll">
    <div class="d-flex align-items-center gap-3   px-3 ">
        @if ($user_id && $product_id)
            <img src="https://ui-avatars.com/api/?name={{ urlencode($userSelected->name) }}&size=40&background=random"
                alt="avatar" class="rounded-circle border shadow-sm" width="40" height="40">
            <div>
                <div class="fw-bold mb-0 ">
                    {{ $userSelected->name }}
                </div>

                <small class="text-muted text-center">
                    Prodotto: {{ $product->title }}
                </small>
            </div>
        @endif
    </div>
    @if ($messages)
        <div class="flex-grow-1 overflow-y-auto px-2 px-md-4 py-3 align-content-end">
            @foreach ($messages as $message)
                <div
                    class="mb-2 d-flex 
                @if ($message->sender_id == Auth::id()) justify-content-end 
                @else justify-content-start @endif">
                    <div class="d-inline-block px-3 py-2 rounded-4 shadow-sm
                        @if ($message->sender_id == Auth::id()) bg-blu text-white 
                        @else bg-white border text-blu @endif"
                        style="max-width:75vw; word-break:break-word;">
                        <div class="small fw-bold fst-italic mb-1">
                            @if ($message->sender_id == Auth::id())
                                {{__('user.you')}}
                            @else
                                {{ $message->sender->name ?? 'Utente' }}
                            @endif
                            <span
                                class="ms-2
                            @if ($message->sender_id == Auth::id()) text-white 
                            @else text-muted @endif
                              small">{{ $message->created_at->format('H:i') }}</span>
                        </div>
                        <span>{{ $message->message }}</span>
                    </div>
                </div>
            @endforeach
        </div>
        <form wire:submit="sendMessage" class="border-top rounded-pill bg-white p-2 d-flex align-items-center gap-2">
            <input type="text" wire:model.live="text" class="form-control rounded-pill shadow-sm flex-grow-1"
                placeholder="{{__('user.writeMessage')}}..." autocomplete="off" maxlength="500" required>
            <button class="btn btn-base rounded-pill px-4 shadow-sm" type="submit"
                @if (!$text) disabled @endif>
                <span>
                    <span wire:loading wire:target="sendMessage" class="spinner-border spinner-border-sm "
                        role="status"></span>

                    <i wire:loading.remove wire:target="sendMessage" class="bi bi-send"></i>
                </span>
            </button>
        </form>
    @else
        <div class="flex-grow-1 d-flex flex-column align-items-center justify-content-center text-muted">
            <i class="bi bi-chat-dots fs-1 mb-2 text-center"></i>
            <h3 class="fw-bold fs-2 text-center">{{__('user.StartConversation')}}</h3>
            <p class="fs-5 text-center"></p>
        </div>
    @endif
</div>
