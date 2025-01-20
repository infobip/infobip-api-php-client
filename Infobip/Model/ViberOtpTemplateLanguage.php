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

final class ViberOtpTemplateLanguage implements EnumInterface
{
    public const ENGLISH = 'ENGLISH';
    public const ARABIC = 'ARABIC';
    public const BULGARIAN = 'BULGARIAN';
    public const CROATIAN = 'CROATIAN';
    public const CZECH = 'CZECH';
    public const DANISH = 'DANISH';
    public const GERMAN = 'GERMAN';
    public const GREEK = 'GREEK';
    public const SPANISH = 'SPANISH';
    public const FINNISH = 'FINNISH';
    public const FRENCH = 'FRENCH';
    public const HEBREW = 'HEBREW';
    public const BURMESE = 'BURMESE';
    public const HUNGARIAN = 'HUNGARIAN';
    public const INDONESIAN = 'INDONESIAN';
    public const ITALIAN = 'ITALIAN';
    public const JAPANESE = 'JAPANESE';
    public const NORWEGIAN = 'NORWEGIAN';
    public const DUTCH = 'DUTCH';
    public const POLISH = 'POLISH';
    public const PORTUGUESE_PORTUGAL = 'PORTUGUESE_PORTUGAL';
    public const PORTUGUESE_BRAZIL = 'PORTUGUESE_BRAZIL';
    public const ROMANIAN = 'ROMANIAN';
    public const RUSSIAN = 'RUSSIAN';
    public const SLOVAK = 'SLOVAK';
    public const SERBIAN = 'SERBIAN';
    public const SWEDISH = 'SWEDISH';
    public const THAI = 'THAI';
    public const TURKISH = 'TURKISH';
    public const UKRAINIAN = 'UKRAINIAN';
    public const VIETNAMESE = 'VIETNAMESE';
    public const PERSIAN = 'PERSIAN';
    public const BELARUSIAN = 'BELARUSIAN';

    public const ALLOWED_VALUES = [
        'ENGLISH',
        'ARABIC',
        'BULGARIAN',
        'CROATIAN',
        'CZECH',
        'DANISH',
        'GERMAN',
        'GREEK',
        'SPANISH',
        'FINNISH',
        'FRENCH',
        'HEBREW',
        'BURMESE',
        'HUNGARIAN',
        'INDONESIAN',
        'ITALIAN',
        'JAPANESE',
        'NORWEGIAN',
        'DUTCH',
        'POLISH',
        'PORTUGUESE_PORTUGAL',
        'PORTUGUESE_BRAZIL',
        'ROMANIAN',
        'RUSSIAN',
        'SLOVAK',
        'SERBIAN',
        'SWEDISH',
        'THAI',
        'TURKISH',
        'UKRAINIAN',
        'VIETNAMESE',
        'PERSIAN',
        'BELARUSIAN',
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

    public static function ENGLISH(): ViberOtpTemplateLanguage
    {
        return new self('ENGLISH');
    }

    public static function ARABIC(): ViberOtpTemplateLanguage
    {
        return new self('ARABIC');
    }

    public static function BULGARIAN(): ViberOtpTemplateLanguage
    {
        return new self('BULGARIAN');
    }

    public static function CROATIAN(): ViberOtpTemplateLanguage
    {
        return new self('CROATIAN');
    }

    public static function CZECH(): ViberOtpTemplateLanguage
    {
        return new self('CZECH');
    }

    public static function DANISH(): ViberOtpTemplateLanguage
    {
        return new self('DANISH');
    }

    public static function GERMAN(): ViberOtpTemplateLanguage
    {
        return new self('GERMAN');
    }

    public static function GREEK(): ViberOtpTemplateLanguage
    {
        return new self('GREEK');
    }

    public static function SPANISH(): ViberOtpTemplateLanguage
    {
        return new self('SPANISH');
    }

    public static function FINNISH(): ViberOtpTemplateLanguage
    {
        return new self('FINNISH');
    }

    public static function FRENCH(): ViberOtpTemplateLanguage
    {
        return new self('FRENCH');
    }

    public static function HEBREW(): ViberOtpTemplateLanguage
    {
        return new self('HEBREW');
    }

    public static function BURMESE(): ViberOtpTemplateLanguage
    {
        return new self('BURMESE');
    }

    public static function HUNGARIAN(): ViberOtpTemplateLanguage
    {
        return new self('HUNGARIAN');
    }

    public static function INDONESIAN(): ViberOtpTemplateLanguage
    {
        return new self('INDONESIAN');
    }

    public static function ITALIAN(): ViberOtpTemplateLanguage
    {
        return new self('ITALIAN');
    }

    public static function JAPANESE(): ViberOtpTemplateLanguage
    {
        return new self('JAPANESE');
    }

    public static function NORWEGIAN(): ViberOtpTemplateLanguage
    {
        return new self('NORWEGIAN');
    }

    public static function DUTCH(): ViberOtpTemplateLanguage
    {
        return new self('DUTCH');
    }

    public static function POLISH(): ViberOtpTemplateLanguage
    {
        return new self('POLISH');
    }

    public static function PORTUGUESE_PORTUGAL(): ViberOtpTemplateLanguage
    {
        return new self('PORTUGUESE_PORTUGAL');
    }

    public static function PORTUGUESE_BRAZIL(): ViberOtpTemplateLanguage
    {
        return new self('PORTUGUESE_BRAZIL');
    }

    public static function ROMANIAN(): ViberOtpTemplateLanguage
    {
        return new self('ROMANIAN');
    }

    public static function RUSSIAN(): ViberOtpTemplateLanguage
    {
        return new self('RUSSIAN');
    }

    public static function SLOVAK(): ViberOtpTemplateLanguage
    {
        return new self('SLOVAK');
    }

    public static function SERBIAN(): ViberOtpTemplateLanguage
    {
        return new self('SERBIAN');
    }

    public static function SWEDISH(): ViberOtpTemplateLanguage
    {
        return new self('SWEDISH');
    }

    public static function THAI(): ViberOtpTemplateLanguage
    {
        return new self('THAI');
    }

    public static function TURKISH(): ViberOtpTemplateLanguage
    {
        return new self('TURKISH');
    }

    public static function UKRAINIAN(): ViberOtpTemplateLanguage
    {
        return new self('UKRAINIAN');
    }

    public static function VIETNAMESE(): ViberOtpTemplateLanguage
    {
        return new self('VIETNAMESE');
    }

    public static function PERSIAN(): ViberOtpTemplateLanguage
    {
        return new self('PERSIAN');
    }

    public static function BELARUSIAN(): ViberOtpTemplateLanguage
    {
        return new self('BELARUSIAN');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
