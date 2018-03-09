<?php
namespace infobip\api\model\omni\send;

/**
 * This is a generated class and is not intended for modification!
 */
class LineDataType
{
    const TEXT = "TEXT";
    const IMAGE = "IMAGE";
    const VIDEO = "VIDEO";
    const AUDIO = "AUDIO";
    const STICKER = "STICKER";

    public static function values() {
        return [
            LineDataType::TEXT,
            LineDataType::IMAGE,
            LineDataType::VIDEO,
            LineDataType::AUDIO,
            LineDataType::STICKER
        ];
    }

    private function __construct() {}
}