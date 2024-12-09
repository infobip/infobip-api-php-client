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

class TfaMessage
{
    /**
     */
    public function __construct(
        protected ?string $applicationId = null,
        protected ?int $emailTemplateId = null,
        protected ?string $from = null,
        protected ?string $language = null,
        protected ?string $messageId = null,
        protected ?string $messageText = null,
        protected ?int $pinLength = null,
        protected ?string $pinPlaceholder = null,
        protected ?string $pinType = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\TfaRegionalOptions $regional = null,
        protected ?string $repeatDTMF = null,
        protected ?string $senderId = null,
        protected ?float $speechRate = null,
        protected ?string $voiceName = null,
    ) {

    }


    public function getApplicationId(): string|null
    {
        return $this->applicationId;
    }

    public function setApplicationId(?string $applicationId): self
    {
        $this->applicationId = $applicationId;
        return $this;
    }

    public function getEmailTemplateId(): int|null
    {
        return $this->emailTemplateId;
    }

    public function setEmailTemplateId(?int $emailTemplateId): self
    {
        $this->emailTemplateId = $emailTemplateId;
        return $this;
    }

    public function getFrom(): string|null
    {
        return $this->from;
    }

    public function setFrom(?string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getLanguage(): mixed
    {
        return $this->language;
    }

    public function setLanguage($language): self
    {
        $this->language = $language;
        return $this;
    }

    public function getMessageId(): string|null
    {
        return $this->messageId;
    }

    public function setMessageId(?string $messageId): self
    {
        $this->messageId = $messageId;
        return $this;
    }

    public function getMessageText(): string|null
    {
        return $this->messageText;
    }

    public function setMessageText(?string $messageText): self
    {
        $this->messageText = $messageText;
        return $this;
    }

    public function getPinLength(): int|null
    {
        return $this->pinLength;
    }

    public function setPinLength(?int $pinLength): self
    {
        $this->pinLength = $pinLength;
        return $this;
    }

    public function getPinPlaceholder(): string|null
    {
        return $this->pinPlaceholder;
    }

    public function setPinPlaceholder(?string $pinPlaceholder): self
    {
        $this->pinPlaceholder = $pinPlaceholder;
        return $this;
    }

    public function getPinType(): mixed
    {
        return $this->pinType;
    }

    public function setPinType($pinType): self
    {
        $this->pinType = $pinType;
        return $this;
    }

    public function getRegional(): \Infobip\Model\TfaRegionalOptions|null
    {
        return $this->regional;
    }

    public function setRegional(?\Infobip\Model\TfaRegionalOptions $regional): self
    {
        $this->regional = $regional;
        return $this;
    }

    public function getRepeatDTMF(): string|null
    {
        return $this->repeatDTMF;
    }

    public function setRepeatDTMF(?string $repeatDTMF): self
    {
        $this->repeatDTMF = $repeatDTMF;
        return $this;
    }

    public function getSenderId(): string|null
    {
        return $this->senderId;
    }

    public function setSenderId(?string $senderId): self
    {
        $this->senderId = $senderId;
        return $this;
    }

    public function getSpeechRate(): float|null
    {
        return $this->speechRate;
    }

    public function setSpeechRate(?float $speechRate): self
    {
        $this->speechRate = $speechRate;
        return $this;
    }

    public function getVoiceName(): string|null
    {
        return $this->voiceName;
    }

    public function setVoiceName(?string $voiceName): self
    {
        $this->voiceName = $voiceName;
        return $this;
    }
}
