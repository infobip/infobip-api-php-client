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
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class SmsRequestSchedulingSettings
{
    /**
     */
    public function __construct(
        protected ?string $bulkId = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $sendAt = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\SmsSendingSpeedLimit $sendingSpeedLimit = null,
    ) {

    }


    public function getBulkId(): string|null
    {
        return $this->bulkId;
    }

    public function setBulkId(?string $bulkId): self
    {
        $this->bulkId = $bulkId;
        return $this;
    }

    public function getSendAt(): \DateTime|null
    {
        return $this->sendAt;
    }

    public function setSendAt(?\DateTime $sendAt): self
    {
        $this->sendAt = $sendAt;
        return $this;
    }

    public function getSendingSpeedLimit(): \Infobip\Model\SmsSendingSpeedLimit|null
    {
        return $this->sendingSpeedLimit;
    }

    public function setSendingSpeedLimit(?\Infobip\Model\SmsSendingSpeedLimit $sendingSpeedLimit): self
    {
        $this->sendingSpeedLimit = $sendingSpeedLimit;
        return $this;
    }
}
