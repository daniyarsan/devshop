<?php

namespace App\Listeners;

use App\Notifications\NewUserRegistrationNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailNewUserListener
{

    public function handle(Registered $event): void
    {
        $event->user->notify(new NewUserRegistrationNotification());
    }
}
