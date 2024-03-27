<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TelegramErrorException extends Exception
{
    /**
     * Report the exception.
     */
    public function report(): void
    {
        //
    }

}
