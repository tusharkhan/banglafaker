<?php
/**
 * created by: tushar Khan
 * email : tushar.khan0122@gmail.com
 * date : 9/2/2022
 */


namespace Tusharkhan\BanglaFaker\Lib;


use Tusharkhan\Banglafaker\BanglaFaker;

class Number extends BanglaFaker
{
    public static function getBanglaNumber($number)
    {
        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        return str_replace(range(0, 9), $bn_digits, $number);
    }
}
