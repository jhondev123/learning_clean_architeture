<?php

namespace Jhonattan\CleanArchiteture\Application\UseCases\ExportRegistration;

use DateTimeInterface;

final class OutputBoundary
{
    public function __construct(private string $fullFileName)
    {
        
    }
    public function getFullFileName(): string
    {
        return $this->fullFileName;
    }
}
