<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Blade::if('isAdmin', function ($user) {
            return auth()->check() && $user->admin;
        });

        \Blade::if('isBlocked', function ($user) {
            return auth()->check() && $user->blocked;
        });

        \Blade::if('admin', function () {
            return auth()->check() && auth()->user()->isAdmin();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
