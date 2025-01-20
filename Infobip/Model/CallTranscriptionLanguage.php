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

final class CallTranscriptionLanguage implements EnumInterface
{
    public const AF_ZA = 'af-ZA';
    public const SQ_AL = 'sq-AL';
    public const AM_ET = 'am-ET';
    public const AR_KW = 'ar-KW';
    public const AR_AE = 'ar-AE';
    public const AR_BH = 'ar-BH';
    public const AR_DZ = 'ar-DZ';
    public const AR_EG = 'ar-EG';
    public const AR_IL = 'ar-IL';
    public const AR_IQ = 'ar-IQ';
    public const AR_JO = 'ar-JO';
    public const AR_LB = 'ar-LB';
    public const AR_LY = 'ar-LY';
    public const AR_MA = 'ar-MA';
    public const AR_OM = 'ar-OM';
    public const AR_PS = 'ar-PS';
    public const AR_QA = 'ar-QA';
    public const AR_SA = 'ar-SA';
    public const AR_SY = 'ar-SY';
    public const AR_TN = 'ar-TN';
    public const AR_YE = 'ar-YE';
    public const HY_AM = 'hy-AM';
    public const AZ_AZ = 'az-AZ';
    public const EU_ES = 'eu-ES';
    public const BN_IN = 'bn-IN';
    public const BN_BD = 'bn-BD';
    public const BS_BA = 'bs-BA';
    public const BG_BG = 'bg-BG';
    public const MY_MM = 'my-MM';
    public const CA_ES = 'ca-ES';
    public const ZH_CN = 'zh-CN';
    public const ZH_HK = 'zh-HK';
    public const ZH_TW = 'zh-TW';
    public const HR_HR = 'hr-HR';
    public const CS_CZ = 'cs-CZ';
    public const DA_DK = 'da-DK';
    public const NL_NL = 'nl-NL';
    public const NL_BE = 'nl-BE';
    public const EN_AU = 'en-AU';
    public const EN_CA = 'en-CA';
    public const EN_GB = 'en-GB';
    public const EN_GH = 'en-GH';
    public const EN_HK = 'en-HK';
    public const EN_IE = 'en-IE';
    public const EN_IN = 'en-IN';
    public const EN_KE = 'en-KE';
    public const EN_NG = 'en-NG';
    public const EN_NZ = 'en-NZ';
    public const EN_PH = 'en-PH';
    public const EN_PK = 'en-PK';
    public const EN_SG = 'en-SG';
    public const EN_TZ = 'en-TZ';
    public const EN_US = 'en-US';
    public const EN_ZA = 'en-ZA';
    public const ET_EE = 'et-EE';
    public const FIL_PH = 'fil-PH';
    public const FI_FI = 'fi-FI';
    public const FR_BE = 'fr-BE';
    public const FR_CA = 'fr-CA';
    public const FR_CH = 'fr-CH';
    public const FR_FR = 'fr-FR';
    public const GL_ES = 'gl-ES';
    public const KA_GE = 'ka-GE';
    public const DE_AT = 'de-AT';
    public const DE_CH = 'de-CH';
    public const DE_DE = 'de-DE';
    public const EL_GR = 'el-GR';
    public const GU_IN = 'gu-IN';
    public const HE_IL = 'he-IL';
    public const HI_IN = 'hi-IN';
    public const HU_HU = 'hu-HU';
    public const IS_IS = 'is-IS';
    public const ID_ID = 'id-ID';
    public const GA_IE = 'ga-IE';
    public const IT_CH = 'it-CH';
    public const IT_IT = 'it-IT';
    public const JA_JP = 'ja-JP';
    public const JV_ID = 'jv-ID';
    public const KN_IN = 'kn-IN';
    public const KK_KZ = 'kk-KZ';
    public const KM_KH = 'km-KH';
    public const KO_KR = 'ko-KR';
    public const LO_LA = 'lo-LA';
    public const LV_LV = 'lv-LV';
    public const LT_LT = 'lt-LT';
    public const MK_MK = 'mk-MK';
    public const MS_MY = 'ms-MY';
    public const ML_IN = 'ml-IN';
    public const MT_MT = 'mt-MT';
    public const MR_IN = 'mr-IN';
    public const MN_MN = 'mn-MN';
    public const NE_NP = 'ne-NP';
    public const NO_NO = 'no-NO';
    public const FA_IR = 'fa-IR';
    public const PL_PL = 'pl-PL';
    public const PT_PT = 'pt-PT';
    public const PT_BR = 'pt-BR';
    public const PA_GURU_IN = 'pa-Guru-IN';
    public const RO_RO = 'ro-RO';
    public const RU_RU = 'ru-RU';
    public const SR_RS = 'sr-RS';
    public const SI_LK = 'si-LK';
    public const SK_SK = 'sk-SK';
    public const SL_SI = 'sl-SI';
    public const ES_BO = 'es-BO';
    public const ES_AR = 'es-AR';
    public const ES_CL = 'es-CL';
    public const ES_CO = 'es-CO';
    public const ES_CR = 'es-CR';
    public const ES_CU = 'es-CU';
    public const ES_DO = 'es-DO';
    public const ES_EC = 'es-EC';
    public const ES_ES = 'es-ES';
    public const ES_GQ = 'es-GQ';
    public const ES_GT = 'es-GT';
    public const ES_HN = 'es-HN';
    public const ES_MX = 'es-MX';
    public const ES_NI = 'es-NI';
    public const ES_PA = 'es-PA';
    public const ES_PE = 'es-PE';
    public const ES_PR = 'es-PR';
    public const ES_PY = 'es-PY';
    public const ES_SV = 'es-SV';
    public const ES_US = 'es-US';
    public const ES_UY = 'es-UY';
    public const ES_VE = 'es-VE';
    public const SU_ID = 'su-ID';
    public const SW_TZ = 'sw-TZ';
    public const SW_KE = 'sw-KE';
    public const SV_SE = 'sv-SE';
    public const TA_IN = 'ta-IN';
    public const TA_LK = 'ta-LK';
    public const TA_MY = 'ta-MY';
    public const TA_SG = 'ta-SG';
    public const TE_IN = 'te-IN';
    public const TH_TH = 'th-TH';
    public const TR_TR = 'tr-TR';
    public const UK_UA = 'uk-UA';
    public const UR_IN = 'ur-IN';
    public const UR_PK = 'ur-PK';
    public const UZ_UZ = 'uz-UZ';
    public const VI_VN = 'vi-VN';
    public const ZU_ZA = 'zu-ZA';

