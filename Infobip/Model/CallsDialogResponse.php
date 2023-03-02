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

class CallsDialogResponse implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsDialogResponse';

    public const OPENAPI_FORMATS = [
        'id' => null,
        'applicationId' => null,
        'state' => null,
        'startTime' => 'date-time',
        'establishTime' => 'date-time',
        'endTime' => 'date-time',
        'parentCall' => null,
        'childCall' => null
    ];

    /**
     */
    public function __construct(
        protected ?string $id = null,
        protected ?string $applicationId = null,
        #[Assert\Choice(['CREATED','ESTABLISHED','FINISHED','FAILED',])]

    protected ?string $state = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]

    protected ?\DateTime $startTime = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]

    protected ?\DateTime $establishTime = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]

    protected ?\DateTime $endTime = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\Call $parentCall = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\Call $childCall = null,
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

    public function getId(): string|null
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getApplicationId(): string|null
    {
        return $this->applicationId;
    }

    public function setApplicationId(?string $applicationId): self
    {
        $this->applicationId = $applicationId;
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

    public function getStartTime(): \DateTime|null
    {
        return $this->startTime;
    }

    public function setStartTime(?\DateTime $startTime): self
    {
        $this->startTime = $startTime;
        return $this;
    }

    public function getEstablishTime(): \DateTime|null
    {
        return $this->establishTime;
    }

    public function setEstablishTime(?\DateTime $establishTime): self
    {
        $this->establishTime = $establishTime;
        return $this;
    }

    public function getEndTime(): \DateTime|null
    {
        return $this->endTime;
    }

    public function setEndTime(?\DateTime $endTime): self
    {
        $this->endTime = $endTime;
        return $this;
    }

    public function getParentCall(): \Infobip\Model\Call|null
    {
        return $this->parentCall;
    }

    public function setParentCall(?\Infobip\Model\Call $parentCall): self
    {
        $this->parentCall = $parentCall;
        return $this;
    }

    public function getChildCall(): \Infobip\Model\Call|null
    {
        return $this->childCall;
    }

    public function setChildCall(?\Infobip\Model\Call $childCall): self
    {
        $this->childCall = $childCall;
        return $this;
    }
}
