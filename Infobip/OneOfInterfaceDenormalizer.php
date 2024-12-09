<?php

namespace Infobip;

use Exception;
use ReflectionClass;
use RuntimeException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

final class OneOfInterfaceDenormalizer implements DenormalizerInterface
{
    public function __construct(
        private ObjectNormalizer $objectNormalizer
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
