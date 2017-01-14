# Sitemap

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]


A little package to generate and maintain Google-compliant XML sitemaps for Laravel. Includes admin panel to add static pages, images, subdomains for translations and to generate sitemaps accordingly. Can easily be extended to add your own sitemaps for things like blogs, etc.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practises by being named the following.

```
src/
test/
```


## Install

Via Composer - THIS IS NOT ON PACKAGIST YET!!!

``` bash
$ composer require escuccim/Sitemap
```

# Add to app.php config file.

# Run the migrations

# Publish the vendor files if you want

# Is that it?

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
