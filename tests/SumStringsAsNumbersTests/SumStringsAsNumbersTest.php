<?php

namespace Tests\SumStringsAsNumbersTests;

use Codewars\SumStringsAsNumbersKata\SumStringsAsNumbers;
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

    public function testMaximumInteger32bits()
    {
        $this->assertSame('2147483647', SumStringsAsNumbers::sumStrings('2147483646', '1'));
    }

    public function testMaximumInteger64bits()
    {
        $this->assertSame('9223372036854775807', SumStringsAsNumbers::sumStrings('9223372036854775806', '1'));
    }

    public function testOverMaximumNumber()
    {
        $this->assertSame('9223372036854775808', SumStringsAsNumbers::sumStrings('9223372036854775807', '1'));
    }

    public function testForceStringCalculus()
    {
        $this->assertSame('38', SumStringsAsNumbers::sumStrings('19', '19', false));
        $this->assertSame('38', SumStringsAsNumbers::sumStrings('19', '19', true));
    }

    public function testWithZeroPrefix()
    {
        $this->assertSame('1000', SumStringsAsNumbers::sumStrings('0000999', '1'));
    }
}
