<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('keycloak')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('keycloak')->user();
        
        $existingUser = User::where('email', $user->email)->first();

        return redirect()->intended('/');
    }
}
