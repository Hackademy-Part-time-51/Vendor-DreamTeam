<div class="z-1 shadow-sm">
    <nav class="navbar bg-blu py-2">
        <div class="container-fluid">
            <ul class="navbar-nav mx-auto gap-4 align-items-center">
                @auth
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link text-white d-flex align-items-center gap-2 position-relative" 
                               href="{{route('revisor.index')}}">
                                <i class="bi bi-shield-check fs-5"></i>
                                <span class="fw-semibold">Area Revisore</span>
                                @if(\App\Models\Product::toBeRevisedCount() > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ \App\Models\Product::toBeRevisedCount() }}
                                        <span class="visually-hidden">articoli da revisionare</span>
                                    </span>
                                @endif
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </nav>
</div>
