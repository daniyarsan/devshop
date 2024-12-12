<?php

use App\Http\Requests\SignupFormRequest;
use Modules\User\DTOs\NewUserDTO;
use Tests\RequestFactories\SignupFormRequestFactory;

it('dto has all necessary fields', function () {
    $request = new SignupFormRequest(['name' => 'Dan', 'email' => 'test@gmail.com', 'password' => '12345']);

    $dto = NewUserDTO::fromRequest($request);

    $this->assertInstanceOf(NewUserDTO::class, $dto);
});
