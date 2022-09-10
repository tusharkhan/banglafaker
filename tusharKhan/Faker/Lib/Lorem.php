<?php
/**
 * created by: tushar Khan
 * email : tushar.khan0122@gmail.com
 * date : 9/10/2022
 */


namespace Tusharkhan\BanglaFaker\Lib;

use Tusharkhan\BanglaFaker\BanglaFaker;

class Lorem extends BanglaFaker
{
    protected static $wordList = [
        'জীবের','মধ্যে','সবচেয়ে','সম্পূর্ণতা','মানুষের', 'কিন্তু','সবচেয়ে','অসম্পূর্ণ','হয়ে','সে',
        'জন্মগ্রহণ','করে', 'বাঘ','ভালুক','তার','জীবনযাত্রার','পনেরো','আনা','মূলধন','নিয়ে','আসে',
        'প্রকৃতির','মালখানা','থেকে','জীবরঙ্গভূমিতে','মানুষ','এসে','দেখা','দেয়','দুই','শূন্য','হাতে','মুঠো',
        'বেঁধে।','মানুষ','আসবার','পূর্বেই','জীবসৃষ্টিযজ্ঞে','প্রকৃতির','ভূরিব্যয়ের','পালা','শেষ','হয়ে','এসেছে',
        'বিপুল','মাংস','কঠিন','বর্ম','প্রকাণ্ড',
        'লেজ','নিয়ে','জলে','স্থলে','পৃথুল','দেহের','যে','অমিতাচার','প্রবল','হয়ে','উঠেছিল','তাতে',
        'ধরিত্রীকে','দিলে','ক্লান্ত','করে','প্রমাণ','হল',
        'আতিশয্যের','পরাভব','অনিবার্য','পরীক্ষায়','এটাও','স্থির','হয়ে','গেল','যে','প্রশ্রয়ের','পরিমাণ','যত',
        'বেশি','হয়','দুর্বলতার','বোঝাও','তত',
        'দুর্বহ','হয়ে','ওঠে', 'নূতন','পর্বে','প্রকৃতি','যথাসম্ভব','মানুষের','বরাদ্দ','কম','করে','দিয়ে','নিজে',
        'রইল','নেপথ্যে','মানুষকে','দেখতে','হল','খুব','ছোটো','কিন্তু',
        'সেটা','একটা','কৌশল','মাত্র','এবারকার','জীবযাত্রার','পালায়','বিপুলতাকে','করা','হল','বহুলতায়',
        'পরিণত','মহাকায়','জন্তু','ছিল','প্রকাণ্ড','একলা','মানুষ' ,'হল' ,'দূরপ্রসারিত', 'অনেক',
        'অ্যালিয়াস', 'কনসেকুয়াতুর', 'অট', 'পারফেরেন্ডিস', 'সিট', 'ভোলুপটেম',
        'অ্যাকুস্যান্টিয়াম', 'ডোলোরেমকু', 'অ্যাপেরিয়াম', 'ইক', 'ইপসা', 'কুয়ে', 'আব',
        'ইলো', 'উদ্ভাবক', 'ভেরিটাইটিস', 'এটি', 'কোয়াসি', 'আর্কিটেক্টো',
         'মোদি', 'টেম্পোরা', 'ঘটনা',  'শ্রমিক',
        'ম্যাগনাম', 'আলিকুয়াম', 'কোয়ারাট', 'ভোলুপটেম', 'উট', 'এনিম', 'এড',
        'মিনিমা', 'ভেনিয়াম', 'কুইস', 'নোস্ট্রাম', 'অনুশীলন', 'উল্লাম',
        'কর্পোরিস', 'নিমো', 'এনিম', 'ইপসাম', 'ভোলুপটেম', 'কিয়া', 'ভোলুপ্টাস',
        'কোয়াম', 'নিহিল', 'মোলেস্টিয়া', 'এট', 'ইউস্টো', 'ওডিও', 'ডিগনিসিমোস',
        'ডুসিমাস', 'কুই', 'ব্ল্যান্ডাইটিস', 'প্রেসেন্টিয়াম', 'লাউডেন্টিয়াম', 'টোটাম',
        'পারস্পিসিয়াটিস', 'আন্ডে', 'অমনিস', 'ইস্টে', 'নাটুস', 'ত্রুটি',
        'সিমিলিক', 'সুন্ট', 'ইন', 'কুলপা', 'কুই', 'অফিসিয়া', 'ডিজারেন্ট',
        'পার্থক্য', 'নাম', 'লিবেরো', 'টেম্পোর', 'কাম', 'সলুটা', 'নোবিস',
        'প্লেসেট', 'ফেসার', 'পসিমাস', 'অমনিস', 'ভোলুপ্টাস', 'অ্যাসুমেন্ডা',
        'ডোলোরেম', 'ইউম', 'ফুগিয়াট', 'কো', 'ভোলুপ্টাস', 'নুল্লা', 'প্যারিয়াতুর',
        'মাইওরেস', 'ডোলোরিবাস', 'অ্যাসপিরিওরস', 'রিপেলাট',
    ];


