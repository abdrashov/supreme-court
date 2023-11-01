<?php

namespace App\Exceptions;

use Exception;

class Unauthorized extends Exception
{
    public static function message(): static
    {
        return new static('Unauthorized.');
    }
}
