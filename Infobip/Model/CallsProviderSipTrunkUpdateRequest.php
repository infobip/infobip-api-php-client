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

class CallsProviderSipTrunkUpdateRequest extends CallsSipTrunkUpdateRequest
{
    public const TYPE = 'PROVIDER';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $name,
        protected ?bool $internationalCallsAllowed = false,
        #[Assert\LessThanOrEqual(1000)]
        protected ?int $channelLimit = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
            name: $name,
            internationalCallsAllowed: $internationalCallsAllowed,
            channelLimit: $channelLimit,
        );
    }

}
