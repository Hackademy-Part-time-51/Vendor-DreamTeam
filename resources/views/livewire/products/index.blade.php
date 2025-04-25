<div>
    <button class="btn btn-base" wire:click="orderByDate">Ordina per data</button>
    <button class="btn btn-base" wire:click="orderByAZ">Ordina per alfabeto</button>
    <div>
        <input type="text" wire:model.live="search" class="form-control w-50 mt-1" placeholder="Cerca">
    </div>
    <div>
        <select wire:model.live="category" class="form-select w-50 mt-1">
            <option value="">Tutte le categorie</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="row g-4 mt-1">
        @foreach ($products as $product)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        @if($product->description)
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        @endif
                        @if ($product->category)
                            <p class="card-text"><strong>Categoria:</strong> {{ $product->category->name }}</p>
                        @endif
                        <p class="card-text">
                            <strong>Data:</strong> {{ $product->created_at->format('d/m/Y') }}
                        </p>
                        @if($product->price)
                            <p class="card-text">
                                <strong>Prezzo:</strong> € {{ number_format($product->price, 2, ',', '.') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
