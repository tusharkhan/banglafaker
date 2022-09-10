# A Laravel Bangla Faker Generator followed by [PHP Faker](https://fakerphp.github.io/)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/alaminfirdows/laravel-editorjs.svg?style=for-the-badge)](https://packagist.org/packages/alaminfirdows/laravel-editorjs)
[![Total Downloads](https://img.shields.io/packagist/dm/tusharkhan/banglafaker?style=flat-square)](https://packagist.org/packages/tusharkhan/banglafaker)


This is a Bangla Faker generator for [Laravel](https://laravel.com/) projects . This is my first package , so if you found any bug or any issue . Please let me know . So that we can debug together.

## Installation

You can install the package via composer:

```bash
composer require tusharkhan/banglafaker
```

## Usage


All Static Methods
```php
    // Address
    \Tusharkhan\BanglaFaker\BanglaFaker::city() //city name
    \Tusharkhan\BanglaFaker\BanglaFaker::state() //state
    \Tusharkhan\BanglaFaker\BanglaFaker::street() //street
    \Tusharkhan\BanglaFaker\BanglaFaker::address() //address
    \Tusharkhan\BanglaFaker\BanglaFaker::country() //country
    \Tusharkhan\BanglaFaker\BanglaFaker::postcode() //postcode
    \Tusharkhan\BanglaFaker\BanglaFaker::cityPrefix() //cityPrefix
    \Tusharkhan\BanglaFaker\BanglaFaker::streetName() //streetName
    \Tusharkhan\BanglaFaker\BanglaFaker::citySuffix() //citySuffix
    \Tusharkhan\BanglaFaker\BanglaFaker::streetSuffix() //streetSuffix
    \Tusharkhan\BanglaFaker\BanglaFaker::streetNumber() //streetNumber
    \Tusharkhan\BanglaFaker\BanglaFaker::streetAddress() //streetAddress
    \Tusharkhan\BanglaFaker\BanglaFaker::banglaStreetName() //banglaStreetName
    
    
    
    // Color Names
    \Tusharkhan\BanglaFaker\BanglaFaker::colorName() //colorName
    \Tusharkhan\BanglaFaker\BanglaFaker::safeColorName() //safeColorName
    
    
    // Company
    \Tusharkhan\BanglaFaker\BanglaFaker::companyType() //companyType
    \Tusharkhan\BanglaFaker\BanglaFaker::companyName() //companyName
    
    // Date
    \Tusharkhan\BanglaFaker\BanglaFaker::banglaDate($date = now(), $format = 'd-m-Y H:i:s') //banglaDate
    
    // Bangla Lorem Ipsum
    \Tusharkhan\BanglaFaker\BanglaFaker::word() //word
    \Tusharkhan\BanglaFaker\BanglaFaker::text($maxNbChars = 200) //text
    \Tusharkhan\BanglaFaker\BanglaFaker::words($nb = 3, $asText = false) //words
    \Tusharkhan\BanglaFaker\BanglaFaker::sentences($nb = 3, $asText = false) //sentences
    \Tusharkhan\BanglaFaker\BanglaFaker::paragraphs($nb = 3, $asText = false) //paragraphs
    \Tusharkhan\BanglaFaker\BanglaFaker::sentence($nbWords = 6, $variableNbWords = true) //sentence
    \Tusharkhan\BanglaFaker\BanglaFaker::paragraph($nbSentences = 3, $variableNbSentences = true) //paragraph

    // Numbers
    \Tusharkhan\BanglaFaker\BanglaFaker::getBanglaNumber($number) //getBanglaNumber

    // Person 
    \TusharKhan\BanglaFaker\BanglaFaker::maleName() // maleName
    \TusharKhan\BanglaFaker\BanglaFaker::lastName() // last name
    \TusharKhan\BanglaFaker\BanglaFaker::titleMale() // titleMale
    \TusharKhan\BanglaFaker\BanglaFaker::femaleName() // femaleName
    \TusharKhan\BanglaFaker\BanglaFaker::titleFemale() // titleFemale
    \TusharKhan\BanglaFaker\BanglaFaker::firstNameMale() // male first name
    \TusharKhan\BanglaFaker\BanglaFaker::firstNameFemale() // firstNameFemale

    // Phone
    \Tusharkhan\BanglaFaker\BanglaFaker::phone() // Phone
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

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
