<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Gazda može planirati berbu
        Gate::define('isGazda', function (User $user) {
            return $user->role === 'gazda';
        });

        // Radnik može unositi berbu
        Gate::define('isRadnik', function (User $user) {
            return $user->role === 'radnik';
        });
    }
}
