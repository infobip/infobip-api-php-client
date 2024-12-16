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

final class FlowOrigin implements EnumInterface
{
    public const API = 'API';
    public const PORTAL = 'PORTAL';
    public const WEB_SDK = 'WEB_SDK';
    public const INTEGRATION = 'INTEGRATION';
    public const PUSH = 'PUSH';
    public const FACEBOOK = 'FACEBOOK';
    public const LINE = 'LINE';
    public const TELEGRAM = 'TELEGRAM';
    public const SALESFORCE = 'SALESFORCE';
    public const DYNAMICS = 'DYNAMICS';
    public const ZAPIER = 'ZAPIER';
    public const FORMS = 'FORMS';
    public const COMPUTED = 'COMPUTED';
    public const ANSWERS = 'ANSWERS';
    public const CONVERSATIONS = 'CONVERSATIONS';

    public const ALLOWED_VALUES = [
        'API',
        'PORTAL',
        'WEB_SDK',
        'INTEGRATION',
        'PUSH',
        'FACEBOOK',
        'LINE',
        'TELEGRAM',
        'SALESFORCE',
        'DYNAMICS',
        'ZAPIER',
        'FORMS',
        'COMPUTED',
        'ANSWERS',
        'CONVERSATIONS',
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

    public static function API(): FlowOrigin
    {
        return new self('API');
    }

    public static function PORTAL(): FlowOrigin
    {
        return new self('PORTAL');
    }

    public static function WEB_SDK(): FlowOrigin
    {
        return new self('WEB_SDK');
    }

    public static function INTEGRATION(): FlowOrigin
    {
        return new self('INTEGRATION');
    }

    public static function PUSH(): FlowOrigin
    {
        return new self('PUSH');
    }

    public static function FACEBOOK(): FlowOrigin
    {
        return new self('FACEBOOK');
    }

    public static function LINE(): FlowOrigin
    {
        return new self('LINE');
    }

    public static function TELEGRAM(): FlowOrigin
    {
        return new self('TELEGRAM');
    }

    public static function SALESFORCE(): FlowOrigin
    {
        return new self('SALESFORCE');
    }

    public static function DYNAMICS(): FlowOrigin
    {
        return new self('DYNAMICS');
    }

    public static function ZAPIER(): FlowOrigin
    {
        return new self('ZAPIER');
    }

    public static function FORMS(): FlowOrigin
    {
        return new self('FORMS');
    }

    public static function COMPUTED(): FlowOrigin
    {
        return new self('COMPUTED');
    }

    public static function ANSWERS(): FlowOrigin
    {
        return new self('ANSWERS');
    }

    public static function CONVERSATIONS(): FlowOrigin
    {
        return new self('CONVERSATIONS');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
