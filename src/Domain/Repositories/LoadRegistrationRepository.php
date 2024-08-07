<?php

namespace Jhonattan\CleanArchiteture\Domain\Repositories;

use Jhonattan\CleanArchiteture\Domain\ValueObjects\Cpf;
use Jhonattan\CleanArchiteture\Domain\Entities\Registration;

interface LoadRegistrationRepository
{
    public function loadByRegistrationNumber(Cpf $cpf): Registration;
    
        
    
}
