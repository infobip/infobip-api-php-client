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

class WhatsAppTemplateContent
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(max: 512)]
        #[Assert\Length(min: 1)]
        protected string $templateName,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppTemplateDataContent $templateData,
        #[Assert\NotBlank]
        protected string $language,
    ) {

    }


    public function getTemplateName(): string
    {
        return $this->templateName;
    }

    public function setTemplateName(string $templateName): self
    {
        $this->templateName = $templateName;
        return $this;
    }

    public function getTemplateData(): \Infobip\Model\WhatsAppTemplateDataContent
    {
        return $this->templateData;
    }

    public function setTemplateData(\Infobip\Model\WhatsAppTemplateDataContent $templateData): self
    {
        $this->templateData = $templateData;
        return $this;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;
        return $this;
    }
}
