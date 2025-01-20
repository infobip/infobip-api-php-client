<?php

declare(strict_types=1);

namespace Infobip\Test;

use Infobip\ObjectSerializer;
use Infobip\Test\Inheritance\ModelChild1;
use Infobip\Test\Inheritance\ModelChild2;
use Infobip\Test\Inheritance\ModelSuper;
use PHPUnit\Framework\TestCase;

class ObjectSerializerTest extends TestCase
{
    private ObjectSerializer $subject;

    protected function setUp(): void
    {
        $this->subject = new ObjectSerializer();
    }

    public function testSimpleSerialization()
    {
        // given
        $givenNestedModel = new SimpleModel(propertyA: 'nested-property-a', propertyB: 'nested-property-b');
        $givenModel = new SimpleModel(propertyA: 'property-a', propertyB: 'property-b', nestedModel: $givenNestedModel);

        $expectedResult = <<<JSON
        {
            "propertyA": "property-a",
            "propertyB": "property-b",
            "nestedModel": {
                "propertyA": "nested-property-a",
                "propertyB": "nested-property-b"
            }
        }
        JSON;

        // when
        $actualResult = $this->subject->serialize($givenModel);

        // then
        $this->assertJsonStringEqualsJsonString($expectedResult, $actualResult);
    }

    public function testSimpleDeserialization()
    {
        // given
        $givenInput = <<<JSON
        {
            "propertyA": "property-a",
            "propertyB": "property-b",
            "nestedModel": {
                "propertyA": "nested-property-a",
                "propertyB": "nested-property-b"
            }
        }
        JSON;

        // when
        $result = $this->subject->deserialize($givenInput, SimpleModel::class);

        // then
        $this->assertJsonStringEqualsJsonString($givenInput, $this->subject->serialize($result));
    }

    public function testValidation()
    {
        // given
        $givenNestedModel = new SimpleModelWithValidations(
            propertyA: 'correct-a',
            propertyB: 'correct-b'
        );

        $givenModel = new SimpleModelWithValidations(
            propertyA: 'correct-a',
            propertyB: 'correct-b',
            nestedModel: $givenNestedModel
        );

        $expectedResult = <<<JSON
        {
            "propertyA": "correct-a",
            "propertyB": "correct-b",
            "nestedModel": {
                "propertyA": "correct-a",
                "propertyB": "correct-b"
            }
        }
        JSON;

        // when
        $actualResult = $this->subject->serialize($givenModel);

        // then
        $this->assertJsonStringEqualsJsonString($expectedResult, $actualResult);
    }

    public function testInterfaceInheritance()
    {
        // given
        $objectSerializer = new ObjectSerializer();

        $givenJson1 = <<<JSON
        {
            "propertyA": "property-a"
        }
        JSON;

        $givenJson2 = <<<JSON
        {
            "propertyB": "property-b"
        }
        JSON;

        $givenJsonNotMatching = <<<JSON
        {
            "propertyC": "property-c"
        }
        JSON;

        $deserializedObject1 = $objectSerializer->deserialize($givenJson1, ModelSuper::class);
        $deserializedObject2 = $objectSerializer->deserialize($givenJson2, ModelSuper::class);

        // then
        self::assertInstanceOf(ModelChild1::class, $deserializedObject1);
        self::assertInstanceOf(ModelChild2::class, $deserializedObject2);
        self::assertEquals('property-a', $deserializedObject1->getPropertyA());
        self::assertEquals('property-b', $deserializedObject2->getPropertyB());

        $this->expectExceptionMessage('Denormalization to an instance of type Infobip\Test\Inheritance\ModelSuper is not supported.');
        $objectSerializer->deserialize($givenJsonNotMatching, ModelSuper::class);
    }
}
