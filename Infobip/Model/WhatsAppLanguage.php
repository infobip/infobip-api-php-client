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

final class WhatsAppLanguage implements EnumInterface
{
    public const AF = 'af';
    public const SQ = 'sq';
    public const AR = 'ar';
    public const AZ = 'az';
    public const BN = 'bn';
    public const BG = 'bg';
    public const CA = 'ca';
    public const ZH_CN = 'zh_CN';
    public const ZH_HK = 'zh_HK';
    public const ZH_TW = 'zh_TW';
    public const HR = 'hr';
    public const CS = 'cs';
    public const DA = 'da';
    public const NL = 'nl';
    public const EN = 'en';
    public const EN_GB = 'en_GB';
    public const EN_US = 'en_US';
    public const ET = 'et';
    public const FIL = 'fil';
    public const FI = 'fi';
    public const FR = 'fr';
    public const KA = 'ka';
    public const DE = 'de';
    public const EL = 'el';
    public const GU = 'gu';
    public const HA = 'ha';
    public const HE = 'he';
    public const HI = 'hi';
    public const HU = 'hu';
    public const ID = 'id';
    public const GA = 'ga';
    public const IT = 'it';
    public const JA = 'ja';
    public const KN = 'kn';
    public const KK = 'kk';
    public const RW_RW = 'rw_RW';
    public const KO = 'ko';
    public const KY_KG = 'ky_KG';
    public const LO = 'lo';
    public const LV = 'lv';
    public const LT = 'lt';
    public const MK = 'mk';
    public const MS = 'ms';
    public const ML = 'ml';
    public const MR = 'mr';
    public const NB = 'nb';
    public const FA = 'fa';
    public const PL = 'pl';
    public const PT_BR = 'pt_BR';
    public const PT_PT = 'pt_PT';
    public const PA = 'pa';
    public const RO = 'ro';
    public const RU = 'ru';
    public const SR = 'sr';
    public const SK = 'sk';
    public const SL = 'sl';
    public const ES = 'es';
    public const ES_AR = 'es_AR';
    public const ES_ES = 'es_ES';
    public const ES_MX = 'es_MX';
    public const SW = 'sw';
    public const SV = 'sv';
    public const TA = 'ta';
    public const TE = 'te';
    public const TH = 'th';
    public const TR = 'tr';
    public const UK = 'uk';
    public const UR = 'ur';
    public const UZ = 'uz';
    public const VI = 'vi';
    public const ZU = 'zu';
    public const UNKNOWN = 'unknown';

