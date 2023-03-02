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

final class CallsStatus implements EnumInterface
{
    public const PENDING = 'PENDING';
    public const PAUSED = 'PAUSED';
    public const PROCESSING = 'PROCESSING';
    public const CANCELED = 'CANCELED';
    public const FINISHED = 'FINISHED';
    public const FAILED = 'FAILED';

    public const ALLOWED_VALUES = [
        'PENDING',
        'PAUSED',
        'PROCESSING',
        'CANCELED',
        'FINISHED',
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

    public static function PENDING(): CallsStatus
    {
        return new self('PENDING');
    }

    public static function PAUSED(): CallsStatus
    {
        return new self('PAUSED');
    }

    public static function PROCESSING(): CallsStatus
    {
        return new self('PROCESSING');
    }

    public static function CANCELED(): CallsStatus
    {
        return new self('CANCELED');
    }

    public static function FINISHED(): CallsStatus
    {
        return new self('FINISHED');
    }

    public static function FAILED(): CallsStatus
    {
        return new self('FAILED');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
