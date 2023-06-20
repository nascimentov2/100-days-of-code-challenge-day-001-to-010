<?php

namespace tests;

use src\CountChars;
use PHPUnit\Framework\TestCase;

final class CountCharsTest extends TestCase
{
    public function test_set_value(): void
    {
        $count = new CountChars;

        $count->setValue('abc123');

        $this->assertEquals('abc123', $count->getValue());
    }

    public function test_get_value(): void
    {
        $count = new CountChars;

        $count->setValue('abc123');

        $this->assertNotEquals('abc1234', $count->getValue());
    }

    /**
     * Test the count of letters and digits
     *
     * @dataProvider valuesDataProvider
     * @param mixed $value
     * @param array $expected
     * 
     * @return void
     */
    public function test_count_letters_and_digits(mixed $value, array $expected): void
    {
        $count = new CountChars;

        $count->setValue($value);

        $result = $count->countLettersAndDigits();

        $this->assertEqualsCanonicalizing($expected, $result);
    }

    public static function valuesDataProvider(): array
    {
        return 
        [
            //basic cases
            'abc'        => ['abc', ['letters' => 3, 'digits' => 0]],
            '123-string' => ['123', ['letters' => 0, 'digits' => 3]],
            'abc123'     => ['abc123', ['letters' => 3, 'digits' => 3]],
            '123-int'    => [123, ['letters' => 0, 'digits' => 3]],

            //validating
            'empty'      => [' ', ['letters' => 0, 'digits' => 0]],
            'misc-chars' => ['==./;', ['letters' => 0, 'digits' => 0]],

            //complex cases
            'string-with-spaces' => ['hello from mars h4man ', ['letters' => 17, 'digits' => 1]],
            'number-with-spaces' => ['0 123 456 789 1 1', ['letters' => 0, 'digits' => 12]],

            //more complex cases
            'mixed-with-spaces' => ['hell0 from m4rs h4m@n !! ', ['letters' => 14, 'digits' => 3]],
        ];
    }
}