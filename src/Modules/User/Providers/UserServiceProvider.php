<?php

namespace Modules\User\Providers;

use Carbon\Laravel\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->register(ActionServiceProvider::class);
    }

}
