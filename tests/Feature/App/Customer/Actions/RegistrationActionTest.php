<?php

use Modules\User\Contracts\RegisterContract;
use Modules\User\DTOs\NewUserDTO;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('it registers View successfully', function () {
    $email = 'test@gmail.com';
    $this->assertDatabaseMissing('users', [
        'email' => $email
    ]);

    $action = app(RegisterContract::class);
    $action(NewUserDTO::make('test', $email, '1234567890'));

    $this->assertDatabaseHas('users', [
        'email' => $email
    ]);
});
