<?php

namespace infobip\api\model;

class TimeUnit
{
    const NANOSECONDS = "NANOSECONDS";
    const MICROSECONDS = "MICROSECONDS";
    const MILLISECONDS = "MILLISECONDS";
    const SECONDS = "SECONDS";
    const MINUTES = "MINUTES";
    const HOURS = "HOURS";
    const DAYS = "DAYS";

    public static function values() {
        return [
            TimeUnit::NANOSECONDS,
            TimeUnit::MICROSECONDS,
            TimeUnit::MILLISECONDS,
            TimeUnit::SECONDS,
            TimeUnit::MINUTES,
            TimeUnit::HOURS,
            TimeUnit::DAYS
        ];
    }

    private function __construct() {}
}