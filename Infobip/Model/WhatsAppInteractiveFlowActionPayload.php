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

class WhatsAppInteractiveFlowActionPayload
{
    /**
     * @param array<string,object> $data
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $screen,
        protected ?array $data = null,
    ) {

    }


    public function getScreen(): string
    {
        return $this->screen;
    }

    public function setScreen(string $screen): self
    {
        $this->screen = $screen;
        return $this;
    }

    /**
     * @return array<string,object>|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array<string,object>|null $data Input data for first screen of the flow. Must be a non-empty object.
     */
    public function setData(?array $data): self
    {
        $this->data = $data;
        return $this;
    }
}
