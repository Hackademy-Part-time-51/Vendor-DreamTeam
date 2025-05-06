<div>
    <hr>
    <h2 class="mb-4 text-center">{{__('product.latestProduct')}}</h2>
    <hr>
    @if ($products->isNotEmpty())
        <div class="row g-4">
            @foreach ($products as $product)
                <div class="col-12 col-md-6 col-lg-4 scalebig">
                    <x-card :product="$product" ></x-card>
                </div>
            @endforeach
        </div>
    @else
        <p class="alert alert-info">{{__('product.noProductDisplay')}}</p>
    @endif
    <div class="d-flex justify-content-center mt-4">
        <a href="{{ route('products.index') }}" class="btn btn-base">{{__('product.viewAllProducts')}}</a>
    </div>
</div>
