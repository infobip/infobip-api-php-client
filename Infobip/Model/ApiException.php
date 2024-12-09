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

class ApiException
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        protected ?\Infobip\Model\ApiRequestError $requestError = null,
    ) {

    }


    public function getRequestError(): \Infobip\Model\ApiRequestError|null
    {
        return $this->requestError;
    }

    public function setRequestError(?\Infobip\Model\ApiRequestError $requestError): self
    {
        $this->requestError = $requestError;
        return $this;
    }
}
