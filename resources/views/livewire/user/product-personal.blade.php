<div class="card mb-4">
  <div class="card-header bg-white"> @if ($showAll) <h5 class="card-title mb-0 fs-4 text-center">{{__('user.allPost')}}</h5> @else <h5 class="card-title mb-0 fs-4 text-center">{{__('user.lastPost')}}</h5> @endif </div>
  <div class="col-12">
    <div class="row g-3"> @if ($products->isEmpty()) <div class="col-12 ">
        <p class="alert alert-info w-100 text-center my-3">{{__('user.noProduct')}}
          <br> {{__('user.click')}}
          <a href="{{ route('products.create') }}" class="text-decoration-none">{{__('user.here')}}</a> {{__('user.addProduct')}}
        </p>
      </div> @else @foreach ($products as $product) @if ($product->is_accepted == 1 || Auth::id() == $product->user_id || Auth::user()->is_revisor == 1) <div class="col-12 col-sm-12 col-md-6 col-lg-4 d-flex border-0">
        <div class="card h-100 border-0 shadow-sm">
          <div class="position-relative">
            <div id="productImageCarouselCollapse{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner rounded-top"> @if ($product->images()->count() == 0) @for ($i = 0; $i < 3; $i++) <div class="carousel-item @if ($i == 0) active @endif" data-bs-interval="5000">
                  <img src="https://picsum.photos/1080/1080?random={{ random_int(1, 1000) }}" class="img-fluid d-block w-100 object-fit-cover" alt="Immagine Placeholder {{ $i + 1 }}" loading="lazy" width="300" height="300">
              </div> @endfor @else @foreach ($product->images as $key => $image) <div class="carousel-item @if ($key == 0) active @endif" data-bs-interval="5000">
                <img src="{{ Storage::url($image->path) }}" class="img-fluid d-block w-100 object-fit-cover" alt="{{ $product->name ?? 'Immagine Prodotto' }} {{ $key + 1 }}" loading="lazy" width="300" height="300">
              </div> @endforeach @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#productImageCarouselCollapse{{ $product->id }}" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#productImageCarouselCollapse{{ $product->id }}" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
            <div class="carousel-indicators"> @foreach ($product->images as $key => $image) <button type="button" data-bs-target="#productImageCarouselCollapse{{ $product->id }}" data-bs-slide-to="{{ $key }}" class="@if ($key == 0) active @endif" aria-current="@if ($key == 0) true @endif" aria-label="Slide {{ $key + 1 }}"></button> @endforeach </div>
          </div>
          <div class="position-absolute top-0 start-0 m-2 z-1">
            <span class="badge rounded-pill bg-warning text-dark px-3 py-2">
              <i class="bi bi-tags-fill me-1"></i>{{ __($product->category->name) }}
            </span>
          </div>
        </div>
        <div class="card-body p-3 d-flex flex-column">
          <h5 class="card-title fw-bold mb-2 text-truncate">
            <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none"> {{ Str::limit($product->title, 20) }} </a>
          </h5>
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="fw-bold fs-5 text-blu">€ {{ number_format($product->price, 2, ',', '.') }}</span>
          </div>
          <div class="collapse" id="userInfoCollapse{{ $product->id }}">
            <div class="bg-light p-3 rounded mb-3 text-center"> @if ($product->user->profile_image) <img src="{{ asset('storage/' . $product->user->profile_image) }}" class="rounded-circle mb-2" width="60" height="60" alt="User Avatar"> @else <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/480" class="rounded-circle mb-2" width="60" height="60" alt="User Avatar"> @endif <a href="{{ route('personalArea', $product->user->id) }}" class="mb-0 fw-semibold text-blu text-decoration-none">{{ $product->user->name }}</a>
            </div>
          </div>
          <div class="mt-auto d-flex justify-content-center align-items-center gap-2"> @if (Auth::id() == $product->user_id || Auth::user()->is_revisor == 1) <a href="{{ route('products.edit', $product->id) }}" class="btn btn-base">
              <i class="bi bi-pen"></i>
            </a>
            <button type="button" data-bs-toggle="modal" data-bs-target="#modalDeleteProduct{{ $product->id }}" class="btn btn-rosso">
              <i class="bi bi-trash"></i>
            </button>
            <div class="modal fade" id="modalDeleteProduct{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDeleteProductLabel{{ $product->id }}" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-4 text-center" id="modalDeleteProductLabel{{ $product->id }}"> {{__('user.deleteArticle')}} </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-base" data-bs-dismiss="modal"> {{__('user.goBack')}} </button>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"> @csrf @method('DELETE') <button type="submit" class="btn btn-rosso">{{__('revisor.delete')}}</button>
                    </form>
                  </div>
                </div>
              </div>
            </div> @endif
          </div>
        </div>
      </div>
    </div> @endif @endforeach 
    <div class="d-flex justify-content-center pb-3"> @if ($showAll) 
      <button class="btn btn-base btn-lg w-75" wire:click="showAllFunction">
        <span> {{__('user.lastThree')}} </span>
      </button> 
      @else 
      <button class="btn btn-base btn-lg w-75" wire:click="showAllFunction">
        <span> {{__('user.showAll')}} </span>
      </button> 
      @endif 
    </div> 
    @endif
  </div> 
 </div>
</div>