<?php

use App\Http\Controllers\MicrosoftSSOController;
use App\Http\Controllers\GithubOAuthController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\MSGraphLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

    Route::get('/github/redirect', [GithubOAuthController::class, 'redirect']);
    Route::get('/github/connect', [GithubOAuthController::class, 'connect']);

    Route::group(['middleware' => ['web', 'MSGraphCORS']], function(){
        Route::get('/msgraph/connect', [MSGraphLoginController::class, 'connect'])->name('msgraph.connect');;
    });

    Route::group(['middleware' => ['web', 'MsGraphAuthenticated'], 'prefix' => 'app'], function(){
        Route::get('/', [MSGraphLoginController::class, 'app'])->name('app');
        Route::get('logout', [MSGraphLoginController::class, 'logout']);
    });


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/msgraph/logout', [MSGraphLoginController::class, 'logout']);

});
