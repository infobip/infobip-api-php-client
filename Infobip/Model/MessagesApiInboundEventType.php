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

final class MessagesApiInboundEventType implements EnumInterface
{
    public const MO = 'MO';
    public const TYPING_STARTED = 'TYPING_STARTED';
    public const TYPING_STOPPED = 'TYPING_STOPPED';

    public const ALLOWED_VALUES = [
        'MO',
        'TYPING_STARTED',
        'TYPING_STOPPED',
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

    public static function MO(): MessagesApiInboundEventType
    {
        return new self('MO');
    }

    public static function TYPING_STARTED(): MessagesApiInboundEventType
    {
        return new self('TYPING_STARTED');
    }

    public static function TYPING_STOPPED(): MessagesApiInboundEventType
    {
        return new self('TYPING_STOPPED');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
