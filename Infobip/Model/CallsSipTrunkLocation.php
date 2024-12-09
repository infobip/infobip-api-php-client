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

final class CallsSipTrunkLocation implements EnumInterface
{
    public const SAO_PAULO = 'SAO_PAULO';
    public const BOGOTA = 'BOGOTA';
    public const FRANKFURT = 'FRANKFURT';
    public const JOHANNESBURG = 'JOHANNESBURG';
    public const NEW_YORK = 'NEW_YORK';
    public const PORTLAND = 'PORTLAND';
    public const MOSCOW = 'MOSCOW';
    public const SINGAPORE = 'SINGAPORE';
    public const ISTANBUL = 'ISTANBUL';
    public const KUALA_LUMPUR = 'KUALA_LUMPUR';

    public const ALLOWED_VALUES = [
        'SAO_PAULO',
        'BOGOTA',
        'FRANKFURT',
        'JOHANNESBURG',
        'NEW_YORK',
        'PORTLAND',
        'MOSCOW',
        'SINGAPORE',
        'ISTANBUL',
        'KUALA_LUMPUR',
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

    public static function SAO_PAULO(): CallsSipTrunkLocation
    {
        return new self('SAO_PAULO');
    }

    public static function BOGOTA(): CallsSipTrunkLocation
    {
        return new self('BOGOTA');
    }

    public static function FRANKFURT(): CallsSipTrunkLocation
    {
        return new self('FRANKFURT');
    }

    public static function JOHANNESBURG(): CallsSipTrunkLocation
    {
        return new self('JOHANNESBURG');
    }

    public static function NEW_YORK(): CallsSipTrunkLocation
    {
        return new self('NEW_YORK');
    }

    public static function PORTLAND(): CallsSipTrunkLocation
    {
        return new self('PORTLAND');
    }

    public static function MOSCOW(): CallsSipTrunkLocation
    {
        return new self('MOSCOW');
    }

    public static function SINGAPORE(): CallsSipTrunkLocation
    {
        return new self('SINGAPORE');
    }

    public static function ISTANBUL(): CallsSipTrunkLocation
    {
        return new self('ISTANBUL');
    }

    public static function KUALA_LUMPUR(): CallsSipTrunkLocation
    {
        return new self('KUALA_LUMPUR');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
