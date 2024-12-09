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

class WhatsAppTemplateCategoryPushEventChange extends WhatsAppTemplatePushEventChange
{
    public const TYPE = 'TEMPLATE_CATEGORY_UPDATE';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $previousCategory,
        #[Assert\NotBlank]
        protected string $newCategory,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getPreviousCategory(): mixed
    {
        return $this->previousCategory;
    }

    public function setPreviousCategory($previousCategory): self
    {
        $this->previousCategory = $previousCategory;
        return $this;
    }

    public function getNewCategory(): mixed
    {
        return $this->newCategory;
    }

    public function setNewCategory($newCategory): self
    {
        $this->newCategory = $newCategory;
        return $this;
    }
}
