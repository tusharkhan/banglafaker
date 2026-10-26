<img src="bangla_faker.jpg">

# A Laravel Bangla Faker Generator followed by [PHP Faker](https://fakerphp.github.io/)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tusharkhan/banglafaker.svg?style=flat-square)](https://packagist.org/packages/tusharkhan/banglafaker)
[![Total Downloads](https://img.shields.io/packagist/dt/tusharkhan/banglafaker)](https://packagist.org/packages/tusharkhan/banglafaker)
![Contributions](https://img.shields.io/github/contributors/tusharkhan/banglafaker)
![codesize](https://img.shields.io/github/languages/code-size/tusharkhan/banglafaker)
![license](https://img.shields.io/github/license/tusharkhan/banglafaker)
![php-version](https://img.shields.io/packagist/php-v/tusharkhan/banglafaker)

Fake Bangla data for [Laravel](https://laravel.com/) projects: names, addresses, real places, phone numbers,
companies, colors, dates, numbers and Bangla lorem ipsum. Use it in seeders, factories, tests and demos.

If you find a bug or have an idea, please [open an issue](https://github.com/tusharkhan/banglafaker/issues).

## Requirements

| Laravel | PHP |
|---------|-----|
| 9.x     | 8.0 – 8.2 |
| 10.x    | 8.1 – 8.3 |
| 11.x    | 8.2 – 8.4 |
| 12.x    | 8.2 – 8.5 |
| 13.x    | 8.3 – 8.5 |

## Installation

```bash
composer require tusharkhan/banglafaker
```

The service provider and the `BanglaFaker` facade are registered automatically.

## Usage

Call any method on the facade:

```php
use Tusharkhan\BanglaFaker\Facade\BanglaFaker;

BanglaFaker::maleName();      // হাসনাত তাবাসসুম
BanglaFaker::address();       // ৯৩ বরকত, কাটা খানা চিটাগং
BanglaFaker::mobileNumber();  // 01967128519
```

or on an instance. The methods are the same:

```php
use Tusharkhan\BanglaFaker\BanglaFaker;

$faker = new BanglaFaker();
$faker->companyName();
```

Calling a method that doesn't exist throws a `BadMethodCallException`.

### All methods

Sample output is random; yours will differ.

**Person**

| Method | Example |
|--------|---------|
| `maleName()` | হাসনাত তাবাসসুম |
| `femaleName()` | মিসেস. হাসিন তাসনীম |
| `firstNameMale()` | জলিল |
| `firstNameFemale()` | সাবরিন |
| `lastName()` | শিকদার |
| `titleMale()` | মি. |
| `titleFemale()` | মিস. |

**Address**

| Method | Example |
|--------|---------|
| `address()` | ৯৩ বরকত, কাটা খানা চিটাগং |
| `streetAddress()` | ৪৯ করিমউদ্দিন |
| `street()` | বরকত ব্রীজ |
| `streetName()` | হাজী ক্যাম্প |
| `banglaStreetName()` | বরকত |
| `streetSuffix()` | ব্রীজ |
| `streetNumber()` | ৬৪ |
| `city()` | লেইক টাউন |
| `cityPrefix()` | দক্ষিন |
| `citySuffix()` | টাউন |
| `state()` | বরিশাল |
| `postcode()` | ২১২৭২ |
| `country()` | ক্রিসমাস দ্বীপ |

For real place names and real post codes, use the [Real places](#real-places) methods.

**Real places**: see [Real places](#real-places)

| Method | Example |
|--------|---------|
| `division()` | চট্টগ্রাম |
| `district($division = null)` | কুমিল্লা |
| `upazila($district = null)` | দেবিদ্বার |
| `union($upazila = null, $district = null)` | a union in the upazila |
| `thana($district = null)` | উত্তরা |
| `postOffice($district = null)` | a post office in the district |
| `postalCode($district = null, $banglaDigits = true)` | ১২৩০ |
| `location()` | all of the above, consistent with each other |

**Phone**: see [Mobile numbers](#mobile-numbers)

| Method | Example |
|--------|---------|
| `phone()` | +৮৮০১৭০২৫০৫৯২২ |
| `mobileNumber($withCountryCode = false, $banglaDigits = false, $operator = null)` | 01967128519 |

**Company**

| Method | Example |
|--------|---------|
| `companyName()` | বাবলু |
| `companyType()` | সার |

**Color**

| Method | Example |
|--------|---------|
| `colorName()` | টমেটো |
| `safeColorName()` | ধূসর |

**Text (Bangla lorem ipsum)**

| Method | Example |
|--------|---------|
| `word()` | ডোলোরিবাস |
| `words($nb = 3, $asText = false)` | an array of words, or a string when `$asText` is `true` |
| `sentence($nbWords = 6, $variableNbWords = true)` | লেজ করে দুর্বলতার ক্লান্ত কাম নিজে দেহের কৌশল । |
| `sentences($nb = 3, $asText = false)` | an array of sentences, or a string |
| `paragraph($nbSentences = 3, $variableNbSentences = true)` | a paragraph |
| `paragraphs($nb = 3, $asText = false)` | an array of paragraphs, or a string |

**Date and numbers**

| Method | Example |
|--------|---------|
| `banglaDate('2024-01-15 10:30:00')` | ১৫-০১-২০২৪ ১০:৩০:০০ |
| `banglaDate('2024-01-15', 'l, j F Y')` | সোমবার, ১৫ জানুয়ারি ২০২৪ |
| `getBanglaNumber(2024)` | ২০২৪ |

`banglaDate($date = null, $format = 'd-m-Y H:i:s')` takes any date PHP can parse (or the current time when `$date`
is `null`) and a PHP [date format](https://www.php.net/manual/en/datetime.format.php). Digits, day names and
month names come out in Bangla.

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

## Real places

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

## Mobile numbers

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

Operator names are case-insensitive; an unknown operator throws an `InvalidArgumentException`.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover a security issue, please email tushar.khan0122@gmail.com instead of using the issue tracker.

## Credits

-   [Tushar Khan](https://github.com/tusharkhan)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
