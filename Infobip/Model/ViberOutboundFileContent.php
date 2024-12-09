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

class ViberOutboundFileContent extends ViberOutboundContent
{
    public const TYPE = 'FILE';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Regex('/.*\\.(docx?|dotx?|xlsx?|f?ods|f?odt|rtf|odf|txt|info|pdf|xps|pdax|eps|csv|xlsm|xltx)$/')]
        protected string $fileName,
        #[Assert\NotBlank]
        #[Assert\Regex('/^(https?):\/\/.*$/')]
        protected string $mediaUrl,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): self
    {
        $this->fileName = $fileName;
        return $this;
    }

    public function getMediaUrl(): string
    {
        return $this->mediaUrl;
    }

    public function setMediaUrl(string $mediaUrl): self
    {
        $this->mediaUrl = $mediaUrl;
        return $this;
    }
}
