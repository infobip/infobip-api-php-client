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

final class CallState implements EnumInterface
{
    public const CALLING = 'CALLING';
    public const RINGING = 'RINGING';
    public const PRE_ESTABLISHED = 'PRE_ESTABLISHED';
    public const ESTABLISHED = 'ESTABLISHED';
    public const FINISHED = 'FINISHED';
    public const FAILED = 'FAILED';
    public const CANCELLED = 'CANCELLED';
    public const NO_ANSWER = 'NO_ANSWER';
    public const BUSY = 'BUSY';

    public const ALLOWED_VALUES = [
        'CALLING',
        'RINGING',
        'PRE_ESTABLISHED',
        'ESTABLISHED',
        'FINISHED',
        'FAILED',
        'CANCELLED',
        'NO_ANSWER',
        'BUSY',
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

    public static function CALLING(): CallState
    {
        return new self('CALLING');
    }

    public static function RINGING(): CallState
    {
        return new self('RINGING');
    }

    public static function PRE_ESTABLISHED(): CallState
    {
        return new self('PRE_ESTABLISHED');
    }

    public static function ESTABLISHED(): CallState
    {
        return new self('ESTABLISHED');
    }

    public static function FINISHED(): CallState
    {
        return new self('FINISHED');
    }

    public static function FAILED(): CallState
    {
        return new self('FAILED');
    }

    public static function CANCELLED(): CallState
    {
        return new self('CANCELLED');
    }

    public static function NO_ANSWER(): CallState
    {
        return new self('NO_ANSWER');
    }

    public static function BUSY(): CallState
    {
        return new self('BUSY');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
