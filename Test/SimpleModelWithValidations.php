<?php

declare(strict_types=1);

namespace Infobip\Test;

use Symfony\Component\Validator\Constraints\Choice;

class SimpleModelWithValidations
{
    public function __construct(
        #[Choice(['correct-a'])]
        private string $propertyA,
        #[Choice(['correct-b'])]
        private string $propertyB,
        private ?SimpleModelWithValidations $nestedModel = null,
    ) {
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
