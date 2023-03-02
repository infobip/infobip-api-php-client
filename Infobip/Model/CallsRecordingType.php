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

final class CallsRecordingType implements EnumInterface
{
    public const AUDIO = 'AUDIO';
    public const AUDIO_AND_VIDEO = 'AUDIO_AND_VIDEO';

    public const ALLOWED_VALUES = [
        'AUDIO',
        'AUDIO_AND_VIDEO',
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

    public static function AUDIO(): CallsRecordingType
    {
        return new self('AUDIO');
    }

    public static function AUDIO_AND_VIDEO(): CallsRecordingType
    {
        return new self('AUDIO_AND_VIDEO');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
