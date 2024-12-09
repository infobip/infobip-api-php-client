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

final class WhatsAppOrderStatus implements EnumInterface
{
    public const PENDING = 'PENDING';
    public const PROCESSING = 'PROCESSING';
    public const PARTIALLY_SHIPPED = 'PARTIALLY_SHIPPED';
    public const SHIPPED = 'SHIPPED';
    public const COMPLETED = 'COMPLETED';
    public const CANCELED = 'CANCELED';

    public const ALLOWED_VALUES = [
        'PENDING',
        'PROCESSING',
        'PARTIALLY_SHIPPED',
        'SHIPPED',
        'COMPLETED',
        'CANCELED',
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

    public static function PENDING(): WhatsAppOrderStatus
    {
        return new self('PENDING');
    }

    public static function PROCESSING(): WhatsAppOrderStatus
    {
        return new self('PROCESSING');
    }

    public static function PARTIALLY_SHIPPED(): WhatsAppOrderStatus
    {
        return new self('PARTIALLY_SHIPPED');
    }

    public static function SHIPPED(): WhatsAppOrderStatus
    {
        return new self('SHIPPED');
    }

    public static function COMPLETED(): WhatsAppOrderStatus
    {
        return new self('COMPLETED');
    }

    public static function CANCELED(): WhatsAppOrderStatus
    {
        return new self('CANCELED');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
