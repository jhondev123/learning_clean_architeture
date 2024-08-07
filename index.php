<?php

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Jhonattan\CleanArchiteture\Domain\ValueObjects\Cpf;
use Jhonattan\CleanArchiteture\Domain\ValueObjects\Email;
use Jhonattan\CleanArchiteture\Domain\Entities\Registration;
use Jhonattan\CleanArchiteture\Infra\Adapters\DomPdfAdapter;
use Jhonattan\CleanArchiteture\Infra\Adapters\LocalStorageAdapter;
use Jhonattan\CleanArchiteture\Http\Controllers\ExportRegistrationController;
use Jhonattan\CleanArchiteture\Infra\Presentation\ExportRegistrationPresenter;
use Jhonattan\CleanArchiteture\Infra\Repositories\MySQL\PdoRegistrationRepository;
use Jhonattan\CleanArchiteture\Application\UseCases\ExportRegistration\InputBoundary;
use Jhonattan\CleanArchiteture\Application\UseCases\ExportRegistration\ExportRegistration;

require_once __DIR__ . "/vendor/autoload.php";
$appConfig = require_once __DIR__ . "/config/app.php";

$dsn = sprintf(
    'mysql:host=%s;port=%s;dbname=%s;charset=%s',
    $appConfig['mysql']['host'],
    $appConfig['mysql']['port'],
    $appConfig['mysql']['dbname'],
    $appConfig['mysql']['charset']
);
$pdo = new PDO($dsn, $appConfig['mysql']['username'], $appConfig['mysql']['password'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_PERSISTENT => TRUE
]);

// use cases
$loadRegistrationRepository = new PdoRegistrationRepository($pdo);
print_r($loadRegistrationRepository->loadByRegistrationNumber(new Cpf("13612599909")));
exit();



$pdfExporter = new DomPdfAdapter();
$storage = new LocalStorageAdapter();
$exportRegistration = new ExportRegistration($loadRegistrationRepository, $pdfExporter, $storage);

$request = new Request('GET','http://localhost:8000');
$response = new Response();

$controller = new ExportRegistrationController($request, $response, $exportRegistration);

$presentation = new ExportRegistrationPresenter();
$controller->handle($presentation);
