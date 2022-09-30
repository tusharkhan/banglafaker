<?php
/**
 * created by: tushar Khan
 * email : tushar.khan0122@gmail.com
 * date : 9/30/2022
 */


namespace TusharKhan\BanglaFaker\Tests;

use Tusharkhan\BanglaFaker\Facade\BanglaFaker;

class FacadeTest extends TestCase
{
    public function test_words()
    {
        $this->assertIsArray(BanglaFaker::words(6));
    }


    public function test_paragraph()
    {
        $this->assertIsString(BanglaFaker::paragraph(80, false));
    }

    public function test_date()
    {
        $this->assertEquals("১২-০৯-২০২১ ০০:০০:০০", BanglaFaker::banglaDate('12-09-2021'));
    }


    public function test_country()
    {
        $this->assertIsString(BanglaFaker::country());
    }


    public function test_first_name()
    {
        $this->assertIsString(BanglaFaker::firstNameMale());
    }
}