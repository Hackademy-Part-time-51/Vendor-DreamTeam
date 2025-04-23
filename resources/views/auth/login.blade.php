<x-layout>
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white p-8 border rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

            @if (session('status'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('status') }}
                </div>
            @endif

            @livewire('auth.login')

            
        </div>
    </div>
</x-layout>