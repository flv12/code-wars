<?php

namespace Codewars\SumStringsAsNumbersKata;

class SumStringsAsNumbers
{
    public static function sumStrings(string $a, string $b, bool $forceStringCalculus = false): string
    {
        if (is_int($sum = $a + $b) && !$forceStringCalculus) {
            return $a + $b;
        }

        throw new \LogicException('Not implemented');
    }
}

function sum_strings(string $a, string $b): string
{
    return SumStringsAsNumbers::sumStrings($a, $b);
}
