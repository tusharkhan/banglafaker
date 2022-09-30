<?php
/**
 * created by: tushar Khan
 * email : tushar.khan0122@gmail.com
 * date : 9/30/2022
 */


namespace Tusharkhan\BanglaFaker\Facade;

use Illuminate\Support\Facades\Facade;

class BanglaFaker extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'BanglaFaker';
    }
}