    public const ALLOWED_VALUES = [
        'af',
        'sq',
        'ar',
        'az',
        'bn',
        'bg',
        'ca',
        'zh_CN',
        'zh_HK',
        'zh_TW',
        'hr',
        'cs',
        'da',
        'nl',
        'en',
        'en_GB',
        'en_US',
        'et',
        'fil',
        'fi',
        'fr',
        'ka',
        'de',
        'el',
        'gu',
        'ha',
        'he',
        'hi',
        'hu',
        'id',
        'ga',
        'it',
        'ja',
        'kn',
        'kk',
        'rw_RW',
        'ko',
        'ky_KG',
        'lo',
        'lv',
        'lt',
        'mk',
        'ms',
        'ml',
        'mr',
        'nb',
        'fa',
        'pl',
        'pt_BR',
        'pt_PT',
        'pa',
        'ro',
        'ru',
        'sr',
        'sk',
        'sl',
        'es',
        'es_AR',
        'es_ES',
        'es_MX',
        'sw',
        'sv',
        'ta',
        'te',
        'th',
        'tr',
        'uk',
        'ur',
        'uz',
        'vi',
        'zu',
        'unknown',
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

    public static function AF(): WhatsAppLanguage
    {
        return new self('af');
    }

    public static function SQ(): WhatsAppLanguage
    {
        return new self('sq');
    }

    public static function AR(): WhatsAppLanguage
    {
        return new self('ar');
    }

    public static function AZ(): WhatsAppLanguage
    {
        return new self('az');
    }

    public static function BN(): WhatsAppLanguage
    {
        return new self('bn');
    }

    public static function BG(): WhatsAppLanguage
    {
        return new self('bg');
    }

    public static function CA(): WhatsAppLanguage
    {
        return new self('ca');
    }

    public static function ZH_CN(): WhatsAppLanguage
    {
        return new self('zh_CN');
    }

    public static function ZH_HK(): WhatsAppLanguage
    {
        return new self('zh_HK');
    }

    public static function ZH_TW(): WhatsAppLanguage
    {
        return new self('zh_TW');
    }

    public static function HR(): WhatsAppLanguage
    {
        return new self('hr');
    }

    public static function CS(): WhatsAppLanguage
    {
        return new self('cs');
    }

    public static function DA(): WhatsAppLanguage
    {
        return new self('da');
    }

    public static function NL(): WhatsAppLanguage
    {
        return new self('nl');
    }

    public static function EN(): WhatsAppLanguage
    {
        return new self('en');
    }

    public static function EN_GB(): WhatsAppLanguage
    {
        return new self('en_GB');
    }

    public static function EN_US(): WhatsAppLanguage
    {
        return new self('en_US');
    }

    public static function ET(): WhatsAppLanguage
    {
        return new self('et');
    }

    public static function FIL(): WhatsAppLanguage
    {
        return new self('fil');
    }

    public static function FI(): WhatsAppLanguage
    {
        return new self('fi');
    }

    public static function FR(): WhatsAppLanguage
    {
        return new self('fr');
    }

    public static function KA(): WhatsAppLanguage
    {
        return new self('ka');
    }

    public static function DE(): WhatsAppLanguage
    {
        return new self('de');
    }

    public static function EL(): WhatsAppLanguage
    {
        return new self('el');
    }

    public static function GU(): WhatsAppLanguage
    {
        return new self('gu');
    }

    public static function HA(): WhatsAppLanguage
    {
        return new self('ha');
    }

    public static function HE(): WhatsAppLanguage
    {
        return new self('he');
    }

    public static function HI(): WhatsAppLanguage
    {
        return new self('hi');
    }

    public static function HU(): WhatsAppLanguage
    {
        return new self('hu');
    }

    public static function ID(): WhatsAppLanguage
    {
        return new self('id');
    }

    public static function GA(): WhatsAppLanguage
    {
        return new self('ga');
    }

    public static function IT(): WhatsAppLanguage
    {
        return new self('it');
    }

    public static function JA(): WhatsAppLanguage
    {
        return new self('ja');
    }

    public static function KN(): WhatsAppLanguage
    {
        return new self('kn');
    }

    public static function KK(): WhatsAppLanguage
    {
        return new self('kk');
    }

    public static function RW_RW(): WhatsAppLanguage
    {
        return new self('rw_RW');
    }

    public static function KO(): WhatsAppLanguage
    {
        return new self('ko');
    }

    public static function KY_KG(): WhatsAppLanguage
    {
        return new self('ky_KG');
    }

    public static function LO(): WhatsAppLanguage
    {
        return new self('lo');
    }

    public static function LV(): WhatsAppLanguage
    {
        return new self('lv');
    }

    public static function LT(): WhatsAppLanguage
    {
        return new self('lt');
    }

    public static function MK(): WhatsAppLanguage
    {
        return new self('mk');
    }

    public static function MS(): WhatsAppLanguage
    {
        return new self('ms');
    }

    public static function ML(): WhatsAppLanguage
    {
        return new self('ml');
    }

    public static function MR(): WhatsAppLanguage
    {
        return new self('mr');
    }

    public static function NB(): WhatsAppLanguage
    {
        return new self('nb');
    }

    public static function FA(): WhatsAppLanguage
    {
        return new self('fa');
    }

    public static function PL(): WhatsAppLanguage
    {
        return new self('pl');
    }

    public static function PT_BR(): WhatsAppLanguage
    {
        return new self('pt_BR');
    }

    public static function PT_PT(): WhatsAppLanguage
    {
        return new self('pt_PT');
    }

    public static function PA(): WhatsAppLanguage
    {
        return new self('pa');
    }

    public static function RO(): WhatsAppLanguage
    {
        return new self('ro');
    }

    public static function RU(): WhatsAppLanguage
    {
        return new self('ru');
    }

    public static function SR(): WhatsAppLanguage
    {
        return new self('sr');
    }

    public static function SK(): WhatsAppLanguage
    {
        return new self('sk');
    }

    public static function SL(): WhatsAppLanguage
    {
        return new self('sl');
    }

    public static function ES(): WhatsAppLanguage
    {
        return new self('es');
    }

    public static function ES_AR(): WhatsAppLanguage
    {
        return new self('es_AR');
    }

    public static function ES_ES(): WhatsAppLanguage
    {
        return new self('es_ES');
    }

    public static function ES_MX(): WhatsAppLanguage
    {
        return new self('es_MX');
    }

    public static function SW(): WhatsAppLanguage
    {
        return new self('sw');
    }

    public static function SV(): WhatsAppLanguage
    {
        return new self('sv');
    }

    public static function TA(): WhatsAppLanguage
    {
        return new self('ta');
    }

    public static function TE(): WhatsAppLanguage
    {
        return new self('te');
    }

    public static function TH(): WhatsAppLanguage
    {
        return new self('th');
    }

    public static function TR(): WhatsAppLanguage
    {
        return new self('tr');
    }

    public static function UK(): WhatsAppLanguage
    {
        return new self('uk');
    }

    public static function UR(): WhatsAppLanguage
    {
        return new self('ur');
    }

    public static function UZ(): WhatsAppLanguage
    {
        return new self('uz');
    }

    public static function VI(): WhatsAppLanguage
    {
        return new self('vi');
    }

    public static function ZU(): WhatsAppLanguage
    {
        return new self('zu');
    }

    public static function UNKNOWN(): WhatsAppLanguage
    {
        return new self('unknown');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
