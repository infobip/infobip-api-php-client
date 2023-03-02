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

final class CallsDeliveryDay implements EnumInterface
{
    public const MONDAY = 'MONDAY';
    public const TUESDAY = 'TUESDAY';
    public const WEDNESDAY = 'WEDNESDAY';
    public const THURSDAY = 'THURSDAY';
    public const FRIDAY = 'FRIDAY';
    public const SATURDAY = 'SATURDAY';
    public const SUNDAY = 'SUNDAY';

    public const ALLOWED_VALUES = [
        'MONDAY',
        'TUESDAY',
        'WEDNESDAY',
        'THURSDAY',
        'FRIDAY',
        'SATURDAY',
        'SUNDAY',
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

    public static function MONDAY(): CallsDeliveryDay
    {
        return new self('MONDAY');
    }

    public static function TUESDAY(): CallsDeliveryDay
    {
        return new self('TUESDAY');
    }

    public static function WEDNESDAY(): CallsDeliveryDay
    {
        return new self('WEDNESDAY');
    }

    public static function THURSDAY(): CallsDeliveryDay
    {
        return new self('THURSDAY');
    }

    public static function FRIDAY(): CallsDeliveryDay
    {
        return new self('FRIDAY');
    }

    public static function SATURDAY(): CallsDeliveryDay
    {
        return new self('SATURDAY');
    }

    public static function SUNDAY(): CallsDeliveryDay
    {
        return new self('SUNDAY');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
