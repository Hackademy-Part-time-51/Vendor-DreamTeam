<div class="col-12">
  <div class="row g-3">
      @foreach ($products as $product)
          <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex border-0">
              <div class="card p-3 ">
                  <img src="https://picsum.photos/id/{{ rand(1, 50) }}/1920/1080" class="card-img-top" alt="...">
                  
                  <div class="card-body text-center">
                      <h5 class="card-title">{{Str::limit($product->title, 21)}}</h5>
                      <p class="card-text">{{Str::limit($product->description, 20)}}</p>
                  </div>

                  <div class="card-body d-flex justify-content-evenly align-items-center">
                      <a href="{{route('products.edit', $product->id)}}" class="btn btn-base">Modifica</a>
                      <button type="button" data-bs-toggle="modal" data-bs-target="#modalDeleteProduct" class="btn btn-rosso">
                          Elimina
                      </button>

                      <div class="modal fade" id="modalDeleteProduct" data-bs-backdrop="static" data-bs-keyboard="false" 
                          tabindex="-1" aria-labelledby="modalDeleteProductLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h1 class="modal-title fs-4 text-center" id="modalDeleteProductLabel">
                                          Vuoi eliminare l'articolo?
                                      </h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-footer justify-content-start">
                                      <button type="button" class="btn btn-base" data-bs-dismiss="modal">
                                          Torna indietro
                                      </button>
                                      <form action="{{route('products.destroy', $product->id)}}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-rosso">Elimina</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      @endforeach
  </div>
  <div class="mt-3">
      {{$products->links()}}
  </div>
</div>


