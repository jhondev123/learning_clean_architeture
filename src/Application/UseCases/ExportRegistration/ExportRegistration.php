<?php

namespace Jhonattan\CleanArchiteture\Application\UseCases\ExportRegistration;

use DateTime;
use Jhonattan\CleanArchiteture\Domain\ValueObjects\Cpf;
use Jhonattan\CleanArchiteture\Application\Contracts\Storage;
use Jhonattan\CleanArchiteture\Application\Contracts\ExportRegistrationPdfExporter;
use Jhonattan\CleanArchiteture\Domain\Repositories\LoadRegistrationRepository;
use Jhonattan\CleanArchiteture\Application\UseCases\ExportRegistration\InputBoundary;
use Jhonattan\CleanArchiteture\Application\UseCases\ExportRegistration\OutputBoundary;

final class ExportRegistration
{
    public function __construct(
        private LoadRegistrationRepository $loadRegistrationRepository,
        private ExportRegistrationPdfExporter $pdfExporter,
        private Storage $storage
    ) {
    }
    public function handle(InputBoundary $inputBoundary): OutputBoundary
    {
        $cpf = new Cpf($inputBoundary->getRegistrationNumber());
        $registration = $this->loadRegistrationRepository->loadByRegistrationNumber($cpf);
        $fileContent = $this->pdfExporter->generate($registration);
        $this->storage->store($inputBoundary->getPdfFilename(), $inputBoundary->getPath(), $fileContent);

        return new OutputBoundary($inputBoundary->getPdfFilename() . DIRECTORY_SEPARATOR . $inputBoundary->getPdfFilename());
    }
}
