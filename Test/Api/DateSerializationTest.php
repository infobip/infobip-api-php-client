<?php

declare(strict_types=1);

namespace Infobip\Test\Api;

use DateTime;
use Infobip\ObjectSerializer;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class DateSerializationTest extends ApiTestBase
{
    private const int EXPECTED_TIMESTAMP = 2071051722;
    private const string EXPECTED_DATE = '2035/08/18';
    private const string EXPECTED_DATE_FORMAT = 'Y/m/d';

    /**
     * @dataProvider dateFormatsSource
     * @param string $givenDateString
     */
    public function testSupportedSpecifiedDateTimeFormat(string $givenDateString): void
    {
        // given
        $objectSerializer = new ObjectSerializer();
        $dateTimeJson = $this->getDateStringJson($givenDateString);
        $deserializedDateTimeJson = json_decode($dateTimeJson);

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
            ['2035-08-18T06:38:42.777-0530']
        ];
    }

    private function getDateStringJson(string $dateString): string
    {
        return <<<JSON
        {
            "date":"$dateString"
        }
        JSON;
    }

    /**
     * @dataProvider jsonDateSerializationSource
     * @param DateTime $givenDate
     * @param string $expectedDateString
     * @throws ExceptionInterface
     */
    public function testDateFormatInJsonDateSerialization(DateTime $givenDate, string $expectedDateString): void
    {
        // given
        $objectSerializer = new ObjectSerializer();

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
            [
                new DateTime("2020-04-26T17:24:10.000+00:00"), "2020-04-26T17:24:10.000+00:00"
            ],
            [
                new DateTime("2020-04-26T17:24:10.000+01:00"), "2020-04-26T17:24:10.000+01:00"
            ]
        ];
    }

    public function testSupportedDateTimeFormats(): void
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
