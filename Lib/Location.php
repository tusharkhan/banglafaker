<?php


namespace Tusharkhan\BanglaFaker\Lib;

use Tusharkhan\BanglaFaker\BanglaFaker;

/**
 * Real Bangladeshi places: division > district > upazila > union, and
 * district > thana > post office > post code. Data and sources are in
 * Lib/data/locations.php.
 */
class Location extends BanglaFaker
{
    protected static $data;


    public static function division()
    {
        return static::randomKey(static::data()['divisions']);
    }

    public static function district($division = null)
    {
        if ($division === null) {
            return static::randomKey(static::data()['districts']);
        }

        return static::randomElement(static::find('divisions', $division));
    }

    public static function upazila($district = null)
    {
        return static::randomKey(static::districtData($district)['upazilas']);
    }

    public static function union($upazila = null, $district = null)
    {
        if ($upazila === null) {
            $upazilas = static::upazilasWithUnions($district);

            return static::randomElement($upazilas[static::randomKey($upazilas)]);
        }

        $upazila = static::normalize($upazila);
        $districts = $district === null ? array_keys(static::data()['districts']) : [static::normalize($district)];
        $unions = [];

        foreach ($districts as $name) {
            $unions = array_merge($unions, static::districtData($name)['upazilas'][$upazila] ?? []);
        }

        if (!$unions) {
            throw new \InvalidArgumentException(sprintf(
                'No unions found for upazila "%s"%s', $upazila, $district === null ? '' : " in district \"$district\""
            ));
        }

        return static::randomElement($unions);
    }

    public static function thana($district = null)
    {
        return static::randomKey(static::districtData($district)['thanas']);
    }

    public static function postOffice($district = null)
    {
        return static::randomPostOffice(static::districtData($district))[0];
    }

    public static function postalCode($district = null, $banglaDigits = true)
    {
        $code = static::randomPostOffice(static::districtData($district))[1];

        return $banglaDigits ? Number::getBanglaNumber($code) : $code;
    }

    /**
     * A full location whose parts belong together: the union is in the
     * upazila, the upazila and the thana are in the district, and so on.
     */
    public static function location()
    {
        $division = static::division();
        $district = static::district($division);
        $districtData = static::districtData($district);

        $upazilas = static::upazilasWithUnions($district);
        $upazila = static::randomKey($upazilas);

        $thana = static::randomKey($districtData['thanas']);
        [$postOffice, $postcode] = static::randomElement($districtData['thanas'][$thana]);

        return [
            'division' => $division,
            'district' => $district,
            'upazila' => $upazila,
            'union' => static::randomElement($upazilas[$upazila]),
            'thana' => $thana,
            'post_office' => $postOffice,
            'postcode' => Number::getBanglaNumber($postcode),
        ];
    }

    protected static function data()
    {
        return static::$data ?? (static::$data = require __DIR__ . '/data/locations.php');
    }

    /**
     * The data stores য়, ড় and ঢ় as letter + nukta (Unicode NFC); accept
     * the single-character forms people often type as well.
     */
    protected static function normalize($name)
    {
        return str_replace(
            ["\u{09DF}", "\u{09DC}", "\u{09DD}"],
            ["\u{09AF}\u{09BC}", "\u{09A1}\u{09BC}", "\u{09A2}\u{09BC}"],
            trim($name)
        );
    }

    protected static function find($level, $name)
    {
        $key = static::normalize($name);

        if (!isset(static::data()[$level][$key])) {
            throw new \InvalidArgumentException(sprintf('Unknown %s "%s"', rtrim($level, 's'), $name));
        }

        return static::data()[$level][$key];
    }

    protected static function districtData($district)
    {
        return static::find('districts', $district ?? static::district());
    }

    protected static function upazilasWithUnions($district)
    {
        return array_filter(static::districtData($district)['upazilas']);
    }

    protected static function randomPostOffice(array $districtData)
    {
        return static::randomElement(static::randomElement($districtData['thanas']));
    }
}
