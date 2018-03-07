<?php
namespace infobip\api\model\omni\send;

/**
 * This is a generated class and is not intended for modification!
 */
class FacebookDataType
{
    const TEXT = "TEXT";
    const IMAGE = "IMAGE";
    const AUDIO = "AUDIO";
    const VIDEO = "VIDEO";
    const FILE = "FILE";

    public static function values() {
        return [
            FacebookDataType::TEXT,
            FacebookDataType::IMAGE,
            FacebookDataType::AUDIO,
            FacebookDataType::VIDEO,
            FacebookDataType::FILE
        ];
    }

    private function __construct() {}
}