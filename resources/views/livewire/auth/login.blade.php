<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-4">
        <label for="email" class="block mb-2 font-medium">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" 
               class="w-full px-3 py-2 border rounded @error('email') border-red-500 @enderror" 
               required autofocus>
        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password" class="block mb-2 font-medium">Password</label>
        <input id="password" type="password" name="password" 
               class="w-full px-3 py-2 border rounded @error('password') border-red-500 @enderror" 
               required>
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="flex items-center">
            <input type="checkbox" name="remember" class="mr-2">
            <span>Remember me</span>
        </label>
    </div>

    <div class="flex items-center justify-between">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Login
        </button>
        
    </div>
</form>
