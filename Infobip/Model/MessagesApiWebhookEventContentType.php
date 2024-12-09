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

final class MessagesApiWebhookEventContentType implements EnumInterface
{
    public const TEXT = 'TEXT';
    public const SUBJECT = 'SUBJECT';
    public const IMAGE = 'IMAGE';
    public const AUDIO = 'AUDIO';
    public const VIDEO = 'VIDEO';
    public const DOCUMENT = 'DOCUMENT';
    public const FILE = 'FILE';
    public const BUTTON_REPLY = 'BUTTON_REPLY';
    public const LIST_REPLY = 'LIST_REPLY';
    public const LOCATION = 'LOCATION';
    public const AUTHENTICATION_RESPONSE = 'AUTHENTICATION_RESPONSE';

    public const ALLOWED_VALUES = [
        'TEXT',
        'SUBJECT',
        'IMAGE',
        'AUDIO',
        'VIDEO',
        'DOCUMENT',
        'FILE',
        'BUTTON_REPLY',
        'LIST_REPLY',
        'LOCATION',
        'AUTHENTICATION_RESPONSE',
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

    public static function TEXT(): MessagesApiWebhookEventContentType
    {
        return new self('TEXT');
    }

    public static function SUBJECT(): MessagesApiWebhookEventContentType
    {
        return new self('SUBJECT');
    }

    public static function IMAGE(): MessagesApiWebhookEventContentType
    {
        return new self('IMAGE');
    }

    public static function AUDIO(): MessagesApiWebhookEventContentType
    {
        return new self('AUDIO');
    }

    public static function VIDEO(): MessagesApiWebhookEventContentType
    {
        return new self('VIDEO');
    }

    public static function DOCUMENT(): MessagesApiWebhookEventContentType
    {
        return new self('DOCUMENT');
    }

    public static function FILE(): MessagesApiWebhookEventContentType
    {
        return new self('FILE');
    }

    public static function BUTTON_REPLY(): MessagesApiWebhookEventContentType
    {
        return new self('BUTTON_REPLY');
    }

    public static function LIST_REPLY(): MessagesApiWebhookEventContentType
    {
        return new self('LIST_REPLY');
    }

    public static function LOCATION(): MessagesApiWebhookEventContentType
    {
        return new self('LOCATION');
    }

    public static function AUTHENTICATION_RESPONSE(): MessagesApiWebhookEventContentType
    {
        return new self('AUTHENTICATION_RESPONSE');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
