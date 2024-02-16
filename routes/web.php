<?php

use App\Http\Controllers\MicrosoftSSOController;
use App\Http\Controllers\GithubOAuthController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

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

    Route::get('/sso/sign-in', [MicrosoftSSOController::class, 'signin']);
    Route::post('/sso/redirect', [MicrosoftSSOController::class, 'redirect']);

    Route::get('/github/redirect', [GithubOAuthController::class, 'redirect']);
    Route::get('/github/callback', [GithubOAuthController::class, 'callback']);
    
    // Route::get('/.auth/login/aad/callback', [MicrosoftSSOController::class, 'redirect']);
    Route::post('/.auth/login/aad/callback', [MicrosoftSSOController::class, 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/sso/logout', [MicrosoftSSOController::class, 'logout']);

});
