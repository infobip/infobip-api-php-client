<?php
namespace infobip\api\model\sms\mt\bulks\status;

/**
 * This is a generated class and is not intended for modification!
 */
class BulkStatus
{
    const PENDING = "PENDING";
    const PAUSED = "PAUSED";
    const PROCESSING = "PROCESSING";
    const CANCELED = "CANCELED";
    const FINISHED = "FINISHED";
    const FAILED = "FAILED";

    public static function values() {
        return [
            BulkStatus::PENDING,
            BulkStatus::PAUSED,
            BulkStatus::PROCESSING,
            BulkStatus::CANCELED,
            BulkStatus::FINISHED,
            BulkStatus::FAILED
        ];
    }

    private function __construct() {}
}