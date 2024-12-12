<?php

namespace Tests\Feature\Http;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Controllers\LoginController;
use Tests\RequestFactories\SignInFormRequestFactory;

uses(RefreshDatabase::class);


it('shows login page', function () {
    $this->get(action([LoginController::class, 'page']))
        ->assertStatus(200)
        ->assertSee('Вход в аккаунт')
        ->assertViewIs('user.login');
});

it('signs in View', function () {
    $password = '12345678';

    try {
        $user = UserFactory::new()->create([
            'email' => 'daniyar.san@gmail.com',
            'password' => bcrypt($password)
        ]);

    } catch (\Throwable $e) {
        dd($e);
    }

    $request = SignInFormRequestFactory::new()->create([
        'email' => $user->email,
        'password' => $password
    ]);

    $response = $this->post(action([LoginController::class, 'handle']), $request);

    $response->assertValid()->assertRedirectToroute('index');

    $this->assertAuthenticatedAs($user);
});


it('logouts View', function () {
    $user = UserFactory::new()->create();
    $this->actingAs($user)->delete(action([LoginController::class, 'logout']));
    $this->assertGuest();
});



/* Testing API */
//it('can create a to-do', function () {
//    $attributes = Todo::factory()->raw();
//    $response = $this->postJson('/api/todos', $attributes);
//    $response->assertStatus(201)->assertJson(['message' => 'Todo has been created']);
//    $this->assertDatabaseHas('todos', $attributes);
//});
