<?php

declare(strict_types=1);

namespace Infobip\Test;

class SimpleModel
{
    public function __construct(
        private string $propertyA,
        private string $propertyB,
        private ?SimpleModel $nestedModel = null,
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

    public function getNestedModel(): ?SimpleModel
    {
        return $this->nestedModel;
    }
}
