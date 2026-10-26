<?php

namespace TusharKhan\BanglaFaker\Tests;

use PHPUnit\Framework\Attributes\PreserveGlobalState;
use PHPUnit\Framework\Attributes\RunInSeparateProcess;
use Tusharkhan\BanglaFaker\Lib\Number;

class NumberTest extends TestCase
{
    /**
     * Runs in a separate process so Number is autoloaded before BanglaFaker.
     *
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    #[RunInSeparateProcess]
    #[PreserveGlobalState(false)]
    public function test_number_autoloads_on_its_own()
    {
        $this->assertEquals('১২৩৪৫৬৭৮৯০', Number::getBanglaNumber(1234567890));
    }
}
