<div  id="notification"
    x-data="{ show: false }"
    x-show="show"
    x-init="$wire.on('showNotification', () => { show =true; setTimeout(() => show = false, 5000); });
            $wire.on('hideNotification', () => { show = false; });"

    class="alert alert-success mx-auto alert-dismissible fade show text-center w-25 fixed-top mt-5"
    >
           
   
        
    <button type="button" class="btn-close" wire:click="hideNotification" aria-label="Close"></button>
         
     Hai un nuovo messaggio da {{ $user->name ?? 'un utente'}} per il prodotto {{ $product->title ?? 'un prodotto'}}
     <a href="{{ route('messaggi',["id" => $product->id ??'', "user"=>$user->id ??'']) }}">Apri chat</a>
     
</div>

