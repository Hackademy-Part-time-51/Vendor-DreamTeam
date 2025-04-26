<?php

namespace App\Actions\Fortify;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'gender' => ['nullable', 'string', 'in:male,female,other'],
            'phone' => ['nullable', 'string', 'max:20'],
            'profile_photo' => ['nullable', 'file', 'image'],
            'password' => $this->passwordRules(),
        ])->validate();
        
        $profileImagePath = null;
        if (isset($input['profile_photo']) && $input['profile_photo']->isValid()) {
            $profileImagePath = $input['profile_photo']->store('profile-photos', 'public');
        }


        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'gender' => $input['gender'] ?? 'other', 
            'phone' => $input['phone'] ?? null,
            'profile_image' => $profileImagePath,
            'password' => Hash::make($input['password']),
        ]);
        
        $userRole = Role::where('slug', 'user')->first();
        $user->roles()->attach($userRole);

        return $user;
        
    }
}

