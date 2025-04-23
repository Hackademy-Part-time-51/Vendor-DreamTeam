<x-layout>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center mb-0">Register</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Gender Field -->
                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="other" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="other">Other</label>
                                    </div>
                                </div>
                                @error('gender')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Profile Photo Field -->
                            <div class="mb-3">
                                <label for="profile_photo" class="form-label">Profile Photo</label>
                                <input id="profile_photo" type="file" name="profile_photo" 
                                    class="form-control @error('profile_photo') is-invalid @enderror" 
                                    accept="image/*" onchange="previewImage(this)">
                                <div class="mt-2">
                                    <img id="preview" src="" alt="Profile Preview" style="max-width: 150px; max-height: 150px; display: none;" class="img-thumbnail">
                                </div>
                                @error('profile_photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" name="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" 
                                    class="form-control" 
                                    required>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a href="{{ route('login') }}" class="text-decoration-none">
                                    Already registered?
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>