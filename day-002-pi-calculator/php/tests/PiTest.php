<?php

namespace tests;

use src\Pi;
use PHPUnit\Framework\TestCase;

final class PiTest extends TestCase
{
    /**
     * Test the PI calculation
     *
     * @dataProvider piDataProvider
     * @param integer $digits
     * @param float $expected
     * 
     * @return void
     */
    public function test_get_pi(int $digits, float $expected): void
    {
        $result = Pi::getPi($digits);

        $this->assertEquals($expected, $result);
    }

    public static function piDataProvider(): array
    {
        return [
            'pi-2-digits' => [2, 3.14],
        ];
    }
}