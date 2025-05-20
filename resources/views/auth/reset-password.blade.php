<x-layout>
    {{-- Alert per messaggi di sessione o errori --}}
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show text-center display-6" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container text-blu mb-3 py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 text-center">
                <h1 class="card-title display-3 my-3">{{ __('auth.setNewPassword') }}</h1>
                <p class="fs-4 text-muted mb-5">
                    {{ __('auth.newSecurePassword') }}
                </p>
                <hr class="mb-5">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card bg-blu text-white border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <i class="bi bi-shield-lock-fill display-3 text-white"></i>
                        </div>
                        <h2 class="card-title text-center mb-4">{{ __('auth.createNewPassword') }}</h2>

                        <form method="POST" action="{{ route('password.update') }}"> {{-- Rotta standard di Laravel per aggiornare la password --}}
                            @csrf

                            {{-- Token (nascosto) --}}
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            {{-- Campo Email (nascosto o readonly, precompilato) --}}
                            <div class="form-floating mb-4">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="{{__('auth.youremail')}}" required
                                    value="{{ old('email', $request->email) }}" readonly> {{-- O usa type="hidden" se non vuoi mostrarlo --}}
                                <label for="email">{{__('auth.emailAddress')}}</label>
                                @error('email')
                                    <div class="invalid-feedback bg-white text-danger p-2 rounded mt-1">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Campo Nuova Password --}}
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="{{__('auth.newPassword')}}" required autofocus>
                                <label for="password">{{__('auth.newPassword')}}</label>
                                @error('password')
                                    <div class="invalid-feedback bg-white text-danger p-2 rounded mt-1">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Campo Conferma Nuova Password --}}
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="{{__('auth.confirmNewPassword')}}" required>
                                <label for="password_confirmation">{{__('auth.confirmNewPassword')}}</label>
                                {{-- L'errore per password_confirmation è solitamente gestito insieme a quello di password --}}
                            </div>

                            {{-- Bottone Invio --}}
                            <div class="d-grid">
                                <button type="submit" class="btn btn-add text-white border scalebig btn-lg w-100 py-3">
                                    <i class="bi bi-check-circle-fill me-2"></i>{{__('auth.resetPassword')}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
