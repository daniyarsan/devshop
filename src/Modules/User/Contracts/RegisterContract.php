<?php

namespace Modules\User\Contracts;

use Modules\User\DTOs\NewUserDTO;

interface RegisterContract
{
    public function __invoke(NewUserDTO $data);
}
