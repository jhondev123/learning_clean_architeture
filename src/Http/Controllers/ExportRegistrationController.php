<?php

namespace Jhonattan\CleanArchiteture\Http\Controllers;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Jhonattan\CleanArchiteture\Application\UseCases\ExportRegistration\InputBoundary;
use Jhonattan\CleanArchiteture\Application\UseCases\ExportRegistration\ExportRegistration;
use Jhonattan\CleanArchiteture\Application\UseCases\ExportRegistration\OutputBoundary;

final class ExportRegistrationController
{

    public function __construct(private Request $request, private Response $response, private ExportRegistration $useCase)
    {
    }
    public function handle(Presentation $presentation): string
    {
        $inputBoundary = new InputBoundary('01234567890', 'export.pdf', __DIR__ . '/storage');
        $output = $this->useCase->handle($inputBoundary);
        return $presentation->output([
            'fullFileName' => $output->getFullFileName(),
        ]);
    }
}
