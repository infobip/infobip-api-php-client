<?php

declare(strict_types=1);

/**
 * Infobip Client API Libraries OpenAPI Specification
 *
 * OpenAPI specification containing public endpoints supported in client API libraries.
 *
 * Contact: support@infobip.com
 *
 * This class is auto generated from the Infobip OpenAPI specification through the OpenAPI Specification Client API libraries (Re)Generator (OSCAR), powered by the OpenAPI Generator (https://openapi-generator.tech).
 *
 * Do not edit manually. To learn how to raise an issue, see the CONTRIBUTING guide or contact us @ support@infobip.com.
 */

namespace Infobip\Model;

use InvalidArgumentException;

final class WebRtcDestinationType implements EnumInterface
{
    public const WEBRTC = 'WEBRTC';
    public const CONVERSATIONS = 'CONVERSATIONS';
    public const ROOM = 'ROOM';
    public const PHONE = 'PHONE';
    public const VIBER = 'VIBER';
    public const APPLICATION = 'APPLICATION';

    public const ALLOWED_VALUES = [
        'WEBRTC',
        'CONVERSATIONS',
        'ROOM',
        'PHONE',
        'VIBER',
        'APPLICATION',
    ];

    private string $value;

    public function __construct(string $value)
    {
        if (!\in_array($value, self::ALLOWED_VALUES)) {
            throw new InvalidArgumentException(
                sprintf(
                    'Invalid value: %s, allowed values: %s',
                    $value,
                    implode(', ', self::ALLOWED_VALUES)
                )
            );
        }

        $this->value = $value;
    }

    public static function WEBRTC(): WebRtcDestinationType
    {
        return new self('WEBRTC');
    }

    public static function CONVERSATIONS(): WebRtcDestinationType
    {
        return new self('CONVERSATIONS');
    }

    public static function ROOM(): WebRtcDestinationType
    {
        return new self('ROOM');
    }

    public static function PHONE(): WebRtcDestinationType
    {
        return new self('PHONE');
    }

    public static function VIBER(): WebRtcDestinationType
    {
        return new self('VIBER');
    }

    public static function APPLICATION(): WebRtcDestinationType
    {
        return new self('APPLICATION');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
