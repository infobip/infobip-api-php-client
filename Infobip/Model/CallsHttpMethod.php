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

final class CallsHttpMethod implements EnumInterface
{
    public const GET = 'GET';
    public const POST = 'POST';
    public const PUT = 'PUT';
    public const DELETE = 'DELETE';
    public const PATCH = 'PATCH';

    public const ALLOWED_VALUES = [
        'GET',
        'POST',
        'PUT',
        'DELETE',
        'PATCH',
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

    public static function GET(): CallsHttpMethod
    {
        return new self('GET');
    }

    public static function POST(): CallsHttpMethod
    {
        return new self('POST');
    }

    public static function PUT(): CallsHttpMethod
    {
        return new self('PUT');
    }

    public static function DELETE(): CallsHttpMethod
    {
        return new self('DELETE');
    }

    public static function PATCH(): CallsHttpMethod
    {
        return new self('PATCH');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
