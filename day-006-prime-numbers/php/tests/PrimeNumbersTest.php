<?php

namespace tests;

use src\PrimeNumbers;
use PHPUnit\Framework\TestCase;

final class PrimeNumbersTest extends TestCase
{
    public function test_set_number(): void
    {
        $prime = new PrimeNumbers;

        $prime->setNumber(1);

        $this->assertEquals(1, $prime->getNumber());
    }

    public function test_get_number(): void
    {
        $prime = new PrimeNumbers;

        $prime->setNumber(1);

        $this->assertNotEquals(0, $prime->getNumber());
    }

    /**
     * Test if a number is prime
     *
     * @dataProvider numbersDataProvider
     * @param integer $number
     * @param boolean $expected
     * 
     * @return void
     */
    public function test_is_prime(int $number, bool $expected): void
    {
        $prime = new PrimeNumbers;

        $prime->setNumber($number);

        $result = $prime->isPrime();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test some of the prime numbers
     *
     * @dataProvider primeNumbersDataProvider
     * @param integer $max
     * @param array $numbers
     * 
     * @return void
     */
    public function test_get_prime_numbers(int $max, array $expected): void
    {
        $prime = new PrimeNumbers;

        $result = $prime->getPrimeNumbers($max);

        $this->assertEqualsCanonicalizing($expected, $result);
    }

    public static function numbersDataProvider(): array
    {
        return 
        [
            '0'  => [0, false],
            '1'  => [1, false],
            '2'  => [2, true],
            '3'  => [3, true],
            '4'  => [4, false],
            '5'  => [5, true],
            '6'  => [6, false],
            '7'  => [7, true],
            '8'  => [8, false],
            '9'  => [9, false],
            '10' => [10, false],
            '11' => [11, true],
            '12' => [12, false],
            '20' => [20, false],
            '30' => [30, false],
            '42' => [42, false],
            '37' => [37, true],
            '67' => [67, true],
            '88' => [88, false],
            '90' => [90, false],
            '97' => [97, true],
        ];
    }

    public static function primeNumbersDataProvider(): array
    {
        return 
        [
            'first-5-prime_numbers'  => [12, [2,3,5,7,11]],
            'first-10-prime_numbers' => [30, [2,3,5,7,11,13,17,19,23,29]],
            'first-20-prime_numbers' => [98, [2,3,5,7,11,13,17,19,23,29,31,37,41,43,47,53,59,61,67,71,73,79,83,89,97]],
        ];
    }
}