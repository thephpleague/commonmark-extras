# Changelog

All Notable changes to `commonmark-extras` will be documented in this file

## [Unreleased][unreleased]

### Added

 - Added GFM-style task list support via [league/commonmark-ext-task-list v0.1.0](https://github.com/thephpleague/commonmark-ext-task-list/releases/tag/v0.1.0)

## [0.4.0] - 2019-04-19

### Added

 - Added support for [league/commonmark-ext-strikethrough v0.4.0](https://github.com/thephpleague/commonmark-ext-strikethrough/releases/tag/v0.4.0)

## [0.3.0] - 2019-04-10

### Changed

 - Made this extension compatible with `league/commonmark` 0.19

## [0.2.1] - 2019-03-16

### Added

 - Added support for [league/commonmark-ext-autolink v0.2.0](https://github.com/thephpleague/commonmark-ext-autolink/releases/tag/v0.2.0)

## [0.2.0] - 2019-03-14

**All previous functionality has been removed and placed into separate packages!** This library now serves as a meta-package to pull in officially-recommended extensions.

### Added

 - Added [league/commonmark-ext-autolink](https://github.com/thephpleague/commonmark-ext-autolink) and [league/commonmark-ext-smartpunct](https://github.com/thephpleague/commonmark-ext-smartpunct) as dependencies
 - Added `CommonMarkExtrasExtension` to pull in both of the libraries above

### Changed

 - Moved SmartPunct into its own package: <https://github.com/thephpleague/commonmark-ext-inlines-only>
 - Moved the Twitter handle parsing into its own package: <https://github.com/thephpleague/commonmark-ext-autolink>
 - Bumped the minimum PHP version up to 5.6
 - Bumped the minimum [league/commonmark](https://github.com/thephpleague/commonmark) version to 0.18.1

### Removed

 - Removed all classes implementing SmartPunct and Twitter handle parsing as those now live elsewhere
 - Removed support for PHP 5.4, PHP 5.5, and HHVM

## [0.1.5] - 2018-09-28
### Changed
 - Added league/commonmark 0.18 as a compatible version

## [0.1.4] - 2017-12-31
### Changed
 - Added league/commonmark 0.17 as a compatible version

## [0.1.3] - 2017-10-30
### Changed
 - Added league/commonmark 0.16 as a compatible version
 - Bumped target spec to 0.28 (no code changes required)

## [0.1.2] - 2016-09-19
### Changed
 - Added league/commonmark 0.14 and 0.15 as compatible versions
 - Bumped target spec to 0.26 (no code changes required)

## [0.1.1] - 2016-01-16
### Fixed
 - Fixed incorrect usage example in the README (#5)

## 0.1.0 - 2016-01-13
### Added
 - Created this new library
 - Added the SmartPunct functionality from the league/commonmark project
 - Added the Twitter handle autolinker example from the league/commonmark docs site (#1)

### Changed
 - Minor refactoring to SmartPunct's `QuoteParser` to reduce complexity

[unreleased]: https://github.com/thephpleague/commonmark-extras/compare/0.4.0...HEAD
[0.4.0]: https://github.com/thephpleague/commonmark-extras/compare/0.3.0...0.4.0
[0.3.0]: https://github.com/thephpleague/commonmark-extras/compare/0.2.1...0.3.0
[0.2.1]: https://github.com/thephpleague/commonmark-extras/compare/0.2.0...0.2.1
[0.2.0]: https://github.com/thephpleague/commonmark-extras/compare/0.1.4...0.2.0
[0.1.5]: https://github.com/thephpleague/commonmark-extras/compare/0.1.4...0.1.5
[0.1.4]: https://github.com/thephpleague/commonmark-extras/compare/0.1.3...0.1.4
[0.1.3]: https://github.com/thephpleague/commonmark/compare/0.1.2...0.1.3
[0.1.2]: https://github.com/thephpleague/commonmark/compare/0.1.1...0.1.2
[0.1.1]: https://github.com/thephpleague/commonmark/compare/0.1.0...0.1.1
