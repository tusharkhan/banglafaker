<?php
/**
 * created by: tushar Khan
 * email : tushar.khan0122@gmail.com
 * date : 9/5/2022
 */


namespace Tusharkhan\BanglaFaker\Lib;

use Tusharkhan\BanglaFaker\BanglaFaker;

class Person extends BanglaFaker
{
    protected static $maleNameFormats = [
        '{{firstNameMale}} {{lastName}}',
        '{{firstNameMale}} {{lastName}}',
        '{{firstNameMale}} {{lastName}}',
        '{{titleMale}} {{firstNameMale}} {{lastName}}',
    ];

    protected static $femaleNameFormats = [
        '{{firstNameFemale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}}',
        '{{titleFemale}} {{firstNameFemale}} {{lastName}}',
    ];

    protected static $firstNameMale = [
        'অনন্ত', 'আব্দুল্লাহ', 'আহসান',  'ইমরুল', 'করিম', 'জলিল', 'বরকত', 'মাসনুন', 'রহিম',  'রিফাত', 'হাসনাত', 'হাসান', 'তুষার', 'তামিম', 'হৃদয়'
    ];

    protected static $firstNameFemale = [
        'জারিন', 'জেরিন', 'ফারহানা', 'ফাহমেদা', 'মাহজাবিন', 'মেহনাজ', 'রহিমা', 'লাবনী', 'সাবরিন', 'সাবরিনা', 'হাসিন', 'রহমত', 'ফাগুন', 'মোমো', 'অপু', 'মাহমুদা'
    ];

    protected static $lastName = [
        'খান', 'শেখ', 'শিকদার', 'আলী', 'তাসনীম', 'তাবাসসুম', 'শিকদার', 'মিয়াঁ', 'বিশ্বাস', 'দত্ত', 'ইকবাল'
    ];

    protected static $titleMale = ['মি.', 'মোঃ', 'আ.ন.ম'];

    protected static $titleFemale = ['মিসেস.', 'মিস.'];


    public static function firstNameMale()
    {
        return static::randomElement(static::$firstNameMale);
    }


    public static function lastName()
    {
        return static::randomElement(static::$lastName);
    }


    public static function titleMale()
    {
        return static::randomElement(static::$titleMale);
    }

    public static function titleFemale()
    {
        return static::randomElement(static::$titleFemale);
    }

    public function firstNameFemale()
    {
        return static::randomElement(static::$firstNameFemale);
    }

    public static function maleName()
    {
        return static::parse(static::randomElement(static::$maleNameFormats));
    }


    public static function femaleName()
    {
        return static::parse(static::randomElement(static::$femaleNameFormats));
    }
}
