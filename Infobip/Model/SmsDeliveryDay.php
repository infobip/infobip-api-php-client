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

final class SmsDeliveryDay implements EnumInterface
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

    public static function MONDAY(): SmsDeliveryDay
    {
        return new self('MONDAY');
    }

    public static function TUESDAY(): SmsDeliveryDay
    {
        return new self('TUESDAY');
    }

    public static function WEDNESDAY(): SmsDeliveryDay
    {
        return new self('WEDNESDAY');
    }

    public static function THURSDAY(): SmsDeliveryDay
    {
        return new self('THURSDAY');
    }

    public static function FRIDAY(): SmsDeliveryDay
    {
        return new self('FRIDAY');
    }

    public static function SATURDAY(): SmsDeliveryDay
    {
        return new self('SATURDAY');
    }

    public static function SUNDAY(): SmsDeliveryDay
    {
        return new self('SUNDAY');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
