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
