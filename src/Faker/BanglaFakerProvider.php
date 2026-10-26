<?php

namespace Tusharkhan\BanglaFaker\Faker;

use Tusharkhan\BanglaFaker\BanglaFaker;

/**
 * Exposes every BanglaFaker generator on Laravel's Faker instance
 * (fake(), $this->faker in factories) under a "bangla" prefix, so the
 * English Faker formatters such as city() or name() are never replaced.
 */
class BanglaFakerProvider
{
    /**
     * Generators whose prefixed name would be awkward or would clash:
     * Address::streetName() takes banglaStreetName() (Faker's meaning: a
     * full street name), so the bare Address::banglaStreetName() moves aside.
     */
    protected static $renamed = [
        'getBanglaNumber' => 'banglaNumber',
        'streetName' => 'banglaStreetName',
        'banglaStreetName' => 'banglaStreetBaseName',
    ];

    /**
     * The Faker formatter name for a BanglaFaker generator method.
     */
    public static function formatterName(string $method): string
    {
        if (isset(static::$renamed[$method])) {
            return static::$renamed[$method];
        }

        return strpos($method, 'bangla') === 0 ? $method : 'bangla' . ucfirst($method);
    }

    // Address

    public function banglaPostcode()
    {
        return BanglaFaker::postcode();
    }

    public function banglaCityPrefix()
    {
        return BanglaFaker::cityPrefix();
    }

    public function banglaCitySuffix()
    {
        return BanglaFaker::citySuffix();
    }

    public function banglaStreetSuffix()
    {
        return BanglaFaker::streetSuffix();
    }

    public function banglaState()
    {
        return BanglaFaker::state();
    }

    public function banglaStreetNumber()
    {
        return BanglaFaker::streetNumber();
    }

    public function banglaStreetBaseName()
    {
        return BanglaFaker::banglaStreetName();
    }

    public function banglaStreetName()
    {
        return BanglaFaker::streetName();
    }

    public function banglaStreet()
    {
        return BanglaFaker::street();
    }

    public function banglaStreetAddress()
    {
        return BanglaFaker::streetAddress();
    }

    public function banglaCity()
    {
        return BanglaFaker::city();
    }

    public function banglaAddress()
    {
        return BanglaFaker::address();
    }

    public function banglaCountry()
    {
        return BanglaFaker::country();
    }

    // Number

    public function banglaNumber($number)
    {
        return BanglaFaker::getBanglaNumber($number);
    }

    // Phone

    public function banglaPhone()
    {
        return BanglaFaker::phone();
    }

    public function banglaMobileNumber($withCountryCode = false, $banglaDigits = false, $operator = null)
    {
        return BanglaFaker::mobileNumber($withCountryCode, $banglaDigits, $operator);
    }

    // Date

    public function banglaDate($date = null, $format = 'd-m-Y H:i:s')
    {
        return BanglaFaker::banglaDate($date, $format);
    }

    // Color

    public function banglaSafeColorName()
    {
        return BanglaFaker::safeColorName();
    }

    public function banglaColorName()
    {
        return BanglaFaker::colorName();
    }

    // Lorem

    public function banglaWord()
    {
        return BanglaFaker::word();
    }

    public function banglaWords($nb = 3, $asText = false)
    {
        return BanglaFaker::words($nb, $asText);
    }

    public function banglaSentence($nbWords = 6, $variableNbWords = true)
    {
        return BanglaFaker::sentence($nbWords, $variableNbWords);
    }

    public function banglaSentences($nb = 3, $asText = false)
    {
        return BanglaFaker::sentences($nb, $asText);
    }

    public function banglaParagraph($nbSentences = 3, $variableNbSentences = true)
    {
        return BanglaFaker::paragraph($nbSentences, $variableNbSentences);
    }

    public function banglaParagraphs($nb = 3, $asText = false)
    {
        return BanglaFaker::paragraphs($nb, $asText);
    }

    // Person

    public function banglaFirstNameMale()
    {
        return BanglaFaker::firstNameMale();
    }

    public function banglaFirstNameFemale()
    {
        return BanglaFaker::firstNameFemale();
    }

    public function banglaLastName()
    {
        return BanglaFaker::lastName();
    }

    public function banglaTitleMale()
    {
        return BanglaFaker::titleMale();
    }

    public function banglaTitleFemale()
    {
        return BanglaFaker::titleFemale();
    }

    public function banglaMaleName()
    {
        return BanglaFaker::maleName();
    }

    public function banglaFemaleName()
    {
        return BanglaFaker::femaleName();
    }

    // Company

    public function banglaCompanyType()
    {
        return BanglaFaker::companyType();
    }

    public function banglaCompanyName()
    {
        return BanglaFaker::companyName();
    }
}
