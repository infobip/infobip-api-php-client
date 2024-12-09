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

class MessagesApiMessageListBody extends MessagesApiMessageBody
{
    public const TYPE = 'LIST';

    /**
     * @param \Infobip\Model\MessagesApiMessageListSection[] $sections
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $text,
        #[Assert\NotBlank]
        protected array $sections,
        protected ?string $subtext = null,
        protected ?string $imageUrl = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getSubtext(): string|null
    {
        return $this->subtext;
    }

    public function setSubtext(?string $subtext): self
    {
        $this->subtext = $subtext;
        return $this;
    }

    public function getImageUrl(): string|null
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    /**
     * @return \Infobip\Model\MessagesApiMessageListSection[]
     */
    public function getSections(): array
    {
        return $this->sections;
    }

    /**
     * @param \Infobip\Model\MessagesApiMessageListSection[] $sections Section's list.
     */
    public function setSections(array $sections): self
    {
        $this->sections = $sections;
        return $this;
    }
}
