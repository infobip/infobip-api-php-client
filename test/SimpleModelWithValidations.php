<?php

declare(strict_types=1);

namespace Infobip\Test;

use Infobip\Model\ModelInterface;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Validator\Constraints\Choice;

class SimpleModelWithValidations implements ModelInterface
{
    public function __construct(
        #[Choice(['correct-a'])]
        private string $propertyA,
        #[Choice(['correct-b'])]
        private string $propertyB,
        private ?SimpleModelWithValidations $nestedModel = null,
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

    public function getNestedModel(): ?SimpleModelWithValidations
    {
        return $this->nestedModel;
    }
}
