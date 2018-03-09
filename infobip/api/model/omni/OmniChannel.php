<?php
namespace infobip\api\model\omni;

/**
 * This is a generated class and is not intended for modification!
 */
class OmniChannel
{
    const SMS = "SMS";
    const EMAIL = "EMAIL";
    const VOICE = "VOICE";
    const PARSECO = "PARSECO";
    const PUSH = "PUSH";
    const VIBER = "VIBER";
    const FACEBOOK = "FACEBOOK";
    const LINE = "LINE";
    const VKONTAKTE = "VKONTAKTE";

    public static function values() {
        return [
            OmniChannel::SMS,
            OmniChannel::EMAIL,
            OmniChannel::VOICE,
            OmniChannel::PARSECO,
            OmniChannel::PUSH,
            OmniChannel::VIBER,
            OmniChannel::FACEBOOK,
            OmniChannel::LINE,
            OmniChannel::VKONTAKTE
        ];
    }

    private function __construct() {}
}