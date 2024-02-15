<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use VinhHoang\OAuth2\Facades\Azure;


class MicrosoftSSOController extends Controller
{


public function signin() {
    return Azure::redirect();
}
    public function logout(Request $request) 
    {
        // Auth::guard()->logout();
        $redirect_url = "http://example.com";
        return redirect(Azure::getLogoutUrl($redirect_url));
    }

    public function redirect() { 
        $token = Azure::getAccessToken('authorization_code', [
            'code' => $_GET['code'],
            'resource' => 'https://graph.windows.net',
        ]);

        try {
            // We got an access token, let's now get the user's details
              $me = Azure::get("me", $token);
              dd($me);

        } catch (\Exception $e) {
            //
        }

        // Use this to interact with an API on the users behalf

        echo $token->getToken();

        // Auth::login($user);
 
        // return redirect('/dashboard');
    }
}
