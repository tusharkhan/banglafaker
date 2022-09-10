<?php
/**
 * created by: tushar Khan
 * email : tushar.khan0122@gmail.com
 * date : 9/2/2022
 */


namespace Tusharkhan\BanglaFaker;

use Tusharkhan\BanglaFaker\Lib\Number;

class BaseFaker
{

    public static function randomDigit()
    {
        return mt_rand(0, 9);
    }


    public static function randomDigitNotNull()
    {
        return mt_rand(1, 9);
    }


    public static function randomDigitNot($except)
    {
        $result = self::numberBetween(0, 8);

        if ($result >= $except) {
            ++$result;
        }

        return $result;
    }


    public static function randomNumber($nbDigits = null, $strict = false)
    {
        if (!is_bool($strict)) {
            throw new \InvalidArgumentException('randomNumber() generates numbers of fixed width. To generate numbers between two boundaries, use numberBetween() instead.');
        }

        if (null === $nbDigits) {
            $nbDigits = static::randomDigitNotNull();
        }
        $max = 10 ** $nbDigits - 1;

        if ($max > mt_getrandmax()) {
            throw new \InvalidArgumentException('randomNumber() can only generate numbers up to mt_getrandmax()');
        }

        if ($strict) {
            return mt_rand(10 ** ($nbDigits - 1), $max);
        }

        return mt_rand(0, $max);
    }


    public static function randomFloat($nbMaxDecimals = null, $min = 0, $max = null)
    {
        if (null === $nbMaxDecimals) {
            $nbMaxDecimals = static::randomDigit();
        }

        if (null === $max) {
            $max = static::randomNumber();

            if ($min > $max) {
                $max = $min;
            }
        }

        if ($min > $max) {
            $tmp = $min;
            $min = $max;
            $max = $tmp;
        }

        return round($min + mt_rand() / mt_getrandmax() * ($max - $min), $nbMaxDecimals);
    }


    public static function numberBetween($int1 = 0, $int2 = 2147483647)
    {
        $min = $int1 < $int2 ? $int1 : $int2;
        $max = $int1 < $int2 ? $int2 : $int1;

        return mt_rand($min, $max);
    }


    public static function passthrough($value)
    {
        return $value;
    }


    public static function randomLetter()
    {
        return chr(mt_rand(97, 122));
    }


    public static function randomAscii()
    {
        return chr(mt_rand(33, 126));
    }


    public static function randomElements($array = ['a', 'b', 'c'], $count = 1, $allowDuplicates = false)
    {
        $traversables = [];

        if ($array instanceof \Traversable) {
            foreach ($array as $element) {
                $traversables[] = $element;
            }
        }

        $arr = count($traversables) ? $traversables : $array;

        $allKeys = array_keys($arr);
        $numKeys = count($allKeys);

        if (!$allowDuplicates && $numKeys < $count) {
            throw new \LengthException(sprintf('Cannot get %d elements, only %d in array', $count, $numKeys));
        }

        $highKey = $numKeys - 1;
        $keys = $elements = [];
        $numElements = 0;

        while ($numElements < $count) {
            $num = mt_rand(0, $highKey);

            if (!$allowDuplicates) {
                if (isset($keys[$num])) {
                    continue;
                }
                $keys[$num] = true;
            }

            $elements[] = $arr[$allKeys[$num]];
            ++$numElements;
        }

        return $elements;
    }


    public static function randomElement($array = ['a', 'b', 'c'])
    {
        if (!$array || ($array instanceof \Traversable && !count($array))) {
            return null;
        }
        $elements = static::randomElements($array, 1);

        return $elements[0];
    }

    /**
     * Returns a random key from a passed associative array
     *
     * @param array $array
     *
     * @return int|string|null
     */
    public static function randomKey($array = [])
    {
        if (!$array) {
            return null;
        }
        $keys = array_keys($array);

        return $keys[mt_rand(0, count($keys) - 1)];
    }


