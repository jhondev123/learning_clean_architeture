<?php

namespace Jhonattan\CleanArchiteture\Domain\ValueObjects;

final class Email
{
    public function __construct(private string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \DomainException('Invalid email format');
        }
        $this->email = $email;
    }
    public function value(): string
    {
        return $this->email;
    }
    public function __toString()
    {
        return $this->email;
    }
}
