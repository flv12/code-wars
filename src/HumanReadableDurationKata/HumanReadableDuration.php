<?php

namespace Codewars\HumanReadableDurationKata;

class HumanReadableDuration
{
    public static function formatSeconds(int $seconds): string
    {
        if ($seconds < 0) {
            throw new \LogicException("Value must be greater than 0");
        }

        if ($seconds === 0) {
            return "now";
        }

        $units = [
            'year' => [
                'value' => 31536000,
                'singular' => 'year',
                'plural' => 'years'
            ],
            'day' => [
                'value' => 86400,
                'singular' => 'day',
                'plural' => 'days'
            ],
            'hour' => [
                'value' => 3600,
                'singular' => 'hour',
                'plural' => 'hours'
            ],
            'minute' => [
                'value' => 60,
                'singular' => 'minute',
                'plural' => 'minutes'
            ],
            'second' => [
                'value' => 1,
                'singular' => 'second',
                'plural' => 'seconds'
            ],
        ];

        $result = [];
        foreach ($units as $unit => $data) {
            $value = intdiv($seconds, $data['value']);
            if ($value > 0) {
                $result[] = sprintf("%s %s",$value, self::plurarize($value, $data['singular'], $data['plural']));
                $seconds -= $value * $data['value'];
            }
        }

        $last = array_pop($result);
        return empty($result) ? $last : implode(', ', $result) . " and $last";
    }

    private static function plurarize(int $value, string $singular, string $plural): string
    {
        if ($value <= 0) {
            throw new \LogicException("Value must be greater than 0");
        }

        return $value === 1 ? $singular : $plural;
    }
}

function format_duration(int $seconds): string
{
    return HumanReadableDuration::formatSeconds($seconds);
}
