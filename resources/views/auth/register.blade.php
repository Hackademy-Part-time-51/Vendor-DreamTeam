<x-layout>
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white p-8 border rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block mb-2 font-medium">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" 
                           class="w-full px-3 py-2 border rounded @error('name') border-red-500 @enderror" 
                           required autofocus>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block mb-2 font-medium">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" 
                           class="w-full px-3 py-2 border rounded @error('email') border-red-500 @enderror" 
                           required>
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
                    <label for="password_confirmation" class="block mb-2 font-medium">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" 
                           class="w-full px-3 py-2 border rounded" 
                           required>
                </div>

                <div class="flex items-center justify-between mt-6">
                    <a href="{{ route('login') }}" class="text-sm text-blue-500 hover:underline">
                        Already registered?
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>