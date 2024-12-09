<?php

declare(strict_types=1);

/**
 * SerializationCandidates
 *
 * @category Attribute
 * @package  Infobip
 * @author   Infobip Support
 * @link     https://www.infobip.com
 */

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

namespace Infobip;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
final class SerializationCandidates
{
    public function __construct(
        private array $candidates
    ) {
    }

    public function getCandidates(): array
    {
        return $this->candidates;
    }
}
