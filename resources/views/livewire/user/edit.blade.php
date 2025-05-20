<form action="" method="" wire:submit="update" enctype="multipart/form-data">
    @csrf
    
    <div class="mb-3">
        <label for="name" class="form-label">{{ __('auth.name') }}</label>
        <input id="name" type="text" name="name" wire:model="name" value="{{ Auth::user()->name }}" class="form-control " autofocus
            placeholder="Mario rossi">

    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">{{ __('auth.telephoneNumber') }}</label>
        <input id="phone" type="tel" name="phone" wire:model="phone" value="{{ Auth::user()->phone }}" class="form-control "
            placeholder="+39 123 456 7890">

    </div>
    <div class="mb-3">
        <label class="form-label">{{ __('auth.sex') }}</label>
        <div class="d-flex gap-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                    {{ Auth::user()->gender == 'male' ? 'checked' : '' }} wire:model="gender">
                <label class="form-check-label" for="male">{{ __('auth.male') }}</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                    {{ Auth::user()->gender == 'female' ? 'checked' : '' }} wire:model="gender">
                <label class="form-check-label" for="female">{{ __('auth.woman') }}</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="other" value="other"
                    {{ Auth::user()->gender == 'other' ? 'checked' : '' }} wire:model="gender">
                <label class="form-check-label" for="other">{{ __('auth.other') }}</label>
            </div>
        </div>

    </div>

        <div class="mb-3">
        <label for="profile_photo" class="form-label">{{ __('auth.profilePhoto') }}</label>
        <input wire:model.live="profile_photo" id="profile_photo" type="file" name="profile_photo" class="form-control "
            accept="image/*" onchange="previewImage(this)">
        @if ($profile_photo)
            <div class="mt-2">
                <img id="preview" src="{{ $profile_photo->temporaryUrl() }}" alt="Profile Preview"
                    style="max-width: 150px; max-height: 150px; " class="img-thumbnail">
            </div>
        @elseif (auth()->check())
            @if (Auth::user()->profile_image)
                <div class="mt-2">
                    <img id="preview" src="{{ Storage::url(Auth::user()->profile_image) }}" alt="Profile Preview"
                        style="max-width: 150px; max-height: 150px; " class="img-thumbnail">
                </div>
            @endif

        @endif

        @error('profile_photo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    
    <button type="submit" class="btn btn-base fs-3 py-2" >
        <span>
            <i class="bi bi-check-lg me-2"></i>{{ __('user.updateInfo') }}
        </span>
    </button>

</form>
