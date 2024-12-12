<?php

namespace Modules\User\Action;

use Modules\User\Contracts\RegisterContract;
use Modules\User\DTOs\NewUserDTO;
use Modules\User\Models\User;
use Illuminate\Auth\Events\Registered;

class RegistrationAction implements RegisterContract
{
    public function __invoke(NewUserDTO $data)
    {
        $user = User::query()->create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => bcrypt($data->password )
        ]);

        $user->markEmailAsVerified();

        event(new Registered($user));

        auth()->login($user);

    }


}
