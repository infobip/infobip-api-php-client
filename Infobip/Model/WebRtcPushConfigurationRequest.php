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

class WebRtcPushConfigurationRequest
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $applicationId,
        protected ?string $name = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcIosPushNotificationConfig $ios = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcAndroidPushNotificationConfig $android = null,
    ) {

    }


    public function getApplicationId(): string
    {
        return $this->applicationId;
    }

    public function setApplicationId(string $applicationId): self
    {
        $this->applicationId = $applicationId;
        return $this;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getIos(): \Infobip\Model\WebRtcIosPushNotificationConfig|null
    {
        return $this->ios;
    }

    public function setIos(?\Infobip\Model\WebRtcIosPushNotificationConfig $ios): self
    {
        $this->ios = $ios;
        return $this;
    }

    public function getAndroid(): \Infobip\Model\WebRtcAndroidPushNotificationConfig|null
    {
        return $this->android;
    }

    public function setAndroid(?\Infobip\Model\WebRtcAndroidPushNotificationConfig $android): self
    {
        $this->android = $android;
        return $this;
    }
}
