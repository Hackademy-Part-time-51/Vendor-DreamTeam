<div  id="notification"
    x-data="{ show: false }"
    x-show="show"
    x-init="$watch('show', value => console.log('show:', value)); $wire.on('showNotification', () => show = true)"
    >
   
        
    Hai un nuovo messaggio da {{ $user->name ?? 'un utente'}} per il prodotto {{ $product->title ?? 'un prodotto'}}
    <a href="{{ route('messaggi',["id" => $product->id ??'', "user"=>$user->id ??'']) }}">Apri chat</a>
    
</div>
