<?php

namespace TusharKhan\BanglaFaker\Tests;

use Tusharkhan\BanglaFaker\BanglaFaker;

class StaticCallTest extends TestCase
{
    public function test_static_call_forwards_arguments()
    {
        $this->assertCount(4, BanglaFaker::words(4));
    }

    public function test_static_call_with_string_argument()
    {
        $this->assertEquals("১২-০৯-২০২১ ০০:০০:০০", BanglaFaker::banglaDate('12-09-2021'));
    }
}
