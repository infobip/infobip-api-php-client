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

class SmsMessage
{
    /**
     * @param \Infobip\Model\SmsDestination[] $destinations
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $destinations,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\SmsMessageContent $content,
        protected ?string $sender = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\SmsMessageOptions $options = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\SmsWebhooks $webhooks = null,
    ) {

    }


    public function getSender(): string|null
    {
        return $this->sender;
    }

    public function setSender(?string $sender): self
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @return \Infobip\Model\SmsDestination[]
     */
    public function getDestinations(): array
    {
        return $this->destinations;
    }

    /**
     * @param \Infobip\Model\SmsDestination[] $destinations An array of destination objects for where messages are being sent. A valid destination is required.
     */
    public function setDestinations(array $destinations): self
    {
        $this->destinations = $destinations;
        return $this;
    }

    public function getContent(): \Infobip\Model\SmsMessageContent
    {
        return $this->content;
    }

    public function setContent(\Infobip\Model\SmsMessageContent $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getOptions(): \Infobip\Model\SmsMessageOptions|null
    {
        return $this->options;
    }

    public function setOptions(?\Infobip\Model\SmsMessageOptions $options): self
    {
        $this->options = $options;
        return $this;
    }

    public function getWebhooks(): \Infobip\Model\SmsWebhooks|null
    {
        return $this->webhooks;
    }

    public function setWebhooks(?\Infobip\Model\SmsWebhooks $webhooks): self
    {
        $this->webhooks = $webhooks;
        return $this;
    }
}
