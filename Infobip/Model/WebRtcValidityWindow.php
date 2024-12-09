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

class WebRtcValidityWindow
{
    /**
     * @param \Infobip\Model\DeliveryDay[] $acceptableDays
     */
    public function __construct(
        protected ?bool $oneTime = false,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $startTime = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $endTime = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcAcceptableHours $acceptableHours = null,
        protected ?array $acceptableDays = null,
    ) {

    }


    public function getOneTime(): bool|null
    {
        return $this->oneTime;
    }

    public function setOneTime(?bool $oneTime): self
    {
        $this->oneTime = $oneTime;
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

    public function getEndTime(): \DateTime|null
    {
        return $this->endTime;
    }

    public function setEndTime(?\DateTime $endTime): self
    {
        $this->endTime = $endTime;
        return $this;
    }

    public function getAcceptableHours(): \Infobip\Model\WebRtcAcceptableHours|null
    {
        return $this->acceptableHours;
    }

    public function setAcceptableHours(?\Infobip\Model\WebRtcAcceptableHours $acceptableHours): self
    {
        $this->acceptableHours = $acceptableHours;
        return $this;
    }

    /**
     * @return \Infobip\Model\DeliveryDay[]|null
     */
    public function getAcceptableDays(): ?array
    {
        return $this->acceptableDays;
    }

    /**
     * @param \Infobip\Model\DeliveryDay[]|null $acceptableDays Specify the days a link can be used. It is every day of the week, by default.
     */
    public function setAcceptableDays(?array $acceptableDays): self
    {
        $this->acceptableDays = $acceptableDays;
        return $this;
    }
}
