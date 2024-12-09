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

class MessagesApiChannelsDestination implements MessagesApiMessageDestination
{
    /**
     * @param \Infobip\Model\MessagesApiChannelDestination[] $byChannel
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $byChannel,
    ) {

    }


    /**
     * @return \Infobip\Model\MessagesApiChannelDestination[]
     */
    public function getByChannel(): array
    {
        return $this->byChannel;
    }

    /**
     * @param \Infobip\Model\MessagesApiChannelDestination[] $byChannel Array of substitute destinations distinguished by a `channel` they belong to. Only one substitute destination per `channel` is permitted.
     */
    public function setByChannel(array $byChannel): self
    {
        $this->byChannel = $byChannel;
        return $this;
    }
}
