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

final class MmsOutboundSegmentType implements EnumInterface
{
    public const TEXT = 'TEXT';
    public const LINK = 'LINK';
    public const SMIL = 'SMIL';
    public const UPLOADED_REFERENCE = 'UPLOADED_REFERENCE';

    public const ALLOWED_VALUES = [
        'TEXT',
        'LINK',
        'SMIL',
        'UPLOADED_REFERENCE',
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

    public static function TEXT(): MmsOutboundSegmentType
    {
        return new self('TEXT');
    }

    public static function LINK(): MmsOutboundSegmentType
    {
        return new self('LINK');
    }

    public static function SMIL(): MmsOutboundSegmentType
    {
        return new self('SMIL');
    }

    public static function UPLOADED_REFERENCE(): MmsOutboundSegmentType
    {
        return new self('UPLOADED_REFERENCE');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
