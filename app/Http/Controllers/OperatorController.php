<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\OperatorLoginRequest;
use Illuminate\Routing\Controller as BaseController;


class OperatorController extends BaseCOntroller
{
    public function create() {
        return Inertia::render('Auth/OperatorLogin');
    }

    public function store(OperatorLoginRequest $request) {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended('/');
    }
}
