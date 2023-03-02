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

final class WebhookOmniChannel implements EnumInterface
{
    public const WHATSAPP = 'WHATSAPP';
    public const VIBER = 'VIBER';
    public const FACEBOOK = 'FACEBOOK';
    public const LINE = 'LINE';
    public const VK = 'VK';

    public const ALLOWED_VALUES = [
        'WHATSAPP',
        'VIBER',
        'FACEBOOK',
        'LINE',
        'VK',
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

    public static function WHATSAPP(): WebhookOmniChannel
    {
        return new self('WHATSAPP');
    }

    public static function VIBER(): WebhookOmniChannel
    {
        return new self('VIBER');
    }

    public static function FACEBOOK(): WebhookOmniChannel
    {
        return new self('FACEBOOK');
    }

    public static function LINE(): WebhookOmniChannel
    {
        return new self('LINE');
    }

    public static function VK(): WebhookOmniChannel
    {
        return new self('VK');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
