<?php
/**
 * created by: tushar Khan
 * email : tushar.khan0122@gmail.com
 * date : 9/2/2022
 */


namespace Tusharkhan\BanglaFaker\Lib;

use Tusharkhan\BanglaFaker\BanglaFaker;

class Phone extends BanglaFaker
{
    /**
     * Mobile number prefixes in use, by operator (Airtel now belongs to Robi).
     */
    protected static $operatorPrefixes = [
        'grameenphone' => ['017', '013'],
        'robi' => ['018', '016'],
        'banglalink' => ['019', '014'],
        'teletalk' => ['015'],
    ];


    public static function phone()
    {
        return static::mobileNumber(true, true);
    }

    public static function mobileNumber($withCountryCode = false, $banglaDigits = false, $operator = null)
    {
        $number = static::randomElement(static::prefixesFor($operator)) . static::numerify('########');

        if ($withCountryCode) {
            $number = '+88' . $number;
        }

        return $banglaDigits ? Number::getBanglaNumber($number) : $number;
    }

    protected static function prefixesFor($operator)
    {
        if ($operator === null) {
            return array_merge(...array_values(static::$operatorPrefixes));
        }

        $key = strtolower($operator);

        if (!isset(static::$operatorPrefixes[$key])) {
            throw new \InvalidArgumentException(sprintf(
                'Unknown operator "%s". Use one of: %s', $operator, implode(', ', array_keys(static::$operatorPrefixes))
            ));
        }

        return static::$operatorPrefixes[$key];
    }
}
