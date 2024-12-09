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

class MessagesApiMessageListSection
{
    /**
     * @param \Infobip\Model\MessagesApiMessageListItem[] $items
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $sectionTitle,
        #[Assert\NotBlank]
        protected array $items,
        protected ?bool $multipleSelection = null,
    ) {

    }


    public function getSectionTitle(): string
    {
        return $this->sectionTitle;
    }

    public function setSectionTitle(string $sectionTitle): self
    {
        $this->sectionTitle = $sectionTitle;
        return $this;
    }

    public function getMultipleSelection(): bool|null
    {
        return $this->multipleSelection;
    }

    public function setMultipleSelection(?bool $multipleSelection): self
    {
        $this->multipleSelection = $multipleSelection;
        return $this;
    }

    /**
     * @return \Infobip\Model\MessagesApiMessageListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param \Infobip\Model\MessagesApiMessageListItem[] $items List Items.
     */
    public function setItems(array $items): self
    {
        $this->items = $items;
        return $this;
    }
}
