
<div class="card p-1" >
    <div id="productImageCarousel{{$product->id}}" class="carousel slide shadow-sm " data-bs-ride="carousel">
      <div class="carousel-indicators">
          <button type="button" data-bs-target="#productImageCarousel{{$product->id}}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#productImageCarousel{{$product->id}}" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#productImageCarousel{{$product->id}}" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
  
      <div class="carousel-inner rounded"> 
          <div class="carousel-item active">
              <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/480" class="d-block w-100" alt="Immagine casuale 1">
          </div>
          <div class="carousel-item">
              <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/480" class="d-block w-100" alt="Immagine casuale 2">
          </div>
          <div class="carousel-item">
              <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/480" class="d-block w-100" alt="Immagine casuale 3">
          </div>
      </div>
  </div>
      <div class="card-body text-center">
          <h5 class="card-title">{{ Str::limit($product->title, 20) }} </h5>
          <p class="card-text">{{ Str::limit($product->description, 20) }}</p>
      </div>
      <ul class="list-group list-group-flush text-center">
          <li class="list-group-item text-center">
              <span class="badge rounded-pill text-bg-warning "> <i
                      class="bi bi-tags-fill me-2"></i>{{ $product->category->name }}</span>
          </li>
          <li class="list-group-item">
              <strong>Data:</strong> {{ $product->created_at->format('d/m/Y') }}
          </li>
          <li class="list-group-item">
              <strong>Creato da:</strong> <a class="text-decoration-none" href="{{ route('personalArea', $product->user->id) }}">{{ $product->user->name }}</a>
          </li>
          <li class="list-group-item fw-bold fs-5">
              € {{ number_format($product->price, 2, ',', '.') }}
          </li>
  
      </ul>
      <div class="card-body d-flex justify-content-center gap-1 align-items-center">
          <a href="{{ route('personalArea', $product->user->id) }}" class="btn btn-base ">
              <i class="bi bi-person-fill"></i>
          </a>
          <a href="{{ route('products.show', ['product' => $product->id]) }}" class="btn btn-base ">
              <i class="bi bi-eye"></i>
          </a>
          {{-- @auth
  
          @livewire('products.heart', ['product' => $product])
          @endauth --}}
      </div>
  
</div>

