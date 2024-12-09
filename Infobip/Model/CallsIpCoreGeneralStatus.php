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

final class CallsIpCoreGeneralStatus implements EnumInterface
{
    public const ACCEPTED = 'ACCEPTED';
    public const PENDING = 'PENDING';
    public const UNDELIVERABLE = 'UNDELIVERABLE';
    public const DELIVERED = 'DELIVERED';
    public const EXPIRED = 'EXPIRED';
    public const REJECTED = 'REJECTED';

    public const ALLOWED_VALUES = [
        'ACCEPTED',
        'PENDING',
        'UNDELIVERABLE',
        'DELIVERED',
        'EXPIRED',
        'REJECTED',
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

    public static function ACCEPTED(): CallsIpCoreGeneralStatus
    {
        return new self('ACCEPTED');
    }

    public static function PENDING(): CallsIpCoreGeneralStatus
    {
        return new self('PENDING');
    }

    public static function UNDELIVERABLE(): CallsIpCoreGeneralStatus
    {
        return new self('UNDELIVERABLE');
    }

    public static function DELIVERED(): CallsIpCoreGeneralStatus
    {
        return new self('DELIVERED');
    }

    public static function EXPIRED(): CallsIpCoreGeneralStatus
    {
        return new self('EXPIRED');
    }

    public static function REJECTED(): CallsIpCoreGeneralStatus
    {
        return new self('REJECTED');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
