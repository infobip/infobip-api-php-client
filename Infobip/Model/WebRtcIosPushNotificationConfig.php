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

class WebRtcIosPushNotificationConfig
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $apnsCertificateFileName,
        #[Assert\NotBlank]
        protected string $apnsCertificateFileContent,
        protected ?string $apnsCertificatePassword = null,
    ) {

    }


    public function getApnsCertificateFileName(): string
    {
        return $this->apnsCertificateFileName;
    }

    public function setApnsCertificateFileName(string $apnsCertificateFileName): self
    {
        $this->apnsCertificateFileName = $apnsCertificateFileName;
        return $this;
    }

    public function getApnsCertificateFileContent(): string
    {
        return $this->apnsCertificateFileContent;
    }

    public function setApnsCertificateFileContent(string $apnsCertificateFileContent): self
    {
        $this->apnsCertificateFileContent = $apnsCertificateFileContent;
        return $this;
    }

    public function getApnsCertificatePassword(): string|null
    {
        return $this->apnsCertificatePassword;
    }

    public function setApnsCertificatePassword(?string $apnsCertificatePassword): self
    {
        $this->apnsCertificatePassword = $apnsCertificatePassword;
        return $this;
    }
}
