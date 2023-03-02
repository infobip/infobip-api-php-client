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

final class WhatsAppStatus implements EnumInterface
{
    public const APPROVED = 'APPROVED';
    public const IN_APPEAL = 'IN_APPEAL';
    public const PENDING = 'PENDING';
    public const REJECTED = 'REJECTED';
    public const PENDING_DELETION = 'PENDING_DELETION';
    public const DELETED = 'DELETED';
    public const REINSTATED = 'REINSTATED';
    public const FLAGGED = 'FLAGGED';
    public const FIRST_PAUSED = 'FIRST_PAUSED';
    public const SECOND_PAUSED = 'SECOND_PAUSED';
    public const DISABLED = 'DISABLED';

    public const ALLOWED_VALUES = [
        'APPROVED',
        'IN_APPEAL',
        'PENDING',
        'REJECTED',
        'PENDING_DELETION',
        'DELETED',
        'REINSTATED',
        'FLAGGED',
        'FIRST_PAUSED',
        'SECOND_PAUSED',
        'DISABLED',
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

    public static function APPROVED(): WhatsAppStatus
    {
        return new self('APPROVED');
    }

    public static function IN_APPEAL(): WhatsAppStatus
    {
        return new self('IN_APPEAL');
    }

    public static function PENDING(): WhatsAppStatus
    {
        return new self('PENDING');
    }

    public static function REJECTED(): WhatsAppStatus
    {
        return new self('REJECTED');
    }

    public static function PENDING_DELETION(): WhatsAppStatus
    {
        return new self('PENDING_DELETION');
    }

    public static function DELETED(): WhatsAppStatus
    {
        return new self('DELETED');
    }

    public static function REINSTATED(): WhatsAppStatus
    {
        return new self('REINSTATED');
    }

    public static function FLAGGED(): WhatsAppStatus
    {
        return new self('FLAGGED');
    }

    public static function FIRST_PAUSED(): WhatsAppStatus
    {
        return new self('FIRST_PAUSED');
    }

    public static function SECOND_PAUSED(): WhatsAppStatus
    {
        return new self('SECOND_PAUSED');
    }

    public static function DISABLED(): WhatsAppStatus
    {
        return new self('DISABLED');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
