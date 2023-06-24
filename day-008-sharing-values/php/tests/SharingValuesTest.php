<?php

namespace tests;

use src\SharingValues;
use PHPUnit\Framework\TestCase;

final class SharingValuesTest extends TestCase
{
    public function test_set_values(): void
    {
        $sharing_values = new SharingValues;

        $sharing_values->setValues([1, 15, 20]);

        $this->assertEqualsCanonicalizing([1, 15, 20], $sharing_values->getValues());
    }

    public function test_get_values(): void
    {
        $sharing_values = new SharingValues;

        $sharing_values->setValues([1, 15, 20]);

        $this->assertNotEqualsCanonicalizing([1, 15, 22], $sharing_values->getValues());
    }

    /**
     * The set values cannot accept 0 or negative values
     *
     * @dataProvider invalidValuesDataProvider
     * @param array $values
     *
     * @return void
     */
    public function test_set_values_not_accepts_zero_or_negative_values(array $values): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $sharing_values = new SharingValues;

        $sharing_values->setValues($values);
    }

    public function test_set_values_length_of_array_must_be_greater_than_one(): void
    {
        $this->expectException(\LengthException::class);

        $sharing_values = new SharingValues;

        $sharing_values->setValues([]);
    }

    /**
     * Test the share values method
     *
     * @dataProvider valuesDataProvider
     * @param array $values
     * @param array $expected
     *
     * @return void
     */
    public function test_share(array $values, array $expected): void
    {
        $sharing_values = new SharingValues;

        $sharing_values->setValues($values);

        $result = $sharing_values->share();

        $this->assertEqualsCanonicalizing($expected, $result);
    }

    public static function valuesDataProvider(): array
    {
        return 
        [
            'testcase-2-numbers-1'  => [[2, 100], [27, 75]],
            'testcase-3-numbers-1'  => [[4, 1, 4], [3, 3, 3]],
            'testcase-3-numbers-2'  => [[16, 10, 8], [12, 7.5, 14.5]],
            'testcase-10-numbers-1' => [[16, 10, 8, 5, 100, 20, 30, 15, 22, 80], [12, 7.5, 6, 80.25, 75, 15, 22.5, 11.25, 16.5, 60]],
        ];
    }

    public static function invalidValuesDataProvider(): array
    {
        return 
        [
            'array-negative-values-1'   => [[12,15,20,-1,10]],
            'array-negative-values-2'   => [[12,15,20,-1,10,-5,-8]],
            'array-zero-values-1'       => [[12,0]],
            'array-zero-values-2'       => [[12,20,14,15,18,22,90,10,0]],
        ];
    }
}
