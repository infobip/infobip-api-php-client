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

final class TfaLanguage implements EnumInterface
{
    public const EN = 'en';
    public const ES = 'es';
    public const CA = 'ca';
    public const DA = 'da';
    public const NL = 'nl';
    public const FR = 'fr';
    public const DE = 'de';
    public const IT = 'it';
    public const JA = 'ja';
    public const KO = 'ko';
    public const NO = 'no';
    public const PL = 'pl';
    public const RU = 'ru';
    public const SV = 'sv';
    public const FI = 'fi';
    public const HR = 'hr';
    public const SL = 'sl';
    public const RO = 'ro';
    public const PT_PT = 'pt-pt';
    public const PT_BR = 'pt-br';
    public const ZH_CN = 'zh-cn';
    public const ZH_TW = 'zh-tw';

    public const ALLOWED_VALUES = [
        'en',
        'es',
        'ca',
        'da',
        'nl',
        'fr',
        'de',
        'it',
        'ja',
        'ko',
        'no',
        'pl',
        'ru',
        'sv',
        'fi',
        'hr',
        'sl',
        'ro',
        'pt-pt',
        'pt-br',
        'zh-cn',
        'zh-tw',
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

    public static function EN(): TfaLanguage
    {
        return new self('en');
    }

    public static function ES(): TfaLanguage
    {
        return new self('es');
    }

    public static function CA(): TfaLanguage
    {
        return new self('ca');
    }

    public static function DA(): TfaLanguage
    {
        return new self('da');
    }

    public static function NL(): TfaLanguage
    {
        return new self('nl');
    }

    public static function FR(): TfaLanguage
    {
        return new self('fr');
    }

    public static function DE(): TfaLanguage
    {
        return new self('de');
    }

    public static function IT(): TfaLanguage
    {
        return new self('it');
    }

    public static function JA(): TfaLanguage
    {
        return new self('ja');
    }

    public static function KO(): TfaLanguage
    {
        return new self('ko');
    }

    public static function NO(): TfaLanguage
    {
        return new self('no');
    }

    public static function PL(): TfaLanguage
    {
        return new self('pl');
    }

    public static function RU(): TfaLanguage
    {
        return new self('ru');
    }

    public static function SV(): TfaLanguage
    {
        return new self('sv');
    }

    public static function FI(): TfaLanguage
    {
        return new self('fi');
    }

    public static function HR(): TfaLanguage
    {
        return new self('hr');
    }

    public static function SL(): TfaLanguage
    {
        return new self('sl');
    }

    public static function RO(): TfaLanguage
    {
        return new self('ro');
    }

    public static function PT_PT(): TfaLanguage
    {
        return new self('pt-pt');
    }

    public static function PT_BR(): TfaLanguage
    {
        return new self('pt-br');
    }

    public static function ZH_CN(): TfaLanguage
    {
        return new self('zh-cn');
    }

    public static function ZH_TW(): TfaLanguage
    {
        return new self('zh-tw');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
