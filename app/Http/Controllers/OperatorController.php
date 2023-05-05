<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\OperatorLoginRequest;


class OperatorController extends Controller
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
