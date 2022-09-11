<?php
/**
 * created by: tushar Khan
 * email : tushar.khan0122@gmail.com
 * date : 9/12/2022
 */


namespace TusharKhan\BanglaFaker\Tests;

class FunctionTest extends \Orchestra\Testbench\TestCase
{
    public function test_first_function()
    {
        $this->assertTrue(true);
    }


    public function test_unit()
    {
        $this->assertTrue( str_contains('testing function', 'function'));
    }
}
