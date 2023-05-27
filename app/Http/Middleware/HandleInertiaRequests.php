<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        /*
        Kada koristimo direktno $request->user()->only(['name', 'sifra', 'partner_id'])
        ako korisnik nije logiran dobijamo gre�ku.
        Zato prije toga stavimo da je $user $request->user()
        i ako on nije null samo onda uzmemo ->only() od njega
        */
        $user = $request->user();
        $userAttributes = $user ? $user->only(['name', 'sifra', 'partner']) : null;
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $userAttributes
            ],
            'year' => intval(date('Y')),
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'toast' => session('toast')
        ]);
    }
}
