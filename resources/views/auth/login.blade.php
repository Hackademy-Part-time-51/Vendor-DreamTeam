<x-layout>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="p-4 shadow border-0 rounded-3 card-form">
                    <h2 class="text-center mb-0">Login</h2>
                    @if (session('status'))
                        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                            {{ session('status') }}
                        </div>
                    @endif
                    @livewire('auth.login')
                    <hr>
                    <x-google></x-google>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mt-1 fs-5">
                        <p>
                            <span class="">Hai dimenticato la tua password? Clicca </span>
                            <a href="{{ route('password.request') }}" class="text-decoration-none">
                                <span class="text-base">qui</span>
                            </a>
                        </p>
                    </div>
                    <h5 class="mt-2">{{ __('auth.dontHaveAccount') }}<a href="{{ route('register') }}"
                            class="text-decoration-none">{{ __('auth.register') }}</a></h5>
                </div>
            </div>
        </div>
    </div>

</x-layout>
