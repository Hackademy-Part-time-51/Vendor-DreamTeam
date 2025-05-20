<div class="container-fluid py-4">
    <form wire:submit="update">
        <div class="d-block d-lg-none mb-4">
            <div class="text-center">
                <h1 class="display-6 mb-3">{{__('product.editProduct')}}</h1>
                @if ($product->category)
                    <span class="badge bg-warning px-3 py-2 rounded-pill">
                        <i class="bi bi-pencil-fill me-2"></i>{{__('product.underModification')}}
                    </span>
                @endif
            </div>
        </div>

        <div class="row g-4">
            <div class="col-12 col-lg-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 d-none d-lg-block">
                        <div class="text-center">
                            <h1 class="display-6 mb-3">{{__('product.editProduct')}}</h1>
                            <span class="badge bg-warning px-3 py-2 rounded-pill">
                                <i class="bi bi-pencil-fill me-2"></i>{{__('product.underModification')}}
                            </span>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div id="productImageCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner rounded-3">
                            @if ($product->images()->count() > 0)
                                @foreach ($product->images as $key => $image)
                                    <div class="carousel-item @if($loop->first) active @endif">
                                        
                                        <img src="{{$image->getUrl(1000, 1000)}}"
                                            class="d-block w-100"
                                            style="aspect-ratio: 16/9; object-fit: contain;"
                                            alt="Immagine prodotto {{ $key + 1 }}">
                                    </div>
                                @endforeach
                            @else
                                @for ($i = 0; $i < 3; $i++)
                                    <div class="carousel-item @if($i == 0) active @endif">
                                        <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/1000"
                                            class="d-block w-100"
                                            style="aspect-ratio: 16/9; object-fit: contain;"
                                            alt="Immagine placeholder {{ $i + 1 }}">
                                    </div>
                                @endfor
                            @endif
                        </div>
                            <button class="carousel-control-prev bg-blu" type="button" data-bs-target="#productImageCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next bg-blu" type="button" data-bs-target="#productImageCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon "></span>
                            </button>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 p-3">
                    <div class="row g-2">
                        @if ($product->images()->count() > 0)
                            @foreach ($product->images as $key => $image)
                                <div class="col-4">
                                    <img src="{{$image->getUrl(1000, 1000)}}"
                                        class="img-fluid rounded cursor-pointer"
                                        style="aspect-ratio: 16/9; object-fit: contain;"
                                        data-bs-target="#productImageCarousel{{ $product->id }}"
                                        data-bs-slide-to="{{ $key }}"
                                        alt="Thumbnail {{ $key + 1 }}">
                                </div>
                            @endforeach
                        @else
                            @for ($i = 0; $i < 3; $i++)
                                <div class="col-4">
                                    <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/1000"
                                        class="img-fluid rounded cursor-pointer"
                                        style="aspect-ratio: 16/9; object-fit: contain;"
                                        data-bs-target="#productImageCarousel{{ $product->id }}"
                                        data-bs-slide-to="{{ $i }}"
                                        alt="Thumbnail {{ $i + 1 }}">
                                </div>
                            @endfor
                        @endif
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show mb-4">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li><i class="bi bi-exclamation-circle me-2"></i>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        <div class="mb-4">
                            <label class="form-label h4">{{__('product.title')}}</label>
                            <input type="text" 
                                   class="form-control form-control-lg" 
                                   wire:model="title"
                                   placeholder="{{$product->title}}" 
                                   required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label h4">{{__('product.category')}}</label>
                            <select wire:model="category_id" class="form-select form-select-lg">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" 
                                            @selected($product->category_id == $category->id)>
                                        {{__('category.' . $category->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label h4">{{__('product.description')}}</label>
                            <textarea wire:model="description" 
                                      class="form-control form-control-lg" 
                                      rows="4">{{ $product->description }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label h4">{{__('product.price')}}</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text">€</span>
                                <input type="number" wire:model="price" class="form-control" step="0.01" value="{{$product->price}}">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="myInput" class="form-label h4 d-flex flex-column justify-content-between">{{__('product.chooseCity')}}
                            </label>
                            <div class="input-group d-flex flex-column input-group-lg ">
                                <input id="myInput" type="text" class="form-control w-100" placeholder="Città"
                                    value="{{ $product->city }}">
                                <input type="hidden" wire:model="myCity" id="idCity">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-baseblu btn-lg py-3">
                    <span>
                        <i class="bi bi-check-lg me-2"></i>{{__('product.saveModification')}}
                    </span>
                </button>
                <a href="{{ route('products.show', $product) }}" 
                   class="btn btn-rosso btn-lg py-3">
                    <i class="bi bi-x-lg me-2"></i>{{__('navbar.cancel')}}
                </a>
            </div>
        </div>
    </form>
</div>


