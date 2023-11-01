<?php

namespace App\Exceptions;

use Exception;

class RequestTimeoutException extends Exception
{
    public static function message(): static
    {
        return new static('The request has been running for too long.');
    }
}
