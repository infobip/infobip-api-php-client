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

final class CallsHmacAlgorithm implements EnumInterface
{
    public const MD5 = 'HMAC_MD5';
    public const SHA_1 = 'HMAC_SHA_1';
    public const SHA_224 = 'HMAC_SHA_224';
    public const SHA_256 = 'HMAC_SHA_256';
    public const SHA_384 = 'HMAC_SHA_384';
    public const SHA_512 = 'HMAC_SHA_512';

    public const ALLOWED_VALUES = [
        'HMAC_MD5',
        'HMAC_SHA_1',
        'HMAC_SHA_224',
        'HMAC_SHA_256',
        'HMAC_SHA_384',
        'HMAC_SHA_512',
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

    public static function MD5(): CallsHmacAlgorithm
    {
        return new self('HMAC_MD5');
    }

    public static function SHA_1(): CallsHmacAlgorithm
    {
        return new self('HMAC_SHA_1');
    }

    public static function SHA_224(): CallsHmacAlgorithm
    {
        return new self('HMAC_SHA_224');
    }

    public static function SHA_256(): CallsHmacAlgorithm
    {
        return new self('HMAC_SHA_256');
    }

    public static function SHA_384(): CallsHmacAlgorithm
    {
        return new self('HMAC_SHA_384');
    }

    public static function SHA_512(): CallsHmacAlgorithm
    {
        return new self('HMAC_SHA_512');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
