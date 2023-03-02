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

class EmailAllDomainsResponse implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'EmailAllDomainsResponse';

    public const OPENAPI_FORMATS = [
        'paging' => null,
        'results' => null
    ];

    /**
     * @param \Infobip\Model\EmailDomainResponse[] $results
     */
    public function __construct(
        #[Assert\Valid]

    protected ?\Infobip\Model\EmailPaging $paging = null,
        protected ?array $results = null,
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

    public function getPaging(): \Infobip\Model\EmailPaging|null
    {
        return $this->paging;
    }

    public function setPaging(?\Infobip\Model\EmailPaging $paging): self
    {
        $this->paging = $paging;
        return $this;
    }

    /**
     * @return \Infobip\Model\EmailDomainResponse[]|null
     */
    public function getResults(): ?array
    {
        return $this->results;
    }

    /**
     * @param \Infobip\Model\EmailDomainResponse[]|null $results List of domains that belong to the account.
     */
    public function setResults(?array $results): self
    {
        $this->results = $results;
        return $this;
    }
}
