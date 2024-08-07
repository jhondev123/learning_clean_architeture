<?php

namespace Jhonattan\CleanArchiteture\Infra\Repositories\MySQL;

use PDO;
use DateTime;
use Jhonattan\CleanArchiteture\Domain\ValueObjects\Cpf;
use Jhonattan\CleanArchiteture\Domain\ValueObjects\Email;
use Jhonattan\CleanArchiteture\Domain\Entities\Registration;
use Jhonattan\CleanArchiteture\Domain\Repositories\LoadRegistrationRepository;
use Jhonattan\CleanArchiteture\Domain\Exceptions\RegistrationNotFoundException;

final class PdoRegistrationRepository implements LoadRegistrationRepository
{
    public function __construct(private PDO $pdo)
    {
    }
    public function loadByRegistrationNumber(Cpf $cpf): Registration
    {
        $statement = $this->pdo->prepare("SELECT * FROM registrations WHERE registration_number = :cpf");
        $statement->execute(['cpf' => (string)$cpf->getValue()]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            throw new RegistrationNotFoundException((string)$cpf);
        }
        $registration = new Registration();

        $registration->setName($row['name'])
            ->setBirthDate(new DateTime($row['birth_date']))
            ->setEmail(new Email($row['email']))
            ->setRegistrationNumber(new Cpf($row['registration_number']))
            ->setRegistrationAt(new DateTime( $row['created_at']));

        return $registration;
    }
}
