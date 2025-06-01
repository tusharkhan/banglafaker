<img src="bangla_faker.png">

# A Laravel Bangla Faker Generator followed by [PHP Faker](https://fakerphp.github.io/)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/alaminfirdows/laravel-editorjs.svg?style=flat-square)](https://packagist.org/packages/alaminfirdows/laravel-editorjs)
[![Total Downloads](https://img.shields.io/github/downloads/tusharkhan/banglafaker/total)](https://packagist.org/packages/tusharkhan/banglafaker)
![Contributions](https://img.shields.io/github/contributors/tusharkhan/banglafaker)
![codesize](https://img.shields.io/github/languages/code-size/tusharkhan/banglafaker)
![license](https://img.shields.io/github/license/tusharkhan/banglafaker)
![php-version](https://img.shields.io/packagist/php-v/tusharkhan/banglafaker)


This is a Bangla Faker generator for [Laravel](https://laravel.com/) projects . This is my first package , so if you found any bug or any issue . Please let me know . So that we can debug together.

This package is for Laravel Version >= 9.x

## Installation

You can install the package via composer:

```bash
composer require tusharkhan/banglafaker
```

## Usage


Use Facade
```php
    // Address
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::city() //city name
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::state() //state
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::street() //street
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::address() //address
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::country() //country
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::postcode() //postcode
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::cityPrefix() //cityPrefix
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::streetName() //streetName
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::citySuffix() //citySuffix
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::streetSuffix() //streetSuffix
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::streetNumber() //streetNumber
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::streetAddress() //streetAddress
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::banglaStreetName() //banglaStreetName
    
    
    
    // Color Names
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::colorName() //colorName
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::safeColorName() //safeColorName
    
    
    // Company
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::companyType() //companyType
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::companyName() //companyName
    
    // Date
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::banglaDate($date = now(), $format = 'd-m-Y H:i:s') //banglaDate
    
    // Bangla Lorem Ipsum
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::word() //word
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::text($maxNbChars = 200) //text
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::words($nb = 3, $asText = false) //words
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::sentence($nbWords = 6, $variableNbWords = true) //sentence
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::sentences($nb = 3, $asText = false) //sentences
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::paragraphs($nb = 3, $asText = false) //paragraphs
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::paragraph($nbSentences = 3, $variableNbSentences = true) //paragraph

    // Numbers
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::getBanglaNumber($number) //getBanglaNumber

    // Person 
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::maleName() // maleName
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::lastName() // last name
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::titleMale() // titleMale
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::femaleName() // femaleName
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::titleFemale() // titleFemale
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::firstNameMale() // male first name
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::firstNameFemale() // firstNameFemale

    // Phone
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::phone() // Phone
```



All Methods with object reference
```php
    use Tusharkhan\BanglaFaker\BanglaFaker;

    $banglaFaker = new BanglaFaker();
    
    // Address
    $banglaFaker->city() //city name
    $banglaFaker->state() //state
    $banglaFaker->street() //street
    $banglaFaker->address() //address
    $banglaFaker->country() //country
    $banglaFaker->postcode() //postcode
    $banglaFaker->cityPrefix() //cityPrefix
    $banglaFaker->streetName() //streetName
    $banglaFaker->citySuffix() //citySuffix
    $banglaFaker->streetSuffix() //streetSuffix
    $banglaFaker->streetNumber() //streetNumber
    $banglaFaker->streetAddress() //streetAddress
    $banglaFaker->banglaStreetName() //banglaStreetName
    
    
    
    // Color Names
    $banglaFaker->colorName() //colorName
    $banglaFaker->safeColorName() //safeColorName
    
    
    // Company
    $banglaFaker->companyType() //companyType
    $banglaFaker->companyName() //companyName
    
    // Date
    $banglaFaker->banglaDate($date = now(), $format = 'd-m-Y H:i:s') //banglaDate
    
    // Bangla Lorem Ipsum
    $banglaFaker->word() //word
    $banglaFaker->text($maxNbChars = 200) //text
    $banglaFaker->words($nb = 3, $asText = false) //words
    $banglaFaker->sentences($nb = 3, $asText = false) //sentences
    $banglaFaker->paragraphs($nb = 3, $asText = false) //paragraphs
    $banglaFaker->sentence($nbWords = 6, $variableNbWords = true) //sentence
    $banglaFaker->paragraph($nbSentences = 3, $variableNbSentences = true) //paragraph

    // Numbers
    $banglaFaker->getBanglaNumber($number) //getBanglaNumber

    // Person 
    $banglaFaker->maleName() // maleName
    $banglaFaker->lastName() // last name
    $banglaFaker->titleMale() // titleMale
    $banglaFaker->femaleName() // femaleName
    $banglaFaker->titleFemale() // titleFemale
    $banglaFaker->firstNameMale() // male first name
    $banglaFaker->firstNameFemale() // firstNameFemale

    // Phone
    $banglaFaker->phone() // Phone
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email tushar.khan0122@gmail.com instead of using the issue tracker.

## Credits

-   [Tushar Khan](https://github.com/tusharkhan)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