    public static function word()
    {
        return static::randomElement(static::$wordList);
    }


    public static function words($nb = 3, $asText = false)
    {
        $arguments = func_get_args();
        $arguments = static::removeEmptyArray($arguments);

        if( count($arguments) > 0 ){
            if ( ! is_array($arguments[0]) ){
                $nb = $arguments[0];
                if( isset($arguments[1]) ){
                    $asText = $arguments[1];
                }
            } else {
                if ( isset($arguments[0][0]) ){
                    $nb = $arguments[0][0];
                }
                if ( isset($arguments[0][1]) ){
                    $asText = $arguments[0][1];
                }
            }
        } else {
            $nb = 3; $asText = false;
        }


        $words = [];

        for ($i = 0; $i < $nb; ++$i) {
            $words[] = static::word();
        }

        return $asText ? implode(' ', $words) : $words;
    }


    public static function sentence($nbWords = 6, $variableNbWords = true)
    {
        $arguments = func_get_args();
        $arguments = static::removeEmptyArray($arguments);

        if( count($arguments) > 0 ){
            if ( ! is_array($arguments[0]) ){
                $nbWords = $arguments[0];
                if( isset($arguments[1]) ){
                    $variableNbWords = $arguments[1];
                }
            } else {
                if ( isset($arguments[0][0]) ){
                    $nbWords = $arguments[0][0];
                }
                if ( isset($arguments[0][1]) ){
                    $variableNbWords = $arguments[0][1];
                }
            }
        } else {
            $nbWords = 6; $variableNbWords = false;
        }


        if ($nbWords <= 0) {
            return '';
        }

        if ($variableNbWords) {
            $nbWords = self::randomizeNbElements($nbWords);
        }

        $words = static::words($nbWords);

        return implode(' ', $words) . ' ।';
    }


    public static function sentences($nb = 3, $asText = false)
    {
        $arguments = func_get_args();
        $arguments = static::removeEmptyArray($arguments);

        if( count($arguments) > 0 ){
            if ( ! is_array($arguments[0]) ){
                $nb = $arguments[0];
                if( isset($arguments[1]) ){
                    $asText = $arguments[1];
                }
            } else {
                if ( isset($arguments[0][0]) ){
                    $nb = $arguments[0][0];
                }
                if ( isset($arguments[0][1]) ){
                    $asText = $arguments[0][1];
                }
            }
        } else {
            $nb = 3; $asText = false;
        }


        $sentences = [];

        for ($i = 0; $i < $nb; ++$i) {
            $sentences[] = static::sentence();
        }

        return $asText ? implode(' ', $sentences) : $sentences;
    }


    public static function paragraph($nbSentences = 3, $variableNbSentences = true)
    {
        $arguments = func_get_args();
        $arguments = static::removeEmptyArray($arguments);

        if( count($arguments) > 0 ){
            if ( ! is_array($arguments[0]) ){
                $nbSentences = $arguments[0];
                if( isset($arguments[1]) ){
                    $variableNbSentences = $arguments[1];
                }
            } else {
                if ( isset($arguments[0][0]) ){
                    $nbSentences = $arguments[0][0];
                }
                if ( isset($arguments[0][1]) ){
                    $variableNbSentences = $arguments[0][1];
                }
            }
        } else {
            $nbSentences = 3; $variableNbSentences = true;
        }


        if ($nbSentences <= 0) {
            return '';
        }

        if ($variableNbSentences) {
            $nbSentences = self::randomizeNbElements($nbSentences);
        }

        return implode(' ', static::sentences($nbSentences));
    }


    public static function paragraphs($nb = 3, $asText = false)
    {
        $arguments = func_get_args();
        $arguments = static::removeEmptyArray($arguments);

        if( count($arguments) > 0 ){
            if ( ! is_array($arguments[0]) ){
                $nb = $arguments[0];
                if( isset($arguments[1]) ){
                    $asText = $arguments[1];
                }
            } else {
                if ( isset($arguments[0][0]) ){
                    $nb = $arguments[0][0];
                }
                if ( isset($arguments[0][1]) ){
                    $asText = $arguments[0][1];
                }
            }
        } else {
            $nb = 3; $asText = false;
        }

        $paragraphs = [];

        for ($i = 0; $i < $nb; ++$i) {
            $paragraphs[] = static::paragraph();
        }

        return $asText ? implode("\n\n", $paragraphs) : $paragraphs;
    }


    protected static function randomizeNbElements($nbElements)
    {
        return (int) ($nbElements * self::numberBetween(60, 140) / 100) + 1;
    }
}
