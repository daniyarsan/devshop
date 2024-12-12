<?php

namespace Tests\RequestFactories;

use Worksome\RequestFactories\RequestFactory;

class SignupFormRequestFactory extends RequestFactory
{
    public function definition(): array
    {
        return [
           'name' => $this->faker->name,
           'email' => $this->faker->email,
           'password' => '12345678',
        ];
    }
}
