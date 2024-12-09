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

final class CallsAnonymizationType implements EnumInterface
{
    public const NONE = 'NONE';
    public const REMOTE_PARTY_ID = 'REMOTE_PARTY_ID';
    public const ASSERTED_IDENTITY = 'ASSERTED_IDENTITY';
    public const PREFERRED_IDENTITY = 'PREFERRED_IDENTITY';

    public const ALLOWED_VALUES = [
        'NONE',
        'REMOTE_PARTY_ID',
        'ASSERTED_IDENTITY',
        'PREFERRED_IDENTITY',
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

    public static function NONE(): CallsAnonymizationType
    {
        return new self('NONE');
    }

    public static function REMOTE_PARTY_ID(): CallsAnonymizationType
    {
        return new self('REMOTE_PARTY_ID');
    }

    public static function ASSERTED_IDENTITY(): CallsAnonymizationType
    {
        return new self('ASSERTED_IDENTITY');
    }

    public static function PREFERRED_IDENTITY(): CallsAnonymizationType
    {
        return new self('PREFERRED_IDENTITY');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
