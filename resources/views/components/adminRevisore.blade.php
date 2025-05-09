@auth
@if (Auth::user()->is_revisor)
<div class="">
    <div class="navbar border-bottom py-2">
        <div class="container-fluid">
            <ul class="navbar-nav mx-auto gap-4 align-items-center">
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link text-blu d-flex align-items-center gap-2 position-relative" 
                        href="{{route('revisor.index')}}">
                        <i class="bi bi-shield-check fs-5"></i>
                        <span class="fw-semibold">{{__('revisor.reviewerArea')}}</span>
                        @if(\App\Models\Product::toBeRevisedCount() > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ \App\Models\Product::toBeRevisedCount() }}
                        <span class="visually-hidden">{{__('revisor.articlesReview')}}</span>
                        </span>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endif
@endauth
