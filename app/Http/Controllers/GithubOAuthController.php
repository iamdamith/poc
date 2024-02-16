<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GithubOAuthController extends Controller
{
    public function redirect() {
        return Socialite::driver('github')->redirect();
    }

    public function callback() {
        $githubUser = Socialite::driver('github')->user();
 
        $exitingUser = User::where('email', '=', $githubUser->email)->first();

        if(!$exitingUser)
            $exitingUser = User::crreate([
                'name' => $githubUser->name,
                'email' => $githubUser->email,
                'password' => Hash::make(Str::random(40))
            ]);

        Auth::login($exitingUser);
 
        return redirect('/dashboard');
    }
}
