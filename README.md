# SierraTecnologia Muleta

**SierraTecnologia common** Muleta helpers, contracts, and traits required by various SierraTecnologia packages. Validator functionality, and basic controller included out-of-the-box.

[![Packagist](https://img.shields.io/packagist/v/sierratecnologia/muleta.svg?label=Packagist&style=flat-square)](https://packagist.org/packages/sierratecnologia/muleta)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/sierratecnologia/muleta.svg?label=Scrutinizer&style=flat-square)](https://scrutinizer-ci.com/g/sierratecnologia/muleta/)
[![Travis](https://img.shields.io/travis/sierratecnologia/muleta.svg?label=TravisCI&style=flat-square)](https://travis-ci.org/sierratecnologia/muleta)
[![StyleCI](https://styleci.io/repos/60968880/shield)](https://styleci.io/repos/60968880)
[![License](https://img.shields.io/packagist/l/sierratecnologia/muleta.svg?label=License&style=flat-square)](https://github.com/sierratecnologia/muleta/blob/develop/LICENSE)


> **Note:** this package is just a support package for other SierraTecnologia packages, which may not be useful on it's own, but contains some complementary generic functionality and also may not respect SemVer and break backward compatibility.


## Installation

Install via `composer require sierratecnologia/muleta`


## Usage

## Get/Set Generator

Use o Trait na classe e add a documentação corretamente

```php
use Muleta\Traits\Coder\GetSetTrait;
    ...
    /**
     * Atributos
     */
    use GetSetTrait;

    /**
     * Identify ClassName
     *
     * @var          string
     * @getter       true
     * @setter       false
     * @serializable true
     */
    protected $modelClass;
    ...
```



## Support Helpers

### `intend()`

The `intend` method returns redirect response:
```php
intend([
    'route' => 'route.name.here',
    'withErrors' => ['error.message.id' => 'A custom error message'],
]);
```

> **Note:** this helper accepts `redirect` methods as it's input keys, such as `withErrors`, `with`, `back`, and `route` ..etc

### `lower_case()`

The `lower_case` method converts the given string to lower-case:
```php
$lowercaseStr = lower_case('THIS UPPER CASE TEXT WILL BE LOWER CASED');
```

### `upper_case()`

The `upper_case` method converts the given string to upper-case:
```php
$uppercaseStr = upper_case('this lower case text will be capitalized');
```

### `mimetypes()`

The `mimetypes` method gets valid mime types:
```php
$mimetypes = mimetypes();
```

### `timezones()`

The `timezones` method gets valid timezones:
```php
$timezones = timezones();
```


## Changelog

Refer to the [Changelog](CHANGELOG.md) for a full history of the project.


## Support

The following support channels are available at your fingertips:

- [Chat on Slack](https://bit.ly/sierratecnologia-slack)
- [Help on Email](mailto:help@sierratecnologia.com)
- [Follow on Twitter](https://twitter.com/sierratecnologia)


## Contributing & Protocols

Thank you for considering contributing to this project! The contribution guide can be found in [CONTRIBUTING.md](CONTRIBUTING.md).

Bug reports, feature requests, and pull requests are very welcome.

- [Versioning](CONTRIBUTING.md#versioning)
- [Pull Requests](CONTRIBUTING.md#pull-requests)
- [Coding Standards](CONTRIBUTING.md#coding-standards)
- [Feature Requests](CONTRIBUTING.md#feature-requests)
- [Git Flow](CONTRIBUTING.md#git-flow)


## Security Vulnerabilities

If you discover a security vulnerability within this project, please send an e-mail to [help@sierratecnologia.com](help@sierratecnologia.com). All security vulnerabilities will be promptly addressed.


## About SierraTecnologia

SierraTecnologia is a software solutions startup, specialized in integrated enterprise solutions for SMEs established in Alexandria, Egypt since June 2016. We believe that our drive The Value, The Reach, and The Impact is what differentiates us and unleash the endless possibilities of our philosophy through the power of software. We like to call it Innovation At The Speed Of Life. That’s how we do our share of advancing humanity.


## License

This software is released under [The MIT License (MIT)](LICENSE).

(c) 2016-2020 SierraTecnologia LLC, Some rights reserved.
