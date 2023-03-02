<?php

declare(strict_types=1);

namespace Infobip\Test;

use DateTime;
use Infobip\ObjectSerializer;
use PHPUnit\Framework\TestCase;

class ObjectSerializerTest extends TestCase
{
    private const EXPECTED_TIMESTAMP = 2071051722;
    private const EXPECTED_DATE = '2035/08/18';
    private const EXPECTED_DATE_FORMAT = 'Y/m/d';

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

    /**
     * @dataProvider dateFormatsSource
     * @param string $givenDateString
     */
    public function testSupportedSpecifiedDateTimeFormat(string $givenDateString)
    {
        // given
        $objectSerializer = $this->subject;

        $dateTimeJson = <<<JSON
        {
            "date":"$givenDateString"
        }
        JSON;

        $deserializedDateTimeJson = \json_decode($dateTimeJson);

        // when
        $dateTime = $objectSerializer->denormalize($deserializedDateTimeJson->date, '\DateTime');

        // then
        self::assertEquals(self::EXPECTED_DATE, date_format($dateTime, self::EXPECTED_DATE_FORMAT));
        self::assertEquals(self::EXPECTED_TIMESTAMP, $dateTime->getTimestamp());
    }

    public static function dateFormatsSource(): array
    {
        return [
            ['2035-08-18T12:08:42.777+00:00'],
            ['2035-08-18T13:08:42.777+01:00'],
            ['2035-08-18T11:08:42.777-01:00'],
            ['2035-08-18T17:08:42.777+05:00'],
            ['2035-08-18T07:08:42.777-05:00'],
            ['2035-08-18T13:38:42.777+01:30'],
            ['2035-08-18T10:38:42.777-01:30'],
            ['2035-08-18T17:38:42.777+05:30'],
            ['2035-08-18T06:38:42.777-05:30'],
            ['2035-08-18T06:38:42.777-0530'],
        ];
    }

    /**
     * @dataProvider jsonDateSerializationSource
     */
    public function testDateFormatInJsonDateSerialization(DateTime $givenDate, string $expectedDateString)
    {
        // given
        $objectSerializer = $this->subject;

        // when
        $serializedDateTime = $objectSerializer->serialize([
            'date' => $givenDate,
        ]);

        $unserializedDateTime = \json_decode($serializedDateTime);

        // then
        self::assertEquals($expectedDateString, $unserializedDateTime->date);
    }

    public static function jsonDateSerializationSource(): array
    {
        return [
            [new DateTime("2020-04-26T17:24:10.000+00:00"), "2020-04-26T17:24:10.000+00:00"],
            [new DateTime("2020-04-26T17:24:10.000+01:00"), "2020-04-26T17:24:10.000+01:00"],
        ];
    }

    public function testSupportedDateTimeFormats()
    {
        // given
        $objectSerializer = new ObjectSerializer();
        $givenDate1 = new DateTime("2020-04-26T17:24:10.000+0530");
        $givenDate2 = new DateTime("2020-04-26T17:24:10.000+05:30");

        // when
        $serializedDateTime1 = $objectSerializer->serialize(['date' => $givenDate1]);
        $serializedDateTime2 = $objectSerializer->serialize(['date' => $givenDate2]);

        $unserializedDateTime1 = \json_decode($serializedDateTime1)->date;
        $unserializedDateTime2 = \json_decode($serializedDateTime2)->date;

        // then
        self::assertEquals($unserializedDateTime1, $unserializedDateTime2);
        self::assertEquals($givenDate1, $givenDate2);
        self::assertEquals($givenDate1->getTimestamp(), $givenDate2->getTimestamp());
    }
}
