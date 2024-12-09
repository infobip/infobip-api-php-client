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

class WhatsAppCopyCodeDefaultButtonApiData extends WhatsAppButtonApiData
{
    public const TYPE = 'COPY_CODE';

    /**
     */
    public function __construct(
        #[Assert\Length(max: 25)]
        #[Assert\Length(min: 0)]
        protected ?string $text = null,
        #[Assert\Length(max: 15)]
        #[Assert\Length(min: 1)]
        protected ?string $example = null,
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
