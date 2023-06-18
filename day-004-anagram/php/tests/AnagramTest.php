<?php

namespace tests;

use src\Anagram;
use PHPUnit\Framework\TestCase;

final class AnagramTest extends TestCase
{
    public function test_set_words(): void
    {
        $anagram = new Anagram;

        $anagram->setWords(['good', 'code']);

        $this->assertEqualsCanonicalizing(['good', 'code'], $anagram->getWords());
    }

    public function test_get_words(): void
    {
        $anagram = new Anagram;

        $anagram->setWords(['good', 'code']);

        $this->assertNotEqualsCanonicalizing(['good', 'coding'], $anagram->getWords());
    }

    public function test_is_anagram_only_works_if_set_words_was_called(): void
    {
        $anagram = new Anagram;

        $this->expectException(\Exception::class);

        $anagram->isAnagram();
    }

    /**
     * Test if two words are anagrams
     *
     * @dataProvider wordsDataProvider
     * @param array $words
     * @param boolean $expected
     * 
     * @return void
     */
    public function test_is_anagram(array $words, bool $expected): void
    {
        $anagram = new Anagram;

        $anagram->setWords($words);

        $result = $anagram->isAnagram();

        $this->assertEquals($expected, $result);
    }

    public static function wordsDataProvider(): array
    {
        return 
        [
            //3 letters
            'cat-act' => [['cat', 'act'], true],
            'arc-car' => [['arc', 'car'], true],
            'abc-abd' => [['abc', 'abd'], false],
            
            //5 letters
            'angel-glean' => [['angel', 'glean'], true],
            'bored-robed' => [['bored', 'robed'], true],
            'dusti-study' => [['dusti', 'study'], false],

            //complex with spaces
            'Apple Macintosh-laptop machines' => [['Apple Macintosh', 'laptop machines'], true],
            'Astronomer-moon starer' => [['Astronomer', 'moon starer'], true],

            //string length not equals
            'five-six' => [['five', 'six'], false],
            'yes we can-no we cant at all' => [['yes we can', 'no we cant at all'], false],
        ];
    }
}