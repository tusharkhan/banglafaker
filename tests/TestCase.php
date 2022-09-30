<?php
/**
 * created by: tushar Khan
 * email : tushar.khan0122@gmail.com
 * date : 9/30/2022
 */


namespace TusharKhan\BanglaFaker\Tests;

use Tusharkhan\BanglaFaker\BanglaFakerServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            BanglaFakerServiceProvider::class
        ];
    }
}