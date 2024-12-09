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

class ViberMessage
{
    /**
     * @param \Infobip\Model\ViberToDestination[] $destinations
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $sender,
        #[Assert\NotBlank]
        protected array $destinations,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\ViberOutboundContent $content,
        #[Assert\Valid]
        protected ?\Infobip\Model\ViberMessageOptions $options = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\ViberOttWebhooks $webhooks = null,
    ) {

    }


    public function getSender(): string
    {
        return $this->sender;
    }

    public function setSender(string $sender): self
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @return \Infobip\Model\ViberToDestination[]
     */
    public function getDestinations(): array
    {
        return $this->destinations;
    }

    /**
     * @param \Infobip\Model\ViberToDestination[] $destinations An array of destination objects for where messages are being sent. A valid destination is required.
     */
    public function setDestinations(array $destinations): self
    {
        $this->destinations = $destinations;
        return $this;
    }

    public function getContent(): \Infobip\Model\ViberOutboundContent
    {
        return $this->content;
    }

    public function setContent(\Infobip\Model\ViberOutboundContent $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getOptions(): \Infobip\Model\ViberMessageOptions|null
    {
        return $this->options;
    }

    public function setOptions(?\Infobip\Model\ViberMessageOptions $options): self
    {
        $this->options = $options;
        return $this;
    }

    public function getWebhooks(): \Infobip\Model\ViberOttWebhooks|null
    {
        return $this->webhooks;
    }

    public function setWebhooks(?\Infobip\Model\ViberOttWebhooks $webhooks): self
    {
        $this->webhooks = $webhooks;
        return $this;
    }
}
