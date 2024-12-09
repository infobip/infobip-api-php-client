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

class ApiRequestError
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        protected ?\Infobip\Model\ApiRequestErrorDetails $serviceException = null,
    ) {

    }


    public function getServiceException(): \Infobip\Model\ApiRequestErrorDetails|null
    {
        return $this->serviceException;
    }

    public function setServiceException(?\Infobip\Model\ApiRequestErrorDetails $serviceException): self
    {
        $this->serviceException = $serviceException;
        return $this;
    }
}
