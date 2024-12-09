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

final class WebRtcLanguageCode implements EnumInterface
{
    public const AR_AE = 'ar-AE';
    public const DE_DE = 'de-DE';
    public const EN_US = 'en-US';
    public const ES_LA = 'es-LA';
    public const FR_FR = 'fr-FR';
    public const IT_IT = 'it-IT';
    public const JA_JP = 'ja-JP';
    public const PT_BR = 'pt-BR';
    public const RU_RU = 'ru-RU';
    public const SV_SE = 'sv-SE';
    public const TR_TR = 'tr-TR';
    public const ZH_HANS = 'zh-Hans';
    public const ZH_TW = 'zh-TW';

    public const ALLOWED_VALUES = [
        'ar-AE',
        'de-DE',
        'en-US',
        'es-LA',
        'fr-FR',
        'it-IT',
        'ja-JP',
        'pt-BR',
        'ru-RU',
        'sv-SE',
        'tr-TR',
        'zh-Hans',
        'zh-TW',
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

    public static function AR_AE(): WebRtcLanguageCode
    {
        return new self('ar-AE');
    }

    public static function DE_DE(): WebRtcLanguageCode
    {
        return new self('de-DE');
    }

    public static function EN_US(): WebRtcLanguageCode
    {
        return new self('en-US');
    }

    public static function ES_LA(): WebRtcLanguageCode
    {
        return new self('es-LA');
    }

    public static function FR_FR(): WebRtcLanguageCode
    {
        return new self('fr-FR');
    }

    public static function IT_IT(): WebRtcLanguageCode
    {
        return new self('it-IT');
    }

    public static function JA_JP(): WebRtcLanguageCode
    {
        return new self('ja-JP');
    }

    public static function PT_BR(): WebRtcLanguageCode
    {
        return new self('pt-BR');
    }

    public static function RU_RU(): WebRtcLanguageCode
    {
        return new self('ru-RU');
    }

    public static function SV_SE(): WebRtcLanguageCode
    {
        return new self('sv-SE');
    }

    public static function TR_TR(): WebRtcLanguageCode
    {
        return new self('tr-TR');
    }

    public static function ZH_HANS(): WebRtcLanguageCode
    {
        return new self('zh-Hans');
    }

    public static function ZH_TW(): WebRtcLanguageCode
    {
        return new self('zh-TW');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
