<div  id="notification"
    x-data="{ show: false }"
    x-show="show"
    x-init="$watch('show', value => console.log('show:', value)); $wire.on('showNotification', () => show = true)"
    >
   
        
    {{__('user.newMessage')}} {{ $user->name ?? 'un utente'}} {{__('user.forTheProduct')}}{{ $product->title ?? 'un prodotto'}}
    <a href="{{ route('messaggi',["id" => $product->id ??'', "user"=>$user->id ??'']) }}">{{__('user.openChat')}}</a>
    
</div>
