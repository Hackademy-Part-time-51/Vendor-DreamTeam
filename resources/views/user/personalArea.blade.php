
<x-layout>
  {{-- prima sezione --}}
    <div class="container-fluid">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
        <h1 class="card-title display-2 text-center text-capitalize  mb-1">Benvenuto {{$user->name}}</h1>
        <div class="row mt-3">
          {{-- card user --}}
            <div class="col-12 col-lg-5 p-1 ">
              {{-- card user --}}
              <section class="card-user animated__backInLeft ">
                    <div class=" z-1 d-flex flex-column justify-content-center ">
                        <div class="p-1 d-flex justify-content-center">
                            @if ($user->profile_image == null)
                              <img src="/IMAGES/LOGO-SENZA-SFONDO.png" class="card-img-top" id="foto-user-card">
                            @else
                            <img src="{{asset('storage/'.$user->profile_image) }}" class="card-img-top rounded" id="foto-user-card">
                            @endif
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center align-items-center text-center text-blu mt-3">
            @if (Auth::id() == $user->id)
                       <hr class="w-50 my-2">
                <h6 class="mb-0">
                    <a href="{{route('messaggi', $user->id)}}" class="badge text-decoration-none bg-danger rounded-pill px-2 py-1 fs-6">
                        <i class="bi bi-chat me-1"></i> Tutti i messaggi
                        ({{ Auth::user()->messages->count() }})
                    </a>
                </h6>
            @endif

            <hr class="w-50 my-2">

            <p class="text-capitalize mb-1 small">
                @if ($user->is_revisor == 1)
                    <span class="badge bg-success fs-6">Ruolo: {{__('auth.reviewer')}}</span>
                @else
                    <span class="badge bg-secondary fs-6">Ruolo: {{__('user.user')}} n°{{$user->id}}</span>
                @endif
            </p>

            <p class="mb-1 fs-5">Email: {{$user->email}} <i class="bi bi-envelope-at-fill me-1 fs-4"></i></p>
            <p class="mb-0 fs-5">Telefono: {{$user->phone}} <i class="bi bi-telephone-fill me-1"></i></p>
        </div>
                    </div>
              </section>
            </div>
            {{-- dashboard --}}
            <div class="col-12 col-lg-7 ">
              <div class="card shadow-sm ">
                  <div class="card-body p-3">

                    @livewire('user.product-personal', ['user' => $user->id])
                  </div>
              </div>
            </div>
        </div>
        <hr>
        @if (Auth::id() == $user->id )
                        <h5 class="card-title display-3 mb-0 text-center py-2">
                <i class="bi bi-house-fill "></i> {{__('user.quickActions')}} <i class="bi bi-house-fill "></i>
            </h5>
        {{-- azioni rapide --}}
        @if (Auth::id() == $user->id )
        <div class="mt-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="d-grid">
                            <a href="{{route('products.create')}}" class="btn btn-base">
                                <span>
                                    <i class="bi bi-plus-circle me-2"></i>{{__('product.newArticle')}}                                    
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-grid"> 
                            <button class="btn btn-baseblu" data-bs-toggle="modal" data-bs-target="#editProfile">
                                <span>
                                    <i class="bi bi-pencil-square me-2"></i>{{__('user.editProfile')}}
                                </span>

                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-grid">
                              <a href="{{route('lavoraConNoi')}}" class=" btn btn-baseblu text-decoration-none">
                                <span>
                                    <i class="bi bi-briefcase me-2"></i>{{__('user.workWithUs')}}
                                </span>

                              </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-grid">
                            <a href="{{route('products.index')}}" class="btn btn-base">
                                <span>
                                    <i class="bi bi-list-ul me-2"></i>{{__('user.articleList')}}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <hr>
        {{-- articoli preferiti --}}
        <hr>
        <h5 class="card-title  display-3 mb-0 text-center py-2">
            <i class="bi bi-heart-fill text-danger me-2"></i>{{__('user.favoriteArticles')}}             
            <span class="badge bg-danger rounded-pill px-3 py-2">
            {{ Auth::user()->favorites->count() }}
            </span>
        </h5>
        @livewire('user.favoritesProducts')
        <hr>
        {{-- ricerche salvate --}}
        <h5 class="card-title mb-0 display-3 mb-0 text-center py-2">
            <i class="bi bi-star-fill text-warning me-2"></i>{{__('user.savedSearches')}}
            <span class="badge bg-warning rounded-pill px-3 py-2">
            {{ Auth::user()->searches->count() }}
            </span>
        </h5>
        @livewire('user.savedSearches')
        <hr>


            {{-- modal modifica info --}}
        <div class="modal fade" id="editProfile" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-bottom">
                        <h1 class="modal-title fs-2" id="editProfileLabel">
                            {{__('user.editProfile')}}
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>    
                    <div class="modal-body p-4">
                        <ul class="nav nav-tabs nav-fill mb-4" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link text-blu active fs-4" 
                                        data-bs-toggle="tab" 
                                        data-bs-target="#info-tab" 
                                        type="button" 
                                        role="tab">
                                    <i class="bi bi-person me-2"></i>{{__('user.info')}}
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link text-blu fs-4" 
                                        data-bs-toggle="tab" 
                                        data-bs-target="#password-tab" 
                                        type="button" 
                                        role="tab">
                                    <i class="bi bi-key me-2"></i>Password
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info-tab" role="tabpanel">
                                <form action="{{route('user-profile-information.update')}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label class="form-label text-center w-100 fs-3" for="name">{{__('auth.name')}}</label>
                                        <input type="text" 
                                                name="name" 
                                                class="form-control form-control-lg" 
                                                value="{{$user->name}}">
                                        @error('name', 'updateProfileInformation')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label text-center w-100 fs-3" for="email">Email</label>
                                        <input type="email" 
                                                name="email" 
                                                class="form-control form-control-lg" 
                                                value="{{$user->email}}">
                                        @error('email', 'updateProfileInformation')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>     
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-base fs-3 py-2">
                                            <i class="bi bi-check-lg me-2"></i>{{__('user.updateInfo')}}
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="password-tab" role="tabpanel">
                                <form action="{{route('user-password.update')}}" method="POST">
                                    @csrf
                                    @method('PUT')     
                                    <div class="mb-4">
                                        <label class="form-label text-center w-100 fs-3" for="current_password">{{__('auth.currentPassword')}}</label>
                                        <div class="input-group input-group-lg">
                                            <input type="password" 
                                                    name="current_password" 
                                                    class="form-control" 
                                                    placeholder="{{__('auth.enterCurrentPassword')}}">
                                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword(this)">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                        @error('current_password', 'updatePassword')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>     
                                    <div class="mb-4">
                                        <label class="form-label text-center w-100 fs-3" for="password">{{__('auth.newPassword')}}</label>
                                        <div class="input-group input-group-lg">
                                            <input type="password" 
                                                    name="password" 
                                                    class="form-control" 
                                                    placeholder="{{__('auth.enterNewPassword')}}">
                                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword(this)">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                        @error('password', 'updatePassword')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label text-center w-100 fs-3" for="password_confirmation">{{__('auth.confirmPassword')}}</label>
                                        <div class="input-group input-group-lg">
                                            <input type="password" 
                                                    name="password_confirmation" 
                                                    class="form-control" 
                                                    placeholder="{{__('auth.confirmNewPassword')}}">
                                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword(this)">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-base fs-3 py-2">
                                            <i class="bi bi-check-lg me-2"></i>{{__('auth.updatePassword')}}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function togglePassword(button) {
                    const input = button.previousElementSibling;
                    const icon = button.querySelector('i');
                    
                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.replace('bi-eye', 'bi-eye-slash');
                    } else {
                        input.type = 'password';
                        icon.classList.replace('bi-eye-slash', 'bi-eye');
                    }
                }
            </script>
        </div>
        @endif

    </div>
</x-layout>