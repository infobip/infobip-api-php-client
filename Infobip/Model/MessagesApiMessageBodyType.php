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

final class MessagesApiMessageBodyType implements EnumInterface
{
    public const TEXT = 'TEXT';
    public const IMAGE = 'IMAGE';
    public const VIDEO = 'VIDEO';
    public const DOCUMENT = 'DOCUMENT';
    public const RICH_LINK = 'RICH_LINK';
    public const AUTHENTICATION_REQUEST = 'AUTHENTICATION_REQUEST';
    public const _LIST = 'LIST';
    public const CAROUSEL = 'CAROUSEL';
    public const LOCATION = 'LOCATION';
    public const CONTACT = 'CONTACT';
    public const STICKER = 'STICKER';

    public const ALLOWED_VALUES = [
        'TEXT',
        'IMAGE',
        'VIDEO',
        'DOCUMENT',
        'RICH_LINK',
        'AUTHENTICATION_REQUEST',
        'LIST',
        'CAROUSEL',
        'LOCATION',
        'CONTACT',
        'STICKER',
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

    public static function TEXT(): MessagesApiMessageBodyType
    {
        return new self('TEXT');
    }

    public static function IMAGE(): MessagesApiMessageBodyType
    {
        return new self('IMAGE');
    }

    public static function VIDEO(): MessagesApiMessageBodyType
    {
        return new self('VIDEO');
    }

    public static function DOCUMENT(): MessagesApiMessageBodyType
    {
        return new self('DOCUMENT');
    }

    public static function RICH_LINK(): MessagesApiMessageBodyType
    {
        return new self('RICH_LINK');
    }

    public static function AUTHENTICATION_REQUEST(): MessagesApiMessageBodyType
    {
        return new self('AUTHENTICATION_REQUEST');
    }

    public static function _LIST(): MessagesApiMessageBodyType
    {
        return new self('LIST');
    }

    public static function CAROUSEL(): MessagesApiMessageBodyType
    {
        return new self('CAROUSEL');
    }

    public static function LOCATION(): MessagesApiMessageBodyType
    {
        return new self('LOCATION');
    }

    public static function CONTACT(): MessagesApiMessageBodyType
    {
        return new self('CONTACT');
    }

    public static function STICKER(): MessagesApiMessageBodyType
    {
        return new self('STICKER');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
