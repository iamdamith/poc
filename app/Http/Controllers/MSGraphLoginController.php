<?php

namespace App\Http\Controllers;

use Dcblogdev\MsGraph\Facades\MsGraph;
use Illuminate\Support\Facades\Auth;

class MSGraphLoginController extends Controller
{
    public function app()
    {
        return redirect('/dashboard');
    }

    public function connect()
    {
        return MsGraph::connect();
    }

    public function logout()
    {
        Auth::logout();

        return MsGraph::disconnect();
    }
}
