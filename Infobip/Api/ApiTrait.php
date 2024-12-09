<?php

// phpcs:ignorefile

/**
 * ApiTrait
 * PHP version 8.3
 *
 * @category Trait
 * @package  Infobip
 * @author   Infobip Support
 * @link     https://www.infobip.com
 */

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

namespace Infobip\Api;

use Infobip\SplFileObjectNormalizer;
use Psr\Http\Message\StreamInterface;
use SplFileObject;
use Symfony\Component\Validator\Constraints as Assert;

trait ApiTrait
{
    /**
     * @internal
     */
    private function deserialize(mixed $response, string $type, array $responseHeaders = []): mixed
    {
        if ($response === null) {
            return $response;
        }

        if (\in_array($type, ['bool', 'int', 'float', 'string', 'null'])) {
            if ($response instanceof StreamInterface) {
                $response = (string)$response;
            }

            return $response;
        }

        if (\in_array($type, [SplFileObject::class, '\SplFileObject'])) {
            return $this
                ->objectSerializer
                ->denormalize(
                    $response,
                    SplFileObject::class,
                    [SplFileObjectNormalizer::HEADERS_KEY => $responseHeaders]
                );
        }

        return $this->objectSerializer->deserialize((string)$response, $type, $responseHeaders);
    }


    /**
     * @internal
     */
    private function validateParams(array $allData, Assert\Collection $validationConstraints): void
    {
        if (!empty($validationConstraints -> fields)) {
            $dataToValidate = [];

            foreach (\array_keys($validationConstraints -> fields) as $constraintKey) {
                $dataToValidate[$constraintKey] = $allData[$constraintKey];
            }

            $this->objectSerializer->validate($dataToValidate, $validationConstraints);
        }
    }
}
