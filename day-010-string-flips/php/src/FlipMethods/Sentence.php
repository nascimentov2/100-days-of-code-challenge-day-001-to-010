<?php

namespace src\FlipMethods;

final class Sentence
{
    public static function flip(string $string): string
    {
        $array_to_flip = explode(' ',$string);

        $flipped_array = array_reverse($array_to_flip);

        $flipped_string = implode(' ', $flipped_array);

        return $flipped_string;
    }
}