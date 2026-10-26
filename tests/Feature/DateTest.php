<?php

namespace TusharKhan\BanglaFaker\Tests;

use PHPUnit\Framework\Attributes\PreserveGlobalState;
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
     * @preserveGlobalState disabled
     */
    #[RunInSeparateProcess]
    #[PreserveGlobalState(false)]
    public function test_earlier_formats_do_not_leak_into_later_calls()
    {
        BanglaFaker::banglaDate('12-09-2021', 'D');

        $this->assertEquals('রবিবার', BanglaFaker::banglaDate('12-09-2021', 'l'));
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    #[RunInSeparateProcess]
    #[PreserveGlobalState(false)]
    public function test_short_and_long_names_in_one_format()
    {
        $this->assertEquals('রবি রবিবার, সেপ্টেম্বর', BanglaFaker::banglaDate('12-09-2021', 'D l, F'));
    }

    public function test_meridiem_lowercase_and_uppercase()
    {
        $this->assertEquals('০৩:০০ অপরাহ্ণ', BanglaFaker::banglaDate('2021-09-12 15:00', 'h:i a'));
        $this->assertEquals('০৩:০০ অপরাহ্ণ', BanglaFaker::banglaDate('2021-09-12 15:00', 'h:i A'));
        $this->assertEquals('০৯:০০ পূর্বাহ্ণ', BanglaFaker::banglaDate('2021-09-12 09:00', 'h:i A'));
    }
}
