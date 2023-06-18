<?php

namespace src;

class Anagram
{
    private array $words = [];

    public function setWords(array $words): void
    {
        if(count($words) !== 2){
            throw new \LengthException(
                "You have to set exactly 2 items to be verified"
            );
        }

        $this->words = $words;
    }

    public function getWords(): array
    {
        return $this->words;
    }

    public function isAnagram(): bool
    {
        if(count($this->getWords()) < 2){
            throw new \Exception(
                "You have first to set the words to verify"
            );
        }

        //first remove all spaces and transform everything to lowercase
        $word1 = strtolower(trim(str_replace(' ', '', $this->getWords()[0])));
        $word2 = strtolower(trim(str_replace(' ', '', $this->getWords()[1])));
        
        if(strlen($word1) != strlen($word2)){
            return false;
        }

        $chars1 = count_chars($word1, 1);
        $chars2 = count_chars($word2, 1);

        return ($chars1 === $chars2) ? true : false ;
    }
}