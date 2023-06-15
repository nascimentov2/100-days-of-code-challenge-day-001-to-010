<?php

namespace src;

class Fibonacci
{
    private int $number_to_check;

    private int $max_value = 10000;

    public function setNumberToCheck(int $number_to_check): void
    {
        $this->number_to_check = $number_to_check;
    }

    public function getNumberToCheck(): int
    {
        return $this->number_to_check;
    }

    public function getMaxValue(): int
    {
        return $this->max_value;
    }

    public function isFibo(): bool
    {
        $previous    = 'null';
        $index       = 0;
        $fibo_number = 0;
        $next        = 'null';
        
        $sequence = [];

        $number_to_check = $this->getNumberToCheck();

        while($fibo_number<=$number_to_check){

            $fibo_number = $this->getNextFiboNumber($sequence);

            //fibo number found, no need to continue the loop
            if($fibo_number === $number_to_check){
                return true;
            }

            $sequence['f'.$index]['previous'] = $previous;
            $sequence['f'.$index]['number']   = $fibo_number;
            $sequence['f'.$index]['next']     = $next;

            if($index != 0){
                $sequence[$previous]['next'] = 'f'.$index;
            }

            $previous = 'f'.$index;
            
            $index++; continue;
        }
        
        return false;
    }

    public function getNextFiboNumber(array $sequence): int
    {
        //the first two fibo numbers 0 and 1
        if(count($sequence) < 2){
            return count($sequence);
        }

        $n1 = array_key_last($sequence);
        $n2 = key(array_slice($sequence, -2));

        $next = ($sequence[$n1]['number']) + ($sequence[$n2]['number']);
        
        return $next;
    }
}