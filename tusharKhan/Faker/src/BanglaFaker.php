<?php

namespace Tusharkhan\BanglaFaker;


class BanglaFaker extends BaseFaker
{

    public function __construct()
    {
       //silence is gold
    }

    public function parse($string)
    {
        $callback = function ($matches) {
            return $this->format($matches[1]);
        };

        return preg_replace_callback('/{{\s?(\w+|[\w\\\]+->\w+?)\s?}}/u', $callback, $string);
    }


    public function format($format, $arguments = [])
    {
        return call_user_func_array($this->getFormatter($format), $arguments);
    }

    public function getFormatter($format)
    {
        if (isset($this->formatters[$format])) {
            return $this->formatters[$format];
        }

        if (method_exists($this, $format)) {
            $this->formatters[$format] = [$this, $format];

            return $this->formatters[$format];
        }

        // "Faker\Core\Barcode->ean13"
        if (preg_match('|^([a-zA-Z0-9\\\]+)->([a-zA-Z0-9]+)$|', $format, $matches)) {
            $this->formatters[$format] = [$this->ext($matches[1]), $matches[2]];

            return $this->formatters[$format];
        }

        foreach ($this->providers as $provider) {
            if (method_exists($provider, $format)) {
                $this->formatters[$format] = [$provider, $format];

                return $this->formatters[$format];
            }
        }

        throw new \InvalidArgumentException(sprintf('Unknown format "%s"', $format));
    }
}
