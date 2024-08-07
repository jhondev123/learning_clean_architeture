<?php

namespace Jhonattan\CleanArchiteture\Domain\Exceptions;

use Exception;
use Throwable;

class RegistrationNotFoundException extends Exception
{
    public function __construct(string $registrationNumber, Throwable $previous = null)
    {
        $message = "Registration with CPF {$registrationNumber} not found";
        parent::__construct($message, 0, $previous);
    }
}
