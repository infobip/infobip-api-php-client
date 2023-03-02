<?php

// phpcs:ignorefile

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

final class WhatsAppWebhookType implements EnumInterface
{
    public const TEXT = 'TEXT';
    public const IMAGE = 'IMAGE';
    public const DOCUMENT = 'DOCUMENT';
    public const STICKER = 'STICKER';
    public const LOCATION = 'LOCATION';
    public const CONTACT = 'CONTACT';
    public const VIDEO = 'VIDEO';
    public const VOICE = 'VOICE';
    public const AUDIO = 'AUDIO';
    public const BUTTON = 'BUTTON';
    public const INTERACTIVE_BUTTON_REPLY = 'INTERACTIVE_BUTTON_REPLY';
    public const INTERACTIVE_LIST_REPLY = 'INTERACTIVE_LIST_REPLY';
    public const ORDER = 'ORDER';
    public const UNSUPPORTED = 'UNSUPPORTED';

    public const ALLOWED_VALUES = [
        'TEXT',
        'IMAGE',
        'DOCUMENT',
        'STICKER',
        'LOCATION',
        'CONTACT',
        'VIDEO',
        'VOICE',
        'AUDIO',
        'BUTTON',
        'INTERACTIVE_BUTTON_REPLY',
        'INTERACTIVE_LIST_REPLY',
        'ORDER',
        'UNSUPPORTED',
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

    public static function TEXT(): WhatsAppWebhookType
    {
        return new self('TEXT');
    }

    public static function IMAGE(): WhatsAppWebhookType
    {
        return new self('IMAGE');
    }

    public static function DOCUMENT(): WhatsAppWebhookType
    {
        return new self('DOCUMENT');
    }

    public static function STICKER(): WhatsAppWebhookType
    {
        return new self('STICKER');
    }

    public static function LOCATION(): WhatsAppWebhookType
    {
        return new self('LOCATION');
    }

    public static function CONTACT(): WhatsAppWebhookType
    {
        return new self('CONTACT');
    }

    public static function VIDEO(): WhatsAppWebhookType
    {
        return new self('VIDEO');
    }

    public static function VOICE(): WhatsAppWebhookType
    {
        return new self('VOICE');
    }

    public static function AUDIO(): WhatsAppWebhookType
    {
        return new self('AUDIO');
    }

    public static function BUTTON(): WhatsAppWebhookType
    {
        return new self('BUTTON');
    }

    public static function INTERACTIVE_BUTTON_REPLY(): WhatsAppWebhookType
    {
        return new self('INTERACTIVE_BUTTON_REPLY');
    }

    public static function INTERACTIVE_LIST_REPLY(): WhatsAppWebhookType
    {
        return new self('INTERACTIVE_LIST_REPLY');
    }

    public static function ORDER(): WhatsAppWebhookType
    {
        return new self('ORDER');
    }

    public static function UNSUPPORTED(): WhatsAppWebhookType
    {
        return new self('UNSUPPORTED');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
