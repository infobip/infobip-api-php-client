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

class WhatsAppFlowButtonApiData extends WhatsAppButtonApiData
{
    public const TYPE = 'FLOW';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(max: 25)]
        #[Assert\Length(min: 0)]
        protected string $text,
        #[Assert\NotBlank]
        protected int $flowId,
        #[Assert\NotBlank]

        protected string $flowAction,
        protected ?string $navigateScreen = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getFlowId(): int
    {
        return $this->flowId;
    }

    public function setFlowId(int $flowId): self
    {
        $this->flowId = $flowId;
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

    public function getNavigateScreen(): string|null
    {
        return $this->navigateScreen;
    }

    public function setNavigateScreen(?string $navigateScreen): self
    {
        $this->navigateScreen = $navigateScreen;
        return $this;
    }
}
