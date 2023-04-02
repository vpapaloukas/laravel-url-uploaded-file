# Vpap\UrlUploadedFile

This package extends Laravel's [`UploadedFile`](https://github.com/laravel/framework/blob/9.x/src/Illuminate/Http/UploadedFile.php) functionality using file URLs instead of regular file uploads.

## Usage

``` php
use Vpap\UrlUploadedFile\UrlUploadedFile;

$file = UrlUploadedFile::createFromUrl('https://placehold.it/150x150');
```

## Credits & More Info

Original repository - unmaintained [`naxon/laravel-url-uploaded-file`](https://github.com/naxon/laravel-url-uploaded-file)
