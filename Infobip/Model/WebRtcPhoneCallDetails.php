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

class WebRtcPhoneCallDetails extends WebRtcCallDetails
{
    public const TYPE = 'PHONE';

    /**
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WebRtcParticipant $caller,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WebRtcParticipant $callee,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getCaller(): \Infobip\Model\WebRtcParticipant
    {
        return $this->caller;
    }

    public function setCaller(\Infobip\Model\WebRtcParticipant $caller): self
    {
        $this->caller = $caller;
        return $this;
    }

    public function getCallee(): \Infobip\Model\WebRtcParticipant
    {
        return $this->callee;
    }

    public function setCallee(\Infobip\Model\WebRtcParticipant $callee): self
    {
        $this->callee = $callee;
        return $this;
    }
}
