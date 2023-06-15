<?php

namespace tests;

use src\Fibonacci;
use PHPUnit\Framework\TestCase;

final class FibonacciTest extends TestCase
{
    public function test_set_number_to_check(): void
    {
        $fibo = new Fibonacci;

        $fibo->setNumberToCheck(0);
        
        $this->assertEquals(0, $fibo->getNumberToCheck());
    }

    public function test_get_number_to_check(): void
    {
        $fibo = new Fibonacci;

        $fibo->setNumberToCheck(1);
        
        $this->assertNotEquals(0, $fibo->getNumberToCheck());
    }

    /**
     * Test if a number is a fibo number
     *
     * @dataProvider numbersDataProvider
     * @param integer $number
     * @param boolean $expected
     * 
     * @return void
     */
    public function test_is_fibo(int $number, bool $expected): void
    {
        $fibo = new Fibonacci;

        $fibo->setNumberToCheck($number);

        $result = $fibo->isFibo();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test the method that returns next fibo number
     *
     * @dataProvider fiboNumbersDataProvider
     * @param array $sequence
     * @param integer $expected
     *
     * @return void
     */
    public function test_next_fibo_number(array $sequence, int $expected): void
    {
        $fibo = new Fibonacci;

        $result = $fibo->getNextFiboNumber($sequence);

        $this->assertEquals($expected, $result);
    }

    public static function numbersDataProvider(): array
    {
        return [
            'fibo-0'    => [0, true],
            'fibo-1'    => [1, true],
            'fibo-2'    => [2, true],
            'fibo-3'    => [3, true],
            'fibo-5'    => [5, true],
            'fibo-8'    => [8, true],
            'fibo-13'   => [13, true],
            'fibo-50'   => [50, false],
            'fibo-233'  => [233, true],
            'fibo-500'  => [500, false],
            'fibo-1596' => [1596, false],
            'fibo-2584' => [2584, true],
        ];
    }

    public static function fiboNumbersDataProvider(): array
    {
        return [
            'fibo-0'  => [[], 0],
            'fibo-1'  => [['f0'  => ['number' => 0]], 1],
            'fibo-2'  => [['f0'  => ['number' => 0], 'f1'  => ['number' => 1]], 1],
            'fibo-3'  => [['f1'  => ['number' => 1], 'f2'  => ['number' => 1]], 2],
            'fibo-4'  => [['f2'  => ['number' => 1], 'f3'  => ['number' => 2]], 3],
            'fibo-5'  => [['f3'  => ['number' => 2], 'f4'  => ['number' => 3]], 5],
            'fibo-12' => [['f10' => ['number' => 55],'f11' => ['number' => 89]], 144],
        ];
    }
}