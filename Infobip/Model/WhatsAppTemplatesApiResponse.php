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


class WhatsAppTemplatesApiResponse
{
    /**
     * @param \Infobip\Model\WhatsAppTemplateApiResponse[] $templates
     */
    public function __construct(
        protected ?array $templates = null,
    ) {

    }


    /**
     * @return \Infobip\Model\WhatsAppTemplateApiResponse[]|null
     */
    public function getTemplates(): ?array
    {
        return $this->templates;
    }

    /**
     * @param \Infobip\Model\WhatsAppTemplateApiResponse[]|null $templates List of all templates for given sender.
     */
    public function setTemplates(?array $templates): self
    {
        $this->templates = $templates;
        return $this;
    }
}
