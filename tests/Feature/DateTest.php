<?php

namespace TusharKhan\BanglaFaker\Tests;

use PHPUnit\Framework\Attributes\RunInSeparateProcess;
use Tusharkhan\BanglaFaker\Facade\BanglaFaker;

class DateTest extends TestCase
{
    public function test_day_and_month_names()
    {
        $this->assertEquals('রবিবার, ১২ সেপ্টেম্বর ২০২১', BanglaFaker::banglaDate('12-09-2021', 'l, d F Y'));
    }

    /**
     * Runs in a separate process so no earlier test has primed Date's state.
     *
     * @runInSeparateProcess
     */
    #[RunInSeparateProcess]
    public function test_earlier_formats_do_not_leak_into_later_calls()
    {
        BanglaFaker::banglaDate('12-09-2021', 'D');

        $this->assertEquals('রবিবার', BanglaFaker::banglaDate('12-09-2021', 'l'));
    }

    /**
     * @runInSeparateProcess
     */
    #[RunInSeparateProcess]
    public function test_short_and_long_names_in_one_format()
    {
        $this->assertEquals('রবি রবিবার, সেপ্টেম্বর', BanglaFaker::banglaDate('12-09-2021', 'D l, F'));
    }
}
