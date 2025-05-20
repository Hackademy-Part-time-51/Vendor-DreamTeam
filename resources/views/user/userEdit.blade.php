<x-layout>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="p-4 shadow border-0 rounded-3 card-form">
                    <div class="card-header text-blu">
                        <h2 class="text-center mb-0">{{ __('auth.register') }}</h2>
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
                                <label for="name" class="form-label">{{ __('auth.name') }}</label>
                                <input id="name" type="text" name="name" value="{{ Auth::user()->name }}"
                                    class="form-control " autofocus placeholder="Mario rossi">

                            </div>            

                            <div class="mb-3">
                                <label for="phone" class="form-label">{{ __('auth.telephoneNumber') }}</label>
                                <input id="phone" type="tel" name="phone" value="{{ Auth::user()->phone }}"
                                    class="form-control " placeholder="+39 123 456 7890">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('auth.sex') }}</label>
                                <div class="d-flex gap-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="male"
                                            value="male" {{ Auth::user()->gender == 'male' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="male">{{ __('auth.male') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="female"
                                            value="female" {{ Auth::user()->gender == 'female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="female">{{ __('auth.woman') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="other"
                                            value="other" {{ Auth::user()->gender == 'other' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="other">{{ __('auth.other') }}</label>
                                    </div>
                                </div>

                            </div>

                            @livewire('auth.register')           

                            
                            
                           
                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
