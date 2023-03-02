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

final class WhatsAppCategory implements EnumInterface
{
    public const ACCOUNT_UPDATE = 'ACCOUNT_UPDATE';
    public const PAYMENT_UPDATE = 'PAYMENT_UPDATE';
    public const PERSONAL_FINANCE_UPDATE = 'PERSONAL_FINANCE_UPDATE';
    public const SHIPPING_UPDATE = 'SHIPPING_UPDATE';
    public const RESERVATION_UPDATE = 'RESERVATION_UPDATE';
    public const ISSUE_RESOLUTION = 'ISSUE_RESOLUTION';
    public const APPOINTMENT_UPDATE = 'APPOINTMENT_UPDATE';
    public const TRANSPORTATION_UPDATE = 'TRANSPORTATION_UPDATE';
    public const TICKET_UPDATE = 'TICKET_UPDATE';
    public const ALERT_UPDATE = 'ALERT_UPDATE';
    public const AUTO_REPLY = 'AUTO_REPLY';
    public const MARKETING = 'MARKETING';
    public const TRANSACTIONAL = 'TRANSACTIONAL';
    public const OTP = 'OTP';

    public const ALLOWED_VALUES = [
        'ACCOUNT_UPDATE',
        'PAYMENT_UPDATE',
        'PERSONAL_FINANCE_UPDATE',
        'SHIPPING_UPDATE',
        'RESERVATION_UPDATE',
        'ISSUE_RESOLUTION',
        'APPOINTMENT_UPDATE',
        'TRANSPORTATION_UPDATE',
        'TICKET_UPDATE',
        'ALERT_UPDATE',
        'AUTO_REPLY',
        'MARKETING',
        'TRANSACTIONAL',
        'OTP',
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

    public static function ACCOUNT_UPDATE(): WhatsAppCategory
    {
        return new self('ACCOUNT_UPDATE');
    }

    public static function PAYMENT_UPDATE(): WhatsAppCategory
    {
        return new self('PAYMENT_UPDATE');
    }

    public static function PERSONAL_FINANCE_UPDATE(): WhatsAppCategory
    {
        return new self('PERSONAL_FINANCE_UPDATE');
    }

    public static function SHIPPING_UPDATE(): WhatsAppCategory
    {
        return new self('SHIPPING_UPDATE');
    }

    public static function RESERVATION_UPDATE(): WhatsAppCategory
    {
        return new self('RESERVATION_UPDATE');
    }

    public static function ISSUE_RESOLUTION(): WhatsAppCategory
    {
        return new self('ISSUE_RESOLUTION');
    }

    public static function APPOINTMENT_UPDATE(): WhatsAppCategory
    {
        return new self('APPOINTMENT_UPDATE');
    }

    public static function TRANSPORTATION_UPDATE(): WhatsAppCategory
    {
        return new self('TRANSPORTATION_UPDATE');
    }

    public static function TICKET_UPDATE(): WhatsAppCategory
    {
        return new self('TICKET_UPDATE');
    }

    public static function ALERT_UPDATE(): WhatsAppCategory
    {
        return new self('ALERT_UPDATE');
    }

    public static function AUTO_REPLY(): WhatsAppCategory
    {
        return new self('AUTO_REPLY');
    }

    public static function MARKETING(): WhatsAppCategory
    {
        return new self('MARKETING');
    }

    public static function TRANSACTIONAL(): WhatsAppCategory
    {
        return new self('TRANSACTIONAL');
    }

    public static function OTP(): WhatsAppCategory
    {
        return new self('OTP');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
