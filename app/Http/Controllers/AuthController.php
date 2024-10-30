<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToProvider()
    {
        $url = Socialite::driver('keycloak')->redirect();
        
        return $url;
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('keycloak')->user();
        
        session(['user' => $user]);

        return redirect('/');
    }
}
