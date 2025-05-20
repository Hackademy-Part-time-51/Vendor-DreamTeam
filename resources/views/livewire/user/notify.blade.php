<div id="notification" x-data="{ show: false }" x-show="show" x-init="$wire.on('showNotification', () => {
    show = true;
    setTimeout(() => show = false, 5000);
});
$wire.on('hideNotification', () => { show = false; });" class="text-center py-3 end-0 ">
    {{-- <span class="fs-3">
     {{__('user.newMessage')}} {{ $user->name ?? 'un utente'}} 
        </span> --}}
    {{-- {{__('user.forTheproduct')}} --}}
    {{-- {{ $product->title ?? 'un prodotto'}} --}}
    <a class=" mt-1 text-decoration-none w-100 fs-5  text-blu" 
        href="{{ route('messaggi', ['id' => $product->id ?? '', 'user' => $user->id ?? '']) }}">
        <span id="newMessage">
            <i class="bi bi-chat-text-fill"></i> {{ __('user.openChat') }}
        </span>
    </a>

</div>
