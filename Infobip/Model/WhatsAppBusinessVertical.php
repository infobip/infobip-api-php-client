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

final class WhatsAppBusinessVertical implements EnumInterface
{
    public const AUTOMOTIVE = 'AUTOMOTIVE';
    public const BEAUTY_AND_SPA_AND_SALON = 'BEAUTY_AND_SPA_AND_SALON';
    public const CLOTHING_AND_APPAREL = 'CLOTHING_AND_APPAREL';
    public const EDUCATION = 'EDUCATION';
    public const ENTERTAINMENT = 'ENTERTAINMENT';
    public const EVENT_PLANNING_AND_SERVICE = 'EVENT_PLANNING_AND_SERVICE';
    public const FINANCE_AND_BANKING = 'FINANCE_AND_BANKING';
    public const FOOD_AND_GROCERY = 'FOOD_AND_GROCERY';
    public const PUBLIC_SERVICE = 'PUBLIC_SERVICE';
    public const HOTEL_AND_LODGING = 'HOTEL_AND_LODGING';
    public const MEDICAL_AND_HEALTH = 'MEDICAL_AND_HEALTH';
    public const NON_PROFIT = 'NON_PROFIT';
    public const PROFESSIONAL_SERVICES = 'PROFESSIONAL_SERVICES';
    public const SHOPPING_AND_RETAIL = 'SHOPPING_AND_RETAIL';
    public const TRAVEL_AND_TRANSPORTATION = 'TRAVEL_AND_TRANSPORTATION';
    public const RESTAURANT = 'RESTAURANT';
    public const OTHER = 'OTHER';
    public const UNKNOWN = 'UNKNOWN';

    public const ALLOWED_VALUES = [
        'AUTOMOTIVE',
        'BEAUTY_AND_SPA_AND_SALON',
        'CLOTHING_AND_APPAREL',
        'EDUCATION',
        'ENTERTAINMENT',
        'EVENT_PLANNING_AND_SERVICE',
        'FINANCE_AND_BANKING',
        'FOOD_AND_GROCERY',
        'PUBLIC_SERVICE',
        'HOTEL_AND_LODGING',
        'MEDICAL_AND_HEALTH',
        'NON_PROFIT',
        'PROFESSIONAL_SERVICES',
        'SHOPPING_AND_RETAIL',
        'TRAVEL_AND_TRANSPORTATION',
        'RESTAURANT',
        'OTHER',
        'UNKNOWN',
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

    public static function AUTOMOTIVE(): WhatsAppBusinessVertical
    {
        return new self('AUTOMOTIVE');
    }

    public static function BEAUTY_AND_SPA_AND_SALON(): WhatsAppBusinessVertical
    {
        return new self('BEAUTY_AND_SPA_AND_SALON');
    }

    public static function CLOTHING_AND_APPAREL(): WhatsAppBusinessVertical
    {
        return new self('CLOTHING_AND_APPAREL');
    }

    public static function EDUCATION(): WhatsAppBusinessVertical
    {
        return new self('EDUCATION');
    }

    public static function ENTERTAINMENT(): WhatsAppBusinessVertical
    {
        return new self('ENTERTAINMENT');
    }

    public static function EVENT_PLANNING_AND_SERVICE(): WhatsAppBusinessVertical
    {
        return new self('EVENT_PLANNING_AND_SERVICE');
    }

    public static function FINANCE_AND_BANKING(): WhatsAppBusinessVertical
    {
        return new self('FINANCE_AND_BANKING');
    }

    public static function FOOD_AND_GROCERY(): WhatsAppBusinessVertical
    {
        return new self('FOOD_AND_GROCERY');
    }

    public static function PUBLIC_SERVICE(): WhatsAppBusinessVertical
    {
        return new self('PUBLIC_SERVICE');
    }

    public static function HOTEL_AND_LODGING(): WhatsAppBusinessVertical
    {
        return new self('HOTEL_AND_LODGING');
    }

    public static function MEDICAL_AND_HEALTH(): WhatsAppBusinessVertical
    {
        return new self('MEDICAL_AND_HEALTH');
    }

    public static function NON_PROFIT(): WhatsAppBusinessVertical
    {
        return new self('NON_PROFIT');
    }

    public static function PROFESSIONAL_SERVICES(): WhatsAppBusinessVertical
    {
        return new self('PROFESSIONAL_SERVICES');
    }

    public static function SHOPPING_AND_RETAIL(): WhatsAppBusinessVertical
    {
        return new self('SHOPPING_AND_RETAIL');
    }

    public static function TRAVEL_AND_TRANSPORTATION(): WhatsAppBusinessVertical
    {
        return new self('TRAVEL_AND_TRANSPORTATION');
    }

    public static function RESTAURANT(): WhatsAppBusinessVertical
    {
        return new self('RESTAURANT');
    }

    public static function OTHER(): WhatsAppBusinessVertical
    {
        return new self('OTHER');
    }

    public static function UNKNOWN(): WhatsAppBusinessVertical
    {
        return new self('UNKNOWN');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
