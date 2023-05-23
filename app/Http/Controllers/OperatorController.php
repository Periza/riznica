<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\OperatorLoginRequest;
use Illuminate\Routing\Controller as BaseController;


class OperatorController extends BaseController
{
    public function create() {
        return Inertia::render('Auth/OperatorLogin');
    }

    public function login(OperatorLoginRequest $request) {

        
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        // If 'remember' field is set to true
        if($request->input('remember'))
        {
            $user->setRememberToken(Str::random(60));
            $user->save();
        }


        return Inertia::render('OperatorDashboard')->with(['auth' => ['user' => $user]]);
    }


}
