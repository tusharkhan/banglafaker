<?php

namespace Tusharkhan\BanglaFaker;



class BanglaFaker extends BaseFaker
{
    public static $childClasses = [
        '\\Tusharkhan\\BanglaFaker\\Lib\\Address', '\\Tusharkhan\\BanglaFaker\\Lib\\Number', "\\Tusharkhan\\BanglaFaker\\Lib\\Phone",
        '\\Tusharkhan\\BanglaFaker\\Lib\\Utils', '\\Tusharkhan\\BanglaFaker\\Lib\\Date', '\\Tusharkhan\\BanglaFaker\\Lib\\Color',
        '\\Tusharkhan\\BanglaFaker\\Lib\\Lorem', '\\Tusharkhan\\BanglaFaker\\Lib\\Person', '\\Tusharkhan\\BanglaFaker\\Lib\\Company', '\\Tusharkhan\\BanglaFaker\\Lib\\Location'
    ];


    public static function getChildClasses(): array
    {
        return self::$childClasses;
    }

    public function __call(string $name, array $arguments)
    {
        return self::make($name, $arguments);
    }


    public static function __callStatic(string $name, array $arguments)
    {
        foreach (static::getChildClasses() as $childClass){
            if( method_exists($childClass, $name) ){
                return forward_static_call(array($childClass, $name), ...$arguments);
            }
        }

        throw new \BadMethodCallException(sprintf('Call to undefined method %s::%s()', static::class, $name));
    }


    public static function parse($string)
    {
        return static::getFormatter($string);
    }

    public static function make($method, $args = [])
    {
        foreach (static::getChildClasses() as $childClass){
            if( method_exists($childClass, $method) ){
                return $childClass::$method(...$args);
            }
        }

        throw new \BadMethodCallException(sprintf('Call to undefined method %s::%s()', static::class, $method));
    }

    public static function getBanglaNumber($number)
    {
        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        return str_replace(range(0, 9), $bn_digits, $number);
    }
}
