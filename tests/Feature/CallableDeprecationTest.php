<?php

namespace TusharKhan\BanglaFaker\Tests;

use Tusharkhan\BanglaFaker\BaseFaker;

class CallableDeprecationTest extends TestCase
{
    public function test_string_helpers_raise_no_deprecations()
    {
        set_error_handler(function ($errno, $errstr) {
            throw new \ErrorException($errstr, 0, $errno);
        }, E_DEPRECATED | E_USER_DEPRECATED);

        try {
            $this->assertMatchesRegularExpression('/^[a-z]{4}$/', BaseFaker::lexify('????'));
            $this->assertMatchesRegularExpression('/^[1-9]{3}$/', BaseFaker::numerify('%%%'));
            $this->assertMatchesRegularExpression('/^\d\d [a-z]{2}$/', BaseFaker::bothify('## ??'));
            $this->assertMatchesRegularExpression('/^[!-~]{4}$/', BaseFaker::asciify('****'));
            $this->assertMatchesRegularExpression('/^[a-zA-Z]\d$/', BaseFaker::regexify('\w\d'));
        } finally {
            restore_error_handler();
        }
    }
}
