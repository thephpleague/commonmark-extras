# league/commonmark-extras

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

**league/commonmark-extras** is a collection of useful extensions and utilities
for the [league/commonmark][link-league-commonmark] project.

Adding this extension to your project will automatically register these sub-extensions:

| **Extension** | **Purpose** |
| :------------ | :---------- |
| [league/commonmark-ext-autolink](https://github.com/thephpleague/commonmark-ext-autolink) | Automatically creating links to URLs and email address (without needing the `<...>` syntax) |
| [league/commonmark-ext-smartpunct](https://github.com/thephpleague/commonmark-ext-smartpunct) | Intelligently converts ASCII quotes, dashes, and ellipses to their Unicode equivalents |

## Install

Via Composer

``` bash
$ composer require league/commonmark-extras
```

## Usage

This can be added to any new `Environment`:

``` php
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use League\CommonMark\Extras\CommonMarkExtrasExtension;

// Obtain a pre-configured Environment with all the CommonMark parsers/renderers ready-to-go
$environment = Environment::createCommonMarkEnvironment();

// REGISTER THIS EXTENSION HERE
$environment->addExtension(new CommonMarkExtrasExtension());

// Define your configuration:
$config = [];

// Now that the `Environment` is configured we can create the converter engine:
$converter = new CommonMarkConverter($config, $environment);

// Go forth and convert you some Markdown!
echo $converter->convertToHtml('# Hello World!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email colinodell@gmail.com instead of using the issue tracker.

## Credits

- [Colin O'Dell][link-author]
- [All Contributors][link-contributors]

## License

This library is licensed under the BSD-3 license.  See the [LICENSE file](LICENSE) for more information.

[ico-version]: https://img.shields.io/packagist/v/league/commonmark-extras.svg?style=flat-square
[ico-license]: http://img.shields.io/badge/License-BSD--3-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/thephpleague/commonmark-extras/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/thephpleague/commonmark-extras.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/thephpleague/commonmark-extras.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/league/commonmark-extras.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/league/commonmark-extras
[link-travis]: https://travis-ci.org/thephpleague/commonmark-extras
[link-scrutinizer]: https://scrutinizer-ci.com/g/thephpleague/commonmark-extras/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/thephpleague/commonmark-extras
[link-downloads]: https://packagist.org/packages/league/commonmark-extras
[link-author]: https://github.com/colinodell
[link-contributors]: ../../contributors
[link-league-commonmark]: https://github.com/thephpleague/commonmark
