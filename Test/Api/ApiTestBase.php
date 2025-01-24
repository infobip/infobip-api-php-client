<?php

declare(strict_types=1);

namespace Infobip\Test\Api;

use Closure;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Promise\Utils;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Infobip\Configuration;
use Infobip\ObjectSerializer;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use Throwable;

abstract class ApiTestBase extends TestCase
{
    private const string API_KEY_PREFIX = "App";
    private const string API_KEY = "testApiKey";
    private const string HOST = "http://localhost:8080";
    private const string EXPECTED_USER_AGENT = 'infobip-api-client-php/6.2.1/PHP';

    protected array $givenRequestHeaders = [
        'content-type'  => 'application/json;charset=UTF-8',
        'server'        => 'API',
        'x-request-id'  => 'testRequestId',
    ];

    private Configuration $configuration;
    private ObjectSerializer $objectSerializer;

    public function setUp(): void
    {
        parent::setUp();
        $this->setUpConfiguration();
        $this->setupObjectSerializer();
    }

    private function setUpConfiguration(): void
    {
        $this->configuration = new Configuration(
            host: self::HOST,
            apiKey: self::API_KEY
        );
    }

    private function setupObjectSerializer(): void
    {
        $this->objectSerializer = new ObjectSerializer();
    }

    protected function getConfiguration(): Configuration
    {
        return $this->configuration;
    }

    protected function getObjectSerializer(): ObjectSerializer
    {
        return $this->objectSerializer;
    }

    protected function mockClient(array $expectedResponses, array &$requestHistoryContainer): Client
    {
        $history = Middleware::history($requestHistoryContainer);
        $mockHandler = new MockHandler($expectedResponses);
        $handlerStack = HandlerStack::create($mockHandler);
        $handlerStack->push($history);

        return new Client(['handler' => $handlerStack]);
    }

