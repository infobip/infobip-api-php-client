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

final class FormsComponentType implements EnumInterface
{
    public const TEXT = 'TEXT';
    public const TEXTAREA = 'TEXTAREA';
    public const NUMBER = 'NUMBER';
    public const DROPDOWN = 'DROPDOWN';
    public const CHECKBOX = 'CHECKBOX';
    public const CHECKBOX_GROUP = 'CHECKBOX_GROUP';
    public const RADIOBUTTON = 'RADIOBUTTON';
    public const DATE = 'DATE';
    public const DATETIME = 'DATETIME';
    public const EMAIL = 'EMAIL';
    public const MSISDN = 'MSISDN';
    public const SUBMIT_BUTTON = 'SUBMIT_BUTTON';
    public const TITLE = 'TITLE';
    public const DESCRIPTION = 'DESCRIPTION';
    public const APPLE_SPLASH = 'APPLE_SPLASH';
    public const APPLE_BOOLEAN = 'APPLE_BOOLEAN';
    public const WHATSAPP_SCREEN = 'WHATSAPP_SCREEN';
    public const WHATSAPP_HEADING = 'WHATSAPP_HEADING';
    public const WHATSAPP_SUBHEADING = 'WHATSAPP_SUBHEADING';
    public const WHATSAPP_BODY = 'WHATSAPP_BODY';

    public const ALLOWED_VALUES = [
        'TEXT',
        'TEXTAREA',
        'NUMBER',
        'DROPDOWN',
        'CHECKBOX',
        'CHECKBOX_GROUP',
        'RADIOBUTTON',
        'DATE',
        'DATETIME',
        'EMAIL',
        'MSISDN',
        'SUBMIT_BUTTON',
        'TITLE',
        'DESCRIPTION',
        'APPLE_SPLASH',
        'APPLE_BOOLEAN',
        'WHATSAPP_SCREEN',
        'WHATSAPP_HEADING',
        'WHATSAPP_SUBHEADING',
        'WHATSAPP_BODY',
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

    public static function TEXT(): FormsComponentType
    {
        return new self('TEXT');
    }

    public static function TEXTAREA(): FormsComponentType
    {
        return new self('TEXTAREA');
    }

    public static function NUMBER(): FormsComponentType
    {
        return new self('NUMBER');
    }

    public static function DROPDOWN(): FormsComponentType
    {
        return new self('DROPDOWN');
    }

    public static function CHECKBOX(): FormsComponentType
    {
        return new self('CHECKBOX');
    }

    public static function CHECKBOX_GROUP(): FormsComponentType
    {
        return new self('CHECKBOX_GROUP');
    }

    public static function RADIOBUTTON(): FormsComponentType
    {
        return new self('RADIOBUTTON');
    }

    public static function DATE(): FormsComponentType
    {
        return new self('DATE');
    }

    public static function DATETIME(): FormsComponentType
    {
        return new self('DATETIME');
    }

    public static function EMAIL(): FormsComponentType
    {
        return new self('EMAIL');
    }

    public static function MSISDN(): FormsComponentType
    {
        return new self('MSISDN');
    }

    public static function SUBMIT_BUTTON(): FormsComponentType
    {
        return new self('SUBMIT_BUTTON');
    }

    public static function TITLE(): FormsComponentType
    {
        return new self('TITLE');
    }

    public static function DESCRIPTION(): FormsComponentType
    {
        return new self('DESCRIPTION');
    }

    public static function APPLE_SPLASH(): FormsComponentType
    {
        return new self('APPLE_SPLASH');
    }

    public static function APPLE_BOOLEAN(): FormsComponentType
    {
        return new self('APPLE_BOOLEAN');
    }

    public static function WHATSAPP_SCREEN(): FormsComponentType
    {
        return new self('WHATSAPP_SCREEN');
    }

    public static function WHATSAPP_HEADING(): FormsComponentType
    {
        return new self('WHATSAPP_HEADING');
    }

    public static function WHATSAPP_SUBHEADING(): FormsComponentType
    {
        return new self('WHATSAPP_SUBHEADING');
    }

    public static function WHATSAPP_BODY(): FormsComponentType
    {
        return new self('WHATSAPP_BODY');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
