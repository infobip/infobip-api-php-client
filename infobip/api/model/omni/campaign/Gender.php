<?php
namespace infobip\api\model\omni\campaign;

/**
 * This is a generated class and is not intended for modification!
 */
class Gender
{
    const FEMALE = "FEMALE";
    const MALE = "MALE";

    public static function values() {
        return [
            Gender::FEMALE,
            Gender::MALE
        ];
    }

    private function __construct() {}
}