    protected function assertRequestWithHeadersAndJsonBody(
        string $expectedHttpMethod,
        string $expectedPath,
        string $expectedRequest,
        array $requestHistoryTransaction,
        array $expectedHeaders = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]
    ): void {
        /** @var Request $actualRequest */
        $actualRequest = $requestHistoryTransaction['request'];

        $actualRequestBody = $actualRequest->getBody()->getContents();

        $this->assertRequestWithHeaders(
            $expectedHttpMethod,
            $expectedPath,
            $requestHistoryTransaction,
            $expectedHeaders
        );

        $this->assertJsonStringEqualsJsonString($expectedRequest, $actualRequestBody);
    }

    protected function assertRequestWithHeaders(
        string $expectedHttpMethod,
        string $expectedPath,
        array $requestHistoryTransaction,
        array $expectedHeaders = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]
    ): void {
        if (!isset($requestHistoryTransaction['request'])) {
            throw new RuntimeException('Request history transaction must contain request object!');
        }

        /** @var Request $actualRequest */
        $actualRequest = $requestHistoryTransaction['request'];

        $this->assertSame($expectedHttpMethod, $actualRequest->getMethod());
        $this->assertSame($expectedPath, $actualRequest->getRequestTarget());
        $this->assertSame(self::API_KEY_PREFIX . ' ' . self::API_KEY, $actualRequest->getHeaderLine('Authorization'));

        foreach ($expectedHeaders as $headerName => $headerValue) {
            $this->assertSame($headerValue, $actualRequest->getHeaderLine($headerName));
        }

        $this->assertEquals(
            self::EXPECTED_USER_AGENT,
            $actualRequest->getHeaderLine('User-Agent')
        );
    }

    protected function assertMultipartFormRequestWithHeadersAndParts(
        string $expectedHttpMethod,
        string $expectedPath,
        array $parts,
        array $requestHistoryTransaction
    ): void {
        if (!isset($requestHistoryTransaction['request'])) {
            throw new RuntimeException('Request history transaction must contain request object!');
        }

        /** @var Request $actualRequest */
        $actualRequest = $requestHistoryTransaction['request'];

        $this->assertSame($expectedHttpMethod, $actualRequest->getMethod());
        $this->assertSame($expectedPath, $actualRequest->getRequestTarget());
        $this->assertSame(self::API_KEY_PREFIX . ' ' . self::API_KEY, $actualRequest->getHeaderLine('Authorization'));

        $this->assertStringStartsWith(
            'multipart/form-data; boundary=----',
            $actualRequest->getHeaderLine('Content-Type')
        );

        $this->assertSame('application/json', $actualRequest->getHeaderLine('Accept'));

        $this->assertMatchesRegularExpression(
            '/infobip-api-client-php\/.*/',
            $actualRequest->getHeaderLine('User-Agent')
        );

        $partPatternTemplate = '/Content-Disposition: form-data; name="%s"(; filename="[^"]+")?\r\n?Content-Length: \d+(\r\nContent-Type: application\/octet-stream)?\r\n\r\n%s/';
        $multipartBody = (string) $actualRequest->getBody();
        foreach ($parts as $field => $value) {
            $arrayValue = is_array($value) ? $value : [$value];
            foreach ($arrayValue as $item) {
                $pattern = sprintf($partPatternTemplate, $field, $item);
                $this->assertMatchesRegularExpression($pattern, $multipartBody);
            }
        }
    }

    protected function assertHttpInfoResponse(array $httpInfo): void
    {
        $this->assertArrayHasKey('content-type', $httpInfo);
        $this->assertArrayHasKey('server', $httpInfo);
        $this->assertArrayHasKey('x-request-id', $httpInfo);

        $this->assertContains('application/json;charset=UTF-8', $httpInfo['content-type']);
        $this->assertContains('API', $httpInfo['server']);
        $this->assertContains('testRequestId', $httpInfo['x-request-id']);
    }

    protected function getUnpackedModel(
        mixed   $inputResponse,
        ?string $expectedInstanceType = null,
        ?array $requestHistoryContainer = null,
    ) {

        $response = ($inputResponse instanceof PromiseInterface)
            ? current(Utils::unwrap([$inputResponse]))
            : $inputResponse;
        if ($requestHistoryContainer !== null) {
            $rawResponse = $requestHistoryContainer[array_key_last($requestHistoryContainer)];

            $headers = $rawResponse["response"]?->getHeaders();

            if (isset($headers)) {
                $this->assertHttpInfoResponse($headers);
            }
        }

        if ($expectedInstanceType !== null && is_array($response)) {
            $this->assertContainsOnlyInstancesOf($expectedInstanceType, $response);
        } elseif ($expectedInstanceType !== null) {
            $this->assertInstanceOf($expectedInstanceType, $response);
        }

        return $response;
    }

    /**
     * Create a single model from a flat data array
     * @param array<string, mixed> $inputData
     * @param string|Closure $modelClass
     * @return mixed
     */
    protected function makeOne(array $inputData, $modelClass)
    {
        $model = (is_callable($modelClass))
            ? $modelClass($inputData)
            : new $modelClass(...$inputData);

        // call setters to set the input data to allow it to break the test
        foreach ($inputData as $key => $value) {
            $setter = 'set' . ucfirst($key);
            $model->$setter($value);
        }

        return $model;
    }

    /**
     * Create many models from an array of flat data arrays
     * @param array<int, array> $inputData
     * @param string|Closure $modelClass
     * @return array<mixed>
     */
    protected function makeMany(array $inputData, $modelClass)
    {
        $models = [];

        foreach ($inputData as $item) {
            $models[] = $this->makeOne($item, $modelClass);
        }

        return $models;
    }

    /**
     * @return Response[]
     */
    protected function makeResponses(
        int $count,
        ?string $givenResponse = null,
        int $statusCode = 200,
        ?array $requestHeaders = null
    ): array {
        $requestHeaders = ($requestHeaders === null)
            ? $this->givenRequestHeaders
            : array_replace($this->givenRequestHeaders, $requestHeaders);

        $responses = [];

        while ($count > 0) {
            $responses[] = new Response($statusCode, $requestHeaders, $givenResponse);
            $count--;
        }

        return $responses;
    }

    /**
     * @param $closures array of functions that return the response
     * @param $expectedInstance
     * @param $expectedResponse
     * @param $expectedPath
     * @param $expectedHttpMethod
     * @param $requestHistoryContainer
     * @param string $expectedContentType
     * @return void
     * @throws Throwable
     */

    protected function assertClosureResponses(
        array $closures,
        $expectedInstance,
        $expectedResponse,
        $expectedPath,
        $expectedHttpMethod,
        &$requestHistoryContainer,
        string $expectedContentType = 'application/json'
    ): void {
        foreach ($closures as $index => $closure) {
            $response = $this
                ->getUnpackedModel(
                    $closure(),
                    $expectedInstance,
                    $requestHistoryContainer
                );

            $this->assertRequestWithHeaders(
                $expectedHttpMethod,
                $expectedPath,
                $requestHistoryContainer[$index],
                [
                    "Accept" => $expectedContentType,
                ]
            );
            $serializedModel = $this->getObjectSerializer()->serialize($response);

            $this->assertJsonStringEqualsJsonString($expectedResponse, $serializedModel);
        }
    }

    protected function assertGetRequest(
        array  $closures,
        string $expectedPath,
        mixed $expectedResponse,
        array  &$requestHistoryContainer
    ): void {
        $this->assertRequestWithoutBody(
            $closures,
            'GET',
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    protected function assertPostRequest(
        array  $closures,
        string $expectedPath,
        string $givenRawRequest,
        mixed $expectedResponse,
        array  &$requestHistoryContainer
    ): void {
        $this->assertRequestWithBody(
            $closures,
            'POST',
            $expectedPath,
            $givenRawRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    protected function assertPostRequestWithAdditionalHeaders(
        array  $closures,
        string $expectedPath,
        string $givenRawRequest,
        mixed $expectedResponse,
        array  &$requestHistoryContainer,
        array $additionalHeaders
    ): void {
        $this->assertRequestWithBody(
            $closures,
            'POST',
            $expectedPath,
            $givenRawRequest,
            $expectedResponse,
            $requestHistoryContainer,
            $additionalHeaders,
        );
    }

    protected function assertPatchRequest(
        array  $closures,
        string $expectedPath,
        string $givenRawRequest,
        mixed $expectedResponse,
        array  &$requestHistoryContainer
    ): void {
        $this->assertRequestWithBody(
            $closures,
            'PATCH',
            $expectedPath,
            $givenRawRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    protected function assertPutRequest(
        array  $closures,
        string $expectedPath,
        string $givenRawRequest,
        mixed $expectedResponse,
        array  &$requestHistoryContainer
    ): void {
        $this->assertRequestWithBody(
            $closures,
            'PUT',
            $expectedPath,
            $givenRawRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    private function assertRequestWithBody(
        array  $closures,
        string $expectedMethod,
        string $expectedPath,
        string $givenRawRequest,
        mixed $expectedResponse,
        array  &$requestHistoryContainer,
        array  $additionalHeaders = []
    ): void {
        foreach ($closures as $index => $closure) {
            $expectedInstanceType = ($expectedResponse == null || is_array($expectedResponse)) ? null : $expectedResponse::class;
            $response = $this->getUnpackedModel($closure(), $expectedInstanceType, $requestHistoryContainer);

            $expectedHeaders = array_merge(
                $additionalHeaders,
                ['Accept' => 'application/json', 'Content-Type' => 'application/json']
            );

            $this->assertRequestWithHeadersAndJsonBody(
                $expectedMethod,
                $expectedPath,
                $givenRawRequest,
                $requestHistoryContainer[$index],
                $expectedHeaders
            );

            $this->assertEquals($expectedResponse, $response);
        }
    }

    private function assertRequestWithoutBody(
        array  $closures,
        string $expectedMethod,
        string $expectedPath,
        mixed $expectedResponse,
        array  &$requestHistoryContainer,
        array  $additionalHeaders = []
    ): void {
        foreach ($closures as $index => $closure) {
            $expectedInstanceType = ($expectedResponse == null || is_array($expectedResponse)) ? null : $expectedResponse::class;
            $response = $this->getUnpackedModel($closure(), $expectedInstanceType, $requestHistoryContainer);

            $expectedHeaders = array_merge(
                $additionalHeaders,
                ['Accept' => 'application/json']
            );

            $this->assertRequestWithHeaders(
                $expectedMethod,
                $expectedPath,
                $requestHistoryContainer[$index],
                $expectedHeaders
            );

            $this->assertEquals($expectedResponse, $response);
        }
    }

    protected function assertPostRequestWithNoBody(
        array  $closures,
        string $expectedPath,
        mixed $expectedResponse,
        array  &$requestHistoryContainer
    ): void {
        $this->assertRequestWithoutBody(
            $closures,
            'POST',
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    protected function assertDeleteRequest(
        array $closures,
        string $expectedPath,
        mixed $expectedResponse,
        array &$requestHistoryContainer
    ): void {
        $this->assertRequestWithoutBody(
            $closures,
            'DELETE',
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    protected function assertDeleteRequestWithBody(
        array  $closures,
        string $expectedPath,
        string $givenRawRequest,
        mixed $expectedResponse,
        array  &$requestHistoryContainer
    ): void {
        $this->assertRequestWithBody(
            $closures,
            'DELETE',
            $expectedPath,
            $givenRawRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    protected function assertNoContentDeleteRequest(
        array $closures,
        string $expectedPath,
        array &$requestHistoryContainer
    ): void {
        foreach ($closures as $index => $closure) {
            $this->getUnpackedModel($closure(), null, $requestHistoryContainer);

            $this->assertRequestWithHeaders(
                'DELETE',
                $expectedPath,
                $requestHistoryContainer[$index],
                ["Accept" => 'application/json',]
            );
        }
    }

    protected function assertNoContentPostRequest(
        array $closures,
        string $expectedPath,
        array &$requestHistoryContainer
    ): void {
        foreach ($closures as $index => $closure) {
            $this->getUnpackedModel($closure(), null, $requestHistoryContainer);

            $this->assertRequestWithHeaders(
                'POST',
                $expectedPath,
                $requestHistoryContainer[$index],
                ["Accept" => 'application/json',]
            );
        }
    }
}
