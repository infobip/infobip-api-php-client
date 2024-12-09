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

final class WhatsAppPixKeyType implements EnumInterface
{
    public const CPF = 'CPF';
    public const CNPJ = 'CNPJ';
    public const EMAIL = 'EMAIL';
    public const PHONE = 'PHONE';
    public const EVP = 'EVP';

    public const ALLOWED_VALUES = [
        'CPF',
        'CNPJ',
        'EMAIL',
        'PHONE',
        'EVP',
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

    public static function CPF(): WhatsAppPixKeyType
    {
        return new self('CPF');
    }

    public static function CNPJ(): WhatsAppPixKeyType
    {
        return new self('CNPJ');
    }

    public static function EMAIL(): WhatsAppPixKeyType
    {
        return new self('EMAIL');
    }

    public static function PHONE(): WhatsAppPixKeyType
    {
        return new self('PHONE');
    }

    public static function EVP(): WhatsAppPixKeyType
    {
        return new self('EVP');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
