<div class="card mb-4">
    <div class="card-header bg-white">
      @if ($showAll)
      <h5 class="card-title mb-0 fs-4 text-center">{{__('user.allPost')}}</h5>
      @else
      <h5 class="card-title mb-0 fs-4 text-center">{{__('user.lastPost')}}</h5>
      @endif
    </div>
    <div class="col-12">
        <div class="row g-3">
            @if ($products->isEmpty())
            <div class="col-12 ">
                <p class="alert alert-info w-100 text-center my-3">{{__('user.noProduct')}} <br> 
                {{__('user.click')}} <a href="{{ route('products.create') }}" class="text-decoration-none">{{__('user.here')}}</a> {{__('user.addProduct')}}
                </p>
            </div>
            @else
            @foreach ($products as $product)
            @if ($product->is_accepted == 1 || Auth::id() == $product->user_id || Auth::user()->is_revisor==1 )
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 d-flex border-0">
                <div class="card p-3 ">
    
                    <img src="https://picsum.photos/id/{{ rand(1, 50) }}/1920/1080" class="card-img-top" alt="...">
    
                    <div class="card-body text-center">
                        <h5 class="card-title"><a href="{{ route('products.show', $product->id) }}" class="text-decoration-none">{{ Str::limit($product->title, 21) }}</a></h5>
                        <p class="card-text">{{ Str::limit($product->description, 20) }}</p>
                    </div>
                    @if (Auth::id() == $product->user_id || Auth::user()->is_revisor == 1)
                    @if ($product->is_accepted === 1)
                    <li class="list-group-item text-center">
                        <span class="badge rounded-pill text-bg-success"> <i
                                class="bi bi-check-circle-fill me-2"></i>{{__('revisor.accepted')}}</span>
                    </li>
                    @elseif($product->is_accepted === 0)
                    <li class="list-group-item text-center">
                        <span class="badge rounded-pill text-bg-danger"> <i
                                class="bi bi-x-circle-fill me-2"></i>{{__('revisor.notAccepted')}}</span>
                    </li>
                    @elseif ($product->is_accepted === null)
                    <li class="list-group-item text-center">
                        <span class="badge rounded-pill text-bg-warning"> <i
                                class="bi bi-x-circle-fill me-2"></i>{{__('revisor.inProgress')}}</span>
                    </li>
                    @endif
                        <div class="card-body d-flex justify-content-center gap-1 align-items-center">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-base"><i class="bi bi-pen"></i></a>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalDeleteProduct"
                                class="btn btn-rosso">
                                <i class="bi bi-trash"></i>
                            </button>
                            <div class="modal fade" id="modalDeleteProduct" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDeleteProductLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-4 text-center" id="modalDeleteProductLabel">
                                                {{__('user.deleteArticle')}}
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer justify-content-start">
                                            <button type="button" class="btn btn-base" data-bs-dismiss="modal">
                                                {{__('user.goBack')}}
                                            </button>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-rosso">{{__('revisor.delete')}}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @else 
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 d-flex border-0">
                <div class="card p-3 ">
    
                    <img src="https://picsum.photos/id/{{ rand(1, 50) }}/1920/1080" class="card-img-top" alt="...">
    
                    <div class="card-body text-center">
                        <h5 class="card-title"><a href="{{ route('products.show', $product->id) }}" class="text-decoration-none">{{ Str::limit($product->title, 21) }}</a></h5>
                        <p class="card-text">{{ Str::limit($product->description, 20) }}</p>
                    </div>
    
                    @if (Auth::id() == $product->user_id || Auth::user()->is_revisor == 1)
                        <div class="card-body d-flex justify-content-center gap-1 align-items-center">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-base">{{__('edit')}}</a>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalDeleteProduct"
                                class="btn btn-rosso">
                                {{__('revisor.delete')}}
                            </button>
    
                            <div class="modal fade" id="modalDeleteProduct" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDeleteProductLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-4 text-center" id="modalDeleteProductLabel">
                                                {{__('user.deleteArticle')}}
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer justify-content-start">
                                            <button type="button" class="btn btn-base" data-bs-dismiss="modal">
                                                {{__('user.goBack')}}
                                            </button>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-rosso">{{__('revisor.delete')}}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @endif
            @endforeach
            @if ($showAll)
            {{$products->links()}}
                
            @endif
            <div class="d-flex justify-content-center pb-3">
                @if ($showAll)
                <button class="btn btn-base btn-lg w-75" wire:click ="showAllFunction">{{__('user.lastThree')}}</button> 
                @else
                <button class="btn btn-base btn-lg w-75" wire:click ="showAllFunction">{{__('user.showAll')}}</button>
                @endif
            </div>
            @endif

        </div>
        {{-- <div class="mt-3">
          {{$products->links()}}
      </div> --}}
    </div>
</div>

