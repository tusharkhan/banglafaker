<?php

namespace TusharKhan\BanglaFaker\Tests;

use Tusharkhan\BanglaFaker\Facade\BanglaFaker;

class AddressTest extends TestCase
{
    /**
     * Every placeholder in a format must resolve, so no Latin letters
     * (e.g. an unresolved "streetNames") may leak into the output.
     */
    public function test_formatted_addresses_are_fully_resolved()
    {
        foreach (['streetName', 'streetAddress', 'address', 'city'] as $method) {
            for ($i = 0; $i < 20; $i++) {
                $this->assertDoesNotMatchRegularExpression('/[A-Za-z]/', BanglaFaker::$method(), $method);
            }
        }
    }
}
