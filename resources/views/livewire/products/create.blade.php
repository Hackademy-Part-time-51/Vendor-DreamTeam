<form wire:submit="create" class=" rounded p-3">
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
        <input type="number" class="form-control" id="price" wire:model="price" value="{{ old('price') }}">
    </div>
    <div>
        <select wire:model="category_id" id="">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button>Crea</button>
</form>
