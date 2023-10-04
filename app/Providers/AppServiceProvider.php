<?php

namespace App\Providers;

use App\Models\Support\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('navigate-as-admin', fn (User $user) => $user->role_id === Role::ADMIN);
        Gate::define('navigate-as-teacher', fn (User $user) => $user->role_id === Role::TEACHER);
        Gate::define('navigate-as-student', fn (User $user) => $user->role_id === Role::STUDENT);
    }
}
