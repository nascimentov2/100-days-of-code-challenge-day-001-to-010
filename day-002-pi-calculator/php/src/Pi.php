<?php

namespace src;

class Pi
{
    private static float $numerator = 4.0;

    private static float $denominator = 1.0;

    private static float $pi = 0.0;

    private static int $accuracy = 1000000; //this accuracy can handle the basic 3.14 PI value only

    public static function getPi(int $digits=2): float
    {
        for($i=0; $i<=self::$accuracy; $i++){

            $increment = self::$numerator/self::$denominator ;

            self::$pi += ( $i % 2 === 0 ) ? + $increment : - $increment ;

            self::$denominator += 2.0;
        }

        return round(self::$pi, $digits);
    }
}