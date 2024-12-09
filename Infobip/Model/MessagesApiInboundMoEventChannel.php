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

final class MessagesApiInboundMoEventChannel implements EnumInterface
{
    public const SMS = 'SMS';
    public const MMS = 'MMS';
    public const WHATSAPP = 'WHATSAPP';
    public const VIBER_BM = 'VIBER_BM';
    public const VIBER_BOT = 'VIBER_BOT';
    public const RCS = 'RCS';
    public const APPLE_MB = 'APPLE_MB';
    public const INSTAGRAM_DM = 'INSTAGRAM_DM';
    public const MESSENGER = 'MESSENGER';

    public const ALLOWED_VALUES = [
        'SMS',
        'MMS',
        'WHATSAPP',
        'VIBER_BM',
        'VIBER_BOT',
        'RCS',
        'APPLE_MB',
        'INSTAGRAM_DM',
        'MESSENGER',
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

    public static function SMS(): MessagesApiInboundMoEventChannel
    {
        return new self('SMS');
    }

    public static function MMS(): MessagesApiInboundMoEventChannel
    {
        return new self('MMS');
    }

    public static function WHATSAPP(): MessagesApiInboundMoEventChannel
    {
        return new self('WHATSAPP');
    }

    public static function VIBER_BM(): MessagesApiInboundMoEventChannel
    {
        return new self('VIBER_BM');
    }

    public static function VIBER_BOT(): MessagesApiInboundMoEventChannel
    {
        return new self('VIBER_BOT');
    }

    public static function RCS(): MessagesApiInboundMoEventChannel
    {
        return new self('RCS');
    }

    public static function APPLE_MB(): MessagesApiInboundMoEventChannel
    {
        return new self('APPLE_MB');
    }

    public static function INSTAGRAM_DM(): MessagesApiInboundMoEventChannel
    {
        return new self('INSTAGRAM_DM');
    }

    public static function MESSENGER(): MessagesApiInboundMoEventChannel
    {
        return new self('MESSENGER');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
