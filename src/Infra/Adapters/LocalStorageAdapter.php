<?php

namespace Jhonattan\CleanArchiteture\Infra\Adapters;

use Jhonattan\CleanArchiteture\Application\Contracts\Storage;

class LocalStorageAdapter implements Storage
{
    public function store(string $fileName, string $path, string $content): void
    {
        file_put_contents($path . DIRECTORY_SEPARATOR . $fileName, $content);
    }
}
