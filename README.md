# A package to write to the .env file.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/moh-slimani/laravel-env-write.svg?style=flat-square)](https://packagist.org/packages/moh-slimani/laravel-env-write)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/moh-slimani/laravel-env-write/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/moh-slimani/laravel-env-write/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/moh-slimani/laravel-env-write/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/moh-slimani/laravel-env-write/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/moh-slimani/laravel-env-write.svg?style=flat-square)](https://packagist.org/packages/moh-slimani/laravel-env-write)

LaravelEnvWrite is a Laravel package designed to simplify the process of updating the .env file in Laravel applications.
It provides a convenient way to automatically update the environment file during database seeding or from anywhere in
the codebase.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-env-write.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/laravel-env-write)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can
support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using.
You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards
on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require moh-slimani/laravel-env-write
```

## Configuration

The package doesn't require any additional configuration. Once installed, you can start using it immediately.

## Usage

### Command Line Interface

The package provides an Artisan command to update the .env file from the command line.

```bash
php artisan env:write {key} {value?}
```

- {key}: The key to update in the .env file. It can be provided either as a single argument or in the format key=value.
- {value}: The value to set for the key. This argument is optional and only required when providing a single argument
  for the key.

#### Examples

```bash
php artisan env:write APP_ENV production
```

```bash
php artisan env:write APP_KEY=your_app_key
```

### Programmatically
You can also use the package programmatically in your codebase:



```php
use MohSlimani\LaravelEnvWrite\Facades\LaravelEnvWrite;

// Update the environment file with a specific key and value
LaravelEnvWrite::updateEnvironmentFileWith('APP_ENV', 'production');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Mohamed slimani](https://github.com/moh-slimani)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
