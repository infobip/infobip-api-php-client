<?php

// phpcs:ignorefile

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
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

class CallsFilePage implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsFilePage';

    public const OPENAPI_FORMATS = [
        'results' => null,
        'paging' => null
    ];

    /**
     * @param \Infobip\Model\CallsFile[] $results
     */
    public function __construct(
        protected ?array $results = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsPageInfo $paging = null,
    ) {
    }

    #[Ignore]
    public function getModelName(): string
    {
        return self::OPENAPI_MODEL_NAME;
    }

    #[Ignore]
    public static function getDiscriminator(): ?string
    {
        return self::DISCRIMINATOR;
    }

    /**
     * @return \Infobip\Model\CallsFile[]|null
     */
    public function getResults(): ?array
    {
        return $this->results;
    }

    /**
     * @param \Infobip\Model\CallsFile[]|null $results The list of the results for this page.
     */
    public function setResults(?array $results): self
    {
        $this->results = $results;
        return $this;
    }

    public function getPaging(): \Infobip\Model\CallsPageInfo|null
    {
        return $this->paging;
    }

    public function setPaging(?\Infobip\Model\CallsPageInfo $paging): self
    {
        $this->paging = $paging;
        return $this;
    }
}
