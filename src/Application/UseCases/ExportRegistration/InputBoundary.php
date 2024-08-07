<?php

namespace Jhonattan\CleanArchiteture\Application\UseCases\ExportRegistration;

final class InputBoundary
{
    public function __construct(
        private string $registrationNumber,
        private string $pdfFilename,
        private string $path

    ) {
    }
    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }
    public function getPdfFilename(): string
    {
        return $this->pdfFilename;
    }
    public function getPath(): string
    {
        return $this->path;
    }
}
