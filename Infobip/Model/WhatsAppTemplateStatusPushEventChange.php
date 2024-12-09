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

class WhatsAppTemplateStatusPushEventChange extends WhatsAppTemplatePushEventChange
{
    public const TYPE = 'TEMPLATE_STATUS_UPDATE';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $newStatus,
        protected ?string $reason = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getNewStatus(): mixed
    {
        return $this->newStatus;
    }

    public function setNewStatus($newStatus): self
    {
        $this->newStatus = $newStatus;
        return $this;
    }

    public function getReason(): mixed
    {
        return $this->reason;
    }

    public function setReason($reason): self
    {
        $this->reason = $reason;
        return $this;
    }
}
