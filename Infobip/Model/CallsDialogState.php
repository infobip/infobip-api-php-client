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

final class CallsDialogState implements EnumInterface
{
    public const CREATED = 'CREATED';
    public const PRE_ESTABLISHED = 'PRE_ESTABLISHED';
    public const ESTABLISHED = 'ESTABLISHED';
    public const FINISHED = 'FINISHED';
    public const FAILED = 'FAILED';

    public const ALLOWED_VALUES = [
        'CREATED',
        'PRE_ESTABLISHED',
        'ESTABLISHED',
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

    public static function CREATED(): CallsDialogState
    {
        return new self('CREATED');
    }

    public static function PRE_ESTABLISHED(): CallsDialogState
    {
        return new self('PRE_ESTABLISHED');
    }

    public static function ESTABLISHED(): CallsDialogState
    {
        return new self('ESTABLISHED');
    }

    public static function FINISHED(): CallsDialogState
    {
        return new self('FINISHED');
    }

    public static function FAILED(): CallsDialogState
    {
        return new self('FAILED');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
