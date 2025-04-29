<x-layout>
    @if(session()->has('message'))
        <div class="row">
            <div class="col-5">
                {{session('message')}}
            </div>
        </div>
    @endif
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-3">
                <div class="rounded shadow bg-body-secondary">
                    <h1 class="display-5 text-center pb-2">
                        Revisor dashboard
                    </h1>
                </div>
            </div>
            @if ($product_to_check) 
            <div class="col-9">
                <div class="row justify-content-center pt-5">
                    <div class="col-md-8">
                        <div class="row justify-content-center">
                            @for ($i = 0; $i < 9; $i++)
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    <img src="https://picsum.photos/1080/720?random={{ $i }}"
                                        class="img-fluid rounded shadow "
                                        alt="immagine segnaposto">
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                        <div>
                            <h1>{{ $product_to_check->title }}</h1> 
                            <h3>Autore: {{ $product_to_check->user->name }} </h3> 
                            <h4>{{ $product_to_check->price }}€</h4> 
                            <h4 class="fst-italic text-muted">#{{ $product_to_check->category->name }}</h4> 
                            <p class="h6">{{ $product_to_check->description }}</p> 
                        </div>
                        <div class="d-flex pb-4 justify-content-around">
                            <form action="{{ route('reject', ['product' => $product_to_check]) }}" method="POST"> 
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-danger py-2 px-5 fw-bold ">Rifiuta</button>
                            </form>
                            <form action="{{ route('accept', ['product' => $product_to_check]) }}" method="POST"> 
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-success py-2 px-5 fw-bold ">Accetta</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="row justify-content-center align-items-center height-custom text-center">
                    <div class="col-12">
                        <h1 class="fst-italic display-4">
                            Nessun articolo da revisionare
                        </h1>
                        <a href="{{ route('homepage') }}" class="mt-5 btn btn-success"> Torna all'homepage</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layout>