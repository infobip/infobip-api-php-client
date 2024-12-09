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

class WhatsAppTemplateUpdatePushEvent
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected int $messageTemplateId,
        #[Assert\NotBlank]
        protected string $messageTemplateName,
        #[Assert\NotBlank]
        protected string $messageTemplateLanguage,
        #[Assert\NotBlank]
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected \DateTime $timestamp,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppTemplatePushEventChange $change,
        protected ?int $entityId = null,
        protected ?int $applicationId = null,
    ) {

    }


    public function getMessageTemplateId(): int
    {
        return $this->messageTemplateId;
    }

    public function setMessageTemplateId(int $messageTemplateId): self
    {
        $this->messageTemplateId = $messageTemplateId;
        return $this;
    }

    public function getMessageTemplateName(): string
    {
        return $this->messageTemplateName;
    }

    public function setMessageTemplateName(string $messageTemplateName): self
    {
        $this->messageTemplateName = $messageTemplateName;
        return $this;
    }

    public function getMessageTemplateLanguage(): mixed
    {
        return $this->messageTemplateLanguage;
    }

    public function setMessageTemplateLanguage($messageTemplateLanguage): self
    {
        $this->messageTemplateLanguage = $messageTemplateLanguage;
        return $this;
    }

    public function getTimestamp(): \DateTime
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTime $timestamp): self
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    public function getChange(): \Infobip\Model\WhatsAppTemplatePushEventChange
    {
        return $this->change;
    }

    public function setChange(\Infobip\Model\WhatsAppTemplatePushEventChange $change): self
    {
        $this->change = $change;
        return $this;
    }

    public function getEntityId(): int|null
    {
        return $this->entityId;
    }

    public function setEntityId(?int $entityId): self
    {
        $this->entityId = $entityId;
        return $this;
    }

    public function getApplicationId(): int|null
    {
        return $this->applicationId;
    }

    public function setApplicationId(?int $applicationId): self
    {
        $this->applicationId = $applicationId;
        return $this;
    }
}
