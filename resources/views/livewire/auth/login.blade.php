<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-4">
        <label for="email" class="block mb-2 font-medium">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" 
               class="w-100 px-3 py-2 border rounded @error('email') @enderror" 
               required autofocus value="{{ old('email') }}">
        @error('email')
            <p class=" text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password" class="block mb-2 font-medium">Password</label>
        <div class="d-flex">
            <input id="password" type="password" name="password" 
                class="w-100 px-3 py-2 border rounded @error('password') @enderror" 
                required value="{{ old('password') }}">
            <button class="btn" type="button" onclick="togglePassword(this)">
                <i class="bi bi-eye-slash"></i>
            </button>
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
        @error('password')
            <p class=" text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="remember">{{__('auth.rememberMe')}}</label>
        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-base">
            <span>
                Login
            </span>
        </button>
    </div>
        
    </div>
</form>
