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

final class WhatsAppPaymentStatus implements EnumInterface
{
    public const _NEW = 'NEW';
    public const PENDING = 'PENDING';
    public const CAPTURED = 'CAPTURED';
    public const CANCELED = 'CANCELED';
    public const FAILED = 'FAILED';
    public const UNKNOWN = 'UNKNOWN';

    public const ALLOWED_VALUES = [
        'NEW',
        'PENDING',
        'CAPTURED',
        'CANCELED',
        'FAILED',
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

    public static function _NEW(): WhatsAppPaymentStatus
    {
        return new self('NEW');
    }

    public static function PENDING(): WhatsAppPaymentStatus
    {
        return new self('PENDING');
    }

    public static function CAPTURED(): WhatsAppPaymentStatus
    {
        return new self('CAPTURED');
    }

    public static function CANCELED(): WhatsAppPaymentStatus
    {
        return new self('CANCELED');
    }

    public static function FAILED(): WhatsAppPaymentStatus
    {
        return new self('FAILED');
    }

    public static function UNKNOWN(): WhatsAppPaymentStatus
    {
        return new self('UNKNOWN');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
