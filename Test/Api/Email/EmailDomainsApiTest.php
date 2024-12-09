<?php

namespace Infobip\Test\Api\Email;

use DateTime;
use GuzzleHttp\Psr7\Query;
use Infobip\Api\EmailApi;
use Infobip\Model\EmailAddDomainRequest;
use Infobip\Model\EmailAllDomainsResponse;
use Infobip\Model\EmailDnsRecordResponse;
use Infobip\Model\EmailDomainIp;
use Infobip\Model\EmailDomainIpRequest;
use Infobip\Model\EmailDomainIpResponse;
use Infobip\Model\EmailDomainResponse;
use Infobip\Model\EmailReturnPathAddressRequest;
use Infobip\Model\EmailSimpleApiResponse;
use Infobip\Model\EmailTrackingEventRequest;
use Infobip\Model\EmailTrackingResponse;
use Infobip\Test\Api\ApiTestBase;

class EmailDomainsApiTest extends ApiTestBase
{
    private const string GET_ALL_DOMAINS = "/email/1/domains";
    private const string ADD_DOMAIN = "/email/1/domains";
    private const string GET_DOMAIN_DETAILS = "/email/1/domains/{domainName}";
    private const string DELETE_DOMAIN = "/email/1/domains/{domainName}";
    private const string UPDATE_RETURN_PATH = "/email/1/domains/{domainName}/return-path";
    private const string UPDATE_TRACKING_EVENTS = "/email/1/domains/{domainName}/tracking";
    private const string VERIFY_DOMAIN = "/email/1/domains/{domainName}/verify";
    private const string GET_ALL_IPS = "/email/1/ips";
    private const string GET_ALL_DOMAIN_IPS = "/email/1/domain-ips";
    private const string ASSIGN_IP_TO_DOMAIN = "/email/1/domain-ips";
    private const string REMOVE_IP_FROM_DOMAIN = "/email/1/domain-ips";


