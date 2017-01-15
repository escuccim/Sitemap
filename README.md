# Sitemap

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]


A package to generate and maintain Google-compliant XML sitemaps for Laravel. Includes admin panel to add static pages, images, subdomains for translations and to generate sitemaps accordingly. Can easily be extended to add your own sitemaps for things like blogs, etc.

## Install

Via Composer - THIS IS NOT ON PACKAGIST YET!!!

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
The config will be published to: /config/sitemap.php and currently only has one value which determines if you are using subdomains for localization and if so will add hreflang tags to the sitemap. The views will be published as well.

## Usage

This package contains its own routes, controllers, models and views and migrations so should work out of the box. The admin will be located at /sitemapadmin and the sitemap for static pages as controlled by the admin will be at /sitemap/pages. I personally have a sitemap index at /sitemap which points to other sitemaps which I create by extending the MapController provided by this package with custom views and routes.

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
