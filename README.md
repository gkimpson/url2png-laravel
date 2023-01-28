# Laravel wrapper for url2png API for generating website thumbnails

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gkimpson/url2png-laravel.svg?style=flat-square)](https://packagist.org/packages/gkimpson/url2png-laravel)
[![Tests](https://img.shields.io/github/actions/workflow/status/gkimpson/url2png-laravel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/gkimpson/url2png-laravel/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/gkimpson/url2png-laravel.svg?style=flat-square)](https://packagist.org/packages/gkimpson/url2png-laravel)

Laravel package for URL2PNG.com - an API for generating website thumbnails (tested on Laravel 9.x)

## Installation

You can install the package via composer:

```bash
composer require gkimpson/url2png-laravel
```

## Usage

```php
// this would ideally be in your .env just added this for here ease
$url2pngConfig = [
    'apiKey' => 'P5023B6XXXXXXX',
    'secret' => 'S5F9C03XXXXXXX',
];
$url2png = new Url2pngLaravelClass($url2pngConfig);
$options = array(
    'unique'    => round(time()/60/60,0);       # Limit capture to once per hour
    'viewport' 	=> '1280x1024';                 # Max 5000x5000; Default 1280x1024      
    'fullpage'	=> 'false',                     # [true,false] Default: false
    'thumbnail_max_width' => 'false';           # scaled image width in pixels; Default no-scaling.
);
echo $url2png->generate('https://www.github.com', $options);
```

This will output a URL similar to this below which will be the screenshot based on the url and parameters set (if no options set it will use default settings) 
```php
https://api.url2png.com/v6/apikey/xxxsecretkeyxxx/png/?url=https%3A%2F%2Fwww.bbc.co.uk%2Fnews%2Fuk-politics-64434202
```

## Testing

```bash
composer test --(tests to come)
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Gavin Kimpson](https://github.com/gkimpson)

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
