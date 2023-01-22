<?php
/**
 * created by: tushar Khan
 * email : tushar.khan0122@gmail.com
 * date : 9/30/2022
 */

namespace TusharKhan\BanglaFaker\Tests;


use Tusharkhan\BanglaFaker\BanglaFaker;

class ObjectReferenceTest extends \TusharKhan\BanglaFaker\Tests\TestCase
{
    public function test_paragraph()
    {
        $banglaFaker = $this->getBanglaFakerReference();
        $this->assertIsArray($banglaFaker->paragraphs(70));
    }



    public function test_sentence()
    {
        $banglaFaker = $this->getBanglaFakerReference();

        $this->assertIsString($banglaFaker->sentence(2));
    }


    public function test_postcode()
    {
        $banglaFaker = $this->getBanglaFakerReference();

        $this->assertIsString($banglaFaker->postcode());
    }


    public function test_bangla_date()
    {
        $banglaFaker = $this->getBanglaFakerReference();
        $this->assertEquals("১২-০৯-২০২১ ০০:০০:০০", $banglaFaker->banglaDate('12-09-2021'));
    }


    public function test_sentences()
    {
        $faker = $this->getBanglaFakerReference();

        $this->assertIsArray($faker->sentences(7));
    }


    public function test_paragraphs()
    {
        $faker = $this->getBanglaFakerReference();

        $this->assertIsArray($faker->paragraphs(9, false));
    }


    private function getBanglaFakerReference(){
        return new BanglaFaker();
    }
}