<form wire:submit="store">
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control" id="title" wire:model="title" value="{{ product->title }}">
    </div>
    <div class="mb-3">
        <label for="descrizione" class="form-label">Descrizione</label>
        <textarea class="form-control" id="descrizione" rows="3" wire:model="description"> {{ product->description }}</textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="email" class="form-control" id="price" wire:model="price" value="{{ product->price }}">
    </div>
    <button>Modifica</button>
</form>
