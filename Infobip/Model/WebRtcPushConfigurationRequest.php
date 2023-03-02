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

class WebRtcPushConfigurationRequest implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'WebRtcPushConfigurationRequest';

    public const OPENAPI_FORMATS = [
        'applicationId' => null,
        'ios' => null,
        'android' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]

    protected string $applicationId,
        #[Assert\Valid]

    protected ?\Infobip\Model\WebRtcIosPushNotificationConfig $ios = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\WebRtcAndroidPushNotificationConfig $android = null,
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

    public function getApplicationId(): string
    {
        return $this->applicationId;
    }

    public function setApplicationId(string $applicationId): self
    {
        $this->applicationId = $applicationId;
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
