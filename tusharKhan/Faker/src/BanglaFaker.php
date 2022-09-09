<?php

namespace Tusharkhan\BanglaFaker;



class BanglaFaker extends BaseFaker
{
    public static $childClasses = [
        '\\Tusharkhan\\BanglaFaker\\Lib\\Address', '\\Tusharkhan\\BanglaFaker\\Lib\\Number', "\\Tusharkhan\\BanglaFaker\\Lib\\Phone",
        '\\Tusharkhan\\BanglaFaker\\Lib\\Utils', '\\Tusharkhan\\BanglaFaker\\Lib\\Date', '\\Tusharkhan\\BanglaFaker\\Lib\\Color',
    ];

    /**
     * @return string[]
     */
    public static function getChildClasses(): array
    {
        return self::$childClasses;
    }

    public function __call(string $name, array $arguments)
    {
        return self::make($name, $arguments);
    }


    public static function parse($string)
    {
        return static::getFormatter($string);
    }

    public static function make($method, $args = [])
    {
        foreach (static::getChildClasses() as $childClass){
            if( method_exists($childClass, $method) ){
                return forward_static_call(array($childClass, $method), $args);
            }
        }

        return new \Exception( $method .  ' Method not found');
    }
}
