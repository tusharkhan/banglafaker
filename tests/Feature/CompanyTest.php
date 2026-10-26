<?php

namespace TusharKhan\BanglaFaker\Tests;

use Tusharkhan\BanglaFaker\BanglaFaker as BanglaFakerClass;
use Tusharkhan\BanglaFaker\Facade\BanglaFaker;

class CompanyTest extends TestCase
{
    public function test_company_name()
    {
        $this->assertContains(BanglaFaker::companyName(), ['রহিম', 'করিম', 'বাবলু']);
    }

    public function test_company_type()
    {
        $this->assertContains((new BanglaFakerClass())->companyType(), ['সিমেন্ট', 'সার', 'ঢেউটিন']);
    }
}
