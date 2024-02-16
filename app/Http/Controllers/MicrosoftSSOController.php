<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use VinhHoang\OAuth2\Facades\Azure;


class MicrosoftSSOController extends Controller
{


public function redirect() {
    // return Azure::redirect();
    return Socialite::driver('azure')->redirect();
}
    public function logout(Request $request) 
    {
        // Auth::guard()->logout();
        // $redirect_url = env('APP_URL');
        // return redirect(Azure::getLogoutUrl($redirect_url));

        Auth::guard()->logout();
        $request->session()->flush();
        $azureLogoutUrl = Socialite::driver('azure')->getLogoutUrl(route('login'));
        return redirect($azureLogoutUrl);
    }

    public function callback() { 

        $user = Socialite::driver('azure')->user();
        dd($user);
        // $token = Azure::getAccessToken('authorization_code', [
        //     'code' => $_GET['code'],
        //     'resource' => 'https://graph.windows.net',
        // ]);

        // try {
        //     // We got an access token, let's now get the user's details
        //       $me = Azure::get("me", $token);
        //       dd($me);

        // } catch (\Exception $e) {
        //     //
        // }

        // // Use this to interact with an API on the users behalf

        // echo $token->getToken();

        // Auth::login($user);
 
        // return redirect('/dashboard');
    }
}
