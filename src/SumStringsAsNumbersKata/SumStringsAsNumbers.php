<?php

namespace Codewars\SumStringsAsNumbersKata;

class SumStringsAsNumbers
{
    public static function sumStrings(string $a, string $b, bool $forceStringCalculus = true): string
    {
        if (!$forceStringCalculus) {
            return $a + $b;
        }

        $results = [];
        $index = $carry = 0;
        $safeLoopLimiter = 100000;
        while (strlen($a) > 0 || strlen($b) > 0) {
            if ($safeLoopLimiter-- <= 0) {
                throw new \RuntimeException('Possible infinite loop detected');
            }

            $sum = $carry + (int)(substr($a, -1) ?? 0) + (int)(substr($b, -1) ?? 0);
            $a = substr($a, 0, -1);
            $b = substr($b, 0, -1);
            $results[] = $sum % 10;
            $carry = (int)($sum / 10);
            $index++;
        }

        if ($carry) {
            $results[] = $carry;
        }

        $sumAsString =  implode('', array_reverse($results));

        return ltrim($sumAsString, '0');
    }
}

function sum_strings(string $a, string $b): string
{
    return SumStringsAsNumbers::sumStrings($a, $b);
}
