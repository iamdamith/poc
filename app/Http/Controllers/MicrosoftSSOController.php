<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class MicrosoftSSOController extends Controller
{


public function signin() {
    return Socialite::driver('azure')->redirect();
}
    public function logout(Request $request) 
    {
        Auth::guard()->logout();
        $request->session()->flush();
        $azureLogoutUrl = Socialite::driver('azure')->getLogoutUrl(route('login'));
        return redirect($azureLogoutUrl);
    }

    public function redirect() { 
        $azureUser = Socialite::driver('azure')->stateless()->user();
dd($azureUser);
        $user = User::updateOrCreate([
            'name' => $azureUser->name,
            'email' => $azureUser->email,
            'password' => "123123123"
        ]);

        Auth::login($user);
 
        return redirect('/dashboard');
    }
}
