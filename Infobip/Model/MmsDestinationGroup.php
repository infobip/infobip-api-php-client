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

class MmsDestinationGroup implements MmsDestination
{
    /**
     * @param \Infobip\Model\MmsDestinationSingle[] $group
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Count(max: 200)]
        #[Assert\Count(min: 1)]
        protected array $group,
    ) {

    }


    /**
     * @return \Infobip\Model\MmsDestinationSingle[]
     */
    public function getGroup(): array
    {
        return $this->group;
    }

    /**
     * @param \Infobip\Model\MmsDestinationSingle[] $group An array of destination objects for where messages are being sent. A valid destination is required.
     */
    public function setGroup(array $group): self
    {
        $this->group = $group;
        return $this;
    }
}
