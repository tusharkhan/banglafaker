<?php

namespace TusharKhan\BanglaFaker\Tests;

use Tusharkhan\BanglaFaker\Facade\BanglaFaker;

class LocationTest extends TestCase
{
    private const DIVISIONS = ['ঢাকা', 'চট্টগ্রাম', 'রাজশাহী', 'খুলনা', 'বরিশাল', 'সিলেট', 'রংপুর', 'ময়মনসিংহ'];

    private const CHATTOGRAM_DISTRICTS = [
        'কুমিল্লা', 'ফেনী', 'ব্রাহ্মণবাড়িয়া', 'রাঙ্গামাটি', 'নোয়াখালী', 'চাঁদপুর',
        'লক্ষ্মীপুর', 'চট্টগ্রাম', 'কক্সবাজার', 'খাগড়াছড়ি', 'বান্দরবান',
    ];

    /** Names are stored with য়/ড়/ঢ় decomposed, so compare in that form. */
    private static function decompose(array $names): array
    {
        return array_map(function ($name) {
            return str_replace(["\u{09DF}", "\u{09DC}", "\u{09DD}"], ["\u{09AF}\u{09BC}", "\u{09A1}\u{09BC}", "\u{09A2}\u{09BC}"], $name);
        }, $names);
    }

    private function samples(callable $generate, int $times = 300): array
    {
        $values = [];
        for ($i = 0; $i < $times; $i++) {
            $values[] = $generate();
        }

        return array_values(array_unique($values));
    }

    public function test_division_is_one_of_the_eight_divisions()
    {
        $this->assertEqualsCanonicalizing(self::decompose(self::DIVISIONS), $this->samples(fn () => BanglaFaker::division()));
    }

    public function test_district_within_a_division()
    {
        $this->assertEqualsCanonicalizing(
            self::decompose(self::CHATTOGRAM_DISTRICTS),
            $this->samples(fn () => BanglaFaker::district('চট্টগ্রাম'), 600)
        );
    }

    public function test_all_64_districts_are_reachable()
    {
        $this->assertCount(64, $this->samples(fn () => BanglaFaker::district(), 4000));
    }

    public function test_names_match_whichever_way_ya_is_encoded()
    {
        $composed = "\u{09AE}\u{09DF}\u{09AE}\u{09A8}\u{09B8}\u{09BF}\u{0982}\u{09B9}";             // ময়মনসিংহ, য় as one character
        $decomposed = "\u{09AE}\u{09AF}\u{09BC}\u{09AE}\u{09A8}\u{09B8}\u{09BF}\u{0982}\u{09B9}";   // য + nukta

        $this->assertContains(BanglaFaker::district($composed), $this->samples(fn () => BanglaFaker::district($decomposed)));
    }

    public function test_upazila_and_union_within_their_parents()
    {
        $this->assertContains('দেবিদ্বার', $this->samples(fn () => BanglaFaker::upazila('কুমিল্লা')));
        $this->assertContains('সুবিল', $this->samples(fn () => BanglaFaker::union('দেবিদ্বার')));
        $this->assertNotContains('সুবিল', $this->samples(fn () => BanglaFaker::union('বরুড়া')));
    }

    public function test_union_of_an_upazila_name_shared_by_several_districts()
    {
        $gazipur = $this->samples(fn () => BanglaFaker::union('কালীগঞ্জ', 'গাজীপুর'));
        $jhenaidah = $this->samples(fn () => BanglaFaker::union('কালীগঞ্জ', 'ঝিনাইদহ'));

        $this->assertEmpty(array_intersect($gazipur, $jhenaidah));
        $this->assertNotEmpty(BanglaFaker::union('কালীগঞ্জ'));
    }

    public function test_thana_and_post_office_within_a_district()
    {
        $this->assertContains('উত্তরা', $this->samples(fn () => BanglaFaker::thana('ঢাকা')));
        $this->assertIsString(BanglaFaker::postOffice('ঢাকা'));
    }

    public function test_postal_code_is_a_real_four_digit_code()
    {
        foreach ($this->samples(fn () => BanglaFaker::postalCode()) as $code) {
            $this->assertMatchesRegularExpression('/^[০-৯]{4}$/u', $code);
        }

        // Dhaka district post codes are 1000-1399
        foreach ($this->samples(fn () => BanglaFaker::postalCode('ঢাকা', false)) as $code) {
            $this->assertMatchesRegularExpression('/^1[0-3]\d\d$/', $code);
        }
    }

    public function test_location_is_consistent()
    {
        for ($i = 0; $i < 100; $i++) {
            $location = BanglaFaker::location();

            $this->assertSame(['division', 'district', 'upazila', 'union', 'thana', 'post_office', 'postcode'], array_keys($location));
            $this->assertContains($location['district'], $this->samples(fn () => BanglaFaker::district($location['division']), 200));
            $this->assertContains($location['upazila'], $this->samples(fn () => BanglaFaker::upazila($location['district']), 200));
            $this->assertContains($location['union'], $this->samples(fn () => BanglaFaker::union($location['upazila'], $location['district']), 200));
            $this->assertContains($location['thana'], $this->samples(fn () => BanglaFaker::thana($location['district']), 300));
            $this->assertMatchesRegularExpression('/^[০-৯]{4}$/u', $location['postcode']);
        }
    }

    public function test_generated_names_are_bangla_only()
    {
        for ($i = 0; $i < 300; $i++) {
            foreach (BanglaFaker::location() as $value) {
                $this->assertMatchesRegularExpression('/^[\x{0980}-\x{09FF}\x{200C}\x{200D} ,.()\-]+$/u', $value);
            }
        }
    }

    public function test_unknown_names_throw()
    {
        foreach ([
            fn () => BanglaFaker::district('Dhaka'),
            fn () => BanglaFaker::upazila('কোথাও না'),
            fn () => BanglaFaker::union('দেবিদ্বার', 'ঢাকা'),
            fn () => BanglaFaker::thana('কোথাও না'),
        ] as $call) {
            try {
                $call();
                $this->fail('Expected InvalidArgumentException');
            } catch (\InvalidArgumentException $e) {
                $this->assertNotEmpty($e->getMessage());
            }
        }
    }

    public function test_existing_address_methods_are_unchanged()
    {
        $this->assertMatchesRegularExpression('/^[০-৯]{5}(-[০-৯]{4})?$/u', BanglaFaker::postcode());
        $this->assertContains(BanglaFaker::state(), ['খুলনা', 'বরিশাল', 'চিটাগং', 'ঢাকা', 'রাজশাহী', 'সিলেট', 'কুমিল্লা']);
    }

    public function test_locations_in_factories()
    {
        $this->assertContains(fake()->banglaDivision(), self::decompose(self::DIVISIONS));
        $this->assertArrayHasKey('postcode', fake()->banglaLocation());
    }
}
