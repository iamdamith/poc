<?php

namespace App\Http\Controllers;

use Dcblogdev\MsGraph\Facades\MsGraph;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MSGraphLoginController extends Controller
{
    public function login() {
         return MsGraph::connect();
    }

    public function logout()
    {
        return MsGraph::disconnect();
    }

    public function callback() { 

        dd(Auth::user());
 
    }
}