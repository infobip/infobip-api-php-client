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

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class WhatsAppSenderQuality
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $sender,
        #[Assert\NotBlank]
        protected string $qualityRating,
        #[Assert\NotBlank]
        protected string $status,
        #[Assert\NotBlank]
        protected string $currentLimit,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $lastUpdated = null,
    ) {

    }


    public function getSender(): string
    {
        return $this->sender;
    }

    public function setSender(string $sender): self
    {
        $this->sender = $sender;
        return $this;
    }

    public function getQualityRating(): mixed
    {
        return $this->qualityRating;
    }

    public function setQualityRating($qualityRating): self
    {
        $this->qualityRating = $qualityRating;
        return $this;
    }

    public function getStatus(): mixed
    {
        return $this->status;
    }

    public function setStatus($status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getCurrentLimit(): mixed
    {
        return $this->currentLimit;
    }

    public function setCurrentLimit($currentLimit): self
    {
        $this->currentLimit = $currentLimit;
        return $this;
    }

    public function getLastUpdated(): \DateTime|null
    {
        return $this->lastUpdated;
    }

    public function setLastUpdated(?\DateTime $lastUpdated): self
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }
}
