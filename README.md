# Laravel Arionum

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-github-actions]][link-github-actions]
[![Style CI][ico-styleci]][link-styleci]
[![Total Downloads][ico-downloads]][link-downloads]
[![Buy us a tree][ico-treeware-gifting]][link-treeware-gifting]

A Laravel adapter for the [Arionum PHP wrapper][link-arionum-php].

## Install

Via Composer

```bash
$ composer require owenvoke/laravel-arionum
```

## Usage

This adapter allows the use of the Arionum PHP wrapper directly in Laravel projects.

The `ARIONUM_NODE_URI` property must be set in the `.env` or environment.

All methods can be used statically, via the `Arionum` facade, or resolved from the service container.

```php
// Resolving from the app container
app(\OwenVoke\Arionum\Arionum::class)->getNodeInfo();
app('arionum')->getNodeInfo();

// Using the facade (with, and without the short alias)
\Arionum::getNodeInfo();
\OwenVoke\LaravelArionum\ArionumFacade::getNodeInfo();

// Type hinting with dependency injection
public function __construct(\OwenVoke\Arionum\Arionum $arionum)
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

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email security@voke.dev instead of using the issue tracker.

## Credits

- [Owen Voke][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Treeware

You're free to use this package, but if it makes it to your production environment you are required to buy the world a tree.

It’s now common knowledge that one of the best tools to tackle the climate crisis and keep our temperatures from rising above 1.5C is to plant trees. If you support this package and contribute to the Treeware forest you’ll be creating employment for local families and restoring wildlife habitats.

You can buy trees [here][link-treeware-gifting].

Read more about Treeware at [treeware.earth][link-treeware].

[ico-version]: https://img.shields.io/packagist/v/owenvoke/laravel-arionum.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-github-actions]: https://img.shields.io/github/workflow/status/owenvoke/laravel-arionum/Continuous%20Integration.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/205146498/shield
[ico-downloads]: https://img.shields.io/packagist/dt/owenvoke/laravel-arionum.svg?style=flat-square
[ico-treeware-gifting]: https://img.shields.io/badge/Treeware-%F0%9F%8C%B3-lightgreen?style=flat-square

[link-packagist]: https://packagist.org/packages/owenvoke/laravel-arionum
[link-github-actions]: https://github.com/owenvoke/laravel-arionum/actions
[link-styleci]: https://styleci.io/repos/205146498
[link-downloads]: https://packagist.org/packages/owenvoke/laravel-arionum
[link-arionum-php]: https://github.com/owenvoke/arionum-php
[link-treeware]: https://treeware.earth
[link-treeware-gifting]: https://ecologi.com/owenvoke?gift-trees
[link-author]: https://github.com/owenvoke
[link-contributors]: ../../contributors
