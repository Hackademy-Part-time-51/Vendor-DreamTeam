<x-layout>
  {{-- prima sezione --}}
    <div class="container-fluid">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
        <div class="row mt-3">
          {{-- card user --}}
            <div class="col-12 col-lg-5 p-1 ">
              {{-- card user --}}
              <section class="card-user animated__backInLeft ">
                    <div class="card z-1 d-flex justify-content-center ">
                        <div class="p-1 d-flex justify-content-center">
                            @if ($user->profile_image == null)
                              <img src="/IMAGES/LOGO-SENZA-SFONDO.png" class="card-img-top" id="foto-user-card">
                            @else
                            <img src="{{asset('storage/'.$user->profile_image) }}" class="card-img-top" id="foto-user-card">
                            @endif
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center text-center text-blu">
                          <h2 class="card-title text-capitalize fw-bold">{{$user->name}}</h2>                          
                          <hr>
                          <p class="text-capitalize">
                            @if ($user->is_revisor == 1)
                              <span class="badge bg-success">{{__('auth.reviewer')}}</span>
                            @else
                              <span class="badge bg-danger">{{__('user.user')}} n°{{$user->id}}</span>
                            @endif
                          </p>
                          <p class="">{{$user->email}}</p>
                          <p class="">{{$user->phone}}</p>
                          @if (Auth::id() == $user->id)
                          <h6 class="card-title mb-0">
                            <i class="bi bi-chat"></i> Messaggi <a href="{{route('messaggi', $user->id)}}" class="badge text-decoration-none bg-danger rounded-pill px-3 py-2">
                                {{ Auth::user()->messages->count() }}
                            </a>
                            </h6>
                          @else
                          {{-- <i class="bi bi-chat"></i> Invia un messaggio //todo// --}}
                          @endif
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
        {{-- azioni rapide --}}
        @if (Auth::id() == $user->id )
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0 text-center">{{__('user.quickActions')}}</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="d-grid">
                            <button class="btn btn-base">
                                <a href="{{route('products.create')}}" class="text-blu text-decoration-none">
                                  <i class="bi bi-plus-circle me-2"></i>{{__('product.newArticle')}}
                                </a>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-grid"> 
                            <button class="btn btn-baseblu" data-bs-toggle="modal" data-bs-target="#editProfile">
                                <i class="bi bi-pencil-square me-2"></i>{{__('user.editProfile')}}
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-grid">
                              <a href="{{route('lavoraConNoi')}}" class=" btn btn-baseblu text-decoration-none">
                                <i class="bi bi-briefcase me-2"></i>{{__('user.workWithUs')}}
                              </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-grid">
                            <button class="btn btn-base ">
                                <a href="{{route('products.index')}}" class="text-blu text-decoration-none">
                                  <i class="bi bi-list-ul me-2"></i>{{__('user.articleList')}}
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <hr>
        {{-- articoli preferiti --}}
        @livewire('user.favoritesProducts')
        {{-- ricerche salvate --}}
        @livewire('user.savedSearches')



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
                                <button class="nav-link active fs-4" 
                                        data-bs-toggle="tab" 
                                        data-bs-target="#info-tab" 
                                        type="button" 
                                        role="tab">
                                    <i class="bi bi-person me-2"></i>{{__('user.info')}}
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fs-4" 
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
                                        <label class="form-label fs-3" for="name">{{__('auth.name')}}</label>
                                        <input type="text" 
                                                name="name" 
                                                class="form-control form-control-lg" 
                                                value="{{$user->name}}">
                                        @error('name', 'updateProfileInformation')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label fs-3" for="email">Email</label>
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
                                        <label class="form-label fs-3" for="current_password">{{__('auth.currentPassword')}}</label>
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
                                        <label class="form-label fs-3" for="password">{{__('auth.newPassword')}}</label>
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
                                        <label class="form-label fs-3" for="password_confirmation">{{__('auth.confirmPassword')}}</label>
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
    </div>
</x-layout>