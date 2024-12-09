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

class CallRoutingEndpointDestinationResponse extends CallRoutingUrlDestinationResponse
{
    public const TYPE = 'ENDPOINT';

    /**
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\CallRoutingEndpoint $value,
        protected ?int $connectTimeout = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallRoutingRecording $recording = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getValue(): \Infobip\Model\CallRoutingEndpoint
    {
        return $this->value;
    }

    public function setValue(\Infobip\Model\CallRoutingEndpoint $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function getConnectTimeout(): int|null
    {
        return $this->connectTimeout;
    }

    public function setConnectTimeout(?int $connectTimeout): self
    {
        $this->connectTimeout = $connectTimeout;
        return $this;
    }

    public function getRecording(): \Infobip\Model\CallRoutingRecording|null
    {
        return $this->recording;
    }

    public function setRecording(?\Infobip\Model\CallRoutingRecording $recording): self
    {
        $this->recording = $recording;
        return $this;
    }
}