    public const ALLOWED_VALUES = [
        'af-ZA',
        'sq-AL',
        'am-ET',
        'ar-KW',
        'ar-AE',
        'ar-BH',
        'ar-DZ',
        'ar-EG',
        'ar-IL',
        'ar-IQ',
        'ar-JO',
        'ar-LB',
        'ar-LY',
        'ar-MA',
        'ar-OM',
        'ar-PS',
        'ar-QA',
        'ar-SA',
        'ar-SY',
        'ar-TN',
        'ar-YE',
        'hy-AM',
        'az-AZ',
        'eu-ES',
        'bn-IN',
        'bn-BD',
        'bs-BA',
        'bg-BG',
        'my-MM',
        'ca-ES',
        'zh-CN',
        'zh-HK',
        'zh-TW',
        'hr-HR',
        'cs-CZ',
        'da-DK',
        'nl-NL',
        'nl-BE',
        'en-AU',
        'en-CA',
        'en-GB',
        'en-GH',
        'en-HK',
        'en-IE',
        'en-IN',
        'en-KE',
        'en-NG',
        'en-NZ',
        'en-PH',
        'en-PK',
        'en-SG',
        'en-TZ',
        'en-US',
        'en-ZA',
        'et-EE',
        'fil-PH',
        'fi-FI',
        'fr-BE',
        'fr-CA',
        'fr-CH',
        'fr-FR',
        'gl-ES',
        'ka-GE',
        'de-AT',
        'de-CH',
        'de-DE',
        'el-GR',
        'gu-IN',
        'he-IL',
        'hi-IN',
        'hu-HU',
        'is-IS',
        'id-ID',
        'ga-IE',
        'it-CH',
        'it-IT',
        'ja-JP',
        'jv-ID',
        'kn-IN',
        'kk-KZ',
        'km-KH',
        'ko-KR',
        'lo-LA',
        'lv-LV',
        'lt-LT',
        'mk-MK',
        'ms-MY',
        'ml-IN',
        'mt-MT',
        'mr-IN',
        'mn-MN',
        'ne-NP',
        'no-NO',
        'fa-IR',
        'pl-PL',
        'pt-PT',
        'pt-BR',
        'pa-Guru-IN',
        'ro-RO',
        'ru-RU',
        'sr-RS',
        'si-LK',
        'sk-SK',
        'sl-SI',
        'es-BO',
        'es-AR',
        'es-CL',
        'es-CO',
        'es-CR',
        'es-CU',
        'es-DO',
        'es-EC',
        'es-ES',
        'es-GQ',
        'es-GT',
        'es-HN',
        'es-MX',
        'es-NI',
        'es-PA',
        'es-PE',
        'es-PR',
        'es-PY',
        'es-SV',
        'es-US',
        'es-UY',
        'es-VE',
        'su-ID',
        'sw-TZ',
        'sw-KE',
        'sv-SE',
        'ta-IN',
        'ta-LK',
        'ta-MY',
        'ta-SG',
        'te-IN',
        'th-TH',
        'tr-TR',
        'uk-UA',
        'ur-IN',
        'ur-PK',
        'uz-UZ',
        'vi-VN',
        'zu-ZA',
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

    public static function AF_ZA(): CallTranscriptionLanguage
    {
        return new self('af-ZA');
    }

    public static function SQ_AL(): CallTranscriptionLanguage
    {
        return new self('sq-AL');
    }

    public static function AM_ET(): CallTranscriptionLanguage
    {
        return new self('am-ET');
    }

    public static function AR_KW(): CallTranscriptionLanguage
    {
        return new self('ar-KW');
    }

    public static function AR_AE(): CallTranscriptionLanguage
    {
        return new self('ar-AE');
    }

    public static function AR_BH(): CallTranscriptionLanguage
    {
        return new self('ar-BH');
    }

    public static function AR_DZ(): CallTranscriptionLanguage
    {
        return new self('ar-DZ');
    }

    public static function AR_EG(): CallTranscriptionLanguage
    {
        return new self('ar-EG');
    }

    public static function AR_IL(): CallTranscriptionLanguage
    {
        return new self('ar-IL');
    }

    public static function AR_IQ(): CallTranscriptionLanguage
    {
        return new self('ar-IQ');
    }

    public static function AR_JO(): CallTranscriptionLanguage
    {
        return new self('ar-JO');
    }

    public static function AR_LB(): CallTranscriptionLanguage
    {
        return new self('ar-LB');
    }

    public static function AR_LY(): CallTranscriptionLanguage
    {
        return new self('ar-LY');
    }

    public static function AR_MA(): CallTranscriptionLanguage
    {
        return new self('ar-MA');
    }

    public static function AR_OM(): CallTranscriptionLanguage
    {
        return new self('ar-OM');
    }

    public static function AR_PS(): CallTranscriptionLanguage
    {
        return new self('ar-PS');
    }

    public static function AR_QA(): CallTranscriptionLanguage
    {
        return new self('ar-QA');
    }

    public static function AR_SA(): CallTranscriptionLanguage
    {
        return new self('ar-SA');
    }

    public static function AR_SY(): CallTranscriptionLanguage
    {
        return new self('ar-SY');
    }

    public static function AR_TN(): CallTranscriptionLanguage
    {
        return new self('ar-TN');
    }

    public static function AR_YE(): CallTranscriptionLanguage
    {
        return new self('ar-YE');
    }

    public static function HY_AM(): CallTranscriptionLanguage
    {
        return new self('hy-AM');
    }

    public static function AZ_AZ(): CallTranscriptionLanguage
    {
        return new self('az-AZ');
    }

    public static function EU_ES(): CallTranscriptionLanguage
    {
        return new self('eu-ES');
    }

    public static function BN_IN(): CallTranscriptionLanguage
    {
        return new self('bn-IN');
    }

    public static function BN_BD(): CallTranscriptionLanguage
    {
        return new self('bn-BD');
    }

    public static function BS_BA(): CallTranscriptionLanguage
    {
        return new self('bs-BA');
    }

    public static function BG_BG(): CallTranscriptionLanguage
    {
        return new self('bg-BG');
    }

    public static function MY_MM(): CallTranscriptionLanguage
    {
        return new self('my-MM');
    }

    public static function CA_ES(): CallTranscriptionLanguage
    {
        return new self('ca-ES');
    }

    public static function ZH_CN(): CallTranscriptionLanguage
    {
        return new self('zh-CN');
    }

    public static function ZH_HK(): CallTranscriptionLanguage
    {
        return new self('zh-HK');
    }

    public static function ZH_TW(): CallTranscriptionLanguage
    {
        return new self('zh-TW');
    }

    public static function HR_HR(): CallTranscriptionLanguage
    {
        return new self('hr-HR');
    }

    public static function CS_CZ(): CallTranscriptionLanguage
    {
        return new self('cs-CZ');
    }

    public static function DA_DK(): CallTranscriptionLanguage
    {
        return new self('da-DK');
    }

    public static function NL_NL(): CallTranscriptionLanguage
    {
        return new self('nl-NL');
    }

    public static function NL_BE(): CallTranscriptionLanguage
    {
        return new self('nl-BE');
    }

    public static function EN_AU(): CallTranscriptionLanguage
    {
        return new self('en-AU');
    }

    public static function EN_CA(): CallTranscriptionLanguage
    {
        return new self('en-CA');
    }

    public static function EN_GB(): CallTranscriptionLanguage
    {
        return new self('en-GB');
    }

    public static function EN_GH(): CallTranscriptionLanguage
    {
        return new self('en-GH');
    }

    public static function EN_HK(): CallTranscriptionLanguage
    {
        return new self('en-HK');
    }

    public static function EN_IE(): CallTranscriptionLanguage
    {
        return new self('en-IE');
    }

    public static function EN_IN(): CallTranscriptionLanguage
    {
        return new self('en-IN');
    }

    public static function EN_KE(): CallTranscriptionLanguage
    {
        return new self('en-KE');
    }

    public static function EN_NG(): CallTranscriptionLanguage
    {
        return new self('en-NG');
    }

    public static function EN_NZ(): CallTranscriptionLanguage
    {
        return new self('en-NZ');
    }

    public static function EN_PH(): CallTranscriptionLanguage
    {
        return new self('en-PH');
    }

    public static function EN_PK(): CallTranscriptionLanguage
    {
        return new self('en-PK');
    }

    public static function EN_SG(): CallTranscriptionLanguage
    {
        return new self('en-SG');
    }

    public static function EN_TZ(): CallTranscriptionLanguage
    {
        return new self('en-TZ');
    }

    public static function EN_US(): CallTranscriptionLanguage
    {
        return new self('en-US');
    }

    public static function EN_ZA(): CallTranscriptionLanguage
    {
        return new self('en-ZA');
    }

    public static function ET_EE(): CallTranscriptionLanguage
    {
        return new self('et-EE');
    }

    public static function FIL_PH(): CallTranscriptionLanguage
    {
        return new self('fil-PH');
    }

    public static function FI_FI(): CallTranscriptionLanguage
    {
        return new self('fi-FI');
    }

    public static function FR_BE(): CallTranscriptionLanguage
    {
        return new self('fr-BE');
    }

    public static function FR_CA(): CallTranscriptionLanguage
    {
        return new self('fr-CA');
    }

    public static function FR_CH(): CallTranscriptionLanguage
    {
        return new self('fr-CH');
    }

    public static function FR_FR(): CallTranscriptionLanguage
    {
        return new self('fr-FR');
    }

    public static function GL_ES(): CallTranscriptionLanguage
    {
        return new self('gl-ES');
    }

    public static function KA_GE(): CallTranscriptionLanguage
    {
        return new self('ka-GE');
    }

    public static function DE_AT(): CallTranscriptionLanguage
    {
        return new self('de-AT');
    }

    public static function DE_CH(): CallTranscriptionLanguage
    {
        return new self('de-CH');
    }

    public static function DE_DE(): CallTranscriptionLanguage
    {
        return new self('de-DE');
    }

    public static function EL_GR(): CallTranscriptionLanguage
    {
        return new self('el-GR');
    }

    public static function GU_IN(): CallTranscriptionLanguage
    {
        return new self('gu-IN');
    }

    public static function HE_IL(): CallTranscriptionLanguage
    {
        return new self('he-IL');
    }

    public static function HI_IN(): CallTranscriptionLanguage
    {
        return new self('hi-IN');
    }

    public static function HU_HU(): CallTranscriptionLanguage
    {
        return new self('hu-HU');
    }

    public static function IS_IS(): CallTranscriptionLanguage
    {
        return new self('is-IS');
    }

    public static function ID_ID(): CallTranscriptionLanguage
    {
        return new self('id-ID');
    }

    public static function GA_IE(): CallTranscriptionLanguage
    {
        return new self('ga-IE');
    }

    public static function IT_CH(): CallTranscriptionLanguage
    {
        return new self('it-CH');
    }

    public static function IT_IT(): CallTranscriptionLanguage
    {
        return new self('it-IT');
    }

    public static function JA_JP(): CallTranscriptionLanguage
    {
        return new self('ja-JP');
    }

    public static function JV_ID(): CallTranscriptionLanguage
    {
        return new self('jv-ID');
    }

    public static function KN_IN(): CallTranscriptionLanguage
    {
        return new self('kn-IN');
    }

    public static function KK_KZ(): CallTranscriptionLanguage
    {
        return new self('kk-KZ');
    }

    public static function KM_KH(): CallTranscriptionLanguage
    {
        return new self('km-KH');
    }

    public static function KO_KR(): CallTranscriptionLanguage
    {
        return new self('ko-KR');
    }

    public static function LO_LA(): CallTranscriptionLanguage
    {
        return new self('lo-LA');
    }

    public static function LV_LV(): CallTranscriptionLanguage
    {
        return new self('lv-LV');
    }

    public static function LT_LT(): CallTranscriptionLanguage
    {
        return new self('lt-LT');
    }

    public static function MK_MK(): CallTranscriptionLanguage
    {
        return new self('mk-MK');
    }

    public static function MS_MY(): CallTranscriptionLanguage
    {
        return new self('ms-MY');
    }

    public static function ML_IN(): CallTranscriptionLanguage
    {
        return new self('ml-IN');
    }

    public static function MT_MT(): CallTranscriptionLanguage
    {
        return new self('mt-MT');
    }

    public static function MR_IN(): CallTranscriptionLanguage
    {
        return new self('mr-IN');
    }

    public static function MN_MN(): CallTranscriptionLanguage
    {
        return new self('mn-MN');
    }

    public static function NE_NP(): CallTranscriptionLanguage
    {
        return new self('ne-NP');
    }

    public static function NO_NO(): CallTranscriptionLanguage
    {
        return new self('no-NO');
    }

    public static function FA_IR(): CallTranscriptionLanguage
    {
        return new self('fa-IR');
    }

    public static function PL_PL(): CallTranscriptionLanguage
    {
        return new self('pl-PL');
    }

    public static function PT_PT(): CallTranscriptionLanguage
    {
        return new self('pt-PT');
    }

    public static function PT_BR(): CallTranscriptionLanguage
    {
        return new self('pt-BR');
    }

    public static function PA_GURU_IN(): CallTranscriptionLanguage
    {
        return new self('pa-Guru-IN');
    }

    public static function RO_RO(): CallTranscriptionLanguage
    {
        return new self('ro-RO');
    }

    public static function RU_RU(): CallTranscriptionLanguage
    {
        return new self('ru-RU');
    }

    public static function SR_RS(): CallTranscriptionLanguage
    {
        return new self('sr-RS');
    }

    public static function SI_LK(): CallTranscriptionLanguage
    {
        return new self('si-LK');
    }

    public static function SK_SK(): CallTranscriptionLanguage
    {
        return new self('sk-SK');
    }

    public static function SL_SI(): CallTranscriptionLanguage
    {
        return new self('sl-SI');
    }

    public static function ES_BO(): CallTranscriptionLanguage
    {
        return new self('es-BO');
    }

    public static function ES_AR(): CallTranscriptionLanguage
    {
        return new self('es-AR');
    }

    public static function ES_CL(): CallTranscriptionLanguage
    {
        return new self('es-CL');
    }

    public static function ES_CO(): CallTranscriptionLanguage
    {
        return new self('es-CO');
    }

    public static function ES_CR(): CallTranscriptionLanguage
    {
        return new self('es-CR');
    }

    public static function ES_CU(): CallTranscriptionLanguage
    {
        return new self('es-CU');
    }

    public static function ES_DO(): CallTranscriptionLanguage
    {
        return new self('es-DO');
    }

    public static function ES_EC(): CallTranscriptionLanguage
    {
        return new self('es-EC');
    }

    public static function ES_ES(): CallTranscriptionLanguage
    {
        return new self('es-ES');
    }

    public static function ES_GQ(): CallTranscriptionLanguage
    {
        return new self('es-GQ');
    }

    public static function ES_GT(): CallTranscriptionLanguage
    {
        return new self('es-GT');
    }

    public static function ES_HN(): CallTranscriptionLanguage
    {
        return new self('es-HN');
    }

    public static function ES_MX(): CallTranscriptionLanguage
    {
        return new self('es-MX');
    }

    public static function ES_NI(): CallTranscriptionLanguage
    {
        return new self('es-NI');
    }

    public static function ES_PA(): CallTranscriptionLanguage
    {
        return new self('es-PA');
    }

    public static function ES_PE(): CallTranscriptionLanguage
    {
        return new self('es-PE');
    }

    public static function ES_PR(): CallTranscriptionLanguage
    {
        return new self('es-PR');
    }

    public static function ES_PY(): CallTranscriptionLanguage
    {
        return new self('es-PY');
    }

    public static function ES_SV(): CallTranscriptionLanguage
    {
        return new self('es-SV');
    }

    public static function ES_US(): CallTranscriptionLanguage
    {
        return new self('es-US');
    }

    public static function ES_UY(): CallTranscriptionLanguage
    {
        return new self('es-UY');
    }

    public static function ES_VE(): CallTranscriptionLanguage
    {
        return new self('es-VE');
    }

    public static function SU_ID(): CallTranscriptionLanguage
    {
        return new self('su-ID');
    }

    public static function SW_TZ(): CallTranscriptionLanguage
    {
        return new self('sw-TZ');
    }

    public static function SW_KE(): CallTranscriptionLanguage
    {
        return new self('sw-KE');
    }

    public static function SV_SE(): CallTranscriptionLanguage
    {
        return new self('sv-SE');
    }

    public static function TA_IN(): CallTranscriptionLanguage
    {
        return new self('ta-IN');
    }

    public static function TA_LK(): CallTranscriptionLanguage
    {
        return new self('ta-LK');
    }

    public static function TA_MY(): CallTranscriptionLanguage
    {
        return new self('ta-MY');
    }

    public static function TA_SG(): CallTranscriptionLanguage
    {
        return new self('ta-SG');
    }

    public static function TE_IN(): CallTranscriptionLanguage
    {
        return new self('te-IN');
    }

    public static function TH_TH(): CallTranscriptionLanguage
    {
        return new self('th-TH');
    }

    public static function TR_TR(): CallTranscriptionLanguage
    {
        return new self('tr-TR');
    }

    public static function UK_UA(): CallTranscriptionLanguage
    {
        return new self('uk-UA');
    }

    public static function UR_IN(): CallTranscriptionLanguage
    {
        return new self('ur-IN');
    }

    public static function UR_PK(): CallTranscriptionLanguage
    {
        return new self('ur-PK');
    }

    public static function UZ_UZ(): CallTranscriptionLanguage
    {
        return new self('uz-UZ');
    }

    public static function VI_VN(): CallTranscriptionLanguage
    {
        return new self('vi-VN');
    }

    public static function ZU_ZA(): CallTranscriptionLanguage
    {
        return new self('zu-ZA');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
