<?php

namespace Tests\Feature\Http;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Controllers\ForgotController;

uses(RefreshDatabase::class);


it('shows forgot password page', function () {
    $this->get(action([ForgotController::class, 'page']))
        ->assertStatus(200)
        ->assertSee('Восстановление пароля')
        ->assertViewIs('View.forgot');
});

it('sends reset email successfully', function () {
    $email = 'test@gmail.com';
    $user = UserFactory::new()->create(['email' => $email]);

    $this->post(action([ForgotController::class, 'handle'], [$email]))->assertRedirect();
});
