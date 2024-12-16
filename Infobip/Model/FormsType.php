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

final class FormsType implements EnumInterface
{
    public const OPT_IN = 'OPT_IN';
    public const OPT_OUT = 'OPT_OUT';
    public const FACEBOOK = 'FACEBOOK';
    public const LIVECHAT = 'LIVECHAT';
    public const APPLE = 'APPLE';
    public const CSAT = 'CSAT';
    public const WA_FLOW = 'WA_FLOW';

    public const ALLOWED_VALUES = [
        'OPT_IN',
        'OPT_OUT',
        'FACEBOOK',
        'LIVECHAT',
        'APPLE',
        'CSAT',
        'WA_FLOW',
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

    public static function OPT_IN(): FormsType
    {
        return new self('OPT_IN');
    }

    public static function OPT_OUT(): FormsType
    {
        return new self('OPT_OUT');
    }

    public static function FACEBOOK(): FormsType
    {
        return new self('FACEBOOK');
    }

    public static function LIVECHAT(): FormsType
    {
        return new self('LIVECHAT');
    }

    public static function APPLE(): FormsType
    {
        return new self('APPLE');
    }

    public static function CSAT(): FormsType
    {
        return new self('CSAT');
    }

    public static function WA_FLOW(): FormsType
    {
        return new self('WA_FLOW');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
