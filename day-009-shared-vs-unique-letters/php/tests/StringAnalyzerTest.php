<?php

namespace tests;

use src\StringAnalyzer;
use PHPUnit\Framework\TestCase;

final class StringAnalyzerTest extends TestCase
{
    public function test_set_values(): void
    {
        $stringAnalyzer = new StringAnalyzer;

        $stringAnalyzer->setValues(['abc', 'abcd']);

        $this->assertEquals(['abc', 'abcd'], $stringAnalyzer->getValues());
    }

    public function test_get_values(): void
    {
        $stringAnalyzer = new StringAnalyzer;

        $stringAnalyzer->setValues(['abc', 'abcd']);

        $this->assertNotEquals(['abc', 'abcde'], $stringAnalyzer->getValues());
    }

     /**
     * Test the basic validations
     *
     * @dataProvider invalidValuesDataProvider
     * @param array $values
     *
     * @return void
     */
    public function test_set_values_validarions(array $values): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $stringAnalyzer = new StringAnalyzer;

        $stringAnalyzer->setValues($values);
    }

    /**
     * Test the scan string method
     *
     * @dataProvider valuesDataProvider
     * @param array $strings
     * @param array $expected
     *
     * @return void
     */
    public function test_scan_strings(array $values, array $expected): void
    {
        $stringAnalyzer = new StringAnalyzer;

        $stringAnalyzer->setValues($values);

        $this->assertEqualsCanonicalizing($expected, $stringAnalyzer->scanStrings());
    }

    public static function valuesDataProvider(): array
    {
        return [
            'simple-case-1' => [["sharp", "soap"], ["aps", "hr", "o"]],
            'simple-case-2' => [["board", "bored"], ["bdor", "a", "e"]],
            'multiple-case-1' => [["happiness", "envelope"], ["enp", "ahis", "lov"]],
            'multiple-case-2' => [["kerfuffle", "fluffy"], ["flu", "ekr", "y"]],
            'multiple-case-3' => [["match", "ham"], ["ahm", "ct", ""]],
        ];
    }

    public static function invalidValuesDataProvider(): array
    {
        return [
            'one-word-array' => [['abc']],
            'int-value-in-array' => [['abc', '1']],
            'empty-array' => [[]],
        ];
    }
}