<?php

declare(strict_types=1);

namespace Infobip\Test;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Infobip\DeprecationChecker;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class DeprecationCheckerTest extends TestCase
{
    private const SUPPORT_EMAIL = 'support@infobip.com';

    private LoggerInterface $logger;
    private DeprecationChecker $subject;

    protected function setUp(): void
    {
        $this->logger = $this->createMock(LoggerInterface::class);
        $this->subject = new DeprecationChecker($this->logger);
    }

    public function testShouldLogSunsetMessage(): void
    {
        // given
        $givenMethod = 'GET';
        $givenPath = '/some-path';
        $givenRequest = new Request($givenMethod, $givenPath);

        $givenSunsetHeader = 'Mon, 02 Jan 2023 23:59:59 GMT';
        $givenDeprecationHeader = 'Mon, 1 Jan 2035 00:00:00 GMT';

        $givenResponse = new Response(
            200,
            [
                'Sunset' => $givenSunsetHeader,
                'Deprecation' => $givenDeprecationHeader,
            ]
        );

        $expectedLogDate = '2023-01-02';

        $this
            ->logger
            ->expects($this->once())
            ->method('warning')
            ->with(
                sprintf(
                    "As of %s UTC, the endpoint %s %s has been discontinued. "
                    . "To avoid disruption, kindly update the library or reach out to %s.",
                    $expectedLogDate,
                    $givenMethod,
                    $givenPath,
                    self::SUPPORT_EMAIL
                )
            );

        // when, then
        $this->subject->check($givenRequest, $givenResponse);
    }

    public function testShouldLogDeprecationMessageWithSunsetHeader(): void
    {
        // given
        $givenMethod = 'GET';
        $givenPath = '/some-path';
        $givenRequest = new Request($givenMethod, $givenPath);

        $givenSunsetHeader = 'Mon, 1 Jan 2035 00:00:00 GMT';
        $givenDeprecationHeader = 'Tue, 2 Jan 2035 00:00:00 GMT';

        $givenResponse = new Response(
            200,
            [
                'Sunset' => $givenSunsetHeader,
                'Deprecation' => $givenDeprecationHeader,
            ]
        );

        $expectedLogDate = '2035-01-01';

        $this
            ->logger
            ->expects($this->once())
            ->method('warning')
            ->with(
                sprintf(
                    "As of %s UTC, the endpoint %s %s will no longer be available. "
                    . "To avoid disruption, kindly update the library or reach out to %s.",
                    $expectedLogDate,
                    $givenMethod,
                    $givenPath,
                    self::SUPPORT_EMAIL
                )
            );

        // when, then
        $this->subject->check($givenRequest, $givenResponse);
    }

    public function testShouldLogDeprecationMessage(): void
    {
        // given
        $givenMethod = 'GET';
        $givenPath = '/some-path';
        $givenRequest = new Request($givenMethod, $givenPath);

        $givenDeprecationHeader = 'Mon, 02 Jan 2023 23:59:59 GMT';

        $givenResponse = new Response(
            200,
            [
                'Deprecation' => $givenDeprecationHeader,
            ]
        );

        $this
            ->logger
            ->expects($this->once())
            ->method('warning')
            ->with(
                sprintf(
                    "The endpoint %s %s is deprecated. "
                    . "Please consider updating the library or reaching out to %s for assistance.",
                    $givenMethod,
                    $givenPath,
                    self::SUPPORT_EMAIL
                )
            );

        // when, then
        $this->subject->check($givenRequest, $givenResponse);
    }
}
