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

class CallsDialToConversationsOptions
{
    /**
     * @param string[] $tags
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $tags,
        protected ?string $tagIdentifierType = null,
    ) {

    }


    public function getTagIdentifierType(): mixed
    {
        return $this->tagIdentifierType;
    }

    public function setTagIdentifierType($tagIdentifierType): self
    {
        $this->tagIdentifierType = $tagIdentifierType;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param string[] $tags An array of [conversation tag](https://www.infobip.com/docs/conversations/get-to-know-conversations#tags-templates-and-tags) names or ids that are assigned to this conversation for better categorization of the topics or customer intent. Value can be an array of tag names/ids, empty array, or null value.
     */
    public function setTags(array $tags): self
    {
        $this->tags = $tags;
        return $this;
    }
}
