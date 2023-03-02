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

class WhatsAppWebhookContact implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'WhatsAppWebhookContact';

    public const OPENAPI_FORMATS = [
        'addresses' => null,
        'birthday' => 'date-time',
        'emails' => null,
        'name' => null,
        'org' => null,
        'phones' => null,
        'urls' => null
    ];

    /**
     * @param \Infobip\Model\WhatsAppWebhookAddress[] $addresses
     * @param \Infobip\Model\WhatsAppWebhookEmail[] $emails
     * @param \Infobip\Model\WhatsAppWebhookPhone[] $phones
     * @param \Infobip\Model\WhatsAppWebhookUrl[] $urls
     */
    public function __construct(
        protected ?array $addresses = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]

    protected ?\DateTime $birthday = null,
        protected ?array $emails = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\WhatsAppWebhookName $name = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\WhatsAppWebhookOrganization $org = null,
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
     * @return \Infobip\Model\WhatsAppWebhookAddress[]|null
     */
    public function getAddresses(): ?array
    {
        return $this->addresses;
    }

    /**
     * @param \Infobip\Model\WhatsAppWebhookAddress[]|null $addresses Address information.
     */
    public function setAddresses(?array $addresses): self
    {
        $this->addresses = $addresses;
        return $this;
    }

    public function getBirthday(): \DateTime|null
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTime $birthday): self
    {
        $this->birthday = $birthday;
        return $this;
    }

    /**
     * @return \Infobip\Model\WhatsAppWebhookEmail[]|null
     */
    public function getEmails(): ?array
    {
        return $this->emails;
    }

    /**
     * @param \Infobip\Model\WhatsAppWebhookEmail[]|null $emails Email information.
     */
    public function setEmails(?array $emails): self
    {
        $this->emails = $emails;
        return $this;
    }

    public function getName(): \Infobip\Model\WhatsAppWebhookName|null
    {
        return $this->name;
    }

    public function setName(?\Infobip\Model\WhatsAppWebhookName $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getOrg(): \Infobip\Model\WhatsAppWebhookOrganization|null
    {
        return $this->org;
    }

    public function setOrg(?\Infobip\Model\WhatsAppWebhookOrganization $org): self
    {
        $this->org = $org;
        return $this;
    }

    /**
     * @return \Infobip\Model\WhatsAppWebhookPhone[]|null
     */
    public function getPhones(): ?array
    {
        return $this->phones;
    }

    /**
     * @param \Infobip\Model\WhatsAppWebhookPhone[]|null $phones Phone information.
     */
    public function setPhones(?array $phones): self
    {
        $this->phones = $phones;
        return $this;
    }

    /**
     * @return \Infobip\Model\WhatsAppWebhookUrl[]|null
     */
    public function getUrls(): ?array
    {
        return $this->urls;
    }

    /**
     * @param \Infobip\Model\WhatsAppWebhookUrl[]|null $urls URL information.
     */
    public function setUrls(?array $urls): self
    {
        $this->urls = $urls;
        return $this;
    }
}
