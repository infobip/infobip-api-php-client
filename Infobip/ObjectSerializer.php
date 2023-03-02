<?php
/**
 * ObjectSerializer
 *
 * PHP version 8.0
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

use DateTimeInterface;
use Doctrine\Common\Annotations\AnnotationReader;
use Infobip\Model\ModelInterface;
use InvalidArgumentException;
use SplFileObject;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class ObjectSerializer
{
    public const DEFAULT_DATE_TIME_FORMAT = "Y-m-d\TH:i:s.vP";

    private SerializerInterface $serializer;
    private ValidatorInterface $validator;

    public function __construct(?SerializerInterface $serializer = null)
    {
        if ($serializer === null) {
            $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
            $extractor = new PropertyInfoExtractor([], [new PhpDocExtractor(), new ReflectionExtractor()]);

            $serializer = new Serializer(
                [
                    new EnumNormalizer(),
                    new SplFileObjectNormalizer(),
                    new ArrayDenormalizer(),
                    new DateTimeNormalizer(
                        [DateTimeNormalizer::FORMAT_KEY => self::DEFAULT_DATE_TIME_FORMAT]
                    ),
                    new ObjectNormalizer(
                        $classMetadataFactory,
                        null,
                        null,
                        $extractor,
                        null,
                        null,
                        [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]
                    )
                ],
                [new JsonEncoder()]
            );
        }

        $this->serializer = $serializer;

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->addDefaultDoctrineAnnotationReader()
            ->getValidator();
    }

    public function serialize(mixed $data, string $format = JsonEncoder::FORMAT): string
    {
        if ($data instanceof ModelInterface) {
            $this->validate($data);
        }

        return $this->serializer->serialize($data, $format);
    }

    public function deserialize(
        mixed $data,
        string $class,
        array $headers = [],
        string $format = JsonEncoder::FORMAT,
        array $context = []
    ) {
        if ($data === null) {
            return null;
        }

        if ($class === '\DateTime') {
            $class = \DateTime::class;
        }

        $context[SplFileObjectNormalizer::HEADERS_KEY] = $headers;

        return $this->serializer->deserialize($data, $class, $format, $context);
    }

    /**
     * @internal
     */
    public function normalize(mixed $data, array $context = []): mixed
    {
        return $this->serializer->normalize($data, null, $context);
    }

    /**
     * @internal
     */
    public function denormalize(mixed $data, string $type, array $context = []): mixed
    {
        if ($type === '\DateTime') {
            $type = \DateTime::class;
        }

        return $this->serializer->denormalize($data, $type, null, $context);
    }

    /**
     * @internal
     * Take value and turn it into a string suitable for inclusion in
     * the path, by url-encoding.
     */
    public function toPathValue(string $value): string
    {
        return \rawurlencode($this->toString($value));
    }

    /**
     * @internal
     * Take value and turn it into a string suitable for inclusion in
     * the query, by imploding comma-separated if it's an object.
     * If it's a string, pass through unchanged. It will be url-encoded
     * later.
     */
    public function toQueryValue(mixed $object): string
    {
        if (\is_array($object)) {
            return implode(',', $object);
        }

        return $this->toString($object);
    }

    /**
     * @internal
     * Take value and turn it into a string suitable for inclusion in
     * the header. If it's a string, pass through unchanged
     * If it's a datetime object, format it using the predefined format.
     */
    public function toHeaderValue(mixed $value): string
    {
        $callable = [$value, 'toHeaderValue'];

        if (\is_callable($callable)) {
            return $callable();
        }

        return $this->toString($value);
    }

    /**
     * @internal
     */
    public function toFormValue(mixed $value): string
    {
        if (\is_array($value)) {
            return $this->serializeCollection($value);
        }

        return $this->toString($value);
    }

    /**
     * @internal
     */
    public function toString(mixed $value): string
    {
        if ($value instanceof SplFileObject || $value instanceof DateTimeInterface) {
            return $this->serializer->normalize($value);
        } elseif (\is_bool($value)) {
            return \var_export($value, true);
        }

        return (string)$value;
    }

    /**
     * @internal
     * Serialize an array to a string.
     * @param string|null $style - the format use for serialization (csv, ssv, tsv, pipes, multi)
     * @param bool $allowCollectionFormatMulti - allow collection format to be a multidimensional array
     */
    public function serializeCollection(
        array $collection,
        ?string $style = null,
        bool $allowCollectionFormatMulti = false
    ): string {
        if ($allowCollectionFormatMulti && ('multi' === $style)) {
            return preg_replace('/%5B[0-9]+%5D=/', '=', \http_build_query($collection, '', '&'));
        }

        return match ($style) {
            'pipeDelimited', 'pipes' => implode('|', $collection),
            'tsv' => implode("\t", $collection),
            'spaceDelimited', 'ssv' => implode(' ', $collection),
            default => implode(',', $collection)
        };
    }

    /**
     * @internal
     * @param Constraint[] $constraints
     * @throws InvalidArgumentException
     */
    public function validate(mixed $data, ?array $constraints = null)
    {
        $result = $this->validator->validate($data, $constraints);

        if ($result->count()) {
            $messages = [];

            /**
             * @var ConstraintViolationInterface $item
             */
            foreach ($result as $item) {
                $messages[] = sprintf(
                    'Property path \'%s\' validation failed with message: %s',
                    $item->getPropertyPath(),
                    $item->getMessage()
                );
            }

            throw new InvalidArgumentException(implode(',', $messages));
        }
    }
}
