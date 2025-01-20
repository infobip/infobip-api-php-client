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

class ViberOutboundOtpTemplateContent extends ViberOutboundContent
{
    public const TYPE = 'OTP_TEMPLATE';

    /**
     * @param array<string,string> $parameters
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(max: 100)]
        #[Assert\Length(min: 0)]
        protected string $id,
        #[Assert\NotBlank]
        protected array $parameters,
        protected ?string $language = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return array<string,string>
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param array<string,string> $parameters parameters
     */
    public function setParameters(array $parameters): self
    {
        $this->parameters = $parameters;
        return $this;
    }

    public function getLanguage(): mixed
    {
        return $this->language;
    }

    public function setLanguage($language): self
    {
        $this->language = $language;
        return $this;
    }
}
