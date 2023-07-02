<?php

namespace src\FlipMethods;

final class Word
{
    public static function flip(string $string): string
    {
        $array_to_flip = explode(' ',$string);
        $flipped_array = [];

        foreach($array_to_flip as $key => $word){
            $flipped_array[$key] = strrev($word);
        }
        
        $flipped_string = implode(' ', $flipped_array);

        return $flipped_string;
    }
}