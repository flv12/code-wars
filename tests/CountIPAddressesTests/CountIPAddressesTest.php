<?php

namespace Tests\CountIPAddressesTests;

use Codewars\CountIPAddressesKata\CountIPAddresses;
use PHPUnit\Framework\TestCase;

class CountIPAddressesTest extends TestCase
{
    public function testSimple()
    {
        $this->assertSame(50, CountIPAddresses::ipsBetween("10.0.0.0", "10.0.0.50"));
        $this->assertSame(256, CountIPAddresses::ipsBetween("10.0.0.0", "10.0.1.0"));
        $this->assertSame(246, CountIPAddresses::ipsBetween("20.0.0.10", "20.0.1.0"));
    }
}
