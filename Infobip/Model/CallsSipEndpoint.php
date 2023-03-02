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

class CallsSipEndpoint extends CallEndpoint
{
    public const DISCRIMINATOR = 'type';
    public const OPENAPI_MODEL_NAME = 'CallsSipEndpoint';

    public const TYPE = 'SIP';

    public const OPENAPI_FORMATS = [
        'username' => null,
        'sipTrunkId' => null,
        'sipTrunkGroupId' => null,
        'customHeaders' => null
    ];

    /**
     * @param array<string,string> $customHeaders
     */
    public function __construct(
        #[Assert\NotBlank]

    protected string $username,
        protected ?string $sipTrunkId = null,
        protected ?string $sipTrunkGroupId = null,
        protected ?array $customHeaders = null,
    ) {
        $modelDiscriminatorValue = 'SIP';

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

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getSipTrunkId(): string|null
    {
        return $this->sipTrunkId;
    }

    public function setSipTrunkId(?string $sipTrunkId): self
    {
        $this->sipTrunkId = $sipTrunkId;
        return $this;
    }

    public function getSipTrunkGroupId(): string|null
    {
        return $this->sipTrunkGroupId;
    }

    public function setSipTrunkGroupId(?string $sipTrunkGroupId): self
    {
        $this->sipTrunkGroupId = $sipTrunkGroupId;
        return $this;
    }

    /**
     * @return array<string,string>|null
     */
    public function getCustomHeaders()
    {
        return $this->customHeaders;
    }

    /**
     * @param array<string,string>|null $customHeaders Custom headers.
     */
    public function setCustomHeaders(?array $customHeaders): self
    {
        $this->customHeaders = $customHeaders;
        return $this;
    }
}
