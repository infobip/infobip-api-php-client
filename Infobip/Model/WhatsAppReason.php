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

final class WhatsAppReason implements EnumInterface
{
    public const ABUSIVE_CONTENT = 'ABUSIVE_CONTENT';
    public const INCORRECT_CATEGORY = 'INCORRECT_CATEGORY';
    public const INVALID_FORMAT = 'INVALID_FORMAT';
    public const NONE = 'NONE';
    public const SCAM = 'SCAM';
    public const UNKNOWN = 'UNKNOWN';

    public const ALLOWED_VALUES = [
        'ABUSIVE_CONTENT',
        'INCORRECT_CATEGORY',
        'INVALID_FORMAT',
        'NONE',
        'SCAM',
        'UNKNOWN',
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

    public static function ABUSIVE_CONTENT(): WhatsAppReason
    {
        return new self('ABUSIVE_CONTENT');
    }

    public static function INCORRECT_CATEGORY(): WhatsAppReason
    {
        return new self('INCORRECT_CATEGORY');
    }

    public static function INVALID_FORMAT(): WhatsAppReason
    {
        return new self('INVALID_FORMAT');
    }

    public static function NONE(): WhatsAppReason
    {
        return new self('NONE');
    }

    public static function SCAM(): WhatsAppReason
    {
        return new self('SCAM');
    }

    public static function UNKNOWN(): WhatsAppReason
    {
        return new self('UNKNOWN');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
