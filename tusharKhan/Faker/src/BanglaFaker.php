<?php

namespace Tusharkhan\BanglaFaker;



class BanglaFaker extends BaseFaker
{
    public static $childClasses = [
        '\\Tusharkhan\\BanglaFaker\\Lib\\Address', '\\Tusharkhan\\BanglaFaker\\Lib\\Number', "\\Tusharkhan\\BanglaFaker\\Lib\\Phone"
    ];

    /**
     * @return string[]
     */
    public static function getChildClasses(): array
    {
        return self::$childClasses;
    }


    public static function parse($string)
    {
        return static::getFormatter($string);
    }

    public static function make($method)
    {
        foreach (static::$childClasses as $childClass){
            if( method_exists($childClass, $method) ){
                return forward_static_call(array($childClass, $method));
            }
        }
    }

}
