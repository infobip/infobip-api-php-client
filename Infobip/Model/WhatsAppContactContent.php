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

class WhatsAppContactContent implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'WhatsAppContactContent';

    public const OPENAPI_FORMATS = [
        'addresses' => null,
        'birthday' => null,
        'emails' => null,
        'name' => null,
        'org' => null,
        'phones' => null,
        'urls' => null
    ];

    /**
     * @param \Infobip\Model\WhatsAppAddressContent[] $addresses
     * @param \Infobip\Model\WhatsAppEmailContent[] $emails
     * @param \Infobip\Model\WhatsAppPhoneContent[] $phones
     * @param \Infobip\Model\WhatsAppUrlContent[] $urls
     */
    public function __construct(
        #[Assert\Valid]
    #[Assert\NotBlank]

    protected \Infobip\Model\WhatsAppNameContent $name,
        protected ?array $addresses = null,
        protected ?string $birthday = null,
        protected ?array $emails = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\WhatsAppOrganizationContent $org = null,
        protected ?array $phones = null,
        protected ?array $urls = null,
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
     * @return \Infobip\Model\WhatsAppAddressContent[]|null
     */
    public function getAddresses(): ?array
    {
        return $this->addresses;
    }

    /**
     * @param \Infobip\Model\WhatsAppAddressContent[]|null $addresses Array of addresses information.
     */
    public function setAddresses(?array $addresses): self
    {
        $this->addresses = $addresses;
        return $this;
    }

    public function getBirthday(): string|null
    {
        return $this->birthday;
    }

    public function setBirthday(?string $birthday): self
    {
        $this->birthday = $birthday;
        return $this;
    }

    /**
     * @return \Infobip\Model\WhatsAppEmailContent[]|null
     */
    public function getEmails(): ?array
    {
        return $this->emails;
    }

    /**
     * @param \Infobip\Model\WhatsAppEmailContent[]|null $emails Array of emails information.
     */
    public function setEmails(?array $emails): self
    {
        $this->emails = $emails;
        return $this;
    }

    public function getName(): \Infobip\Model\WhatsAppNameContent
    {
        return $this->name;
    }

    public function setName(\Infobip\Model\WhatsAppNameContent $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getOrg(): \Infobip\Model\WhatsAppOrganizationContent|null
    {
        return $this->org;
    }

    public function setOrg(?\Infobip\Model\WhatsAppOrganizationContent $org): self
    {
        $this->org = $org;
        return $this;
    }

    /**
     * @return \Infobip\Model\WhatsAppPhoneContent[]|null
     */
    public function getPhones(): ?array
    {
        return $this->phones;
    }

    /**
     * @param \Infobip\Model\WhatsAppPhoneContent[]|null $phones Array of phones information.
     */
    public function setPhones(?array $phones): self
    {
        $this->phones = $phones;
        return $this;
    }

    /**
     * @return \Infobip\Model\WhatsAppUrlContent[]|null
     */
    public function getUrls(): ?array
    {
        return $this->urls;
    }

    /**
     * @param \Infobip\Model\WhatsAppUrlContent[]|null $urls Array of urls information.
     */
    public function setUrls(?array $urls): self
    {
        $this->urls = $urls;
        return $this;
    }
}
