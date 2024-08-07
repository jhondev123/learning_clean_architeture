<?php

namespace Jhonattan\CleanArchiteture\Application\Contracts;

use Jhonattan\CleanArchiteture\Domain\Entities\Registration;

interface ExportRegistrationPdfExporter
{
    public function generate(Registration $registration): string;
}
