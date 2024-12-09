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

final class MmsMessageErrorGroup implements EnumInterface
{
    public const OK = 'OK';
    public const HANDSET_ERRORS = 'HANDSET_ERRORS';
    public const USER_ERRORS = 'USER_ERRORS';
    public const OPERATOR_ERRORS = 'OPERATOR_ERRORS';

    public const ALLOWED_VALUES = [
        'OK',
        'HANDSET_ERRORS',
        'USER_ERRORS',
        'OPERATOR_ERRORS',
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

    public static function OK(): MmsMessageErrorGroup
    {
        return new self('OK');
    }

    public static function HANDSET_ERRORS(): MmsMessageErrorGroup
    {
        return new self('HANDSET_ERRORS');
    }

    public static function USER_ERRORS(): MmsMessageErrorGroup
    {
        return new self('USER_ERRORS');
    }

    public static function OPERATOR_ERRORS(): MmsMessageErrorGroup
    {
        return new self('OPERATOR_ERRORS');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
