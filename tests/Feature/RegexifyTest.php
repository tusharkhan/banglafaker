<?php

namespace TusharKhan\BanglaFaker\Tests;

use Tusharkhan\BanglaFaker\BaseFaker;

class RegexifyTest extends TestCase
{
    public function test_alternation()
    {
        $this->assertContains(BaseFaker::regexify('(foo|bar)'), ['foo', 'bar']);
    }

    public function test_pattern_output_matches_pattern()
    {
        $regex = '/^[A-Z]{3}-\d{4}-\w$/';

        $this->assertMatchesRegularExpression($regex, BaseFaker::regexify($regex));
    }
}
