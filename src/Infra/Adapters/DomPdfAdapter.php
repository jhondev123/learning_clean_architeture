<?php

namespace Jhonattan\CleanArchiteture\Infra\Adapters;

use Jhonattan\CleanArchiteture\Domain\Entities\Registration;
use Jhonattan\CleanArchiteture\Application\Contracts\ExportRegistrationPdfExporter;

use Dompdf\Dompdf;

final class DomPdfAdapter implements ExportRegistrationPdfExporter
{
    public function generate(Registration $registration): string
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml("<p>Nome: {$registration->getName()}</p><p>CPF: {$registration->getRegistrationNumber()}</p>");
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->output();
    }
}
