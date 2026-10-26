<?php

namespace TusharKhan\BanglaFaker\Tests;

class PackageDiscoveryTest extends TestCase
{
    public function test_discovered_classes_exist()
    {
        $composer = json_decode(file_get_contents(__DIR__ . '/../../composer.json'), true);
        $laravel = $composer['extra']['laravel'];

        foreach (array_merge($laravel['providers'], array_values($laravel['aliases'])) as $class) {
            $this->assertTrue(class_exists($class), "$class does not exist");
        }
    }
}
