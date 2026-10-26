<img src="bangla_faker.jpg">

# A Laravel Bangla Faker Generator followed by [PHP Faker](https://fakerphp.github.io/)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tusharkhan/banglafaker.svg?style=flat-square)](https://packagist.org/packages/tusharkhan/banglafaker)
[![Total Downloads](https://img.shields.io/packagist/dt/tusharkhan/banglafaker)](https://packagist.org/packages/tusharkhan/banglafaker)
![Contributions](https://img.shields.io/github/contributors/tusharkhan/banglafaker)
![codesize](https://img.shields.io/github/languages/code-size/tusharkhan/banglafaker)
![license](https://img.shields.io/github/license/tusharkhan/banglafaker)
![php-version](https://img.shields.io/packagist/php-v/tusharkhan/banglafaker)


This is a Bangla Faker generator for [Laravel](https://laravel.com/) projects . This is my first package , so if you found any bug or any issue . Please let me know . So that we can debug together.

## Requirements

| Laravel | PHP |
|---------|-----|
| 9.x     | 8.0 – 8.2 |
| 10.x    | 8.1 – 8.3 |
| 11.x    | 8.2 – 8.4 |
| 12.x    | 8.2 – 8.5 |
| 13.x    | 8.3 – 8.5 |

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
    
    
    
    // Real places (see "Real places" below)
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::division() // division
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::district($division = null) // district
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::upazila($district = null) // upazila
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::union($upazila = null, $district = null) // union
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::thana($district = null) // thana
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::postOffice($district = null) // post office
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::postalCode($district = null, $banglaDigits = true) // real 4-digit post code
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::location() // full consistent location



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
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::phone() // +৮৮০১৭১২৩৪৫৬৭৮
    \Tusharkhan\BanglaFaker\Facade\BanglaFaker::mobileNumber($withCountryCode = false, $banglaDigits = false, $operator = null) // 01712345678
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
    
    
    
    // Real places (see "Real places" below)
    $banglaFaker->division() // division
    $banglaFaker->district($division = null) // district
    $banglaFaker->upazila($district = null) // upazila
    $banglaFaker->union($upazila = null, $district = null) // union
    $banglaFaker->thana($district = null) // thana
    $banglaFaker->postOffice($district = null) // post office
    $banglaFaker->postalCode($district = null, $banglaDigits = true) // real 4-digit post code
    $banglaFaker->location() // full consistent location



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
    $banglaFaker->phone() // +৮৮০১৭১২৩৪৫৬৭৮
    $banglaFaker->mobileNumber($withCountryCode = false, $banglaDigits = false, $operator = null) // 01712345678
```

## Use in Laravel factories and `fake()`

When [Faker](https://fakerphp.github.io/) is installed (it is in every new Laravel app), every generator is also
available on Laravel's Faker instance with a `bangla` prefix. Faker's own English formatters such as
`city()` or `name()` are not changed.

```php
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'    => $this->faker->banglaMaleName(),
            'company' => $this->faker->banglaCompanyName(),
            'address' => $this->faker->banglaAddress(),
            'phone'   => $this->faker->unique()->banglaPhone(),
            'bio'     => $this->faker->optional()->banglaParagraph(),
        ];
    }
}

fake()->banglaCity();          // anywhere in your app or tests
fake()->banglaWords(4, true);  // arguments work as usual
```

Faker modifiers such as `unique()` and `optional()` work, and `fake()->seed(123)` makes the output repeatable.

| Area | Methods |
|------|---------|
| Address | `banglaAddress`, `banglaCity`, `banglaCityPrefix`, `banglaCitySuffix`, `banglaState`, `banglaCountry`, `banglaPostcode`, `banglaStreet`, `banglaStreetName`, `banglaStreetBaseName`, `banglaStreetSuffix`, `banglaStreetNumber`, `banglaStreetAddress` |
| Person | `banglaMaleName`, `banglaFemaleName`, `banglaFirstNameMale`, `banglaFirstNameFemale`, `banglaLastName`, `banglaTitleMale`, `banglaTitleFemale` |
| Company | `banglaCompanyName`, `banglaCompanyType` |
| Phone | `banglaPhone`, `banglaMobileNumber` |
| Real places | `banglaDivision`, `banglaDistrict`, `banglaUpazila`, `banglaUnion`, `banglaThana`, `banglaPostOffice`, `banglaPostalCode`, `banglaLocation` |
| Color | `banglaColorName`, `banglaSafeColorName` |
| Text | `banglaWord`, `banglaWords`, `banglaSentence`, `banglaSentences`, `banglaParagraph`, `banglaParagraphs` |
| Date & numbers | `banglaDate($date, $format)`, `banglaNumber($number)` |

`banglaStreetName()` returns a full street name (e.g. "হাজী সড়ক"); `banglaStreetBaseName()` returns the name without the suffix.

### Real places

Real divisions, districts, upazilas, unions, thanas, post offices and post codes, in Bangla.
Pass a parent to stay inside it:

```php
BanglaFaker::division();                    // চট্টগ্রাম
BanglaFaker::district('চট্টগ্রাম');          // a district in Chattogram division
BanglaFaker::upazila('কুমিল্লা');            // an upazila in Cumilla
BanglaFaker::union('দেবিদ্বার');             // a union in Debidwar
BanglaFaker::union('কালীগঞ্জ', 'গাজীপুর');   // upazila names can repeat across districts
BanglaFaker::thana('ঢাকা');                 // উত্তরা
BanglaFaker::postOffice('ঢাকা');
BanglaFaker::postalCode('ঢাকা');            // ১২৩০
BanglaFaker::postalCode('ঢাকা', false);     // 1230
```

`location()` returns one location whose parts belong together:

```php
BanglaFaker::location();
// ['division' => 'ঢাকা', 'district' => 'গাজীপুর', 'upazila' => 'কালীগঞ্জ', 'union' => '…',
//  'thana' => '…', 'post_office' => '…', 'postcode' => '১৭২০']
```

The union is in the upazila, and the upazila, thana and post office are in the district. Thanas and
upazilas are separate systems (police/postal vs. administrative), so a thana is not always the
upazila of the same name. Unknown place names throw an `InvalidArgumentException`. `য়`, `ড়` and `ঢ়`
match whichever way they are typed.

The older `postcode()`, `state()`, `city()` and `address()` methods are unchanged.

Data: 8 divisions, 64 districts, 494 upazilas, 4,537 unions, 488 thanas and 1,347 post offices, from
[nuhil/bangladesh-geocode](https://github.com/nuhil/bangladesh-geocode) and
[TanjidulIslamToha/bangladesh-postal-codes-database](https://github.com/TanjidulIslamToha/bangladesh-postal-codes-database)
(both MIT, see [`Lib/data/LICENSES.md`](Lib/data/LICENSES.md)). To refresh it, run
`scripts/build-locations.py` (instructions at the top of the script).

### Mobile numbers

Numbers always use a real operator prefix.

```php
BanglaFaker::mobileNumber();                             // 01712345678
BanglaFaker::mobileNumber(true);                         // +8801712345678
BanglaFaker::mobileNumber(false, true);                  // ০১৭১২৩৪৫৬৭৮
BanglaFaker::mobileNumber(false, false, 'grameenphone'); // 017… or 013…
BanglaFaker::phone();                                    // +৮৮০১৭১২৩৪৫৬৭৮
```

| Operator | Prefixes |
|----------|----------|
| `grameenphone` | 017, 013 |
| `robi` | 018, 016 |
| `banglalink` | 019, 014 |
| `teletalk` | 015 |

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

