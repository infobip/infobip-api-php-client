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

final class CallsSipTrunkActionStatus implements EnumInterface
{
    public const CREATING = 'CREATING';
    public const UPDATING = 'UPDATING';
    public const DELETING = 'DELETING';
    public const FAILED = 'FAILED';
    public const RESET = 'RESET';
    public const SUCCESS = 'SUCCESS';

    public const ALLOWED_VALUES = [
        'CREATING',
        'UPDATING',
        'DELETING',
        'FAILED',
        'RESET',
        'SUCCESS',
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

    public static function CREATING(): CallsSipTrunkActionStatus
    {
        return new self('CREATING');
    }

    public static function UPDATING(): CallsSipTrunkActionStatus
    {
        return new self('UPDATING');
    }

    public static function DELETING(): CallsSipTrunkActionStatus
    {
        return new self('DELETING');
    }

    public static function FAILED(): CallsSipTrunkActionStatus
    {
        return new self('FAILED');
    }

    public static function RESET(): CallsSipTrunkActionStatus
    {
        return new self('RESET');
    }

    public static function SUCCESS(): CallsSipTrunkActionStatus
    {
        return new self('SUCCESS');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
