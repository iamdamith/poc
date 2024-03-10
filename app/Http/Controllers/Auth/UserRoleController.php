<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;

class UserRoleController extends Controller
{
    public function index()
    {
        return Inertia::render('roles/index', [
            'users' => User::all()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    // 'edit_url' => route('users.edit', $user),
                ];
            }),
            // 'create_url' => route('users.create'),
        ]);
    }
}
