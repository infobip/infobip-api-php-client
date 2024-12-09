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

class ViberOutboundImageContent extends ViberOutboundContent
{
    public const TYPE = 'IMAGE';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(max: 1000)]
        #[Assert\Length(min: 0)]
        protected string $mediaUrl,
        #[Assert\Length(max: 1000)]
        #[Assert\Length(min: 1)]
        protected ?string $text = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\ViberButton $button = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getText(): string|null
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getMediaUrl(): string
    {
        return $this->mediaUrl;
    }

    public function setMediaUrl(string $mediaUrl): self
    {
        $this->mediaUrl = $mediaUrl;
        return $this;
    }

    public function getButton(): \Infobip\Model\ViberButton|null
    {
        return $this->button;
    }

    public function setButton(?\Infobip\Model\ViberButton $button): self
    {
        $this->button = $button;
        return $this;
    }
}
