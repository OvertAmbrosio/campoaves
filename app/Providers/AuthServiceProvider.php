<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('esAdministrador', function($user){
            return $user->type === 'administrador';
        });
        Gate::define('esUsuario', function($user){
            return $user->type === 'usuario';
        });
        Gate::define('esEditor', function($user){
            return $user->type === 'editor';
        });

        Passport::routes();
        //
    }
}
