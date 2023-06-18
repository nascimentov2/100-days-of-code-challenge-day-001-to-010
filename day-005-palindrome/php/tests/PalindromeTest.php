<?php

namespace tests;

use src\Palindrome;
use PHPUnit\Framework\TestCase;

final class PalindromeTest extends TestCase
{
    public function test_set_word(): void
    {
        $palindrome = new Palindrome;

        $palindrome->setWord('palindrome');

        $this->assertEquals('palindrome', $palindrome->getWord());
    }

    public function test_get_word(): void
    {
        $palindrome = new Palindrome;

        $palindrome->setWord('palindrome');

        $this->assertNotEquals('palindrome2', $palindrome->getWord());
    }

    /**
     * Test if a word is palindrome
     *
     * @dataProvider wordsDataProvider
     * @param string $word
     * @param boolean $expected
     *
     * @return void
     */
    public function test_is_palindrome(string $word, bool $expected): void
    {
        $palindrome = new Palindrome;

        $palindrome->setWord($word);

        $result = $palindrome->isPalindrome();

        $this->assertEquals($expected, $result);
    }

    public static function wordsDataProvider(): array
    {
        return 
        [
            //most basic words
            'wow' => ['wow', true],
            'sos' => ['sos', true],
            'rotator' => ['rotator', true],
            'Mom' => ['Mom', true],

            //complex with spaces
            'Amore, Roma' => ['Amore, Roma', true],
            'Was it a car or a cat I saw?' => ['Was it a car or a cat I saw?', true],

            //not palindrome basic words
            'cat' => ['cat', false],
            'dog' => ['dog', false],
            'birds' => ['birds', false],
            'Rat' => ['Rat', false],

            //not palindrome with spaces
            'Too good to be true' => ['Too good to be true', false],
            'Lets dance!' => ['Lets dance!', false],
        ];
    }
}