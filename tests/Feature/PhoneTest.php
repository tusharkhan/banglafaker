<?php

namespace TusharKhan\BanglaFaker\Tests;

use Tusharkhan\BanglaFaker\Facade\BanglaFaker;

class PhoneTest extends TestCase
{
    /**
     * Each check runs many times because the numbers are random.
     */
    private function assertAlwaysMatches(string $regex, callable $generate)
    {
        for ($i = 0; $i < 200; $i++) {
            $this->assertMatchesRegularExpression($regex, $generate());
        }
    }

    public function test_phone_uses_a_real_operator_prefix()
    {
        $this->assertAlwaysMatches('/^\+৮৮০১[৩-৯][০-৯]{8}$/u', fn () => BanglaFaker::phone());
    }

    public function test_mobile_number_defaults_to_local_english_digits()
    {
        $this->assertAlwaysMatches('/^01[3-9]\d{8}$/', fn () => BanglaFaker::mobileNumber());
    }

    public function test_mobile_number_with_country_code()
    {
        $this->assertAlwaysMatches('/^\+8801[3-9]\d{8}$/', fn () => BanglaFaker::mobileNumber(true));
    }

    public function test_mobile_number_in_bangla_digits()
    {
        $this->assertAlwaysMatches('/^০১[৩-৯][০-৯]{8}$/u', fn () => BanglaFaker::mobileNumber(false, true));
        $this->assertAlwaysMatches('/^\+৮৮০১[৩-৯][০-৯]{8}$/u', fn () => BanglaFaker::mobileNumber(true, true));
    }

    public function test_mobile_number_for_an_operator()
    {
        $this->assertAlwaysMatches('/^01[37]\d{8}$/', fn () => BanglaFaker::mobileNumber(false, false, 'grameenphone'));
        $this->assertAlwaysMatches('/^01[68]\d{8}$/', fn () => BanglaFaker::mobileNumber(false, false, 'robi'));
        $this->assertAlwaysMatches('/^01[49]\d{8}$/', fn () => BanglaFaker::mobileNumber(false, false, 'banglalink'));
        $this->assertAlwaysMatches('/^015\d{8}$/', fn () => BanglaFaker::mobileNumber(false, false, 'Teletalk'));
    }

    public function test_unknown_operator_throws()
    {
        $this->expectException(\InvalidArgumentException::class);
        BanglaFaker::mobileNumber(false, false, 'airtel-x');
    }

    public function test_mobile_number_in_factories()
    {
        $this->assertMatchesRegularExpression('/^\+8801[3-9]\d{8}$/', fake()->banglaMobileNumber(true));
    }
}
