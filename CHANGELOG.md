# Changelog

All notable changes to `banglafaker` will be documented in this file

## 1.1.0 - 2022-09-10

- initial release


## 1.1.1 - 2022-09-10

- Added test cases


## 1.2.1 - 2022-10-01

- Added the `BanglaFaker` facade (`Tusharkhan\BanglaFaker\Facade\BanglaFaker`) and documented facade usage in the README.
- Added facade and object-reference tests.


## 1.3.1 - 2023-01-23

- Laravel 9 support (`illuminate/support` ^9.48).
- Fixed: arguments passed to generators through an instance or the facade were joined into a single comma-separated string.


## 2.0.0 - 2024-12-03

- Laravel 10 and 11 support.


## 2.1.1 - 2025-06-01

- Laravel 12 support.

## 2.2.0 - 2026-10-26

### Added
- Laravel 13 support. Supported versions are now Laravel 9 – 13 on PHP 8.0 – 8.5 (see README).

### Fixed
- `companyName()` and `companyType()` returned an Exception object instead of a value.
- `firstNameFemale()` and `femaleName()` crashed on PHP 8 ("Non-static method cannot be called statically").
- `streetName()`, `streetAddress()` and `address()` contained the literal word "streetNames".
- Static calls such as `BanglaFaker::words(4)` passed their arguments as a single array.
- `banglaDate()` could return half-translated day names (e.g. "রবিday") and leaked memory across calls.
- `regexify()` crashed on alternation groups such as `(a|b)`.
- `Lib\Number` failed to autoload when it was the first package class used.
- The auto-discovered facade alias pointed to a class that doesn't exist.
- `lexify()`, `bothify()`, `asciify()` and `regexify()` emitted PHP 8.2+ deprecation notices.

### Changed
- Calling an unknown method now throws `BadMethodCallException` instead of returning an `Exception` object.
- Minimum PHP version is 8.0.2 (Laravel 9's own minimum).
