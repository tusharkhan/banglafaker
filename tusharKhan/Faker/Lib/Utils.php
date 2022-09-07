<?php
/**
 * created by: tushar Khan
 * email : tushar.khan0122@gmail.com
 * date : 9/8/2022
 */


namespace Tusharkhan\BanglaFaker\Lib;

use Illuminate\Support\Carbon;
use Tusharkhan\BanglaFaker\BanglaFaker;

class Utils extends BanglaFaker
{
//    public static function banglaDate()
//    {
//        $arguments = func_get_args();
//        $format = 'd-m-Y H:i:s';
//
//        $date = Carbon::now()->format($format);
//
//        if( count($arguments) > 0 ){
//            $date = ( count($arguments[0]) > 0 && $arguments[0][0] != null ) ? $arguments[0][0] : $date;
//            $format = ( count($arguments[0]) > 1 && $arguments[0][1] != null ) ? $arguments[0][1] : $format;
//        }
//
//        if( $date ) $date = Carbon::parse($date)->format($format);
//
//
//        return Number::getBanglaNumber($date);
//    }
}
