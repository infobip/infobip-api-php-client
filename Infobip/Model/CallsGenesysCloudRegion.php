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

final class CallsGenesysCloudRegion implements EnumInterface
{
    public const NA_US_EAST_1 = 'NA_US_EAST_1';
    public const NA_US_EAST_2 = 'NA_US_EAST_2';
    public const NA_US_WEST_2 = 'NA_US_WEST_2';
    public const CA_CENTRAL_1 = 'CA_CENTRAL_1';
    public const SA_EAST_1 = 'SA_EAST_1';
    public const EU_CENTRAL_1 = 'EU_CENTRAL_1';
    public const EU_CENTRAL_2 = 'EU_CENTRAL_2';
    public const EU_WEST_1 = 'EU_WEST_1';
    public const EU_WEST_2 = 'EU_WEST_2';
    public const ME_CENTRAL_1 = 'ME_CENTRAL_1';
    public const AP_SOUTH_1 = 'AP_SOUTH_1';
    public const AP_NORTHEAST_3 = 'AP_NORTHEAST_3';
    public const AP_NORTHEAST_2 = 'AP_NORTHEAST_2';
    public const AP_SOUTHEAST_2 = 'AP_SOUTHEAST_2';
    public const AP_NORTHEAST_1 = 'AP_NORTHEAST_1';

    public const ALLOWED_VALUES = [
        'NA_US_EAST_1',
        'NA_US_EAST_2',
        'NA_US_WEST_2',
        'CA_CENTRAL_1',
        'SA_EAST_1',
        'EU_CENTRAL_1',
        'EU_CENTRAL_2',
        'EU_WEST_1',
        'EU_WEST_2',
        'ME_CENTRAL_1',
        'AP_SOUTH_1',
        'AP_NORTHEAST_3',
        'AP_NORTHEAST_2',
        'AP_SOUTHEAST_2',
        'AP_NORTHEAST_1',
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

    public static function NA_US_EAST_1(): CallsGenesysCloudRegion
    {
        return new self('NA_US_EAST_1');
    }

    public static function NA_US_EAST_2(): CallsGenesysCloudRegion
    {
        return new self('NA_US_EAST_2');
    }

    public static function NA_US_WEST_2(): CallsGenesysCloudRegion
    {
        return new self('NA_US_WEST_2');
    }

    public static function CA_CENTRAL_1(): CallsGenesysCloudRegion
    {
        return new self('CA_CENTRAL_1');
    }

    public static function SA_EAST_1(): CallsGenesysCloudRegion
    {
        return new self('SA_EAST_1');
    }

    public static function EU_CENTRAL_1(): CallsGenesysCloudRegion
    {
        return new self('EU_CENTRAL_1');
    }

    public static function EU_CENTRAL_2(): CallsGenesysCloudRegion
    {
        return new self('EU_CENTRAL_2');
    }

    public static function EU_WEST_1(): CallsGenesysCloudRegion
    {
        return new self('EU_WEST_1');
    }

    public static function EU_WEST_2(): CallsGenesysCloudRegion
    {
        return new self('EU_WEST_2');
    }

    public static function ME_CENTRAL_1(): CallsGenesysCloudRegion
    {
        return new self('ME_CENTRAL_1');
    }

    public static function AP_SOUTH_1(): CallsGenesysCloudRegion
    {
        return new self('AP_SOUTH_1');
    }

    public static function AP_NORTHEAST_3(): CallsGenesysCloudRegion
    {
        return new self('AP_NORTHEAST_3');
    }

    public static function AP_NORTHEAST_2(): CallsGenesysCloudRegion
    {
        return new self('AP_NORTHEAST_2');
    }

    public static function AP_SOUTHEAST_2(): CallsGenesysCloudRegion
    {
        return new self('AP_SOUTHEAST_2');
    }

    public static function AP_NORTHEAST_1(): CallsGenesysCloudRegion
    {
        return new self('AP_NORTHEAST_1');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
