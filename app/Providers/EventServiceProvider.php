<?php

namespace App\Providers;

use App\Listeners\SendEmailNewUserListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        Registered::class => [
SendEmailNewUserListener::class
        ]
    ];

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        //
    }
}
