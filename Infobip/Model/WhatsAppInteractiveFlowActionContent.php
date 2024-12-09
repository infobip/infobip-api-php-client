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

class WhatsAppInteractiveFlowActionContent
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $flowToken,
        #[Assert\NotBlank]
        protected string $flowId,
        #[Assert\NotBlank]
        #[Assert\Length(max: 20)]
        #[Assert\Length(min: 1)]
        protected string $callToActionButton,
        protected ?string $mode = null,
        protected ?int $flowMessageVersion = null,
        protected ?string $flowAction = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppInteractiveFlowActionPayload $flowActionPayload = null,
    ) {

    }


    public function getMode(): mixed
    {
        return $this->mode;
    }

    public function setMode($mode): self
    {
        $this->mode = $mode;
        return $this;
    }

    public function getFlowMessageVersion(): int|null
    {
        return $this->flowMessageVersion;
    }

    public function setFlowMessageVersion(?int $flowMessageVersion): self
    {
        $this->flowMessageVersion = $flowMessageVersion;
        return $this;
    }

    public function getFlowToken(): string
    {
        return $this->flowToken;
    }

    public function setFlowToken(string $flowToken): self
    {
        $this->flowToken = $flowToken;
        return $this;
    }

    public function getFlowId(): string
    {
        return $this->flowId;
    }

    public function setFlowId(string $flowId): self
    {
        $this->flowId = $flowId;
        return $this;
    }

    public function getCallToActionButton(): string
    {
        return $this->callToActionButton;
    }

    public function setCallToActionButton(string $callToActionButton): self
    {
        $this->callToActionButton = $callToActionButton;
        return $this;
    }

    public function getFlowAction(): mixed
    {
        return $this->flowAction;
    }

    public function setFlowAction($flowAction): self
    {
        $this->flowAction = $flowAction;
        return $this;
    }

    public function getFlowActionPayload(): \Infobip\Model\WhatsAppInteractiveFlowActionPayload|null
    {
        return $this->flowActionPayload;
    }

    public function setFlowActionPayload(?\Infobip\Model\WhatsAppInteractiveFlowActionPayload $flowActionPayload): self
    {
        $this->flowActionPayload = $flowActionPayload;
        return $this;
    }
}
