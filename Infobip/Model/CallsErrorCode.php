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

final class CallsErrorCode implements EnumInterface
{
    public const NORMAL_HANGUP = 'NORMAL_HANGUP';
    public const ANSWERED_ELSEWHERE = 'ANSWERED_ELSEWHERE';
    public const MACHINE_DETECTED = 'MACHINE_DETECTED';
    public const HUMAN_DETECTED = 'HUMAN_DETECTED';
    public const MAX_DURATION_REACHED = 'MAX_DURATION_REACHED';
    public const DEVICE_FORBIDDEN = 'DEVICE_FORBIDDEN';
    public const DEVICE_NOT_FOUND = 'DEVICE_NOT_FOUND';
    public const DEVICE_UNAVAILABLE = 'DEVICE_UNAVAILABLE';
    public const MEDIA_ERROR = 'MEDIA_ERROR';
    public const NO_ANSWER = 'NO_ANSWER';
    public const BUSY = 'BUSY';
    public const CANCELLED = 'CANCELLED';
    public const REJECTED = 'REJECTED';
    public const FORBIDDEN = 'FORBIDDEN';
    public const INSUFFICIENT_FUNDS = 'INSUFFICIENT_FUNDS';
    public const UNAUTHENTICATED = 'UNAUTHENTICATED';
    public const DESTINATION_NOT_FOUND = 'DESTINATION_NOT_FOUND';
    public const DESTINATION_UNAVAILABLE = 'DESTINATION_UNAVAILABLE';
    public const INVALID_DESTINATION = 'INVALID_DESTINATION';
    public const INVALID_REQUEST = 'INVALID_REQUEST';
    public const REQUEST_TIMEOUT = 'REQUEST_TIMEOUT';
    public const NETWORK_ERROR = 'NETWORK_ERROR';
    public const SERVICE_UNAVAILABLE = 'SERVICE_UNAVAILABLE';
    public const UNKNOWN = 'UNKNOWN';
    public const FEATURE_UNAVAILABLE = 'FEATURE_UNAVAILABLE';
    public const CONGESTION = 'CONGESTION';
    public const URL_NOT_FOUND = 'URL_NOT_FOUND';
    public const URL_UNREACHABLE = 'URL_UNREACHABLE';
    public const INVALID_RESPONSE = 'INVALID_RESPONSE';

    public const ALLOWED_VALUES = [
        'NORMAL_HANGUP',
        'ANSWERED_ELSEWHERE',
        'MACHINE_DETECTED',
        'HUMAN_DETECTED',
        'MAX_DURATION_REACHED',
        'DEVICE_FORBIDDEN',
        'DEVICE_NOT_FOUND',
        'DEVICE_UNAVAILABLE',
        'MEDIA_ERROR',
        'NO_ANSWER',
        'BUSY',
        'CANCELLED',
        'REJECTED',
        'FORBIDDEN',
        'INSUFFICIENT_FUNDS',
        'UNAUTHENTICATED',
        'DESTINATION_NOT_FOUND',
        'DESTINATION_UNAVAILABLE',
        'INVALID_DESTINATION',
        'INVALID_REQUEST',
        'REQUEST_TIMEOUT',
        'NETWORK_ERROR',
        'SERVICE_UNAVAILABLE',
        'UNKNOWN',
        'FEATURE_UNAVAILABLE',
        'CONGESTION',
        'URL_NOT_FOUND',
        'URL_UNREACHABLE',
        'INVALID_RESPONSE',
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

    public static function ANSWERED_ELSEWHERE(): CallsErrorCode
    {
        return new self('ANSWERED_ELSEWHERE');
    }

    public static function MACHINE_DETECTED(): CallsErrorCode
    {
        return new self('MACHINE_DETECTED');
    }

    public static function HUMAN_DETECTED(): CallsErrorCode
    {
        return new self('HUMAN_DETECTED');
    }

    public static function MAX_DURATION_REACHED(): CallsErrorCode
    {
        return new self('MAX_DURATION_REACHED');
    }

    public static function DEVICE_FORBIDDEN(): CallsErrorCode
    {
        return new self('DEVICE_FORBIDDEN');
    }

    public static function DEVICE_NOT_FOUND(): CallsErrorCode
    {
        return new self('DEVICE_NOT_FOUND');
    }

    public static function DEVICE_UNAVAILABLE(): CallsErrorCode
    {
        return new self('DEVICE_UNAVAILABLE');
    }

    public static function MEDIA_ERROR(): CallsErrorCode
    {
        return new self('MEDIA_ERROR');
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

    public static function INSUFFICIENT_FUNDS(): CallsErrorCode
    {
        return new self('INSUFFICIENT_FUNDS');
    }

    public static function UNAUTHENTICATED(): CallsErrorCode
    {
        return new self('UNAUTHENTICATED');
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

    public static function NETWORK_ERROR(): CallsErrorCode
    {
        return new self('NETWORK_ERROR');
    }

    public static function SERVICE_UNAVAILABLE(): CallsErrorCode
    {
        return new self('SERVICE_UNAVAILABLE');
    }

    public static function UNKNOWN(): CallsErrorCode
    {
        return new self('UNKNOWN');
    }

    public static function FEATURE_UNAVAILABLE(): CallsErrorCode
    {
        return new self('FEATURE_UNAVAILABLE');
    }

    public static function CONGESTION(): CallsErrorCode
    {
        return new self('CONGESTION');
    }

    public static function URL_NOT_FOUND(): CallsErrorCode
    {
        return new self('URL_NOT_FOUND');
    }

    public static function URL_UNREACHABLE(): CallsErrorCode
    {
        return new self('URL_UNREACHABLE');
    }

    public static function INVALID_RESPONSE(): CallsErrorCode
    {
        return new self('INVALID_RESPONSE');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
