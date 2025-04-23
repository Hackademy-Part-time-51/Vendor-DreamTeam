<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center mb-0">Verify Your Email Address</h2>
                    </div>
                    <div class="card-body">
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success mb-4">
                                A new verification link has been sent to the email address you provided during registration.
                            </div>
                        @endif
                        
                        <p class="mb-4">
                            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? 
                            If you didn't receive the email, we will gladly send you another.
                        </p>
                        
                        <form method="POST" action="{{ route('verification.send') }}" class="mb-3">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">
                                Resend Verification Email
                            </button>
                        </form>
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-secondary w-100">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>