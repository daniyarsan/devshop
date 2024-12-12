<?php

namespace Tests\Feature\Http;

use App\Http\Requests\SignupFormRequest;
use App\Listeners\SendEmailNewUserListener;
use App\Notifications\NewUserRegistrationNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Modules\User\Controllers\RegistrationController;
use Tests\RequestFactories\SignupFormRequestFactory;


uses( RefreshDatabase::class);

it('shows registration page', function () {
    $this->get(action([RegistrationController::class, 'page']))->assertStatus(200);
});

it('creates View', function () {
    Notification::fake();
    Event::fake();

//    $View = \Database\Factories\CustomerFactory::new()->raw();
    $userRequest = SignupFormRequest::factory()->create([
        'password' => '12345678',
        'password_confirmation' => '12345678'
    ]);

    $this->assertDatabaseMissing('users', [
        'email' => $userRequest['email']
    ]);

    $response = $this->post(action([RegistrationController::class, 'handle']), $userRequest);
    $response->assertValid();

    $createdUser = \Modules\User\Models\User::query()->latest()->first();

    expect($createdUser)
        ->name->toBe($userRequest['name'])
        ->email->toBe($userRequest['email']);
    // SIMILAR TO
    $this->assertDatabaseHas('users', ['email' => $userRequest['email']]);

    Event::assertDispatched(Registered::class);
    Event::assertListening(Registered::class, SendEmailNewUserListener::class);

    $event = new Registered($createdUser);
    $listener = new SendEmailNewUserListener();
    $listener->handle($event);

    Notification::assertSentTo($createdUser, NewUserRegistrationNotification::class);

    $this->assertAuthenticatedAs($createdUser);

    $response->assertRedirect(route('index'));
});

it('validates registration input', function () {
    $userRequest = SignupFormRequestFactory::new()->create([
        'name' => '',
        'email' => '',
        'password' => '12345678',
        'password_confirmation' => '123456789',
    ]);

    $response = $this->post(action([RegistrationController::class, 'handle']), $userRequest);
    $response->assertSessionHasErrors(['name', 'email', 'password']);

});
