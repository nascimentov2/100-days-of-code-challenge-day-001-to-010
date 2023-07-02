<?php

namespace tests;

use src\StringFlips;
use PHPUnit\Framework\TestCase;

final class StringFlipsTest extends TestCase
{
    public function test_set_string(): void
    {
        $stringFlips = new StringFlips;

        $stringFlips->setString('abc');

        $this->assertEquals('abc', $stringFlips->getString());
    }

    public function test_get_string(): void
    {
        $stringFlips = new StringFlips;

        $stringFlips->setString('abc');

        $this->assertNotEquals('', $stringFlips->getString());
    }

    public function test_set_flip_method(): void
    {
        $stringFlips = new StringFlips;

        $stringFlips->setFlipMethod('word');

        $this->assertEquals('word', $stringFlips->getFlipMethod());
    }

    public function test_get_flip_method(): void
    {
        $stringFlips = new StringFlips;

        $stringFlips->setFlipMethod('word');

        $this->assertNotEquals('', $stringFlips->getFlipMethod());
    }

    public function test_set_string_not_accepts_empty_strings(): void
    {
        $this->expectException(\LengthException::class);

        $stringFlips = new StringFlips;

        $stringFlips->setString('');
    }

    public function test_set_flip_method_only_accepts_valid_arguments(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $stringFlips = new StringFlips;
        
        $stringFlips->setFlipMethod('not-exists-flip-method');
    }

    /**
     * Undocumented function
     *
     * @dataProvider stringsDataProvider
     * @param string $string
     * @param string $flip_method
     * @param string $expected
     *
     * @return void
     */
    public function test_flip(string $string, string $flip_method, string $expected): void
    {
        $stringFlips = new StringFlips;

        $stringFlips->setString($string)->setFlipMethod($flip_method);

        $this->assertEquals($expected, $stringFlips->flip());
    }

    public function test_flip_method_not_runs_without_set_string_and_set_method_called_first(): void
    {
        $this->expectException(\LengthException::class);

        $stringFlips = new StringFlips;

        $stringFlips->flip();
    }

    public static function stringsDataProvider(): array
    {
        $sentence = "There's never enough time to do all the nothing you want";

        return [
            'one-word-using-word-method'     => ["Hello", "word", "olleH"],
            'one-word-using-sentence-method' => ["Hello", "sentence", "Hello"],
            'sentence-using-word-method'     => [$sentence, "word", "s'erehT reven hguone emit ot od lla eht gnihton uoy tnaw"],
            'sentence-using-sentence-method' => [$sentence, "sentence", "want you nothing the all do to time enough never There's"],
        ];
    }
}