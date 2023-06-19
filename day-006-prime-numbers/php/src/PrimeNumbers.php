<?php

namespace src;

class PrimeNumbers
{
    private int $number;

    public function setNumber(int $number): void
    {
        if(!is_integer($number)){
            throw new \InvalidArgumentException(sprintf(
                '%s needs to be an integer',
                $number
            ));
        }

        $this->number = $number;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function isPrime(): bool
    {
        $number = $this->getNumber();

        //prime numbers are by definition greater than 1
        if($number < 2){
            return false;
        }
        
        $prime_numbers = $this->getPrimeNumbers();

        return in_array($number, $prime_numbers) ? true : false ;
    }

    public function getPrimeNumbers(int $max=1000): array
    {
        if($max > 1000){
            throw new \InvalidArgumentException(
                'The maximum value is 1000'
            );
        }

        $number = 2; //first prime number
        $prime_numbers = [];

        while($number <= $max){

            $is_prime = true;
            $divible_by = [];

            for($i=2; $i<=$number; $i++){
                
                if($number % $i == 0){
                    array_push($divible_by, $i);

                    if(count($divible_by) > 1){
                        $is_prime = false; break;
                    }
                }
            }

            if($is_prime === true){
                array_push($prime_numbers, $number);
            }

            $number++;
        }

        return $prime_numbers;
    }
}