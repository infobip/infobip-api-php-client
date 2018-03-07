<?php
namespace infobip\api\model\sms\mt\send;

/**
 * This is a generated class and is not intended for modification!
 */
class DeliveryDay
{
    const MONDAY = "MONDAY";
    const TUESDAY = "TUESDAY";
    const WEDNESDAY = "WEDNESDAY";
    const THURSDAY = "THURSDAY";
    const FRIDAY = "FRIDAY";
    const SATURDAY = "SATURDAY";
    const SUNDAY = "SUNDAY";

    public static function values() {
        return [
            DeliveryDay::MONDAY,
            DeliveryDay::TUESDAY,
            DeliveryDay::WEDNESDAY,
            DeliveryDay::THURSDAY,
            DeliveryDay::FRIDAY,
            DeliveryDay::SATURDAY,
            DeliveryDay::SUNDAY
        ];
    }

    private function __construct() {}
}