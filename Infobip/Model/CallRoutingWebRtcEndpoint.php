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

class CallRoutingWebRtcEndpoint extends CallRoutingEndpoint
{
    public const TYPE = 'WEBRTC';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $identity,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getIdentity(): string
    {
        return $this->identity;
    }

    public function setIdentity(string $identity): self
    {
        $this->identity = $identity;
        return $this;
    }
}