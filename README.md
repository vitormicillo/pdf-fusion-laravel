# PDF Fusion for Laravel 6 and 7

[![Latest Version on Packagist](https://img.shields.io/packagist/v/doode/pdf-fusion-laravel.svg?style=flat-square)](https://packagist.org/packages/doode/pdf-fusion-laravel)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Quality Score](https://img.shields.io/scrutinizer/g/vitormicillo/pdf-fusion-laravel.svg?style=flat-square)](https://scrutinizer-ci.com/g/vitormicillo/pdf-fusion-laravel)
[![Total Downloads](https://img.shields.io/packagist/dt/doode/pdf-fusion-laravel.svg?style=flat-square)](https://packagist.org/packages/doode/pdf-fusion-laravel)

PDF Fusion for Laravel. Tested with Laravel 6,7 and **`8`**.

## Advantages
* Also works with PDF versions above **`1.4`**
* Works with **`PHP7.2 ^ `** for laravel up to **`7`**
* Works with **`PHP7.3 ^ `** for laravel up to **`8`**

## Installation

You can install the package via composer:

```bash
composer require doode/pdf-fusion-laravel
```

## If you have a linux system (Debian/Ubuntu)

```bash
apt-get install ghostscript
```


## If you have a linux system (Arch Linux)

```bash
pacman -S ghostscript
```

## Configuration
Make the following changes at **`config/app.php`** if your laravel version does not automatically identify the package
```php
'providers' => [
   ...
   Doode\PdfFusionLaravel\Providers\PdfFusionServiceProvider::class
],

'aliases' => [
   ...
   'PdfFusion' => Doode\PdfFusionLaravel\Facades\PdfFusionFacade::class
]
```

> When merging PDFs versions above 1.4 or PDF strings, a temporary PDF will be created during the process and stored in `storage/tmp` directory, therefore you may need to create it beforehand.

> **ATENTION**

> Also, note that this package requires **Ghostscript** installed on the server in order to functiona properly with PDF versions 1.5+. [Install Guide](https://www.ghostscript.com/doc/9.20/Install.htm)



## Usage

You can add PDFs for fusion, by specifying a file path of PDF with `addPathToPDF` method, or adding PDF file as string with `addPDFString` method. The second argument of both methods is array of selected pages (`'all'` for all pages) and the third argument is PDFs orientation (portrait or landscape).

```[P] = Portrait``` <br>
```[L] = Landscape```

```php
$fusion->addPathToPDF('/path/to/pdf', 'all', 'P');
$fusion->addPDFString(file_get_contents('path/to/pdf'), ['1', '2'], 'L')
```

You can set a merged PDF name by using `setFileName` method.
```php
$merger->setFileName('output.pdf');
```

In the end, finnish process with `merge` or `duplexMerge` method and use one of the output options for the merged PDF. The difference bwetween two methods is, that `duplexMerge` adds blank page after each merged PDF, if it has odd number of pages.

**Available output options are:**
  * `inline()`
  * `download()`
  * `string()`
  * `save('path/to/merged.pdf')`

```php
$fusion->merge();
$fusion->inline();
```

**Example usage**
```php
$fusion = \PdfFusion::init();
$fusion->addPathToPDF(base_path('/vendor/doode/pdf-fusion-laravel/examples/one.pdf'), [2], 'P');
$fusion->addPDFString(file_get_contents(base_path('/vendor/doode/pdf-fusion-laravel/examples/two.pdf')), 'all', 'L');
$fusion->merge();
$fusion->save(public_path('/pdfs/output.pdf'));
```

## Authors
* [Vitor Micillo](https://github.com/vitormicillo)


## Credits
* **Webklex** [LaravelPDFMerger](https://github.com/Webklex/laravel-pdfmerger)

# License
The MIT License (MIT)

Copyright (c) 2020 Doode

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
