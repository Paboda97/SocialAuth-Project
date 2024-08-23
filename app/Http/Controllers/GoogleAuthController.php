<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    // Method to redirect to Google's OAuth page
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback method after Google authentication
    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            // Check if the user already exists
            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                // If user doesn't exist, create a new user
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                ]);

                Auth::login($new_user);
                return redirect()->intended('dashboard');
            } else {
                // If user exists, log them in
                Auth::login($user);
                dd('User logged in successfully. Redirecting to dashboard...');
                return redirect()->intended('dashboard');

            }

        } catch (\Throwable $th) {
            // Handle any errors during authentication
            return redirect('/')->withErrors(['login_error' => 'Something went wrong! ' . $th->getMessage()]);
        }
    }
}
