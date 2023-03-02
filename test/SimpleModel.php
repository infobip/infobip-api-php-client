<?php

declare(strict_types=1);

namespace Infobip\Test;

use Infobip\Model\ModelInterface;
use Symfony\Component\Serializer\Annotation\Ignore;

class SimpleModel implements ModelInterface
{
    public function __construct(
        private string $propertyA,
        private string $propertyB,
        private ?SimpleModel $nestedModel = null,
    ) {
    }

    #[Ignore]
    public function getModelName(): string
    {
        return 'model-name';
    }

    #[Ignore]
    public static function getDiscriminator(): ?string
    {
        return null;
    }

    public function getPropertyA(): string
    {
        return $this->propertyA;
    }

    public function getPropertyB(): string
    {
        return $this->propertyB;
    }

    public function getNestedModel(): ?SimpleModel
    {
        return $this->nestedModel;
    }
}
