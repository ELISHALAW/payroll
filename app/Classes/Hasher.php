<?php

namespace App\Classes;

use Hashids\Hashids;

class Hasher
{
    public static function encode($value)
    {
        return app(Hashids::class)->encode($value);
    }
    public static function decode($enc)
    {
        if (is_int($enc)) {
            return $enc;
        }

        $decodedStr = app(Hashids::class)->decode($enc);
        // if not valid encrypted string provided, it'll return empty array 
        // else it'll return the decrypted string in array [0] element

        if (count($decodedStr) == 1)
            return $decodedStr[0];
        else
            return 0;
        dd(app(Hashids::class)->decode($enc));
        return app(Hashids::class)->decode($enc)[0];
    }
}
