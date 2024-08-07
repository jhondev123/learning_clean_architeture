<?php

namespace Jhonattan\CleanArchiteture\Infra\Presentation;

use Jhonattan\CleanArchiteture\Http\Controllers\Presentation;

class ExportRegistrationPresenter implements Presentation
{
    public function output(array $data):string
    {
        
        return json_encode($data);
    }
}
