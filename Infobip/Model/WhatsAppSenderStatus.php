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

final class WhatsAppSenderStatus implements EnumInterface
{
    public const BANNED = 'BANNED';
    public const CONNECTED = 'CONNECTED';
    public const DELETED = 'DELETED';
    public const DISCONNECTED = 'DISCONNECTED';
    public const FLAGGED = 'FLAGGED';
    public const MIGRATED = 'MIGRATED';
    public const PENDING = 'PENDING';
    public const RATE_LIMITED = 'RATE_LIMITED';
    public const RESTRICTED = 'RESTRICTED';
    public const UNKNOWN = 'UNKNOWN';
    public const UNVERIFIED = 'UNVERIFIED';

    public const ALLOWED_VALUES = [
        'BANNED',
        'CONNECTED',
        'DELETED',
        'DISCONNECTED',
        'FLAGGED',
        'MIGRATED',
        'PENDING',
        'RATE_LIMITED',
        'RESTRICTED',
        'UNKNOWN',
        'UNVERIFIED',
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

    public static function BANNED(): WhatsAppSenderStatus
    {
        return new self('BANNED');
    }

    public static function CONNECTED(): WhatsAppSenderStatus
    {
        return new self('CONNECTED');
    }

    public static function DELETED(): WhatsAppSenderStatus
    {
        return new self('DELETED');
    }

    public static function DISCONNECTED(): WhatsAppSenderStatus
    {
        return new self('DISCONNECTED');
    }

    public static function FLAGGED(): WhatsAppSenderStatus
    {
        return new self('FLAGGED');
    }

    public static function MIGRATED(): WhatsAppSenderStatus
    {
        return new self('MIGRATED');
    }

    public static function PENDING(): WhatsAppSenderStatus
    {
        return new self('PENDING');
    }

    public static function RATE_LIMITED(): WhatsAppSenderStatus
    {
        return new self('RATE_LIMITED');
    }

    public static function RESTRICTED(): WhatsAppSenderStatus
    {
        return new self('RESTRICTED');
    }

    public static function UNKNOWN(): WhatsAppSenderStatus
    {
        return new self('UNKNOWN');
    }

    public static function UNVERIFIED(): WhatsAppSenderStatus
    {
        return new self('UNVERIFIED');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
