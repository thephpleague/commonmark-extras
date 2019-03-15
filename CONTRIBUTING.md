# Contributing

Contributions are **welcome** and will be fully **credited**.

We accept contributions via Pull Requests on [Github](https://github.com/thephpleague/commonmark-extras).

## New Extensions & Features

New extensions and features will only be considered if they meet all of the following criteria:

1. The extension/feature is bundled as a standalone extension, preferably under the PHP League.
2. External dependencies should be avoided where possible - use plain PHP code and common extensions.
3. Contributions must have a common use case found in other flavors of Markdown like GFM which other people may find useful.

## Pull Requests

- **[PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)** - The easiest way to apply the conventions is to install [PHP Code Sniffer](http://pear.php.net/package/PHP_CodeSniffer).

- **Add tests!** - Your patch won't be accepted if it doesn't have tests.

- **Document any change in behaviour** - Make sure the `README.md` and any other relevant documentation are kept up-to-date.

- **Consider our release cycle** - We try to follow [SemVer v2.0.0](http://semver.org/). Randomly breaking public APIs is not an option.

- **Create feature branches** - Don't ask us to pull from your master branch.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

- **Send coherent history** - Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please [squash them](http://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#Changing-Multiple-Commit-Messages) before submitting.

- **Docblocks** - All files should start with the following docblock:

~~~
/*
 * This file is part of the league/commonmark-extras package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * Authored by Your Name <youremail@domain.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
~~~

The "Authored by" line is optional.


## Running Tests

``` bash
$ composer test
```


**Happy coding**!
