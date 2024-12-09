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

class WhatsAppTemplateBodyContent
{
    /**
     * @param string[] $placeholders
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $placeholders,
    ) {

    }


    /**
     * @return string[]
     */
    public function getPlaceholders(): array
    {
        return $this->placeholders;
    }

    /**
     * @param string[] $placeholders Template's parameter values submitted in the same order as in the registered template. The value must not be null, but it can be an empty array, if the template was registered without placeholders. Values within the array must not be null or empty.
     */
    public function setPlaceholders(array $placeholders): self
    {
        $this->placeholders = $placeholders;
        return $this;
    }
}
