<div class="container">
    <hr>
    <form wire:submit="update">
        <div class="row mt-3">
            <div class="col-md-6 mb-4 mb-md-0 ">
                <div id="productImageCarousel" class="carousel slide shadow-sm " data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#productImageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#productImageCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#productImageCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
    
                    <div class="carousel-inner rounded"> 
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/1080" class="d-block w-100" alt="Immagine casuale 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/1080" class="d-block w-100" alt="Immagine casuale 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/1080" class="d-block w-100" alt="Immagine casuale 3">
                        </div>
                    </div>
    
                    <button class="carousel-control-prev" type="button" data-bs-target="#productImageCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Precedente</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productImageCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Successivo</span>
                    </button>
                </div>
            </div>

            <div class="col-md-6 align-content-center">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>  
                @endif
                <div id="editTitle text-center">
                    <label for="title" class="form-label fs-4 text-center @error('title') d-none @enderror">Titolo</label>
                    <input type="text" class="form-control mb-3 fs-4 bg-transparent" id="title"  placeholder="{{$product->title}}" wire:model="title" required>
                </div>
                <hr>
                <div class="">
                    <label for="category_id" class="form-label fs-4 text-center @error('category_id') d-none @enderror">Categoria</label>
                    <select wire:model="category_id" id="category_id" class="form-select bg-transparent fs-5">
                        <option  value="{{$product->category->id}}">{{$product->category ? $product->category->name : 'Scegli una categoria'}}</option>
                        @foreach ($categories as $category)
                              <option @selected($product->category_id == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                      </select>
                </div>
                <hr>
                <div class="">
                    <label for="category_id" class="form-label fs-4 text-center @error('category_id') d-none @enderror">Descrizione</label>
                    <textarea class="form-control fs-5 bg-transparent" id="descrizione" rows="3" wire:model="description"> {{ old('description') }}</textarea>
                </div>
                <hr>
                <label for="category_id" class="form-label fs-4 text-center @error('price') d-none @enderror">Prezzo</label>
                <input type="number" class="form-control bg-transparent fs-4" id="price" wire:model="price" value="{{ old('price') }}">
            </div>
        <button class="btn btn-base my-3 " type="submit" id="btnSaveEdit">Salva modifiche</button>
        </div>
    </form>

</div>

