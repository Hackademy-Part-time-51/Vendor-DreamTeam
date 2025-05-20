<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            // Ottieni i dati dell'utente da Google
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Cerca l'utente esistente tramite google_id
            $user = User::where('google_id', $googleUser->getId())->first();

            // Se non esiste ancora
            if (!$user) {
                // Cerca tramite email
                $user = User::where('email', $googleUser->getEmail())->first();

                if ($user) {
                    // Associa l'account Google all'utente esistente
                    $user->update([
                        'google_id' => $googleUser->getId(),
                    ]);
                } else {
                    $user = User::create([
                        'name' => $googleUser->getName(),
                        'email' => $googleUser->getEmail(),
                        'google_id' => $googleUser->getId(),
                        'avatar' => $googleUser->getAvatar(),
                        'password' => bcrypt(Str::random(16)), // Fortify vuole una password
                    ]);
                }
            }

            Auth::login($user);

            return redirect()->intended('/products/index');
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['google' => __('message.googleLoginError')]);
        }
    }
}
