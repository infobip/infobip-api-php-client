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

final class MessagesApiTemplateButtonType implements EnumInterface
{
    public const QUICK_REPLY = 'QUICK_REPLY';
    public const OPEN_URL = 'OPEN_URL';
    public const PHONE_NUMBER = 'PHONE_NUMBER';
    public const FLOW = 'FLOW';
    public const COPY_CODE = 'COPY_CODE';
    public const CATALOG = 'CATALOG';
    public const MULTI_PRODUCT = 'MULTI_PRODUCT';

    public const ALLOWED_VALUES = [
        'QUICK_REPLY',
        'OPEN_URL',
        'PHONE_NUMBER',
        'FLOW',
        'COPY_CODE',
        'CATALOG',
        'MULTI_PRODUCT',
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

    public static function QUICK_REPLY(): MessagesApiTemplateButtonType
    {
        return new self('QUICK_REPLY');
    }

    public static function OPEN_URL(): MessagesApiTemplateButtonType
    {
        return new self('OPEN_URL');
    }

    public static function PHONE_NUMBER(): MessagesApiTemplateButtonType
    {
        return new self('PHONE_NUMBER');
    }

    public static function FLOW(): MessagesApiTemplateButtonType
    {
        return new self('FLOW');
    }

    public static function COPY_CODE(): MessagesApiTemplateButtonType
    {
        return new self('COPY_CODE');
    }

    public static function CATALOG(): MessagesApiTemplateButtonType
    {
        return new self('CATALOG');
    }

    public static function MULTI_PRODUCT(): MessagesApiTemplateButtonType
    {
        return new self('MULTI_PRODUCT');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
