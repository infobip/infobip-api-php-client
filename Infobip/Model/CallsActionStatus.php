<?php

// phpcs:ignorefile

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

final class CallsActionStatus implements EnumInterface
{
    public const PENDING = 'PENDING';
    public const IN_PROGRESS = 'IN_PROGRESS';
    public const COMPLETED = 'COMPLETED';
    public const FAILED = 'FAILED';

    public const ALLOWED_VALUES = [
        'PENDING',
        'IN_PROGRESS',
        'COMPLETED',
        'FAILED',
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

    public static function PENDING(): CallsActionStatus
    {
        return new self('PENDING');
    }

    public static function IN_PROGRESS(): CallsActionStatus
    {
        return new self('IN_PROGRESS');
    }

    public static function COMPLETED(): CallsActionStatus
    {
        return new self('COMPLETED');
    }

    public static function FAILED(): CallsActionStatus
    {
        return new self('FAILED');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
