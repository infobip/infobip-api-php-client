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

final class ViberOutboundContentType implements EnumInterface
{
    public const TEXT = 'TEXT';
    public const IMAGE = 'IMAGE';
    public const VIDEO = 'VIDEO';
    public const FILE = 'FILE';
    public const OTP_TEMPLATE = 'OTP_TEMPLATE';

    public const ALLOWED_VALUES = [
        'TEXT',
        'IMAGE',
        'VIDEO',
        'FILE',
        'OTP_TEMPLATE',
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

    public static function TEXT(): ViberOutboundContentType
    {
        return new self('TEXT');
    }

    public static function IMAGE(): ViberOutboundContentType
    {
        return new self('IMAGE');
    }

    public static function VIDEO(): ViberOutboundContentType
    {
        return new self('VIDEO');
    }

    public static function FILE(): ViberOutboundContentType
    {
        return new self('FILE');
    }

    public static function OTP_TEMPLATE(): ViberOutboundContentType
    {
        return new self('OTP_TEMPLATE');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
