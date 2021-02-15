<?php

namespace App\Utilities;

use function GuzzleHttp\Psr7\str;

class StringUtil
{
    /**
     * Change Persian number to Latin
     *
     * @param $string
     *
     * @return string
     */
    public static function toLatinNumber($string)
    {
        $string = str_replace(
             ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'],
             [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
             $string);

        return $string;
    }


    /**
     * Change Latin number to Persian
     *
     * @param $string
     *
     * @return string
     */
    public static function toPersianNumber($string)
    {
        $string = str_replace(
             [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
             ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'],
             $string);

        return $string;
    }


    /**
     * replace 0098 or +98 with 0
     *
     * @param $string
     */
    public static function toStandardFormat($string)
    {
        if (substr($string, 0, 4) == "0098" || substr($string, 0, 3) == "+98") {
            $string = str_replace(['0098', '+98'], 0, $string);
        }

        return $string;
    }

}