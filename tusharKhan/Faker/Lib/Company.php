<?php
/**
 * created by: tushar Khan
 * email : tushar.khan0122@gmail.com
 * date : 9/5/2022
 */


namespace Tusharkhan\BanglaFaker\Lib;

use Tusharkhan\BanglaFaker\BanglaFaker;

class Company extends BanglaFaker
{
    protected static $formats = [
        '{{companyName}} {{companyType}}',
    ];

    protected static $names = [
        'রহিম', 'করিম', 'বাবলু', 'ভাই ভাই'
    ];

    protected static $types = [
        'সিমেন্ট', 'সার', 'ঢেউটিন', 'রেস্তোরা', 'ট্রেডারস'
    ];

    public static function companyType()
    {
        return static::randomElement(static::$types);
    }

    public static function companyName()
    {
        return static::randomElement(static::$names);
    }


    public static function company()
    {
        return static::parse(static::randomElement(static::$formats));
    }
}
