<?php

namespace Jhonattan\CleanArchiteture\Domain\Entities;

use DateTimeInterface;
use Jhonattan\CleanArchiteture\Domain\ValueObjects\Cpf;
use Jhonattan\CleanArchiteture\Domain\ValueObjects\Email;

final class Registration
{
    private string $name;
    private Email $email;
    private Cpf $registrationNumber;
    private DateTimeInterface $registrationAt;
    private DateTimeInterface $birthDate;

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): Registration
    {
        $this->name = $name;
        return $this;
    }
    public function getEmail(): Email
    {
        return $this->email;
    }
    public function setEmail(Email $email): Registration
    {
        $this->email = $email;
        return $this;
    }
    public function getRegistrationNumber(): Cpf
    {
        return $this->registrationNumber;
    }
    public function setRegistrationNumber(Cpf $registrationNumber): Registration
    {
        $this->registrationNumber = $registrationNumber;
        return $this;
    }
    public function getRegistrationAt(): DateTimeInterface
    {
        return $this->registrationAt;
    }
    public function setRegistrationAt(DateTimeInterface $registrationAt): Registration
    {
        $this->registrationAt = $registrationAt;
        return $this;
    }
    public function getBirthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }
    public function setBirthDate(DateTimeInterface $birthDate): Registration
    {
        $this->birthDate = $birthDate;
        return $this;
    }
}
