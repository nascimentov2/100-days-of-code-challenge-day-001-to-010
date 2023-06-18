<?php

namespace src;

class Palindrome
{
    private string $word;

    public function setWord(string $word): void
    {
        $this->word = $word;
    }

    public function getWord(): string
    {
        return $this->word;
    }

    public function isPalindrome(): bool
    {
        //first remove all spaces and transform everything to lowercase
        $word = strtolower(trim(preg_replace("/[^A-Za-z]/", '', $this->getWord())));

        return ($word === strrev($word)) ? true : false ;
    }
}