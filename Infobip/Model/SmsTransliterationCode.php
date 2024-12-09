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

final class SmsTransliterationCode implements EnumInterface
{
    public const NONE = 'NONE';
    public const TURKISH = 'TURKISH';
    public const GREEK = 'GREEK';
    public const CYRILLIC = 'CYRILLIC';
    public const SERBIAN_CYRILLIC = 'SERBIAN_CYRILLIC';
    public const CENTRAL_EUROPEAN = 'CENTRAL_EUROPEAN';
    public const BALTIC = 'BALTIC';
    public const NON_UNICODE = 'NON_UNICODE';
    public const PORTUGUESE = 'PORTUGUESE';
    public const COLOMBIAN = 'COLOMBIAN';
    public const BULGARIAN_CYRILLIC = 'BULGARIAN_CYRILLIC';
    public const ALL = 'ALL';

    public const ALLOWED_VALUES = [
        'NONE',
        'TURKISH',
        'GREEK',
        'CYRILLIC',
        'SERBIAN_CYRILLIC',
        'CENTRAL_EUROPEAN',
        'BALTIC',
        'NON_UNICODE',
        'PORTUGUESE',
        'COLOMBIAN',
        'BULGARIAN_CYRILLIC',
        'ALL',
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

    public static function NONE(): SmsTransliterationCode
    {
        return new self('NONE');
    }

    public static function TURKISH(): SmsTransliterationCode
    {
        return new self('TURKISH');
    }

    public static function GREEK(): SmsTransliterationCode
    {
        return new self('GREEK');
    }

    public static function CYRILLIC(): SmsTransliterationCode
    {
        return new self('CYRILLIC');
    }

    public static function SERBIAN_CYRILLIC(): SmsTransliterationCode
    {
        return new self('SERBIAN_CYRILLIC');
    }

    public static function CENTRAL_EUROPEAN(): SmsTransliterationCode
    {
        return new self('CENTRAL_EUROPEAN');
    }

    public static function BALTIC(): SmsTransliterationCode
    {
        return new self('BALTIC');
    }

    public static function NON_UNICODE(): SmsTransliterationCode
    {
        return new self('NON_UNICODE');
    }

    public static function PORTUGUESE(): SmsTransliterationCode
    {
        return new self('PORTUGUESE');
    }

    public static function COLOMBIAN(): SmsTransliterationCode
    {
        return new self('COLOMBIAN');
    }

    public static function BULGARIAN_CYRILLIC(): SmsTransliterationCode
    {
        return new self('BULGARIAN_CYRILLIC');
    }

    public static function ALL(): SmsTransliterationCode
    {
        return new self('ALL');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
