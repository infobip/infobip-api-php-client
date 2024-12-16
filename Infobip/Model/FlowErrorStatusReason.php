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

final class FlowErrorStatusReason implements EnumInterface
{
    public const INVALID_CONTACT = 'REJECTED_INVALID_CONTACT';
    public const ATTRIBUTE_MISSED = 'REJECTED_ATTRIBUTE_MISSED';
    public const PERSON_IN_FLOW = 'REJECTED_PERSON_IN_FLOW';
    public const PERSON_NOT_ALLOWED_TO_REENTER = 'REJECTED_PERSON_NOT_ALLOWED_TO_REENTER';
    public const FLOW_ERROR_UNKNOWN = 'REJECTED_FLOW_ERROR_UNKNOWN';
    public const NOT_ENOUGH_CREDITS = 'REJECTED_NOT_ENOUGH_CREDITS';
    public const CDP_ERROR_UNKNOWN = 'REJECTED_CDP_ERROR_UNKNOWN';

    public const ALLOWED_VALUES = [
        'REJECTED_INVALID_CONTACT',
        'REJECTED_ATTRIBUTE_MISSED',
        'REJECTED_PERSON_IN_FLOW',
        'REJECTED_PERSON_NOT_ALLOWED_TO_REENTER',
        'REJECTED_FLOW_ERROR_UNKNOWN',
        'REJECTED_NOT_ENOUGH_CREDITS',
        'REJECTED_CDP_ERROR_UNKNOWN',
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

    public static function INVALID_CONTACT(): FlowErrorStatusReason
    {
        return new self('REJECTED_INVALID_CONTACT');
    }

    public static function ATTRIBUTE_MISSED(): FlowErrorStatusReason
    {
        return new self('REJECTED_ATTRIBUTE_MISSED');
    }

    public static function PERSON_IN_FLOW(): FlowErrorStatusReason
    {
        return new self('REJECTED_PERSON_IN_FLOW');
    }

    public static function PERSON_NOT_ALLOWED_TO_REENTER(): FlowErrorStatusReason
    {
        return new self('REJECTED_PERSON_NOT_ALLOWED_TO_REENTER');
    }

    public static function FLOW_ERROR_UNKNOWN(): FlowErrorStatusReason
    {
        return new self('REJECTED_FLOW_ERROR_UNKNOWN');
    }

    public static function NOT_ENOUGH_CREDITS(): FlowErrorStatusReason
    {
        return new self('REJECTED_NOT_ENOUGH_CREDITS');
    }

    public static function CDP_ERROR_UNKNOWN(): FlowErrorStatusReason
    {
        return new self('REJECTED_CDP_ERROR_UNKNOWN');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