    public function testGetAllDomains(): void
    {
        $givenPage = 0;
        $givenSize = 2;

        $givenResponse = <<<JSON
        {
          "paging": {
            "page": 0,
            "size": 2,
            "totalPages": 0,
            "totalResults": 0
          },
          "results": [
            {
              "domainId": 1,
              "domainName": "example.com",
              "active": false,
              "tracking": {
                "clicks": true,
                "opens": true,
                "unsubscribe": true
              },
              "dnsRecords": [
                {
                  "recordType": "string",
                  "name": "string",
                  "expectedValue": "string",
                  "verified": true
                }
              ],
              "blocked": false,
              "createdAt": "2021-01-02T01:00:00.123+00:00",
              "returnPathAddress": "returnpath@example.com"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $expectedPath = self::GET_ALL_DOMAINS
            . "?"
            . Query::build([
                "size" => $givenSize,
                "page" => $givenPage
            ]);

        $closures = [
            fn () => $emailApi->getAllDomains(size: $givenSize, page: $givenPage),
            fn () => $emailApi->getAllDomainsAsync(size: $givenSize, page: $givenPage),
        ];

        foreach ($closures as $index => $closure) {
            /** @var EmailAllDomainsResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure(), EmailAllDomainsResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeaders(
                'GET',
                $expectedPath,
                $requestHistoryContainer[$index],
                ["Accept" => 'application/json',]
            );

            $this->assertIsArray($responseModel->getResults());
            $this->assertCount(1, $responseModel->getResults());

            $expectedEmailDomainResponse = new EmailDomainResponse(
                domainId: 1,
                domainName: "example.com",
                active: false,
                tracking: new EmailTrackingResponse(
                    clicks: true,
                    opens: true,
                    unsubscribe: true
                ),
                dnsRecords: [
                    new EmailDnsRecordResponse(
                        recordType: "string",
                        name: "string",
                        expectedValue: "string",
                        verified: true
                    )
                ],
                blocked: false,
                createdAt: new DateTime("2021-01-02T01:00:00.123+00:00"),
                returnPathAddress: 'returnpath@example.com'
            );
            $this->assertEquals($expectedEmailDomainResponse, $responseModel->getResults()[0]);
        }
    }

    public function testAddDomain(): void
    {
        $givenRequest = <<<JSON
        {
          "domainName": "example.com",
          "dkimKeyLength": "1024",
          "targetedDailyTraffic": 1000,
          "applicationId": "my-application-id",
          "entityId": "my-entity-id",
          "returnPathAddress": "returnpath@example.com"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "domainId": 1,
          "domainName": "example.com",
          "active": false,
          "tracking": {
            "clicks": true,
            "opens": true,
            "unsubscribe": true
          },
          "dnsRecords": [
            {
              "recordType": "string",
              "name": "string",
              "expectedValue": "string",
              "verified": true
            }
          ],
          "blocked": false,
          "createdAt": "2021-01-02T01:00:00.123+00:00",
          "returnPathAddress": "returnpath@example.com"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $request = new EmailAddDomainRequest(
            domainName: 'example.com',
            targetedDailyTraffic: 1000,
            dkimKeyLength: 1024,
            applicationId: 'my-application-id',
            entityId: 'my-entity-id',
            returnPathAddress: 'returnpath@example.com'
        );

        $closures = [
            fn () => $emailApi->addDomain($request),
            fn () => $emailApi->addDomainAsync($request)
        ];

        foreach ($closures as $index => $closure) {
            /** @var EmailDomainResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure(), EmailDomainResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeadersAndJsonBody(
                'POST',
                self::ADD_DOMAIN,
                $givenRequest,
                $requestHistoryContainer[$index]
            );

            $expectedEmailDomainResponse = new EmailDomainResponse(
                domainId: 1,
                domainName: "example.com",
                active: false,
                tracking: new EmailTrackingResponse(
                    clicks: true,
                    opens: true,
                    unsubscribe: true
                ),
                dnsRecords: [
                    new EmailDnsRecordResponse(
                        recordType: "string",
                        name: "string",
                        expectedValue: "string",
                        verified: true
                    )
                ],
                blocked: false,
                createdAt: new DateTime("2021-01-02T01:00:00.123+00:00"),
                returnPathAddress: 'returnpath@example.com'
            );

            $this->assertEquals($expectedEmailDomainResponse, $responseModel);
        }
    }

    public function testGetDomainDetails(): void
    {
        $givenDomainName = "example.com";

        $givenResponse = <<<JSON
        {
          "domainId": 1,
          "domainName": "example.com",
          "active": false,
          "tracking": {
            "clicks": true,
            "opens": true,
            "unsubscribe": true
          },
          "dnsRecords": [
            {
              "recordType": "string",
              "name": "string",
              "expectedValue": "string",
              "verified": true
            }
          ],
          "blocked": false,
          "createdAt": "2021-01-02T01:00:00.123+00:00",
          "returnPathAddress": "returnpath@example.com"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{domainName}", $givenDomainName, self::GET_DOMAIN_DETAILS);

        $closures = [
            fn () => $emailApi->getDomainDetails($givenDomainName),
            fn () => $emailApi->getDomainDetailsAsync($givenDomainName),
        ];

        foreach ($closures as $index => $closure) {
            /** @var EmailDomainResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure(), EmailDomainResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeaders(
                'GET',
                $expectedPath,
                $requestHistoryContainer[$index],
                ["Accept" => 'application/json',]
            );

            $expectedEmailDomainResponse = new EmailDomainResponse(
                domainId: 1,
                domainName: "example.com",
                active: false,
                tracking: new EmailTrackingResponse(
                    clicks: true,
                    opens: true,
                    unsubscribe: true
                ),
                dnsRecords: [
                    new EmailDnsRecordResponse(
                        recordType: "string",
                        name: "string",
                        expectedValue: "string",
                        verified: true
                    )
                ],
                blocked: false,
                createdAt: new DateTime("2021-01-02T01:00:00.123+00:00"),
                returnPathAddress: 'returnpath@example.com'
            );

            $this->assertEquals($expectedEmailDomainResponse, $responseModel);
        }
    }

    public function testDeleteDomain(): void
    {
        $givenDomainName = "example.com";

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, statusCode: 204);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);
        $expectedPath = str_replace("{domainName}", $givenDomainName, self::DELETE_DOMAIN);

        $closures = [
            fn () => $emailApi->deleteDomain($givenDomainName),
            fn () => $emailApi->deleteDomainAsync($givenDomainName),
        ];

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

    public function testUpdateReturnPath(): void
    {
        $givenDomainName = "example.com";

        $givenRequest = <<<JSON
        {
          "returnPathAddress": "returnpath@example.com"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "domainId": 1,
          "domainName": "example.com",
          "active": false,
          "tracking": {
            "clicks": true,
            "opens": true,
            "unsubscribe": true
          },
          "dnsRecords": [
            {
              "recordType": "string",
              "name": "string",
              "expectedValue": "string",
              "verified": true
            }
          ],
          "blocked": false,
          "createdAt": "2021-01-02T01:00:00.123+00:00",
          "returnPathAddress": "returnpath@example.com"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);
        $expectedPath = str_replace("{domainName}", $givenDomainName, self::UPDATE_RETURN_PATH);

        $request = new EmailReturnPathAddressRequest(returnPathAddress: 'returnpath@example.com');

        $closures = [
            fn () => $emailApi->updateReturnPath(domainName: $givenDomainName, emailReturnPathAddressRequest: $request),
            fn () => $emailApi->updateReturnPathAsync(domainName: $givenDomainName, emailReturnPathAddressRequest: $request),
        ];

        foreach ($closures as $index => $closure) {
            /** @var EmailDomainResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure(), EmailDomainResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeadersAndJsonBody(
                'PUT',
                $expectedPath,
                $givenRequest,
                $requestHistoryContainer[$index]
            );

            $expectedEmailDomainResponse = new EmailDomainResponse(
                domainId: 1,
                domainName: "example.com",
                active: false,
                tracking: new EmailTrackingResponse(
                    clicks: true,
                    opens: true,
                    unsubscribe: true
                ),
                dnsRecords: [
                    new EmailDnsRecordResponse(
                        recordType: "string",
                        name: "string",
                        expectedValue: "string",
                        verified: true
                    )
                ],
                blocked: false,
                createdAt: new DateTime("2021-01-02T01:00:00.123+00:00"),
                returnPathAddress: 'returnpath@example.com'
            );

            $this->assertEquals($expectedEmailDomainResponse, $responseModel);
        }
    }

    public function testUpdateTrackingEvents(): void
    {
        $givenDomainName = "example.com";

        $givenRequest = <<<JSON
        {
          "clicks": true,
          "open": true,
          "unsubscribe": true
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "domainId": 1,
          "domainName": "example.com",
          "active": false,
          "tracking": {
            "clicks": true,
            "opens": true,
            "unsubscribe": true
          },
          "dnsRecords": [
            {
              "recordType": "string",
              "name": "string",
              "expectedValue": "string",
              "verified": true
            }
          ],
          "blocked": false,
          "createdAt": "2021-01-02T01:00:00.123+00:00",
          "returnPathAddress": "returnpath@example.com"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);
        $expectedPath = str_replace("{domainName}", $givenDomainName, self::UPDATE_TRACKING_EVENTS);

        $request = new EmailTrackingEventRequest(
            open: true,
            clicks: true,
            unsubscribe: true
        );

        $closures = [
            fn () => $emailApi->updateTrackingEvents(domainName: $givenDomainName, emailTrackingEventRequest: $request),
            fn () => $emailApi->updateTrackingEventsAsync(domainName: $givenDomainName, emailTrackingEventRequest: $request),
        ];

        foreach ($closures as $index => $closure) {
            /** @var EmailDomainResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure(), EmailDomainResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeadersAndJsonBody(
                'PUT',
                $expectedPath,
                $givenRequest,
                $requestHistoryContainer[$index]
            );

            $expectedEmailDomainResponse = new EmailDomainResponse(
                domainId: 1,
                domainName: "example.com",
                active: false,
                tracking: new EmailTrackingResponse(
                    clicks: true,
                    opens: true,
                    unsubscribe: true
                ),
                dnsRecords: [
                    new EmailDnsRecordResponse(
                        recordType: "string",
                        name: "string",
                        expectedValue: "string",
                        verified: true
                    )
                ],
                blocked: false,
                createdAt: new DateTime("2021-01-02T01:00:00.123+00:00"),
                returnPathAddress: 'returnpath@example.com'
            );

            $this->assertEquals($expectedEmailDomainResponse, $responseModel);
        }
    }

    public function testVerifyDomain(): void
    {
        $giverDomainName = "example.com";

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, statusCode: 204);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{domainName}", $giverDomainName, self::VERIFY_DOMAIN);

        $expectedHttpMethod = 'POST';


        $closures = [
            fn () => $emailApi->verifyDomain(domainName: $giverDomainName),
            fn () => $emailApi->verifyDomainAsync(domainName: $giverDomainName),
        ];

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

    public function testGetAllIps(): void
    {
        $givenResponse = <<<JSON
        {
          "result": [
            {
              "ipAddress": "11.11.11.1",
              "dedicated": true,
              "assignedDomainCount": 1,
              "status": "ASSIGNABLE"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $closures = [
            fn () => $emailApi->getAllIps(),
            fn () => $emailApi->getAllIpsAsync()
        ];

        foreach ($closures as $index => $closure) {
            /** @var EmailDomainIpResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure(), EmailDomainIpResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeaders(
                'GET',
                self::GET_ALL_IPS,
                $requestHistoryContainer[$index],
                ["Accept" => 'application/json',]
            );

            $this->assertIsArray($responseModel->getResult());
            $this->assertCount(1, $responseModel->getResult());

            $expectedEmailDomainIpResponse = new EmailDomainIp(
                ipAddress: '11.11.11.1',
                dedicated: true,
                assignedDomainCount: 1,
                status: 'ASSIGNABLE'
            );

            $this->assertEquals($expectedEmailDomainIpResponse, $responseModel->getResult()[0]);
        }
    }

    public function testGetAllDomainIps(): void
    {
        $givenDomainName = "example.com";

        $givenResponse = <<<JSON
        {
          "result": [
            {
              "ipAddress": "11.11.11.1",
              "dedicated": true,
              "assignedDomainCount": 1,
              "status": "ASSIGNABLE"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $expectedPath = self::GET_ALL_DOMAIN_IPS
            . "?"
            . Query::build([
                "domainName" => $givenDomainName
            ]);

        $closures = [
            fn () => $emailApi->getAllDomainIps(domainName: $givenDomainName),
            fn () => $emailApi->getAllDomainIpsAsync(domainName: $givenDomainName),
        ];

        foreach ($closures as $index => $closure) {
            /** @var EmailDomainIpResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure(), EmailDomainIpResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeaders(
                'GET',
                $expectedPath,
                $requestHistoryContainer[$index],
                ["Accept" => 'application/json',]
            );

            $this->assertIsArray($responseModel->getResult());
            $this->assertCount(1, $responseModel->getResult());

            $expectedEmailDomainIpResponse = new EmailDomainIp(
                ipAddress: '11.11.11.1',
                dedicated: true,
                assignedDomainCount: 1,
                status: 'ASSIGNABLE'
            );

            $this->assertEquals($expectedEmailDomainIpResponse, $responseModel->getResult()[0]);
        }
    }

    public function testAssignIpToDomain(): void
    {
        $givenRequest = <<<JSON
        {
          "domainName": "example.com",
          "ipAddress": "11.11.11.1"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "result": "OK"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $request = new EmailDomainIpRequest(
            domainName: 'example.com',
            ipAddress: '11.11.11.1'
        );

        $closures = [
            fn () => $emailApi->assignIpToDomain($request),
            fn () => $emailApi->assignIpToDomainAsync($request),
        ];

        foreach ($closures as $index => $closure) {
            /** @var EmailSimpleApiResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure(), EmailSimpleApiResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeadersAndJsonBody(
                'POST',
                self::ASSIGN_IP_TO_DOMAIN,
                $givenRequest,
                $requestHistoryContainer[$index]
            );

            $this->assertEquals(new EmailSimpleApiResponse("OK"), $responseModel);
        }
    }

    public function testRemoveIpFromDomain(): void
    {
        $givenDomainName = "example.com";
        $givenIpAddress = "ipAddress";

        $givenResponse = <<<JSON
        {
          "result": "OK"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $expectedPath = self::REMOVE_IP_FROM_DOMAIN
            . "?"
            . Query::build([
                "domainName" => $givenDomainName,
                "ipAddress" => $givenIpAddress
            ]);

        $closures = [
            fn () => $emailApi->removeIpFromDomain(domainName: $givenDomainName, ipAddress: $givenIpAddress),
            fn () => $emailApi->removeIpFromDomainAsync(domainName: $givenDomainName, ipAddress: $givenIpAddress),
        ];

        foreach ($closures as $index => $closure) {
            /** @var EmailSimpleApiResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure(), EmailSimpleApiResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeaders(
                'DELETE',
                $expectedPath,
                $requestHistoryContainer[$index],
                ["Accept" => 'application/json',]
            );

            $this->assertEquals(new EmailSimpleApiResponse("OK"), $responseModel);
        }
    }
}
