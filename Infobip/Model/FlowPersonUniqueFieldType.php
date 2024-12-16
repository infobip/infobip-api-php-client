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

final class FlowPersonUniqueFieldType implements EnumInterface
{
    public const EMAIL = 'EMAIL';
    public const PHONE = 'PHONE';
    public const FACEBOOK = 'FACEBOOK';
    public const LINE = 'LINE';
    public const APPLE_BUSINESS_CHAT = 'APPLE_BUSINESS_CHAT';

    public const ALLOWED_VALUES = [
        'EMAIL',
        'PHONE',
        'FACEBOOK',
        'LINE',
        'APPLE_BUSINESS_CHAT',
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

    public static function EMAIL(): FlowPersonUniqueFieldType
    {
        return new self('EMAIL');
    }

    public static function PHONE(): FlowPersonUniqueFieldType
    {
        return new self('PHONE');
    }

    public static function FACEBOOK(): FlowPersonUniqueFieldType
    {
        return new self('FACEBOOK');
    }

    public static function LINE(): FlowPersonUniqueFieldType
    {
        return new self('LINE');
    }

    public static function APPLE_BUSINESS_CHAT(): FlowPersonUniqueFieldType
    {
        return new self('APPLE_BUSINESS_CHAT');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
