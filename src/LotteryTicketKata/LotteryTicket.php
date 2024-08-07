<?php

namespace Codewars\LotteryTicketKata;

class LotteryTicket
{
    public static function bingo(array $ticket, int $requiredMiniWinsToWin): string
    {
        $ticketMiniWins = 0;

        foreach ($ticket as $subTicket) {
            $subTicketCharacters = str_split($subTicket[0]);
            $subTicketNumber = $subTicket[1];

            foreach ($subTicketCharacters as $char) {
                if (ord($char) === $subTicketNumber) {
                    $ticketMiniWins++;
                    continue 2;
                }
            }
        }

        return $ticketMiniWins >= $requiredMiniWinsToWin ? 'Winner!' : 'Loser!';
    }
}

function bingo(array $ticket, int $win): string
{
    return LotteryTicket::bingo($ticket, $win);
}
