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

class WhatsAppInteractiveOrderUPIPGRazorpayPaymentDetails extends WhatsAppInteractiveAllowedOrderPaymentDetails
{
    public const TYPE = 'PG_RAZORPAY';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Regex('/[A-Za-z0-9\\-_.]{1,35}/')]
        protected string $id,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppBeneficiary $beneficiary = null,
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

    public function getBeneficiary(): \Infobip\Model\WhatsAppBeneficiary|null
    {
        return $this->beneficiary;
    }

    public function setBeneficiary(?\Infobip\Model\WhatsAppBeneficiary $beneficiary): self
    {
        $this->beneficiary = $beneficiary;
        return $this;
    }
}
