<?php

namespace App\Http\Controllers\Auth\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use App\Http\Requests\Auth\OperatorLoginRequest;


class OperatorAuthController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Operator/OperatorLogin');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(OperatorLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        // If 'remember' field is set to true
        if($request->input('remember'))
        {
            $user->setRememberToken(Str::random(60));
            $user->save();
        }


        return Inertia::render('OperatorDashboard')->with(['auth' => ['user' => $user]])->with(['toast' => ['message' => 'Uspiješna prijava!', 'type' => 'success']]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('operator/login/')->with(['toast' => ['message' => 'Uspiješno odjavljeni!', 'type' => 'success']]);
    }
}
