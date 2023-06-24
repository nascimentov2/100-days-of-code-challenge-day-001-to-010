<?php

namespace src;

class SharingValues
{
    private array $values;

    public function setValues(array $values): void
    {
        if(count($values) < 2){            
            throw new \LengthException(
                'The array must be at least 2 keys long.'
            );
        }

        foreach($values as $value){
            
            if(!is_numeric($value)){
                throw new \InvalidArgumentException(sprintf(
                    '%s must be a numeric value',
                    $value
                ));
            }

            if($value < 1){
                throw new \InvalidArgumentException(sprintf(
                    'All values must be greater than zero',
                    $value
                ));
            }
        }

        $this->values = $values;
    }

    public function getValues(): array
    {
        return $this->values;
    }

    public function share(): array
    {
        $values = $this->getValues();

        $min_value = min($values); 
        $key_min_value = array_search($min_value, $values);

        $new_values = $values;

        foreach($values as $key => $value){

            if($key != $key_min_value){
                $share = $value/4;

                $new_values[$key_min_value] += $share;
                $new_values[$key] -= $share;
            }
        }

        return $new_values;
    }
}