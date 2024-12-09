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

class WhatsAppBodyApiData
{
    /**
     * @param string[] $examples
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $text,
        protected ?array $examples = null,
    ) {

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

    /**
     * @return string[]|null
     */
    public function getExamples(): ?array
    {
        return $this->examples;
    }

    /**
     * @param string[]|null $examples Placeholders examples. The number of examples has to be the same as the number of placeholders. Examples cannot contain placeholders.
     */
    public function setExamples(?array $examples): self
    {
        $this->examples = $examples;
        return $this;
    }
}
