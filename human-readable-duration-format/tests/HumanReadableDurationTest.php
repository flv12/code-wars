<?php

namespace tests;

use HumanReadableDurationFormat\HumanReadableDuration;
use PHPUnit\Framework\TestCase;

class HumanReadableDurationTest extends TestCase
{
    public function testWithNegativeSeconds()
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage("Value must be greater than 0");
        HumanReadableDuration::formatSeconds(-1);
    }

    public function testWithZeroSeconds()
    {
        $this->assertEquals("now", HumanReadableDuration::formatSeconds(0));
    }

    public function testsWithSecondsOnly()
    {
        $this->assertEquals("1 second", HumanReadableDuration::formatSeconds(1));
    }

    public function testsWithMinutesOnly()
    {
        $this->assertEquals("1 minute", HumanReadableDuration::formatSeconds(60));
    }

    public function testsWithHoursOnly()
    {
        $this->assertEquals("1 hour", HumanReadableDuration::formatSeconds(3600));
    }

    public function testsWithDaysOnly()
    {
        $this->assertEquals("1 day", HumanReadableDuration::formatSeconds(86400));
    }

    public function testsWithYearsOnly()
    {
        $this->assertEquals("1 year", HumanReadableDuration::formatSeconds(31536000));
    }

    public function testsWithSecondsAndMinutes()
    {
        $this->assertEquals("1 minute and 1 second", HumanReadableDuration::formatSeconds(61));
    }

    public function testWithMultipleUnits()
    {
        $this->assertEquals("1 hour, 1 minute and 1 second", HumanReadableDuration::formatSeconds(3661));
    }

    public function testWithAllUnits()
    {
        $this->assertEquals("1 year, 1 day, 1 hour, 1 minute and 1 second", HumanReadableDuration::formatSeconds(31536000 + 86400 + 3600 + 60 + 1));
    }

    public function testWithMultipleDays()
    {
        $this->assertEquals("2 days", HumanReadableDuration::formatSeconds(2 * 86400));
    }

    public function testWithMultipleYears()
    {
        $this->assertEquals("2 years", HumanReadableDuration::formatSeconds(2 * 31536000));
    }

    public function testWithMinutesAndSeconds()
    {
        $this->assertEquals("2 minutes and 30 seconds", HumanReadableDuration::formatSeconds(150));
    }

    public function testWithHoursAndMinutes()
    {
        $this->assertEquals("2 hours and 15 minutes", HumanReadableDuration::formatSeconds(8100));
    }

    public function testWithDaysHoursMinutesSeconds()
    {
        $this->assertEquals("1 day, 2 hours, 30 minutes and 45 seconds", HumanReadableDuration::formatSeconds(1 * 86400 + 2 * 3600 + 30 * 60 + 45));
    }

    public function testAlmostTwoYears()
    {
        $this->assertEquals("1 year, 364 days, 23 hours, 59 minutes and 59 seconds", HumanReadableDuration::formatSeconds((31536000 * 2) - 1));
    }

    public function testPluralize()
    {
        $reflection = new \ReflectionClass(HumanReadableDuration::class);
        $reflectionMethod = $reflection->getMethod('plurarize');
        $reflectionMethod->setAccessible(true);

        $this->assertEquals("seconds", $reflectionMethod->invokeArgs(new HumanReadableDuration(), [2, "second", "seconds"]));
        $this->assertEquals("hour", $reflectionMethod->invokeArgs(new HumanReadableDuration(), [1, "hour", "hours"]));

        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage("Value must be greater than 0");
        $reflectionMethod->invokeArgs(new HumanReadableDuration(), [0, "hour", "hours"]);
    }
}
