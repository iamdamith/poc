<?php

namespace App\Listeners;

use App\Models\User;
use Dcblogdev\MsGraph\MsGraph;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class NewMicrosoft365SignInListener
{
    public function handle($event)
    {
        //To-do
        $mail = $event->token['info']['mail'] ?? $event->token['info']['userPrincipalName'];
        
        $user  = User::where('email', $mail)->first();

        if(!$user){
            $user  = User::create([
                'name'     => $event->token['info']['displayName'],
                'email'    => $mail,
                'password' => Hash::make(Str::random(40)),
            ]);
        }

        (new MsGraph())->storeToken(
            $event->token['accessToken'],
            $event->token['refreshToken'],
            $event->token['expires'],
            $user->id,
            $user->email
        );

        Auth::login($user);
    }
}