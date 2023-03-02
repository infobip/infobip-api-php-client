<?php
/**
 * Configuration
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

final class Configuration
{
    public const API_KEY_HEADER = 'Authorization';
    public const API_KEY_PREFIX = 'App';

    public function __construct(
        private string $host,
        private string $apiKey,
        private ?string $tempFolderPath = null
    ) {
        if ($this->tempFolderPath === null) {
            $this->tempFolderPath = \sys_get_temp_dir();
        }
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getApiKeyHeader(): string
    {
        return self::API_KEY_HEADER;
    }

    public function getApiKey(): string
    {
        return sprintf('%s %s', self::API_KEY_PREFIX, $this->apiKey);
    }

    public function getUserAgent(): string
    {
        return 'infobip-api-client-php/5.0.0/PHP';
    }

    public function getTempFolderPath(): string
    {
        return $this->tempFolderPath;
    }
}
