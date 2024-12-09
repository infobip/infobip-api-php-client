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

class WhatsAppPaymentTransaction
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $id,
        #[Assert\NotBlank]
        protected string $type,
        #[Assert\NotBlank]
        protected string $status,
        #[Assert\NotBlank]
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected \DateTime $createdTimestamp,
        #[Assert\NotBlank]
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected \DateTime $updatedTimestamp,
    ) {

    }


    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): mixed
    {
        return $this->type;
    }

    public function setType($type): self
    {
        $this->type = $type;
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

    public function getCreatedTimestamp(): \DateTime
    {
        return $this->createdTimestamp;
    }

    public function setCreatedTimestamp(\DateTime $createdTimestamp): self
    {
        $this->createdTimestamp = $createdTimestamp;
        return $this;
    }

    public function getUpdatedTimestamp(): \DateTime
    {
        return $this->updatedTimestamp;
    }

    public function setUpdatedTimestamp(\DateTime $updatedTimestamp): self
    {
        $this->updatedTimestamp = $updatedTimestamp;
        return $this;
    }
}