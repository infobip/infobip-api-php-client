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

use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class CallsRecordedIvrFile
{
    /**
     */
    public function __construct(
        protected ?string $messageId = null,
        protected ?string $from = null,
        protected ?string $to = null,
        protected ?string $scenarioId = null,
        protected ?string $groupId = null,
        protected ?string $url = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $recordedAt = null,
    ) {

    }


    public function getMessageId(): string|null
    {
        return $this->messageId;
    }

    public function setMessageId(?string $messageId): self
    {
        $this->messageId = $messageId;
        return $this;
    }

    public function getFrom(): string|null
    {
        return $this->from;
    }

    public function setFrom(?string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getTo(): string|null
    {
        return $this->to;
    }

    public function setTo(?string $to): self
    {
        $this->to = $to;
        return $this;
    }

    public function getScenarioId(): string|null
    {
        return $this->scenarioId;
    }

    public function setScenarioId(?string $scenarioId): self
    {
        $this->scenarioId = $scenarioId;
        return $this;
    }

    public function getGroupId(): string|null
    {
        return $this->groupId;
    }

    public function setGroupId(?string $groupId): self
    {
        $this->groupId = $groupId;
        return $this;
    }

    public function getUrl(): string|null
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getRecordedAt(): \DateTime|null
    {
        return $this->recordedAt;
    }

    public function setRecordedAt(?\DateTime $recordedAt): self
    {
        $this->recordedAt = $recordedAt;
        return $this;
    }
}
