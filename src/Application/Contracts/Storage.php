<?php

namespace Jhonattan\CleanArchiteture\Application\Contracts;

interface Storage
{
    public function store(string $filename,string $path, string $content): void;
}
