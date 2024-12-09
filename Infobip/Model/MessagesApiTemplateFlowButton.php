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

class MessagesApiTemplateFlowButton extends MessagesApiTemplateButton
{
    public const TYPE = 'FLOW';

    /**
     * @param array<string,object> $data
     */
    public function __construct(
        #[Assert\Length(max: 3000)]
        #[Assert\Length(min: 0)]
        protected ?string $token = null,
        protected ?array $data = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getToken(): string|null
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return array<string,object>|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array<string,object>|null $data Message action payload data. JSON object with the data payload for the first screen
     */
    public function setData(?array $data): self
    {
        $this->data = $data;
        return $this;
    }
}
