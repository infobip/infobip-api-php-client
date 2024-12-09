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

final class CallsErrorCode implements EnumInterface
{
    public const NORMAL_HANGUP = 'NORMAL_HANGUP';
    public const NO_ANSWER = 'NO_ANSWER';
    public const BUSY = 'BUSY';
    public const CANCELLED = 'CANCELLED';
    public const REJECTED = 'REJECTED';
    public const FORBIDDEN = 'FORBIDDEN';
    public const DESTINATION_NOT_FOUND = 'DESTINATION_NOT_FOUND';
    public const DESTINATION_UNAVAILABLE = 'DESTINATION_UNAVAILABLE';
    public const INVALID_DESTINATION = 'INVALID_DESTINATION';
    public const INVALID_REQUEST = 'INVALID_REQUEST';
    public const REQUEST_TIMEOUT = 'REQUEST_TIMEOUT';
    public const SERVICE_UNAVAILABLE = 'SERVICE_UNAVAILABLE';

    public const ALLOWED_VALUES = [
        'NORMAL_HANGUP',
        'NO_ANSWER',
        'BUSY',
        'CANCELLED',
        'REJECTED',
        'FORBIDDEN',
        'DESTINATION_NOT_FOUND',
        'DESTINATION_UNAVAILABLE',
        'INVALID_DESTINATION',
        'INVALID_REQUEST',
        'REQUEST_TIMEOUT',
        'SERVICE_UNAVAILABLE',
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

    public static function NORMAL_HANGUP(): CallsErrorCode
    {
        return new self('NORMAL_HANGUP');
    }

    public static function NO_ANSWER(): CallsErrorCode
    {
        return new self('NO_ANSWER');
    }

    public static function BUSY(): CallsErrorCode
    {
        return new self('BUSY');
    }

    public static function CANCELLED(): CallsErrorCode
    {
        return new self('CANCELLED');
    }

    public static function REJECTED(): CallsErrorCode
    {
        return new self('REJECTED');
    }

    public static function FORBIDDEN(): CallsErrorCode
    {
        return new self('FORBIDDEN');
    }

    public static function DESTINATION_NOT_FOUND(): CallsErrorCode
    {
        return new self('DESTINATION_NOT_FOUND');
    }

    public static function DESTINATION_UNAVAILABLE(): CallsErrorCode
    {
        return new self('DESTINATION_UNAVAILABLE');
    }

    public static function INVALID_DESTINATION(): CallsErrorCode
    {
        return new self('INVALID_DESTINATION');
    }

    public static function INVALID_REQUEST(): CallsErrorCode
    {
        return new self('INVALID_REQUEST');
    }

    public static function REQUEST_TIMEOUT(): CallsErrorCode
    {
        return new self('REQUEST_TIMEOUT');
    }

    public static function SERVICE_UNAVAILABLE(): CallsErrorCode
    {
        return new self('SERVICE_UNAVAILABLE');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
