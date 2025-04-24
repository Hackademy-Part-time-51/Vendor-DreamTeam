<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-4">
        <label for="email" class="block mb-2 font-medium">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" 
               class="w-100 px-3 py-2 border rounded @error('email') @enderror" 
               required autofocus>
        @error('email')
            <p class=" text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password" class="block mb-2 font-medium">Password</label>
        <input id="password" type="password" name="password" 
               class="w-100 px-3 py-2 border rounded @error('password') @enderror" 
               required>
        @error('password')
            <p class=" text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="flex items-center">
            <input type="checkbox" name="remember" class="mr-2">
            <span>Ricordami</span>
        </label>
    </div>

    <div class="flex items-center justify-between">
        <button type="submit" class="btn btn-base">
            Login
        </button>
        
    </div>
</form>
