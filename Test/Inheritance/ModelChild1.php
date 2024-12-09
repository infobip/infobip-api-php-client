<?php

namespace Infobip\Test\Inheritance;

class ModelChild1 implements ModelSuper
{
    private string $propertyA;

    public function __construct(string $propertyA)
    {
        $this->propertyA = $propertyA;
    }

    public function setPropertyA(string $propertyA): void
    {
        $this->propertyA = $propertyA;
    }

    public function getPropertyA(): string
    {
        return $this->propertyA;
    }
}