    public static function shuffle($arg = '')
    {
        if (is_array($arg)) {
            return static::shuffleArray($arg);
        }

        if (is_string($arg)) {
            return static::shuffleString($arg);
        }

        throw new \InvalidArgumentException('shuffle() only supports strings or arrays');
    }


    public static function shuffleArray($array = [])
    {
        $shuffledArray = [];
        $i = 0;
        reset($array);

        foreach ($array as $key => $value) {
            if ($i == 0) {
                $j = 0;
            } else {
                $j = mt_rand(0, $i);
            }

            if ($j == $i) {
                $shuffledArray[] = $value;
            } else {
                $shuffledArray[] = $shuffledArray[$j];
                $shuffledArray[$j] = $value;
            }
            ++$i;
        }

        return $shuffledArray;
    }


    public static function shuffleString($string = '', $encoding = 'UTF-8')
    {
        if (function_exists('mb_strlen')) {
            // UTF8-safe str_split()
            $array = [];
            $strlen = mb_strlen($string, $encoding);

            for ($i = 0; $i < $strlen; ++$i) {
                $array[] = mb_substr($string, $i, 1, $encoding);
            }
        } else {
            $array = str_split($string, 1);
        }

        return implode('', static::shuffleArray($array));
    }

    private static function replaceWildcard($string, $wildcard = '#', $callback = 'static::randomDigit')
    {
        if (($pos = strpos($string, $wildcard)) === false) {
            return $string;
        }

        for ($i = $pos, $last = strrpos($string, $wildcard, $pos) + 1; $i < $last; ++$i) {
            if ($string[$i] === $wildcard) {
                $string[$i] = call_user_func($callback);
            }
        }

        return $string;
    }


    public static function numerify($string = '###')
    {
        // instead of using randomDigit() several times, which is slow,
        // count the number of hashes and generate once a large number
        $toReplace = [];

        if (($pos = strpos($string, '#')) !== false) {
            for ($i = $pos, $last = strrpos($string, '#', $pos) + 1; $i < $last; ++$i) {
                if ($string[$i] === '#') {
                    $toReplace[] = $i;
                }
            }
        }

        if ($nbReplacements = count($toReplace)) {
            $maxAtOnce = strlen((string) mt_getrandmax()) - 1;
            $numbers = '';
            $i = 0;

            while ($i < $nbReplacements) {
                $size = min($nbReplacements - $i, $maxAtOnce);
                $numbers .= str_pad(static::randomNumber($size), $size, '0', STR_PAD_LEFT);
                $i += $size;
            }

            for ($i = 0; $i < $nbReplacements; ++$i) {
                $string[$toReplace[$i]] = $numbers[$i];
            }
        }
        $string = self::replaceWildcard($string, '%', 'static::randomDigitNotNull');

        return $string;
    }

    /**
     * Replaces all question mark ('?') occurrences with a random letter
     *
     * @param string $string String that needs to bet parsed
     *
     * @return string
     */
    public static function lexify($string = '????')
    {
        return self::replaceWildcard($string, '?', 'static::randomLetter');
    }


    public static function bothify($string = '## ??')
    {
        $string = self::replaceWildcard($string, '*', static function () {
            return mt_rand(0, 1) ? '#' : '?';
        });

        return static::lexify(static::numerify($string));
    }


    public static function asciify($string = '****')
    {
        return preg_replace_callback('/\*/u', 'static::randomAscii', $string);
    }


