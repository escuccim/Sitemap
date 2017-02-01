# Sitemap

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]


A package to generate and maintain Google-compliant XML sitemaps for Laravel. Includes admin panel to add static pages, images, subdomains for translations and to generate sitemaps accordingly. Can easily be extended to add your own sitemaps for things like blogs, etc.

## Install

Via Composer -

``` bash
$ composer require escuccim/Sitemap
```
Register the class in config/app.php:
```
Escuccim\Sitemap\sitemapServiceProvider::class,
```
Run the migrations:
``` bash
php artisan migrate
```
The migration seeds the database with subdomain of 'www' which is set to be the default. If you wish to use other subdomains you can do so from the admin page, and can assign them to correspond with hreflang tags in the sitemap.

This package uses a middleware to determine if the user is authorized to access the sitemap admin. This extends the Laravel Auth package and adds a field to the users table called 'type' which is 1 if the user is an admin, and 0 otherwise. You need to add the middleware to app\Http\Kernel.php:
```
'admin' => \Escuccim\LaraBlog\Middleware\AdminMiddleware::class,
```

If you wish you can publish the views and config file to your app using:
```
php artisan vendor:publish
```

There are two groups of files that can be published - config publishes the migrations and config file, views publishes the views. To only publish one of these groups add --tag=config or --tag=views. 

## Usage

This package contains its own routes, controllers, models and views and migrations so should work out of the box. The admin will be located at /sitemapadmin and the sitemap for static pages as controlled by the admin will be at /sitemap/pages. 

I just added a sitemap index which is at /sitemap and is controlled by /sitemapadmin. The sitemap index takes a URI for other sitemaps you may have, as well as a 'table'. 'table' references a database table and will pull the latest updated_at date from that table to use as the lastmod date for that sitemap. If you do not specify a table it will default to the first day of the current month to use as the lastmod date.

You should use the sitemap index to list any additional sitemaps you want included in the index. The pages sitemap is always listed.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email skooch@gmail.com instead of using the issue tracker.

## Credits

- [Eric Scuccimarra][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/escuccim/Sitemap.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/escuccim/Sitemap/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/escuccim/Sitemap.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/escuccim/Sitemap.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/escuccim/Sitemap.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/escuccim/Sitemap
[link-travis]: https://travis-ci.org/escuccim/Sitemap
[link-scrutinizer]: https://scrutinizer-ci.com/g/escuccim/Sitemap/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/escuccim/Sitemap
[link-downloads]: https://packagist.org/packages/escuccim/Sitemap
[link-author]: https://github.com/escuccim
[link-contributors]: ../../contributors
