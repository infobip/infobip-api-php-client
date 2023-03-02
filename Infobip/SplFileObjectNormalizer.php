<?php

/**
 * SplFileObjectNormalizer
 *
 * @category Class
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

namespace Infobip;

use InvalidArgumentException;
use Psr\Http\Message\StreamInterface;
use Symfony\Component\PropertyInfo\Type;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use SplFileObject;

final class SplFileObjectNormalizer implements
    NormalizerInterface,
    DenormalizerInterface
{
    public const CONFIGURATION_KEY = 'spl_file_object_configuration';
    public const HEADERS_KEY = 'spl_file_object_headers';

    private array $defaultContext = [
        self::CONFIGURATION_KEY => null,
    ];

    private const SUPPORTED_TYPES = [
        SplFileObject::class => true,
        '\SplFileObject' => true,
    ];

    public function __construct(array $defaultContext = [])
    {
        $this->setDefaultContext($defaultContext);
    }

    public function setDefaultContext(array $defaultContext): void
    {
        $this->defaultContext = array_merge($this->defaultContext, $defaultContext);
    }

    /**
     * @inheritdoc
     * @throws InvalidArgumentException
     */
    public function normalize(mixed $object, string $format = null, array $context = []): string
    {
        if (!$object instanceof SplFileObject) {
            throw new InvalidArgumentException('The object must be an instance of SplFileObject');
        }

        return $object->getRealPath();
    }

    /**
     * @inheritdoc
     */
    public function supportsNormalization(mixed $data, string $format = null): bool
    {
        return $data instanceof SplFileObject;
    }

    /**
     * @inheritdoc
     * @param StreamInterface $data
     * @throws NotNormalizableValueException
     */
    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): SplFileObject
    {
        if (!$data instanceof StreamInterface) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                'The data is not of StreamInterface type',
                $data,
                [Type::BUILTIN_TYPE_STRING],
                $context['deserialization_path'] ?? null,
                true
            );
        }

        $configuration = $this->defaultContext[self::CONFIGURATION_KEY] ?? new Configuration('', '');

        $headers = $context[self::HEADERS_KEY] ?? [];
        $contentDisposition = $headers['Content-Disposition'] ?? null;

        $fileName = (
            $contentDisposition !== null &&
            preg_match('/inline; filename=[\'"]?([^\'"\s]+)[\'"]?$/i', $contentDisposition, $match)
        )
            ? $configuration->getTempFolderPath()
                . DIRECTORY_SEPARATOR
                . $this->sanitizeFilename($match[1])
            : \tempnam($configuration->getTempFolderPath(), '');

        $file = \fopen($fileName, 'w');

        while ($chunk = $data->read(200)) {
            \fwrite($file, $chunk);
        }

        \fclose($file);

        return new SplFileObject($fileName, 'r');
    }

    /**
     * @inheritdoc
     */
    public function supportsDenormalization(mixed $data, string $type, string $format = null): bool
    {
        return \in_array($type, self::SUPPORTED_TYPES) && $data instanceof StreamInterface;
    }

    private function sanitizeFilename(string $filename): string
    {
        if (preg_match("/.*[\/\\\\](.*)$/", $filename, $match)) {
            return $match[1];
        }

        return $filename;
    }
}
