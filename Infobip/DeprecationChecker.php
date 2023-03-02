<?php

declare(strict_types=1);

/**
 * DeprecationChecker
 *
 * PHP version 8.0
 *
 * @category Class
 * @package  Infobip
 * @author   Infobip Support
 * @link     https://www.infobip.com
 */

/**
 * Infobip Client API Libraries OpenAPI Specification
 *
 * OpenAPI specification containing public endpoints supported in client API libraries.
 *
 * Contact: support@infobip.com
 *
 * This class is auto generated from the Infobip OpenAPI specification through the OpenAPI Specification Client API libraries (Re)Generator (OSCAR), powered by the OpenAPI Generator (https://openapi-generator.tech).
 *
 * Do not edit manually. To learn how to raise an issue, see the CONTRIBUTING guide or contact us @ support@infobip.com.
 */

namespace Infobip;

use DateTimeZone;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

final class DeprecationChecker
{
    private const SUNSET_HEADER = 'Sunset';
    private const DEPRECATION_HEADER = 'Deprecation';

    private const LOG_DATE_FORMAT = 'Y-m-d';

    private const SUPPORT_EMAIL = 'support@infobip.com';

    public function __construct(private LoggerInterface $logger)
    {
    }

    /**
     * @internal
     */
    public function check(RequestInterface $request, ResponseInterface $response): void
    {
        $sunsetHeader = $response->getHeaderLine(self::SUNSET_HEADER);
        $deprecationHeader = $response->getHeaderLine(self::DEPRECATION_HEADER);

        $timezone = new DateTimeZone('UTC');
        $now = \date_create('now', $timezone);

        $method = $request->getMethod();
        $path = $request->getUri()->__toString();

        if (!empty($sunsetHeader)) {
            $sunsetDate = \date_create_from_format(DATE_RFC1123, $sunsetHeader, $timezone);

            if ($sunsetDate !== false) {
                $formattedSunsetDate = $sunsetDate->format(self::LOG_DATE_FORMAT);

                if ($sunsetDate < $now) {
                    $this->logGone($method, $path, $formattedSunsetDate);
                    return;
                }

                $this->logDeprecation($method, $path, $formattedSunsetDate);
                return;
            }
        }

        if (!empty($deprecationHeader)) {
            $this->logDeprecation($method, $path);
        }
    }

    private function logGone(string $method, string $path, string $sunsetHeader): void
    {
        $this
            ->logger
            ->warning(
                sprintf(
                    "As of %s UTC, the endpoint %s %s has been discontinued. "
                    . "To avoid disruption, kindly update the library or reach out to %s.",
                    $sunsetHeader,
                    $method,
                    $path,
                    self::SUPPORT_EMAIL
                )
            );
    }

    private function logDeprecation(string $method, string $path, ?string $sunsetHeader = null): void
    {
        $message = ($sunsetHeader !== null)
            ? sprintf(
                'As of %s UTC, the endpoint %s %s will no longer be available. '
                . 'To avoid disruption, kindly update the library or reach out to %s.',
                $sunsetHeader,
                $method,
                $path,
                self::SUPPORT_EMAIL
            )
            : sprintf(
                'The endpoint %s %s is deprecated. '
                . 'Please consider updating the library or reaching out to %s for assistance.',
                $method,
                $path,
                self::SUPPORT_EMAIL
            );

        $this
            ->logger
            ->warning($message);
    }
}
