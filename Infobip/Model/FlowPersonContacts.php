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

class FlowPersonContacts
{
    /**
     * @param \Infobip\Model\FlowPhoneContact[] $phone
     * @param \Infobip\Model\FlowEmailContact[] $email
     * @param \Infobip\Model\FlowPushContact[] $push
     * @param \Infobip\Model\FlowCommonOttContact[] $facebook
     * @param \Infobip\Model\FlowCommonOttContact[] $line
     * @param \Infobip\Model\FlowCommonOttContact[] $viberBots
     * @param \Infobip\Model\FlowCommonOttContact[] $liveChat
     * @param \Infobip\Model\FlowCommonOttContact[] $instagram
     * @param \Infobip\Model\FlowCommonOttContact[] $telegram
     * @param \Infobip\Model\FlowCommonOttContact[] $appleBusinessChat
     * @param \Infobip\Model\FlowCommonPushContact[] $webpush
     * @param \Infobip\Model\FlowCommonOttContact[] $instagramDm
     * @param \Infobip\Model\FlowCommonOttContact[] $kakaoSangdam
     */
    public function __construct(
        protected ?array $phone = null,
        protected ?array $email = null,
        protected ?array $push = null,
        protected ?array $facebook = null,
        protected ?array $line = null,
        protected ?array $viberBots = null,
        protected ?array $liveChat = null,
        protected ?array $instagram = null,
        protected ?array $telegram = null,
        protected ?array $appleBusinessChat = null,
        protected ?array $webpush = null,
        protected ?array $instagramDm = null,
        protected ?array $kakaoSangdam = null,
    ) {

    }


    /**
     * @return \Infobip\Model\FlowPhoneContact[]|null
     */
    public function getPhone(): ?array
    {
        return $this->phone;
    }

    /**
     * @param \Infobip\Model\FlowPhoneContact[]|null $phone A list of person's phone numbers. Max 100 numbers per person.
     */
    public function setPhone(?array $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return \Infobip\Model\FlowEmailContact[]|null
     */
    public function getEmail(): ?array
    {
        return $this->email;
    }

    /**
     * @param \Infobip\Model\FlowEmailContact[]|null $email A list of person's email addresses. Max 100 emails per person.
     */
    public function setEmail(?array $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return \Infobip\Model\FlowPushContact[]|null
     */
    public function getPush(): ?array
    {
        return $this->push;
    }

    /**
     * @param \Infobip\Model\FlowPushContact[]|null $push List of person's push registrations.
     */
    public function setPush(?array $push): self
    {
        $this->push = $push;
        return $this;
    }

    /**
     * @return \Infobip\Model\FlowCommonOttContact[]|null
     */
    public function getFacebook(): ?array
    {
        return $this->facebook;
    }

    /**
     * @param \Infobip\Model\FlowCommonOttContact[]|null $facebook A list of person's Messenger destinations.
     */
    public function setFacebook(?array $facebook): self
    {
        $this->facebook = $facebook;
        return $this;
    }

    /**
     * @return \Infobip\Model\FlowCommonOttContact[]|null
     */
    public function getLine(): ?array
    {
        return $this->line;
    }

    /**
     * @param \Infobip\Model\FlowCommonOttContact[]|null $line A list of person's Line destinations.
     */
    public function setLine(?array $line): self
    {
        $this->line = $line;
        return $this;
    }

    /**
     * @return \Infobip\Model\FlowCommonOttContact[]|null
     */
    public function getViberBots(): ?array
    {
        return $this->viberBots;
    }

    /**
     * @param \Infobip\Model\FlowCommonOttContact[]|null $viberBots A list of person's Viber Bots destinations.
     */
    public function setViberBots(?array $viberBots): self
    {
        $this->viberBots = $viberBots;
        return $this;
    }

    /**
     * @return \Infobip\Model\FlowCommonOttContact[]|null
     */
    public function getLiveChat(): ?array
    {
        return $this->liveChat;
    }

    /**
     * @param \Infobip\Model\FlowCommonOttContact[]|null $liveChat A list of person's Live Chat destinations.
     */
    public function setLiveChat(?array $liveChat): self
    {
        $this->liveChat = $liveChat;
        return $this;
    }

    /**
     * @return \Infobip\Model\FlowCommonOttContact[]|null
     */
    public function getInstagram(): ?array
    {
        return $this->instagram;
    }

    /**
     * @param \Infobip\Model\FlowCommonOttContact[]|null $instagram A list of person's Instagram destinations.
     */
    public function setInstagram(?array $instagram): self
    {
        $this->instagram = $instagram;
        return $this;
    }

    /**
     * @return \Infobip\Model\FlowCommonOttContact[]|null
     */
    public function getTelegram(): ?array
    {
        return $this->telegram;
    }

    /**
     * @param \Infobip\Model\FlowCommonOttContact[]|null $telegram A list of person's Telegram destinations.
     */
    public function setTelegram(?array $telegram): self
    {
        $this->telegram = $telegram;
        return $this;
    }

    /**
     * @return \Infobip\Model\FlowCommonOttContact[]|null
     */
    public function getAppleBusinessChat(): ?array
    {
        return $this->appleBusinessChat;
    }

    /**
     * @param \Infobip\Model\FlowCommonOttContact[]|null $appleBusinessChat A list of person's Apple Business Chat destinations.
     */
    public function setAppleBusinessChat(?array $appleBusinessChat): self
    {
        $this->appleBusinessChat = $appleBusinessChat;
        return $this;
    }

    /**
     * @return \Infobip\Model\FlowCommonPushContact[]|null
     */
    public function getWebpush(): ?array
    {
        return $this->webpush;
    }

    /**
     * @param \Infobip\Model\FlowCommonPushContact[]|null $webpush A list of person's web push destinations.
     */
    public function setWebpush(?array $webpush): self
    {
        $this->webpush = $webpush;
        return $this;
    }

    /**
     * @return \Infobip\Model\FlowCommonOttContact[]|null
     */
    public function getInstagramDm(): ?array
    {
        return $this->instagramDm;
    }

    /**
     * @param \Infobip\Model\FlowCommonOttContact[]|null $instagramDm A list of person's Instagram DM destinations.
     */
    public function setInstagramDm(?array $instagramDm): self
    {
        $this->instagramDm = $instagramDm;
        return $this;
    }

    /**
     * @return \Infobip\Model\FlowCommonOttContact[]|null
     */
    public function getKakaoSangdam(): ?array
    {
        return $this->kakaoSangdam;
    }

    /**
     * @param \Infobip\Model\FlowCommonOttContact[]|null $kakaoSangdam A list of person's Kakao Sangdam destinations.
     */
    public function setKakaoSangdam(?array $kakaoSangdam): self
    {
        $this->kakaoSangdam = $kakaoSangdam;
        return $this;
    }
}
