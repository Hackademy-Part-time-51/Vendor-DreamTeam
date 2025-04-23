<form wire:submit="create">
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control" id="title" wire:model="title" value="{{ old('title') }}">
    </div>
    <div class="mb-3">
        <label for="descrizione" class="form-label">Descrizione</label>
        <textarea class="form-control" id="descrizione" rows="3" wire:model="description"> {{ old('description') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="email" class="form-control" id="price" wire:model="price" value="{{ old('price') }}">
    </div>
    <button>Crea</button>
</form>
