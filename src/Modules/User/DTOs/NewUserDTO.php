<?php

namespace Modules\User\DTOs;

use Illuminate\Http\Request;
use Plugins\Trait\Makable;

class NewUserDTO
{
    use Makable;

    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    )
    {
    }

    public static function fromRequest(Request $request)
    {
        return static::make(...$request->only(['name', 'email', 'password']));
    }


}
