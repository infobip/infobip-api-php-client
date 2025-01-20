<?php

declare(strict_types=1);

namespace Infobip\Test\Api;

use DateTime;
use Infobip\ObjectSerializer;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class DateSerializationTest extends TestCase
{
    private const int EXPECTED_TIMESTAMP = 2071051722;
    private const string EXPECTED_DATE = '2035-08-18T12:08:42.777Z';
    private const string TEST_TIMEZONE = 'UTC';

    private static string $initialDefaultTimezone;

    public static function setUpBeforeClass(): void
    {
        self::$initialDefaultTimezone = date_default_timezone_get();
        date_default_timezone_set(self::TEST_TIMEZONE);
    }

    public static function tearDownAfterClass(): void
    {
        date_default_timezone_set(self::$initialDefaultTimezone);
    }

    /**
     * @dataProvider dateFormatsSource
     * @param string $givenDateString
     */
    public function testSupportedSpecifiedDateTimeFormat(string $givenDateString): void
    {
        // given
        $objectSerializer = new ObjectSerializer();

        // when
        $dateTime = $objectSerializer->denormalize($givenDateString, '\DateTime');

        // then
        self::assertEquals(new DateTime(self::EXPECTED_DATE), $dateTime);
        self::assertEquals(self::EXPECTED_TIMESTAMP, $dateTime->getTimestamp());
    }

    public static function dateFormatsSource(): array
    {
        return [
            ['2035-08-18T12:08:42.777Z'],
            ['2035-08-18T12:08:42.777+00:00'],
            ['2035-08-18T12:08:42.777+0000'],
            ['2035-08-18T13:08:42.777+01:00'],
            ['2035-08-18T13:08:42.777+0100'],
            ['2035-08-18T11:08:42.777-01:00'],
            ['2035-08-18T11:08:42.777-0100'],
            ['2035-08-18T17:08:42.777+05:00'],
            ['2035-08-18T17:08:42.777+0500'],
            ['2035-08-18T07:08:42.777-05:00'],
            ['2035-08-18T07:08:42.777-0500'],
            ['2035-08-18T13:38:42.777+01:30'],
            ['2035-08-18T13:38:42.777+0130'],
            ['2035-08-18T10:38:42.777-01:30'],
            ['2035-08-18T10:38:42.777-0130'],
            ['2035-08-18T17:38:42.777+05:30'],
            ['2035-08-18T17:38:42.777+0530'],
            ['2035-08-18T06:38:42.777-05:30'],
            ['2035-08-18T06:38:42.777-0530'],
            ['2035-08-18T12:08:42.777'],
        ];
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

        // then
        self::assertEquals("{\"date\":\"$expectedDateString\"}", $serializedDateTime);
    }

    public static function jsonDateSerializationSource(): array
    {
        return [
            [
                new DateTime("2020-04-26T17:24:10.000+00:00"), "2020-04-26T17:24:10.000+00:00"
            ],
            [
                new DateTime("2020-04-26T17:24:10.000+01:00"), "2020-04-26T17:24:10.000+01:00"
            ],
            [
                new DateTime("2020-04-26T17:24:10.000+0100"), "2020-04-26T17:24:10.000+01:00"
            ],
            [
                new DateTime("2020-04-26T17:24:10.000"), "2020-04-26T17:24:10.000+00:00"
            ]
        ];
    }
}
