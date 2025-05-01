<x-layout>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="p-4 shadow border-0 rounded-3 card-form">
                    <div class="card-header text-blu">
                        <h2 class="text-center mb-0">Registrati</h2>
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
                                <label for="name" class="form-label">Nome</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}"
                                    class="form-control "  autofocus placeholder="Mario rossi">

                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                    class="form-control "  placeholder="mariorossi@example.com">

                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Numero di Telefono</label>
                                <input id="phone" type="tel" name="phone" value="{{ old('phone') }}"
                                    class="form-control " placeholder="+39 123 456 7890">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sesso</label>
                                <div class="d-flex gap-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="male"
                                            value="male" {{ old('gender') == 'male' ? 'checked' : '' }} >
                                        <label class="form-check-label" for="male">Maschio</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="female"
                                            value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="female">Femmina</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="other"
                                            value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="other">Altro</label>
                                    </div>
                                </div>

                            </div>

                            @livewire('auth.register')
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" name="password" class="form-control " >
                                <div class="invalid-feedback">

                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Conferma
                                    Password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                    class="form-control" >
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-base">
                                    Registrati
                                </button>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4 fs-5">
                                <p>
                                    <span class="text-muted">Hai già un account?</span>
                                    <a href="{{ route('login') }}" class="text-decoration-none">
                                        <span class="text-base">Accedi</span>
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
