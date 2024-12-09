<?php

namespace Infobip\Test\Inheritance;

class ModelChild2 implements ModelSuper
{
    private string $propertyB;

    public function __construct(string $propertyB)
    {
        $this->propertyB = $propertyB;
    }

    public function setPropertyB(string $propertyB): void
    {
        $this->propertyB = $propertyB;
    }

    public function getPropertyB(): string
    {
        return $this->propertyB;
    }
}
