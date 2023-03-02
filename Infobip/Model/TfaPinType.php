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

final class TfaPinType implements EnumInterface
{
    public const NUMERIC = 'NUMERIC';
    public const ALPHA = 'ALPHA';
    public const HEX = 'HEX';
    public const ALPHANUMERIC = 'ALPHANUMERIC';

    public const ALLOWED_VALUES = [
        'NUMERIC',
        'ALPHA',
        'HEX',
        'ALPHANUMERIC',
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

    public static function NUMERIC(): TfaPinType
    {
        return new self('NUMERIC');
    }

    public static function ALPHA(): TfaPinType
    {
        return new self('ALPHA');
    }

    public static function HEX(): TfaPinType
    {
        return new self('HEX');
    }

    public static function ALPHANUMERIC(): TfaPinType
    {
        return new self('ALPHANUMERIC');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
