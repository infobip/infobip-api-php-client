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

final class MessagesApiInboundSeenChannel implements EnumInterface
{
    public const WHATSAPP = 'WHATSAPP';
    public const VIBER_BM = 'VIBER_BM';
    public const VIBER_BOT = 'VIBER_BOT';
    public const RCS = 'RCS';

    public const ALLOWED_VALUES = [
        'WHATSAPP',
        'VIBER_BM',
        'VIBER_BOT',
        'RCS',
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

    public static function WHATSAPP(): MessagesApiInboundSeenChannel
    {
        return new self('WHATSAPP');
    }

    public static function VIBER_BM(): MessagesApiInboundSeenChannel
    {
        return new self('VIBER_BM');
    }

    public static function VIBER_BOT(): MessagesApiInboundSeenChannel
    {
        return new self('VIBER_BOT');
    }

    public static function RCS(): MessagesApiInboundSeenChannel
    {
        return new self('RCS');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
