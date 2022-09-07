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
    protected static $formats = [
        '+৮৮০১#########',
    ];


    public static function phone()
    {
        return static::parse(static::randomElement(static::$formats));
    }
}
