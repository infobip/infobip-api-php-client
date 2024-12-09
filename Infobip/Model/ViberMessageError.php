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


class ViberMessageError
{
    /**
     */
    public function __construct(
        protected ?int $groupId = null,
        protected ?string $groupName = null,
        protected ?int $id = null,
        protected ?string $name = null,
        protected ?string $description = null,
        protected ?bool $permanent = null,
    ) {

    }


    public function getGroupId(): int|null
    {
        return $this->groupId;
    }

    public function setGroupId(?int $groupId): self
    {
        $this->groupId = $groupId;
        return $this;
    }

    public function getGroupName(): mixed
    {
        return $this->groupName;
    }

    public function setGroupName($groupName): self
    {
        $this->groupName = $groupName;
        return $this;
    }

    public function getId(): int|null
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getPermanent(): bool|null
    {
        return $this->permanent;
    }

    public function setPermanent(?bool $permanent): self
    {
        $this->permanent = $permanent;
        return $this;
    }
}
