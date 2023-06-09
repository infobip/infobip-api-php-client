<?php

namespace Infobip;

use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;

final class Client
{
    public function __construct(private Configuration $configuration)
    {
    }

    /**
     * Sends request to Infobip
     * @param string $method The HTTP verb used
     * @param string $path The URI path for the endpoint
     * @param mixed $queryParams The Query Params used within the URI
     * @param mixed $body The HTTP Body send to the endpoint
     * @return \GuzzleHttp\Psr7\Request
     */
    public function send(
        string $method,
        string $path,
        $queryParams = null,
        $body = null
    ): Request {
        // Default Headers
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ];
        $headers[
            $this->configuration->getApiKeyHeader()
        ] = $this->configuration->getApiKey();
        // Construct full URI to the endpoint
        $query = Query::build($queryParams);
        $uri = $this->configuration->getHost() . $path . ($query ? "?{$query}" : '');
        return new Request($method, $uri, $headers, $body);
    }

    /**
     * Send a POST request to Infobip
     * @param string $path The URI path for the endpoint
     * @param mixed $body The HTTP Body send to the endpoint
     * @return \GuzzleHttp\Psr7\Request
     */
    public function post(string $path, $body): Request
    {
        return $this->send('POST', $path, $body);
    }

    /**
     * Send a PUT request to Infobip
     * @param string $path The URI path for the endpoint
     * @param mixed $body The HTTP Body send to the endpoint
     * @return \GuzzleHttp\Psr7\Request
     */
    public function put(string $path, $body): Request
    {
        return $this->send('PUT', $path, $body);
    }

    /**
     * Send a POST request to Infobip
     * @param string $path The URI path for the endpoint
     * @param mixed $queryParams The Query Params used within the URI
     * @return \GuzzleHttp\Psr7\Request
     */
    public function get(string $path, $queryParams = null): Request
    {
        return $this->send('GET', $path, $queryParams);
    }
}