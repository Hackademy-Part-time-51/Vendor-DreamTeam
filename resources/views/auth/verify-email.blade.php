<x-layout>
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white p-8 border rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Verify Your Email Address</h2>
            
            <div class="mb-4">
                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                        A new verification link has been sent to the email address you provided during registration.
                    </div>
                @endif
                
                <p class="mb-4">
                    Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? 
                    If you didn't receive the email, we will gladly send you another.
                </p>
                
                <form method="POST" action="{{ route('verification.send') }}" class="mb-4">
                    @csrf
                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Resend Verification Email
                    </button>
                </form>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>