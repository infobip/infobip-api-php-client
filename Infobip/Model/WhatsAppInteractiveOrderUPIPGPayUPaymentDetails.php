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

class WhatsAppInteractiveOrderUPIPGPayUPaymentDetails extends WhatsAppInteractiveAllowedOrderPaymentDetails
{
    public const TYPE = 'PG_PAYU';

    /**
     * @param string[] $callbackData
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Regex('/[A-Za-z0-9\\-_.]{1,35}/')]
        protected string $id,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppBeneficiary $beneficiary = null,
        #[Assert\Count(max: 4)]
        #[Assert\Count(min: 0)]
        protected ?array $callbackData = null,
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

    /**
     * @return string[]|null
     */
    public function getCallbackData(): ?array
    {
        return $this->callbackData;
    }

    /**
     * @param string[]|null $callbackData List of custom parameters corresponding to the transaction.
     */
    public function setCallbackData(?array $callbackData): self
    {
        $this->callbackData = $callbackData;
        return $this;
    }
}
