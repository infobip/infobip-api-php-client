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

final class MessagesApiCarouselTemplateButtonType implements EnumInterface
{
    public const QUICK_REPLY = 'QUICK_REPLY';
    public const OPEN_URL = 'OPEN_URL';
    public const PHONE_NUMBER = 'PHONE_NUMBER';

    public const ALLOWED_VALUES = [
        'QUICK_REPLY',
        'OPEN_URL',
        'PHONE_NUMBER',
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

    public static function QUICK_REPLY(): MessagesApiCarouselTemplateButtonType
    {
        return new self('QUICK_REPLY');
    }

    public static function OPEN_URL(): MessagesApiCarouselTemplateButtonType
    {
        return new self('OPEN_URL');
    }

    public static function PHONE_NUMBER(): MessagesApiCarouselTemplateButtonType
    {
        return new self('PHONE_NUMBER');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
