<?php

namespace TusharKhan\BanglaFaker\Tests;

use Tusharkhan\BanglaFaker\Facade\BanglaFaker;

class PersonTest extends TestCase
{
    public function test_first_name_female()
    {
        $this->assertIsString(BanglaFaker::firstNameFemale());
    }

    public function test_female_name()
    {
        $this->assertIsString(BanglaFaker::femaleName());
    }

    public function test_male_name()
    {
        $this->assertIsString(BanglaFaker::maleName());
    }
}
