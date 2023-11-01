<?php

namespace App\Exceptions;

use Exception;

class RequestTimeoutException extends Exception
{
    public static function message()
    {
        return new static('Запрос выполняется слишком долго.');
    }
}
