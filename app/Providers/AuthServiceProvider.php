<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('managers-users',function ( $user){
            return $user->hasAnyRoles(['admin']);
        });
        Gate::define('managers-admin',function ( $user){
            return $user->hasAnyRoles(['admin']);
        });
       /* Gate::define('is-admin',function ($user){
            return $user->hasAnyRole('admin');
        });

        Gate::define('is-niveau1',function ($user){
            return $user->hasAnyRole('niveau 1');
        });

        Gate::define('is-niveau2',function ($user){
            return $user->hasAnyRole('niveau 2');
        });

        Gate::define('is-niveau3',function ($user){
            return $user->hasAnyRole('niveau 3');
        });*/
        Gate::define('edit-users',function ( $user){
            return $user->IsAdmin();
        });
        Gate::define('delete-users',function ($user){
            return $user->IsAdmin();
        });
    }
}
