<x-layout>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="p-4 shadow border-0 rounded-3 card-form">
                    <div class="card-header text-blu">
                        <h2 class="text-center mb-0">{{__('auth.register')}}</h2>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">{{__('auth.name')}}</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}"
                                    class="form-control "  autofocus placeholder="Mario rossi">

                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                    class="form-control "  placeholder="mariorossi@example.com">

                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">{{__('auth.telephoneNumber')}}</label>
                                <input id="phone" type="tel" name="phone" value="{{ old('phone') }}"
                                    class="form-control " placeholder="+39 123 456 7890">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{__('auth.sex')}}</label>
                                <div class="d-flex gap-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="male"
                                            value="male" {{ old('gender') == 'male' ? 'checked' : '' }} >
                                        <label class="form-check-label" for="male">{{__('auth.male')}}</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="female"
                                            value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="female">{{__('auth.woman')}}</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="other"
                                            value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="other">{{__('auth.other')}}</label>
                                    </div>
                                </div>

                            </div>

                            @livewire('auth.register')
                            <label for="password" class="form-label">Password</label>
                            <div class="mb-3 d-flex">
                                <input id="password" type="password" name="password" class="form-control " >
                                <button class="btn" type="button" onclick="togglePassword(this)">
                                    <i class="bi bi-eye"></i>
                                </button>
                                
                            </div>
                            <div class="invalid-feedback">

                            </div>

                            <label for="password_confirmation" class="form-label">{{__('auth.confirmPassword')}}</label>
                            <div class="mb-3 d-flex">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Conferma la nuova password">
                                <button class="btn" type="button" onclick="togglePassword(this)">
                                    <i class="bi bi-eye"></i>
                                </button>
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

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-base">
                                    <span>
                                        {{__('auth.register')}}
                                    </span>
                                </button>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4 fs-5">
                                <p>
                                    <span class="text-muted">{{__('auth.dontHaveAccount')}}</span>
                                    <a href="{{ route('login') }}" class="text-decoration-none">
                                        <span class="text-base">{{__('auth.login')}}</span>
                                    </a>
                                </p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
