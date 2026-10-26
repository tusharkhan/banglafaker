<?php

namespace TusharKhan\BanglaFaker\Tests;

use Faker\Generator;
use Tusharkhan\BanglaFaker\BanglaFaker;
use Tusharkhan\BanglaFaker\Faker\BanglaFakerProvider;

class FakerProviderTest extends TestCase
{
    public function test_fake_helper_has_bangla_methods()
    {
        $this->assertDoesNotMatchRegularExpression('/[A-Za-z]/', fake()->banglaCity());
    }

    public function test_factory_faker_has_bangla_methods()
    {
        $this->assertIsString($this->app->make(Generator::class)->banglaMaleName());
    }

    public function test_english_faker_methods_are_untouched()
    {
        $this->assertMatchesRegularExpression('/^[A-Za-z .\'-]+$/', fake()->city());
        $this->assertMatchesRegularExpression('/^[A-Za-z]+$/', fake()->word());
    }

    public function test_arguments_are_passed_through()
    {
        $this->assertCount(4, fake()->banglaWords(4));
        $this->assertEquals('১২-০৯-২০২১', fake()->banglaDate('12-09-2021', 'd-m-Y'));
    }

    public function test_unique_modifier_works()
    {
        $faker = fake()->unique(true);
        $titles = [$faker->banglaTitleFemale(), $faker->banglaTitleFemale()];

        $this->assertEqualsCanonicalizing(['মিসেস.', 'মিস.'], $titles);

        $this->expectException(\OverflowException::class);
        $faker->banglaTitleFemale();
    }

    public function test_seed_makes_output_repeatable()
    {
        fake()->seed(1234);
        $first = [fake()->banglaMaleName(), fake()->banglaAddress(), fake()->banglaPhone()];

        fake()->seed(1234);
        $second = [fake()->banglaMaleName(), fake()->banglaAddress(), fake()->banglaPhone()];

        $this->assertSame($first, $second);
    }

    public function test_every_generator_has_its_own_bangla_method()
    {
        $seen = [];

        foreach (BanglaFaker::getChildClasses() as $class) {
            foreach ((new \ReflectionClass($class))->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
                if ($method->class !== ltrim($class, '\\') || $method->isConstructor()) {
                    continue;
                }

                $expected = BanglaFakerProvider::formatterName($method->name);

                if (isset($seen[$expected])) {
                    $this->fail("$class::{$method->name}() and {$seen[$expected]}() both map to $expected()");
                }
                $seen[$expected] = $class . '::' . $method->name;

                $this->assertTrue(
                    method_exists(BanglaFakerProvider::class, $expected),
                    "$class::{$method->name}() has no $expected() on the Faker provider"
                );
            }
        }
    }

    public function test_street_names()
    {
        $names = '(বরকত|হাজী|করিমউদ্দিন)';
        $suffixes = '(তলী|গলি|চিপা|ব্রীজ|সড়ক|বাইপাস|ক্যাম্প)';

        $this->assertMatchesRegularExpression("/^$names$/u", fake()->banglaStreetBaseName());
        $this->assertMatchesRegularExpression("/^$names $suffixes$/u", fake()->banglaStreetName());
    }
}
