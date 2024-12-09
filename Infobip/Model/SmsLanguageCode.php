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

final class SmsLanguageCode implements EnumInterface
{
    public const NONE = 'NONE';
    public const TR = 'TR';
    public const ES = 'ES';
    public const PT = 'PT';
    public const AUTODETECT = 'AUTODETECT';

    public const ALLOWED_VALUES = [
        'NONE',
        'TR',
        'ES',
        'PT',
        'AUTODETECT',
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

    public static function NONE(): SmsLanguageCode
    {
        return new self('NONE');
    }

    public static function TR(): SmsLanguageCode
    {
        return new self('TR');
    }

    public static function ES(): SmsLanguageCode
    {
        return new self('ES');
    }

    public static function PT(): SmsLanguageCode
    {
        return new self('PT');
    }

    public static function AUTODETECT(): SmsLanguageCode
    {
        return new self('AUTODETECT');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
