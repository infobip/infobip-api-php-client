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

final class CallsLanguage implements EnumInterface
{
    public const AR = 'ar';
    public const BN = 'bn';
    public const BG = 'bg';
    public const CA = 'ca';
    public const ZH_CN = 'zh-cn';
    public const ZH_TW = 'zh-tw';
    public const HR = 'hr';
    public const CS = 'cs';
    public const DA = 'da';
    public const NL = 'nl';
    public const EN = 'en';
    public const EN_AU = 'en-au';
    public const EN_GB = 'en-gb';
    public const EN_CA = 'en-ca';
    public const EN_IN = 'en-in';
    public const EN_IE = 'en-ie';
    public const EN_GB_WLS = 'en-gb-wls';
    public const EPO = 'epo';
    public const FIL_PH = 'fil-ph';
    public const FI = 'fi';
    public const FR = 'fr';
    public const FR_CA = 'fr-ca';
    public const FR_CH = 'fr-ch';
    public const DE = 'de';
    public const DE_AT = 'de-at';
    public const DE_CH = 'de-ch';
    public const EL = 'el';
    public const GU = 'gu';
    public const HE = 'he';
    public const HI = 'hi';
    public const HU = 'hu';
    public const IS = 'is';
    public const ID = 'id';
    public const IT = 'it';
    public const JA = 'ja';
    public const KN = 'kn';
    public const KO = 'ko';
    public const MS = 'ms';
    public const ML = 'ml';
    public const NO = 'no';
    public const PL = 'pl';
    public const PT_PT = 'pt-pt';
    public const PT_BR = 'pt-br';
    public const RO = 'ro';
    public const RU = 'ru';
    public const SK = 'sk';
    public const SL = 'sl';
    public const ES = 'es';
    public const ES_GL = 'es-gl';
    public const ES_MX = 'es-mx';
    public const SV = 'sv';
    public const TA = 'ta';
    public const TE = 'te';
    public const TH = 'th';
    public const TR = 'tr';
    public const UK = 'uk';
    public const VI = 'vi';
    public const WLS = 'wls';

