<?php

namespace src;

class StringAnalyzer
{
    private array $values = [];

    public function setValues(array $values): void
    {
        if(count($values) !== 2){
            throw new \InvalidArgumentException(
                'The array must have exactly 2 itens to be verified'
            );
        }

        if( (!ctype_alpha($values[0])) || (!ctype_alpha($values[1])) ){
            throw new \InvalidArgumentException(
                'Both itens must be strings'
            );
        }

        $this->values = $values;
    }

    public function getValues(): array
    {
        return $this->values;
    }

    public function scanStrings(): array
    {
        if( count($this->getValues()) !== 2 ){
            throw new \Exception(
                'You must first call the setValues method in order to compare the strings'
            );
        }

        $shared_values = [];
        $unique_word_1 = [];
        $unique_word_2 = [];

        $values = $this->getValues();

        $word_1 = $values[0];
        $word_2 = $values[1];

        $strings_word_1 = str_split($word_1);
        $strings_word_2 = str_split($word_2);

        $shared_values = array_intersect($strings_word_1, $strings_word_2);

        foreach($strings_word_1 as $string){
            if( !in_array($string, $strings_word_2) ){
                array_push($unique_word_1, $string);
            }
        }

        foreach($strings_word_2 as $string){
            if( !in_array($string, $strings_word_1) ){
                array_push($unique_word_2, $string);
            }
        }

        $shared_values = implode('', $this->cleanAndSortArray($shared_values));
        $unique_word_1 = implode('', $this->cleanAndSortArray($unique_word_1));
        $unique_word_2 = implode('', $this->cleanAndSortArray($unique_word_2));

        return [$shared_values, $unique_word_1, $unique_word_2];
    }

    private function cleanAndSortArray(array $array): array
    {
        $cleaned_array = array_unique($array);

        sort($cleaned_array); 
        
        return $cleaned_array;
    }
}