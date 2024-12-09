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

class WhatsAppUrlButtonApiData extends WhatsAppButtonApiData
{
    public const TYPE = 'URL';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(max: 25)]
        #[Assert\Length(min: 0)]
        protected string $text,
        #[Assert\NotBlank]
        protected string $url,
        protected ?string $example = null,
        protected ?string $destinationUrl = null,
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

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getExample(): string|null
    {
        return $this->example;
    }

    public function setExample(?string $example): self
    {
        $this->example = $example;
        return $this;
    }

    public function getDestinationUrl(): string|null
    {
        return $this->destinationUrl;
    }

    public function setDestinationUrl(?string $destinationUrl): self
    {
        $this->destinationUrl = $destinationUrl;
        return $this;
    }
}
