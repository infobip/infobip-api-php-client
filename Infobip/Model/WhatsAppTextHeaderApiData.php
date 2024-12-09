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

class WhatsAppTextHeaderApiData extends WhatsAppHeaderApiData
{
    public const FORMAT = 'TEXT';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $text,
        protected ?string $example = null,
    ) {
        $modelDiscriminatorValue = self::FORMAT;

        parent::__construct(
            format: $modelDiscriminatorValue,
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

    public function getExample(): string|null
    {
        return $this->example;
    }

    public function setExample(?string $example): self
    {
        $this->example = $example;
        return $this;
    }
}
