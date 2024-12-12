<?php

namespace Modules\User\Providers;

use Carbon\Laravel\ServiceProvider;
use Modules\User\Action\RegistrationAction;
use Modules\User\Contracts\RegisterContract;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        RegisterContract::class => RegistrationAction::class
    ];

}
