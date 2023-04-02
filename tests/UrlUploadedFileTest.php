<?php

namespace Vpap\UrlUploadedFile\Tests;

use Orchestra\Testbench\TestCase;
use Vpap\UrlUploadedFile\UrlUploadedFile;

class UrlUploadedFileTest extends TestCase
{
    public function testItCanRetrieveFilesFromUrl(): void
    {
        // This tests asserts that no exception was thrown.
        UrlUploadedFile::createFromUrl('https://placehold.it/150x150');
        $this->addToAssertionCount(1);
    }
}
