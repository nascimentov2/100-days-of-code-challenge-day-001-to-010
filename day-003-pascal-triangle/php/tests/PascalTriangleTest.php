<?php

namespace tests;

use src\PascalTriangle;
use PHPUnit\Framework\TestCase;

final class PascalTriangleTest extends TestCase
{
    public function test_set_levels(): void
    {
        $triangle = new PascalTriangle;

        $triangle->setTriangleLevels(5);

        $this->assertEquals(5, $triangle->getTriangleLevels());
    }

    public function test_get_levels(): void
    {
        $triangle = new PascalTriangle;

        $triangle->setTriangleLevels(5);

        $this->assertNotEquals(3, $triangle->getTriangleLevels());
    }

    /**
     * Test make triangle using most common level sizes
     *
     * @dataProvider trianglesDataProvider
     * @param integer $levels
     * @param integer $expected
     * 
     * @return void
     */
    public function test_make_triangle(int $levels, array $expected): void
    {
        $triangle = new PascalTriangle;

        $triangle->setTriangleLevels($levels);

        $result = $triangle->make();

        $this->assertEqualsCanonicalizing($expected, $result);
    }

    public static function trianglesDataProvider(): array
    {
        return 
        [
            '3-level-triangle' => [3, [1 => [1], 2 => [1,1], 3 => [1,2,1]]],
            '5-level-triangle' => [5, [1 => [1], 2 => [1,1], 3 => [1,2,1], 4 => [1,3,3,1], 5 => [1,4,6,4,1]]],
            
            '9-level-triangle' => [9, 
                                    [
                                    1 => [1], 
                                    2 => [1,1], 
                                    3 => [1,2,1], 
                                    4 => [1,3,3,1], 
                                    5 => [1,4,6,4,1], 
                                    6 => [1,5,10,10,5,1],
                                    7 => [1,6,15,20,15,6,1],
                                    8 => [1,7,21,35,35,21,7,1],
                                    9 => [1,8,28,56,70,56,28,8,1],
                                    ]
                                ],
        ];
    }
}