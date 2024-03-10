<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Dashbords\DefaultDashboardController;
use App\Http\Controllers\Dashbords\FinanceOfficerDashboardController;
use App\Http\Controllers\Dashbords\ManagerDashboardController;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        if ($user->hasRole('registered')) {
            return Inertia::render('dashboards/registered');
        }

        if ($user->hasRole('manager')) {
            return action([ManagerDashboardController::class, 'index']);
        }

        if ($user->hasRole('financial_manager')) {
            return action([FinanceOfficerDashboardController::class, 'index']);
        }

        return Inertia::render('registerd');
    }
}
