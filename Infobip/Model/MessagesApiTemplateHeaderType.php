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

final class MessagesApiTemplateHeaderType implements EnumInterface
{
    public const TEXT = 'TEXT';
    public const DOCUMENT = 'DOCUMENT';
    public const IMAGE = 'IMAGE';
    public const VIDEO = 'VIDEO';
    public const LOCATION = 'LOCATION';

    public const ALLOWED_VALUES = [
        'TEXT',
        'DOCUMENT',
        'IMAGE',
        'VIDEO',
        'LOCATION',
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

    public static function TEXT(): MessagesApiTemplateHeaderType
    {
        return new self('TEXT');
    }

    public static function DOCUMENT(): MessagesApiTemplateHeaderType
    {
        return new self('DOCUMENT');
    }

    public static function IMAGE(): MessagesApiTemplateHeaderType
    {
        return new self('IMAGE');
    }

    public static function VIDEO(): MessagesApiTemplateHeaderType
    {
        return new self('VIDEO');
    }

    public static function LOCATION(): MessagesApiTemplateHeaderType
    {
        return new self('LOCATION');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
