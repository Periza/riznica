<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
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

        return redirect('/odashboard');
    }

    public function logout(Request $request) {

        return 'logout test';

        /*
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/operator/login');

        */
    }


}
