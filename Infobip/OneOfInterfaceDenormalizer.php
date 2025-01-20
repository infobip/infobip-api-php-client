<?php

/**
 * OneOfInterfaceDenormalizer
 *
 * PHP version 8.3
 *
 * @category Class
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

use Exception;
use ReflectionClass;
use RuntimeException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

final class OneOfInterfaceDenormalizer implements DenormalizerInterface
{
    public function __construct(
        private ObjectNormalizer $objectNormalizer,
        private EnumNormalizer $enumNormalizer
    ) {
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
        "*" => true,
        ];
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $reflectionClass = new ReflectionClass($type);
        $attributes = $reflectionClass->getAttributes(SerializationCandidates::class);
        /** @var SerializationCandidates $serializationCandidates */
        $serializationCandidates = $attributes[0]->newInstance();
        foreach ($serializationCandidates->getCandidates() as $candidate) {
            try {
                if ($this->enumNormalizer->supportsDenormalization($data, $candidate, $format, $context)) {
                    return $this->enumNormalizer->denormalize($data, $candidate, $format, $context);
                }
                return $this->objectNormalizer->denormalize($data, $candidate, $format, $context);
            } catch (Exception) {
                continue;
            }
        }
        throw new RuntimeException(sprintf('Denormalization to an instance of type %s is not supported.', $type));
    }

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        if (!interface_exists($type)) {
            return false;
        }
        $reflectionClass = new ReflectionClass($type);
        return $reflectionClass->isInterface()
            && $reflectionClass->getAttributes(SerializationCandidates::class) !== [];
    }
}
