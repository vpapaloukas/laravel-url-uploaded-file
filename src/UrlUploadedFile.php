<?php

namespace Vpap\UrlUploadedFile;

use Illuminate\Http\UploadedFile;

class UrlUploadedFile extends UploadedFile
{
    protected int $error = \UPLOAD_ERR_OK;

    protected bool $test = false;

    public static function createFromUrl(
        string $url,
        string $originalName = '',
        string $mimeType = null,
        int $error = null,
        bool $test = false
    ): self {
        if (! $stream = @fopen($url, 'r')) {
            throw new CantOpenFileFromUrlException($url);
        }

        $tempFile = tempnam(sys_get_temp_dir(), 'url-file-');
        file_put_contents($tempFile, $stream);
        fclose($stream);
        
        $remoteHeaders = array_change_key_case(get_headers($url, 1), CASE_LOWER);
        $mimeType = data_get($remoteHeaders,'content-type');

        return new static($tempFile, $originalName, $mimeType, $error, $test);
    }

    public function isValid(): bool
    {
        $isOk = \UPLOAD_ERR_OK === $this->error;

        return $this->test ? $isOk : $isOk && $this->getPathname();
    }
}
