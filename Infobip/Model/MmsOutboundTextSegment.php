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

class MmsOutboundTextSegment extends MmsOutboundSegment
{
    public const TYPE = 'TEXT';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(max: 4096)]
        #[Assert\Length(min: 0)]
        protected string $text,
        protected ?string $contentId = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getContentId(): string|null
    {
        return $this->contentId;
    }

    public function setContentId(?string $contentId): self
    {
        $this->contentId = $contentId;
        return $this;
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
}
