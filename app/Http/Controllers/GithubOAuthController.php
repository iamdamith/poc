<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class GithubOAuthController extends Controller
{
    public function redirect() {
        return Socialite::driver('github')->redirect();
    }

    public function callback() {
        $githubUser = Socialite::driver('github')->user();
 
        $user = User::updateOrCreate([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'password' => Hash::make('123123123')
        ]);

        Auth::login($user);
 
        return redirect('/dashboard');
    }
}
