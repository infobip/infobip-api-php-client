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

class FlowParticipantsReportResponse
{
    /**
     * @param \Infobip\Model\FlowAddFlowParticipantResult[] $participants
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $operationId,
        #[Assert\NotBlank]
        protected int $campaignId,
        #[Assert\NotBlank]
        protected array $participants,
        protected ?string $callbackData = null,
    ) {

    }


    public function getOperationId(): string
    {
        return $this->operationId;
    }

    public function setOperationId(string $operationId): self
    {
        $this->operationId = $operationId;
        return $this;
    }

    public function getCampaignId(): int
    {
        return $this->campaignId;
    }

    public function setCampaignId(int $campaignId): self
    {
        $this->campaignId = $campaignId;
        return $this;
    }

    public function getCallbackData(): string|null
    {
        return $this->callbackData;
    }

    public function setCallbackData(?string $callbackData): self
    {
        $this->callbackData = $callbackData;
        return $this;
    }

    /**
     * @return \Infobip\Model\FlowAddFlowParticipantResult[]
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    /**
     * @param \Infobip\Model\FlowAddFlowParticipantResult[] $participants Array with information about each participant submitted for the operation.
     */
    public function setParticipants(array $participants): self
    {
        $this->participants = $participants;
        return $this;
    }
}
