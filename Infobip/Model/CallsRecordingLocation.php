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

final class CallsRecordingLocation implements EnumInterface
{
    public const SAO_PAULO = 'SAO_PAULO';
    public const BOGOTA = 'BOGOTA';
    public const FRANKFURT = 'FRANKFURT';
    public const JOHANNESBURG = 'JOHANNESBURG';
    public const JOHANNESBURG_1 = 'JOHANNESBURG_1';
    public const NEW_YORK = 'NEW_YORK';
    public const PORTLAND = 'PORTLAND';
    public const MOSCOW = 'MOSCOW';
    public const SINGAPORE = 'SINGAPORE';
    public const ISTANBUL = 'ISTANBUL';
    public const KUALA_LUMPUR = 'KUALA_LUMPUR';
    public const JAKARTA = 'JAKARTA';
    public const MUMBAI = 'MUMBAI';
    public const HONG_KONG_1 = 'HONG_KONG_1';
    public const HONG_KONG = 'HONG_KONG';
    public const RIYADH = 'RIYADH';
    public const CHENNAI = 'CHENNAI';

    public const ALLOWED_VALUES = [
        'SAO_PAULO',
        'BOGOTA',
        'FRANKFURT',
        'JOHANNESBURG',
        'JOHANNESBURG_1',
        'NEW_YORK',
        'PORTLAND',
        'MOSCOW',
        'SINGAPORE',
        'ISTANBUL',
        'KUALA_LUMPUR',
        'JAKARTA',
        'MUMBAI',
        'HONG_KONG_1',
        'HONG_KONG',
        'RIYADH',
        'CHENNAI',
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

    public static function SAO_PAULO(): CallsRecordingLocation
    {
        return new self('SAO_PAULO');
    }

    public static function BOGOTA(): CallsRecordingLocation
    {
        return new self('BOGOTA');
    }

    public static function FRANKFURT(): CallsRecordingLocation
    {
        return new self('FRANKFURT');
    }

    public static function JOHANNESBURG(): CallsRecordingLocation
    {
        return new self('JOHANNESBURG');
    }

    public static function JOHANNESBURG_1(): CallsRecordingLocation
    {
        return new self('JOHANNESBURG_1');
    }

    public static function NEW_YORK(): CallsRecordingLocation
    {
        return new self('NEW_YORK');
    }

    public static function PORTLAND(): CallsRecordingLocation
    {
        return new self('PORTLAND');
    }

    public static function MOSCOW(): CallsRecordingLocation
    {
        return new self('MOSCOW');
    }

    public static function SINGAPORE(): CallsRecordingLocation
    {
        return new self('SINGAPORE');
    }

    public static function ISTANBUL(): CallsRecordingLocation
    {
        return new self('ISTANBUL');
    }

    public static function KUALA_LUMPUR(): CallsRecordingLocation
    {
        return new self('KUALA_LUMPUR');
    }

    public static function JAKARTA(): CallsRecordingLocation
    {
        return new self('JAKARTA');
    }

    public static function MUMBAI(): CallsRecordingLocation
    {
        return new self('MUMBAI');
    }

    public static function HONG_KONG_1(): CallsRecordingLocation
    {
        return new self('HONG_KONG_1');
    }

    public static function HONG_KONG(): CallsRecordingLocation
    {
        return new self('HONG_KONG');
    }

    public static function RIYADH(): CallsRecordingLocation
    {
        return new self('RIYADH');
    }

    public static function CHENNAI(): CallsRecordingLocation
    {
        return new self('CHENNAI');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
