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

class EmailDomainInfo
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $domainName,
        #[Assert\NotBlank]
        protected string $dataAccess,
        #[Assert\NotBlank]
        protected bool $readBounces,
        #[Assert\NotBlank]
        protected bool $createBounces,
        #[Assert\NotBlank]
        protected bool $deleteBounces,
        #[Assert\NotBlank]
        protected bool $readComplaints,
        #[Assert\NotBlank]
        protected bool $createComplaints,
        #[Assert\NotBlank]
        protected bool $deleteComplaints,
        #[Assert\NotBlank]
        protected bool $readOverquotas,
    ) {

    }


    public function getDomainName(): string
    {
        return $this->domainName;
    }

    public function setDomainName(string $domainName): self
    {
        $this->domainName = $domainName;
        return $this;
    }

    public function getDataAccess(): mixed
    {
        return $this->dataAccess;
    }

    public function setDataAccess($dataAccess): self
    {
        $this->dataAccess = $dataAccess;
        return $this;
    }

    public function getReadBounces(): bool
    {
        return $this->readBounces;
    }

    public function setReadBounces(bool $readBounces): self
    {
        $this->readBounces = $readBounces;
        return $this;
    }

    public function getCreateBounces(): bool
    {
        return $this->createBounces;
    }

    public function setCreateBounces(bool $createBounces): self
    {
        $this->createBounces = $createBounces;
        return $this;
    }

    public function getDeleteBounces(): bool
    {
        return $this->deleteBounces;
    }

    public function setDeleteBounces(bool $deleteBounces): self
    {
        $this->deleteBounces = $deleteBounces;
        return $this;
    }

    public function getReadComplaints(): bool
    {
        return $this->readComplaints;
    }

    public function setReadComplaints(bool $readComplaints): self
    {
        $this->readComplaints = $readComplaints;
        return $this;
    }

    public function getCreateComplaints(): bool
    {
        return $this->createComplaints;
    }

    public function setCreateComplaints(bool $createComplaints): self
    {
        $this->createComplaints = $createComplaints;
        return $this;
    }

    public function getDeleteComplaints(): bool
    {
        return $this->deleteComplaints;
    }

    public function setDeleteComplaints(bool $deleteComplaints): self
    {
        $this->deleteComplaints = $deleteComplaints;
        return $this;
    }

    public function getReadOverquotas(): bool
    {
        return $this->readOverquotas;
    }

    public function setReadOverquotas(bool $readOverquotas): self
    {
        $this->readOverquotas = $readOverquotas;
        return $this;
    }
}
