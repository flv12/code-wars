<?php

namespace Codewars\CountIPAddressesKata;

class CountIPAddresses
{
    public static function ipsBetween(string $start, string $end): int
    {
        return ip2long($end) - ip2long($start);
    }
}

function ips_between($start, $end)
{
    return CountIPAddresses::ipsBetween($start, $end);
}
