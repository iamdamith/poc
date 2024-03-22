<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Dashbords\FinanceOfficerDashboardController;
use App\Http\Controllers\Dashbords\ManagerDashboardController;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        if ($user->hasRole('registered')) {
            return Inertia::render('dashboards/registered',[
                'user' => $user
            ]);
        }

        if ($user->hasRole('manager')) {

            $submissions = DB::table('corporate_card_applications')
            // ->groupBy('created_at')
            ->get();
dd( $submissions);

            return Inertia::render('dashboards/Manager',[
                'user' => $user
            ]);
        }

        if ($user->hasRole('financial_manager')) {
            return action([FinanceOfficerDashboardController::class, 'index']);
        }

        return Inertia::render('registerd');
    }
}
