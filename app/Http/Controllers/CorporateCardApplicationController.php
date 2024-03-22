<?php

namespace App\Http\Controllers;

use App\Http\Requests\CorporateCardApplicationRequest;
use Illuminate\Http\Request;
use App\Models\CorporateCardApplication;
use App\Models\User;
use Inertia\Inertia;

class CorporateCardApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        $managers = [];
        $financial_managers = [];

        foreach($users as $user){
            if($user->hasRole('manager'))
                $managers[] = $user;

            if($user->hasRole('financial_manager'))
                $financial_managers[] = $user;
        }

        return Inertia::render('Finance/CreditCard',['show' => false, 'managers' => $managers, 'financial_managers' => $financial_managers ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CorporateCardApplicationRequest $corporateCardApplicationRequest)
    {
        $corporateCardApplication = new CorporateCardApplication($corporateCardApplicationRequest->all());
        $corporateCardApplication->save();
        return Inertia::render('Finance/CreditCard',['show' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
