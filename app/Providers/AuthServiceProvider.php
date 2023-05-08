<?php


namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Auth::provider('operator', function ($app, array $config) {
            return new OperatorProvider($app['hash'], $config['model']);
        });

        Gate::define('partner-one', function($operator) {
            return $operator->partner_id === 1;
        });
    }
}
