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

class WhatsAppInteractiveOrderBrazilLinkPaymentDetails extends WhatsAppTemplateAllowedOrderPaymentDetails
{
    public const TYPE = 'BRAZIL_LINK';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Regex('/[A-Za-z0-9\\-_.]{1,35}/')]
        protected string $id,
        #[Assert\NotBlank]
        protected string $paymentLink,
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

    public function getPaymentLink(): string
    {
        return $this->paymentLink;
    }

    public function setPaymentLink(string $paymentLink): self
    {
        $this->paymentLink = $paymentLink;
        return $this;
    }
}
