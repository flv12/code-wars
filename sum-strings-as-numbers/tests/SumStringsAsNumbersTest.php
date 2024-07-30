<?php

use PHPUnit\Framework\TestCase;

class SumStringsAsNumbersTest extends TestCase
{
    public function testSimple()
    {
        $this->assertSame('3', SumStringsAsNumbers::sumStrings('1', '2'));
    }

    public function testThreeDigits()
    {
        $this->assertSame('579', SumStringsAsNumbers::sumStrings('123', '456'));
    }

    public function testFourDigits()
    {
        $this->assertSame('1000', SumStringsAsNumbers::sumStrings('999', '1'));
    }

    public function testLongNumbers()
    {
        $this->assertSame(
            '2222222222222222222222222222222',
            SumStringsAsNumbers::sumStrings('1111111111111111111111111111111', '1111111111111111111111111111111')
        );
    }
}
