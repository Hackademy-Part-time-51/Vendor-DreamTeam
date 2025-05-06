<div>
    @foreach (Auth::user()->searches as $search)
    <div>{{$search->search}}</div>
    <div>{{$search->created_at}}</div>
    @if ($search->category)
    <div>{{$search->category->name}}</div>
    @endif
    
    <div>Prezzo: {{$search->min_price?? 0}} - {{$search->max_price??9999}}</div>
    <button wire:click="search({{$search->id}})">Ricerca</button>
    <button wire:click="deleteSearch({{$search->id}})">Elimina</button>
@endforeach
</div>
