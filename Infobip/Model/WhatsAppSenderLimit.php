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

final class WhatsAppSenderLimit implements EnumInterface
{
    public const LIMIT_NA = 'LIMIT_NA';
    public const LIMIT_50 = 'LIMIT_50';
    public const LIMIT_250 = 'LIMIT_250';
    public const LIMIT_1_K = 'LIMIT_1K';
    public const LIMIT_10_K = 'LIMIT_10K';
    public const LIMIT_100_K = 'LIMIT_100K';
    public const UNLIMITED = 'UNLIMITED';

    public const ALLOWED_VALUES = [
        'LIMIT_NA',
        'LIMIT_50',
        'LIMIT_250',
        'LIMIT_1K',
        'LIMIT_10K',
        'LIMIT_100K',
        'UNLIMITED',
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

    public static function LIMIT_NA(): WhatsAppSenderLimit
    {
        return new self('LIMIT_NA');
    }

    public static function LIMIT_50(): WhatsAppSenderLimit
    {
        return new self('LIMIT_50');
    }

    public static function LIMIT_250(): WhatsAppSenderLimit
    {
        return new self('LIMIT_250');
    }

    public static function LIMIT_1_K(): WhatsAppSenderLimit
    {
        return new self('LIMIT_1K');
    }

    public static function LIMIT_10_K(): WhatsAppSenderLimit
    {
        return new self('LIMIT_10K');
    }

    public static function LIMIT_100_K(): WhatsAppSenderLimit
    {
        return new self('LIMIT_100K');
    }

    public static function UNLIMITED(): WhatsAppSenderLimit
    {
        return new self('UNLIMITED');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
