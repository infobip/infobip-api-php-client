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

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

class CallsHangupRequest implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsHangupRequest';

    public const OPENAPI_FORMATS = [
        'errorCode' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\Choice(['NORMAL_HANGUP','ANSWERED_ELSEWHERE','MACHINE_DETECTED','HUMAN_DETECTED','MAX_DURATION_REACHED','DEVICE_FORBIDDEN','DEVICE_NOT_FOUND','DEVICE_UNAVAILABLE','MEDIA_ERROR','NO_ANSWER','BUSY','CANCELLED','REJECTED','FORBIDDEN','INSUFFICIENT_FUNDS','UNAUTHENTICATED','DESTINATION_NOT_FOUND','DESTINATION_UNAVAILABLE','INVALID_DESTINATION','INVALID_REQUEST','REQUEST_TIMEOUT','NETWORK_ERROR','SERVICE_UNAVAILABLE','UNKNOWN','FEATURE_UNAVAILABLE','CONGESTION','URL_NOT_FOUND','URL_UNREACHABLE','INVALID_RESPONSE',])]

    protected ?string $errorCode = null,
    ) {
    }

    #[Ignore]
    public function getModelName(): string
    {
        return self::OPENAPI_MODEL_NAME;
    }

    #[Ignore]
    public static function getDiscriminator(): ?string
    {
        return self::DISCRIMINATOR;
    }

    public function getErrorCode(): mixed
    {
        return $this->errorCode;
    }

    public function setErrorCode($errorCode): self
    {
        $this->errorCode = $errorCode;
        return $this;
    }
}
