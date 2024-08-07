<?php

namespace Tests\LotteryTicketTests;

use Codewars\LotteryTicketKata\LotteryTicket;
use PHPUnit\Framework\TestCase;

class LotteryTicketTest extends TestCase
{
    public function testBasic(): void
    {
        $this->assertSame("Loser!", LotteryTicket::bingo([['ABC', 65], ['HGR', 74], ['BYHT', 74]], 2));
        $this->assertSame("Winner!", LotteryTicket::bingo([['ABC', 65], ['HGR', 74], ['BYHT', 74]], 1));
        $this->assertSame("Loser!", LotteryTicket::bingo([['HGTYRE', 74], ['BE', 66], ['JKTY', 74]], 3));
    }
}
