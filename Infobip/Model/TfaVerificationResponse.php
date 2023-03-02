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

class TfaVerificationResponse implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'TfaVerificationResponse';

    public const OPENAPI_FORMATS = [
        'verifications' => null
    ];

    /**
     * @param \Infobip\Model\TfaVerification[] $verifications
     */
    public function __construct(
        protected ?array $verifications = null,
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

    /**
     * @return \Infobip\Model\TfaVerification[]|null
     */
    public function getVerifications(): ?array
    {
        return $this->verifications;
    }

    /**
     * @param \Infobip\Model\TfaVerification[]|null $verifications Collection of verifications
     */
    public function setVerifications(?array $verifications): self
    {
        $this->verifications = $verifications;
        return $this;
    }
}
