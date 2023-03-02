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

class CallsParticipant implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsParticipant';

    public const OPENAPI_FORMATS = [
        'callId' => null,
        'endpoint' => null,
        'state' => null,
        'joinTime' => 'date-time',
        'media' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\Valid]
    #[Assert\NotBlank]

    protected \Infobip\Model\CallEndpoint $endpoint,
        protected ?string $callId = null,
        #[Assert\Choice(['JOINING','JOINED',])]

    protected ?string $state = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]

    protected ?\DateTime $joinTime = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsMediaProperties $media = null,
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

    public function getCallId(): string|null
    {
        return $this->callId;
    }

    public function setCallId(?string $callId): self
    {
        $this->callId = $callId;
        return $this;
    }

    public function getEndpoint(): \Infobip\Model\CallEndpoint
    {
        return $this->endpoint;
    }

    public function setEndpoint(\Infobip\Model\CallEndpoint $endpoint): self
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    public function getState(): mixed
    {
        return $this->state;
    }

    public function setState($state): self
    {
        $this->state = $state;
        return $this;
    }

    public function getJoinTime(): \DateTime|null
    {
        return $this->joinTime;
    }

    public function setJoinTime(?\DateTime $joinTime): self
    {
        $this->joinTime = $joinTime;
        return $this;
    }

    public function getMedia(): \Infobip\Model\CallsMediaProperties|null
    {
        return $this->media;
    }

    public function setMedia(?\Infobip\Model\CallsMediaProperties $media): self
    {
        $this->media = $media;
        return $this;
    }
}
