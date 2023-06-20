<?php

namespace src;

class CountChars
{
    private mixed $value;

    public function setValue($value): void
    {
        $this->value = $value;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function countLettersAndDigits(): array
    {
        //remove all non alphanumeric chars from value
        $clean_value = strtolower(trim(preg_replace("/[^a-zA-Z0-9]/", '', $this->getValue())));

        $letters = strlen(preg_replace("/[^0-9]/", '', $clean_value));
        $digits  = strlen(preg_replace("/[^A-Za-z]/", '', $clean_value));

        return ['letters' => $letters, 'digits' => $digits];
    }
}