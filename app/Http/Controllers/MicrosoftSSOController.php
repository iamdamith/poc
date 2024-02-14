<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use \SocialiteProviders\Manager\Config;

class MicrosoftSSOController extends Controller
{

    /**
 * Returns a custom config for this specific Azure AD connection / directory
 * @return \SocialiteProviders\Manager\Config
 */
function getConfig(): Config
{
  return new Config(
    env('AD_CLIENT_ID', 'c6d6c514-3ec0-4c08-867c-86a326242e6f'), // a different clientID for this separate Azure directory
    env('AD_CLIENT_SECRET', 'zYb8Q~0et_OS4LRNKFtGa.cU-8WJKZe~pP.kvbGL'), // a different secret for this separate Azure directory
    url(env('AD_REDIRECT_PATH', 'https://casey-poc.azurewebsites.net/sso/redirect')), // the redirect path i.e. a different callback to the other azureAD callbacks
    ['tenant' => env('AD_TENANT_ID', 'b7e12556-95d8-4342-b05c-c5155b582558')], // this could be something special if need be, but can also be left out entirely
  );
}


public function signin() {
    return Socialite::driver('azure')->setConfig($this->getConfig())->redirect();
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