    public static function regexify($regex = '')
    {
        // ditch the anchors
        $regex = preg_replace('/^\/?\^?/', '', $regex);
        $regex = preg_replace('/\$?\/?$/', '', $regex);
        // All {2} become {2,2}
        $regex = preg_replace('/\{(\d+)\}/', '{\1,\1}', $regex);
        // Single-letter quantifiers (?, *, +) become bracket quantifiers ({0,1}, {0,rand}, {1, rand})
        $regex = preg_replace('/(?<!\\\)\?/', '{0,1}', $regex);
        $regex = preg_replace('/(?<!\\\)\*/', '{0,' . static::randomDigitNotNull() . '}', $regex);
        $regex = preg_replace('/(?<!\\\)\+/', '{1,' . static::randomDigitNotNull() . '}', $regex);
        // [12]{1,2} becomes [12] or [12][12]
        $regex = preg_replace_callback('/(\[[^\]]+\])\{(\d+),(\d+)\}/', static function ($matches) {
            return str_repeat($matches[1], self::randomElement(range($matches[2], $matches[3])));
        }, $regex);
        // (12|34){1,2} becomes (12|34) or (12|34)(12|34)
        $regex = preg_replace_callback('/(\([^\)]+\))\{(\d+),(\d+)\}/', static function ($matches) {
            return str_repeat($matches[1], self::randomElement(range($matches[2], $matches[3])));
        }, $regex);
        // A{1,2} becomes A or AA or \d{3} becomes \d\d\d
        $regex = preg_replace_callback('/(\\\?.)\{(\d+),(\d+)\}/', static function ($matches) {
            return str_repeat($matches[1], self::randomElement(range($matches[2], $matches[3])));
        }, $regex);
        // (this|that) becomes 'this' or 'that'
        $regex = preg_replace_callback('/\((.*?)\)/', static function ($matches) {
            return Base::randomElement(explode('|', str_replace(['(', ')'], '', $matches[1])));
        }, $regex);
        // All A-F inside of [] become ABCDEF
        $regex = preg_replace_callback('/\[([^\]]+)\]/', static function ($matches) {
            return '[' . preg_replace_callback('/(\w|\d)\-(\w|\d)/', static function ($range) {
                    return implode('', range($range[1], $range[2]));
                }, $matches[1]) . ']';
        }, $regex);
        // All [ABC] become B (or A or C)
        $regex = preg_replace_callback('/\[([^\]]+)\]/', static function ($matches) {
            // remove backslashes (that are not followed by another backslash) because they are escape characters
            $match = preg_replace('/\\\(?!\\\)/', '', $matches[1]);
            $randomElement = self::randomElement(str_split($match));
            //[.] should not be a random character, but a literal .
            return str_replace('.', '\.', $randomElement);
        }, $regex);
        // replace \d with number and \w with letter and . with ascii
        $regex = preg_replace_callback('/\\\w/', 'static::randomLetter', $regex);
        $regex = preg_replace_callback('/\\\d/', 'static::randomDigit', $regex);
        //replace . with ascii except backslash
        $regex = preg_replace_callback('/(?<!\\\)\./', static function () {
            $chr = static::asciify('*');

            if ($chr === '\\') {
                $chr .= '\\';
            }

            return $chr;
        }, $regex);
        // remove remaining single backslashes
        $regex = str_replace('\\\\', '[:escaped_backslash:]', $regex);
        $regex = str_replace('\\', '', $regex);
        $regex = str_replace('[:escaped_backslash:]', '\\', $regex);

        // phew
        return $regex;
    }


    public static function getFormatter($string)
    {
        $mainString = $string;
        $formats = explode(' ', $mainString);


        foreach ($formats as $format) {
            if( preg_match('/{{\s?(\w+|[\w\\\]+->\w+?)\s?}}/u', $format, $matches) ){
                if ( method_exists(new static, $matches[1]) ){
                    $callFunction = forward_static_call(array(get_called_class(), $matches[1]));

                    $mainString = preg_replace($matches[0], $callFunction, $mainString);
                }
            } else if ( preg_match('/[#-]+/', $format, $matches) ){
                $strArray = str_split($mainString);

                foreach ($strArray as $ins => $str){
                    if ( $str == '#' ) $strArray[$ins] = Number::getBanglaNumber(self::numberBetween(0, 9));
                    else continue;
                }

                $mainString = implode('', $strArray);
            }
        }

        return str_replace(['{', '}'], '', $mainString);
    }

    public static function getConstants()
    {
        $oClass = new \ReflectionClass(get_called_class());
        return $oClass->getConstants();
    }


    public static function removeEmptyArray($array)
    {
        return array_filter(
            array_map(
                function($v){
                    if( is_array($v) > 0 ) return array_filter($v,'strlen');
                    else return $v;
                },$array
            )
        );
    }

}
