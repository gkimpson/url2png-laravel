# Laravel wrapper for url2png API for generating website thumbnails
https://packagist.org/packages/gkimpson/url2png-laravel

Laravel package for URL2PNG.com - an API for generating website thumbnails (tested on Laravel 9.x)
You will need to apply for an account from https://www.url2png.com and get yourself an api key & secret to generate thumbnails.

## Installation

You can install the package via composer:

```bash
composer require gkimpson/url2png-laravel
```

## Usage

```php
// this would ideally be in your .env just added this for here ease, apply for these keys from URL2PNG.com
$url2pngConfig = [
    'apiKey' => 'P5023B6XXXXXXX',
    'secret' => 'S5F9C03XXXXXXX',
];
$url2png = new Url2pngLaravelClass($url2pngConfig);

// These options are optional - if none are set it will use the default values
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
