<?php

namespace TusharKhan\BanglaFaker\Tests;

use Tusharkhan\BanglaFaker\BanglaFaker as BanglaFakerClass;
use Tusharkhan\BanglaFaker\Facade\BanglaFaker;

class UnknownMethodTest extends TestCase
{
    public function test_facade_throws_on_unknown_method()
    {
        $this->expectException(\BadMethodCallException::class);
        BanglaFaker::noSuchMethod();
    }

    public function test_instance_throws_on_unknown_method()
    {
        $this->expectException(\BadMethodCallException::class);
        (new BanglaFakerClass())->noSuchMethod();
    }

    public function test_static_call_throws_on_unknown_method()
    {
        $this->expectException(\BadMethodCallException::class);
        BanglaFakerClass::noSuchMethod();
    }
}
