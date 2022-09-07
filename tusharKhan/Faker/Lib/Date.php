<?php
/**
 * created by: tushar Khan
 * email : tushar.khan0122@gmail.com
 * date : 9/8/2022
 */


namespace Tusharkhan\BanglaFaker\Lib;

use Illuminate\Support\Carbon;
use Tusharkhan\BanglaFaker\BanglaFaker;

class Date extends BanglaFaker
{
    public const D = [
        'en' => [
            'Sat','Sun','Mon','Tue','Wed','Thu','Fri'
        ],
        'bn' => [
            'শনি', 'রবি', 'সোম', 'মঙ্গল', 'বুধ', 'বৃহস্পতি', 'শুক্র'
        ]
    ];


    public const l = [
        'en' => [
            'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'
        ],
        'bn' => [
            'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার'
        ]
    ];


    public const F = [
        'en' => [
            'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
        ],
        'bn' => [
            'জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'
        ]
    ];



    public const M = [
        'en' => [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ],
        'bn' => [
            'জান', 'ফেব্রুয়ারি', 'মার', 'এপ্রিল', 'মে', 'জুন', 'জুল', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'
        ]
    ];


    public const a = [
        'en' => [
            'am', 'pm'
        ],
        'bn' => [
            'পূর্বাহ্ণ', 'অপরাহ্ণ'
        ]
    ];


    public const A = [
        'en' => [
            'am', 'pm'
        ],
        'bn' => [
            'পূর্বাহ্ণ', 'অপরাহ্ণ'
        ]
    ];


    public const OTHERS = [
        'en' => [0,1, 2, 3, 4, 5, 6, 7, 8, 9],
        'bn' => ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯']
    ];

    protected static $search = [];
    protected static $replace = [];


    public static function banglaDate()
    {
        $arguments = func_get_args();
        $format = 'd-m-Y H:i:s';

        $date = Carbon::now()->format($format);

        if( count($arguments) > 0 ){
            $date = ( count($arguments[0]) > 0 && $arguments[0][0] != null ) ? $arguments[0][0] : $date;
            $format = ( count($arguments[0]) > 1 && $arguments[0][1] != null ) ? $arguments[0][1] : $format;
        }

        if( $date ) $date = Carbon::parse($date)->format($format);

        return static::parseDate($date, $format);
    }


    protected static function parseDate($date, $format)
    {
        $allConstants = static::getConstants();
        $keys = array_keys($allConstants);

        $formatArray = array_unique(str_split($format));

        foreach ( $formatArray as $letter ){
            if ( preg_match('/^[a-zA-Z]+$/', $letter) ){
                if( in_array($letter, $keys) ){
                    static::$search = array_merge_recursive(static::$search, $allConstants[$letter]['en']);
                    static::$replace = array_merge_recursive(static::$replace, $allConstants[$letter]['bn']);
                }
            }
        }

        return Number::getBanglaNumber(str_replace(self::$search, self::$replace, $date));

    }
}
