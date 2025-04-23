<x-layout>
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white p-8 border rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

            @if (session('status'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('status') }}
                </div>
            @endif

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
        </div>
    </div>
</x-layout>