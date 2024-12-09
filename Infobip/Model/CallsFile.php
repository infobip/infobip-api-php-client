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

class CallsFile
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $name,
        #[Assert\NotBlank]
        protected string $fileFormat,
        protected ?string $id = null,
        protected ?int $size = null,
        protected ?string $creationMethod = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $creationTime = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $expirationTime = null,
        protected ?int $duration = null,
    ) {

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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getFileFormat(): mixed
    {
        return $this->fileFormat;
    }

    public function setFileFormat($fileFormat): self
    {
        $this->fileFormat = $fileFormat;
        return $this;
    }

    public function getSize(): int|null
    {
        return $this->size;
    }

    public function setSize(?int $size): self
    {
        $this->size = $size;
        return $this;
    }

    public function getCreationMethod(): mixed
    {
        return $this->creationMethod;
    }

    public function setCreationMethod($creationMethod): self
    {
        $this->creationMethod = $creationMethod;
        return $this;
    }

    public function getCreationTime(): \DateTime|null
    {
        return $this->creationTime;
    }

    public function setCreationTime(?\DateTime $creationTime): self
    {
        $this->creationTime = $creationTime;
        return $this;
    }

    public function getExpirationTime(): \DateTime|null
    {
        return $this->expirationTime;
    }

    public function setExpirationTime(?\DateTime $expirationTime): self
    {
        $this->expirationTime = $expirationTime;
        return $this;
    }

    public function getDuration(): int|null
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;
        return $this;
    }
}
