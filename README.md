# Laravel Arionum

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Style CI][ico-styleci]][link-styleci]
[![Code Coverage][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A Laravel adapter for the [Arionum PHP wrapper][link-arionum-php].

## Install

Via Composer

```bash
$ composer require pxgamer/laravel-arionum
```

## Usage

This adapter allows the use of the Arionum PHP wrapper directly in Laravel projects.

The `ARIONUM_NODE_URI` property must be set in the `.env` or environment.

All methods can be used statically, via the `Arionum` facade, or resolved from the service container.

```php
// Resolving from the app container
app(\pxgamer\Arionum\Arionum::class)->getNodeInfo();
app('arionum')->getNodeInfo();

// Using the facade (with, and without the short alias)
\Arionum::getNodeInfo();
\pxgamer\LaravelArionum\ArionumFacade::getNodeInfo();

// Type hinting with dependency injection
public function __construct(\pxgamer\Arionum\Arionum $arionum)
{
    $arionum->getNodeInfo();
}
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

```bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CODE_OF_CONDUCT](.github/CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email security@pxgamer.xyz instead of using the issue tracker.

## Credits

- [pxgamer][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/pxgamer/laravel-arionum.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/pxgamer/laravel-arionum/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/205146498/shield
[ico-code-quality]: https://img.shields.io/codecov/c/github/pxgamer/laravel-arionum.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pxgamer/laravel-arionum.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pxgamer/laravel-arionum
[link-travis]: https://travis-ci.com/pxgamer/laravel-arionum
[link-styleci]: https://styleci.io/repos/205146498
[link-code-quality]: https://codecov.io/gh/pxgamer/laravel-arionum
[link-downloads]: https://packagist.org/packages/pxgamer/laravel-arionum
[link-arionum-php]: https://github.com/pxgamer/arionum-php
[link-author]: https://github.com/pxgamer
[link-contributors]: ../../contributors
