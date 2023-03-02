<?php

declare(strict_types=1);

/**
 * EnumNormalizer
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

use Infobip\Model\EnumInterface;
use Symfony\Component\PropertyInfo\Type;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class EnumNormalizer implements NormalizerInterface, DenormalizerInterface
{
    /**
     * @inheritdoc
     * @throws InvalidArgumentException
     */
    public function normalize(mixed $object, string $format = null, array $context = []): string
    {
        if (!$object instanceof EnumInterface) {
            throw new InvalidArgumentException('The object must implement EnumInterface');
        }

        return $object->__toString();
    }

    /**
     * @inheritdoc
     */
    public function supportsNormalization(mixed $data, string $format = null): bool
    {
        return $data instanceof EnumInterface;
    }

    /**
     * @inheritdoc
     * @throws NotNormalizableValueException
     */
    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): EnumInterface
    {
        if (null === $data || (\is_string($data) && '' === trim($data))) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                'The data is either an empty string or null',
                $data,
                [Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }

        return new $type($data);
    }

    /**
     * @inheritdoc
     */
    public function supportsDenormalization(mixed $data, string $type, string $format = null): bool
    {
        return \class_exists($type) && \is_subclass_of($type, EnumInterface::class);
    }
}
