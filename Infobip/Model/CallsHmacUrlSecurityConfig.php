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

class CallsHmacUrlSecurityConfig extends CallsUrlSecurityConfig
{
    public const DISCRIMINATOR = 'type';
    public const OPENAPI_MODEL_NAME = 'CallsHmacUrlSecurityConfig';

    public const TYPE = 'HMAC';

    public const OPENAPI_FORMATS = [
        'secretKey' => null,
        'algorithm' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]

    protected string $secretKey,
        #[Assert\NotBlank]
    #[Assert\Choice(['HMAC_MD5','HMAC_SHA_1','HMAC_SHA_224','HMAC_SHA_256','HMAC_SHA_384','HMAC_SHA_512',])]

    protected string $algorithm,
    ) {
        $modelDiscriminatorValue = 'HMAC';

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
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

    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    public function setSecretKey(string $secretKey): self
    {
        $this->secretKey = $secretKey;
        return $this;
    }

    public function getAlgorithm(): mixed
    {
        return $this->algorithm;
    }

    public function setAlgorithm($algorithm): self
    {
        $this->algorithm = $algorithm;
        return $this;
    }
}
