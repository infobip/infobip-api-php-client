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

class WebRtcRoomCallDetails extends WebRtcCallDetails
{
    public const TYPE = 'ROOM';

    /**
     * @param \Infobip\Model\WebRtcParticipant[] $participants
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $participants,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    /**
     * @return \Infobip\Model\WebRtcParticipant[]
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    /**
     * @param \Infobip\Model\WebRtcParticipant[] $participants List of participants of the call.
     */
    public function setParticipants(array $participants): self
    {
        $this->participants = $participants;
        return $this;
    }
}
