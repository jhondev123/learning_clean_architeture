<?php

namespace Jhonattan\CleanArchiteture\Http\Controllers;

interface Presentation
{
    public function output(array $data): string;
    
    
}