    public const ALLOWED_VALUES = [
        'ar',
        'bn',
        'bg',
        'ca',
        'zh-cn',
        'zh-tw',
        'hr',
        'cs',
        'da',
        'nl',
        'en',
        'en-au',
        'en-gb',
        'en-ca',
        'en-in',
        'en-ie',
        'en-gb-wls',
        'epo',
        'fil-ph',
        'fi',
        'fr',
        'fr-ca',
        'fr-ch',
        'de',
        'de-at',
        'de-ch',
        'el',
        'gu',
        'he',
        'hi',
        'hu',
        'is',
        'id',
        'it',
        'ja',
        'kn',
        'ko',
        'ms',
        'ml',
        'no',
        'pl',
        'pt-pt',
        'pt-br',
        'ro',
        'ru',
        'sk',
        'sl',
        'es',
        'es-gl',
        'es-mx',
        'sv',
        'ta',
        'te',
        'th',
        'tr',
        'uk',
        'vi',
        'wls',
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

    public static function AR(): CallsLanguage
    {
        return new self('ar');
    }

    public static function BN(): CallsLanguage
    {
        return new self('bn');
    }

    public static function BG(): CallsLanguage
    {
        return new self('bg');
    }

    public static function CA(): CallsLanguage
    {
        return new self('ca');
    }

    public static function ZH_CN(): CallsLanguage
    {
        return new self('zh-cn');
    }

    public static function ZH_TW(): CallsLanguage
    {
        return new self('zh-tw');
    }

    public static function HR(): CallsLanguage
    {
        return new self('hr');
    }

    public static function CS(): CallsLanguage
    {
        return new self('cs');
    }

    public static function DA(): CallsLanguage
    {
        return new self('da');
    }

    public static function NL(): CallsLanguage
    {
        return new self('nl');
    }

    public static function EN(): CallsLanguage
    {
        return new self('en');
    }

    public static function EN_AU(): CallsLanguage
    {
        return new self('en-au');
    }

    public static function EN_GB(): CallsLanguage
    {
        return new self('en-gb');
    }

    public static function EN_CA(): CallsLanguage
    {
        return new self('en-ca');
    }

    public static function EN_IN(): CallsLanguage
    {
        return new self('en-in');
    }

    public static function EN_IE(): CallsLanguage
    {
        return new self('en-ie');
    }

    public static function EN_GB_WLS(): CallsLanguage
    {
        return new self('en-gb-wls');
    }

    public static function EPO(): CallsLanguage
    {
        return new self('epo');
    }

    public static function FIL_PH(): CallsLanguage
    {
        return new self('fil-ph');
    }

    public static function FI(): CallsLanguage
    {
        return new self('fi');
    }

    public static function FR(): CallsLanguage
    {
        return new self('fr');
    }

    public static function FR_CA(): CallsLanguage
    {
        return new self('fr-ca');
    }

    public static function FR_CH(): CallsLanguage
    {
        return new self('fr-ch');
    }

    public static function DE(): CallsLanguage
    {
        return new self('de');
    }

    public static function DE_AT(): CallsLanguage
    {
        return new self('de-at');
    }

    public static function DE_CH(): CallsLanguage
    {
        return new self('de-ch');
    }

    public static function EL(): CallsLanguage
    {
        return new self('el');
    }

    public static function GU(): CallsLanguage
    {
        return new self('gu');
    }

    public static function HE(): CallsLanguage
    {
        return new self('he');
    }

    public static function HI(): CallsLanguage
    {
        return new self('hi');
    }

    public static function HU(): CallsLanguage
    {
        return new self('hu');
    }

    public static function IS(): CallsLanguage
    {
        return new self('is');
    }

    public static function ID(): CallsLanguage
    {
        return new self('id');
    }

    public static function IT(): CallsLanguage
    {
        return new self('it');
    }

    public static function JA(): CallsLanguage
    {
        return new self('ja');
    }

    public static function KN(): CallsLanguage
    {
        return new self('kn');
    }

    public static function KO(): CallsLanguage
    {
        return new self('ko');
    }

    public static function MS(): CallsLanguage
    {
        return new self('ms');
    }

    public static function ML(): CallsLanguage
    {
        return new self('ml');
    }

    public static function NO(): CallsLanguage
    {
        return new self('no');
    }

    public static function PL(): CallsLanguage
    {
        return new self('pl');
    }

    public static function PT_PT(): CallsLanguage
    {
        return new self('pt-pt');
    }

    public static function PT_BR(): CallsLanguage
    {
        return new self('pt-br');
    }

    public static function RO(): CallsLanguage
    {
        return new self('ro');
    }

    public static function RU(): CallsLanguage
    {
        return new self('ru');
    }

    public static function SK(): CallsLanguage
    {
        return new self('sk');
    }

    public static function SL(): CallsLanguage
    {
        return new self('sl');
    }

    public static function ES(): CallsLanguage
    {
        return new self('es');
    }

    public static function ES_GL(): CallsLanguage
    {
        return new self('es-gl');
    }

    public static function ES_MX(): CallsLanguage
    {
        return new self('es-mx');
    }

    public static function SV(): CallsLanguage
    {
        return new self('sv');
    }

    public static function TA(): CallsLanguage
    {
        return new self('ta');
    }

    public static function TE(): CallsLanguage
    {
        return new self('te');
    }

    public static function TH(): CallsLanguage
    {
        return new self('th');
    }

    public static function TR(): CallsLanguage
    {
        return new self('tr');
    }

    public static function UK(): CallsLanguage
    {
        return new self('uk');
    }

    public static function VI(): CallsLanguage
    {
        return new self('vi');
    }

    public static function WLS(): CallsLanguage
    {
        return new self('wls');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
