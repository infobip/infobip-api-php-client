<?php

namespace Infobip\Test\Api\Email;

use DateTime;
use GuzzleHttp\Psr7\Query;
use Infobip\Api\EmailApi;
use Infobip\Model\EmailAddDomainRequest;
use Infobip\Model\EmailAllDomainsResponse;
use Infobip\Model\EmailDnsRecordResponse;
use Infobip\Model\EmailDomainIpPool;
use Infobip\Model\EmailDomainIpPoolAssignRequest;
use Infobip\Model\EmailDomainIpPoolUpdateRequest;
use Infobip\Model\EmailDomainResponse;
use Infobip\Model\EmailIpDetailResponse;
use Infobip\Model\EmailIpDomainResponse;
use Infobip\Model\EmailIpPoolAssignIpRequest;
use Infobip\Model\EmailIpPoolCreateRequest;
use Infobip\Model\EmailIpPoolDetailResponse;
use Infobip\Model\EmailIpPoolResponse;
use Infobip\Model\EmailIpResponse;
use Infobip\Model\EmailPaging;
use Infobip\Model\EmailReturnPathAddressRequest;
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
    private const string IPS = "/email/1/ip-management/ips";
    private const string IP = "/email/1/ip-management/ips/{ipId}";
    private const string POOLS = "/email/1/ip-management/pools";
    private const string POOL = "/email/1/ip-management/pools/{poolId}";
    private const string ASSIGN_IP_TO_POOL = "/email/1/ip-management/pools/{poolId}/ips";
    private const string UNASSIGN_IP_TO_POOL = "/email/1/ip-management/pools/{poolId}/ips/{ipId}";
    private const string DOMAINS = "/email/1/ip-management/domains/{domainId}";
    private const string ASSIGN_POOL_TO_DOMAIN = "/email/1/ip-management/domains/{domainId}/pools";
    private const string UPDATE_DOMAIN_POOL = "/email/1/ip-management/domains/{domainId}/pools/{poolId}";

    public function testGetAllDomains(): void
    {
        $givenPage = 0;
        $givenSize = 2;

        $givenResponse = <<<JSON
        {
          "paging": {
            "page": 0,
            "size": 2,
            "totalPages": 1,
            "totalResults": 1
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

        $expectedResponse = new EmailAllDomainsResponse(
            paging: new EmailPaging(
                page: 0,
                size: 2,
                totalPages: 1,
                totalResults: 1
            ),
            results: [
                new EmailDomainResponse(
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
                )
            ]
        );

        $this->assertGetRequest(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
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

        $this->assertPostRequest(
            $closures,
            self::ADD_DOMAIN,
            $givenRequest,
            $expectedEmailDomainResponse,
            $requestHistoryContainer
        );
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

        $this->assertGetRequest(
            $closures,
            $expectedPath,
            $expectedEmailDomainResponse,
            $requestHistoryContainer
        );
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

        $this->assertNoContentDeleteRequest(
            $closures,
            $expectedPath,
            $requestHistoryContainer
        );
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

        $this->assertPutRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedEmailDomainResponse,
            $requestHistoryContainer
        );
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

        $this->assertPutRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedEmailDomainResponse,
            $requestHistoryContainer
        );
    }

    public function testVerifyDomain(): void
    {
        $giverDomainName = "example.com";

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, statusCode: 202);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{domainName}", $giverDomainName, self::VERIFY_DOMAIN);

        $closures = [
            fn () => $emailApi->verifyDomain(domainName: $giverDomainName),
            fn () => $emailApi->verifyDomainAsync(domainName: $giverDomainName),
        ];

        $this->assertNoContentPostRequest(
            $closures,
            $expectedPath,
            $requestHistoryContainer
        );
    }

    public function testGetAllIps(): void
    {
        $givenResponse = <<<JSON
        [
          {
            "id": "DB3F9D439088BF73F5560443C8054AC4",
            "ip": "185.255.10.64"
          }
        ]
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $closures = [
            fn () => $emailApi->getAllIps(),
            fn () => $emailApi->getAllIpsAsync()
        ];

        $expectedResponse = [
            new EmailIpResponse(
                id: "DB3F9D439088BF73F5560443C8054AC4",
                ip: "185.255.10.64"
            )
        ];

        $this->assertGetRequest(
            $closures,
            self::IPS,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testGetIp(): void
    {
        $givenResponse = <<<JSON
        {
          "id": "DB3F9D439088BF73F5560443C8054AC4",
          "ip": "185.255.10.64",
          "pools": [
            {
              "id": "08A3A7608750CC6E6080325A6ADF45B6",
              "name": "IP pool name"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{ipId}", "DB3F9D439088BF73F5560443C8054AC4", self::IP);

        $closures = [
            fn () => $emailApi->getIpDetails("DB3F9D439088BF73F5560443C8054AC4"),
            fn () => $emailApi->getIpDetailsAsync("DB3F9D439088BF73F5560443C8054AC4"),
        ];

        $expectedResponse = new EmailIpDetailResponse(
            id: "DB3F9D439088BF73F5560443C8054AC4",
            ip: "185.255.10.64",
            pools: [
                new EmailIpPoolResponse(
                    id: "08A3A7608750CC6E6080325A6ADF45B6",
                    name: "IP pool name"
                )
            ]
        );

        $this->assertGetRequest(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testGetIpPools(): void
    {
        $givenResponse = <<<JSON
        [
          {
            "id": "08A3A7608750CC6E6080325A6ADF45B6",
            "name": "IP pool name"
          }
        ]
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $closures = [
            fn () => $emailApi->getIpPools(),
            fn () => $emailApi->getIpPoolsAsync()
        ];

        $expectedResponse = [
            new EmailIpPoolResponse(
                id: "08A3A7608750CC6E6080325A6ADF45B6",
                name: "IP pool name"
            )
        ];

        $this->assertGetRequest(
            $closures,
            self::POOLS,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testCreateIpPool(): void
    {
        $givenRequest = <<<JSON
        {
          "name": "IP pool name"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "08A3A7608750CC6E6080325A6ADF45B6",
          "name": "IP pool name"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 201);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $request = new EmailIpPoolCreateRequest(
            name: "IP pool name"
        );

        $closures = [
            fn () => $emailApi->createIpPool($request),
            fn () => $emailApi->createIpPoolAsync($request)
        ];

        $expectedResponse = new EmailIpPoolResponse(
            id: "08A3A7608750CC6E6080325A6ADF45B6",
            name: "IP pool name"
        );

        $this->assertPostRequest(
            $closures,
            self::POOLS,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testGetIpPool(): void
    {
        $givenResponse = <<<JSON
        {
          "id": "08A3A7608750CC6E6080325A6ADF45B6",
          "name": "IP pool name",
          "ips": [
            {
              "id": "DB3F9D439088BF73F5560443C8054AC4",
              "ip": "185.255.10.64"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{poolId}", "08A3A7608750CC6E6080325A6ADF45B6", self::POOL);

        $closures = [
            fn () => $emailApi->getIpPool("08A3A7608750CC6E6080325A6ADF45B6"),
            fn () => $emailApi->getIpPoolAsync("08A3A7608750CC6E6080325A6ADF45B6")
        ];

        $expectedResponse = new EmailIpPoolDetailResponse(
            id: "08A3A7608750CC6E6080325A6ADF45B6",
            name: "IP pool name",
            ips: [
                new EmailIpResponse(
                    id: "DB3F9D439088BF73F5560443C8054AC4",
                    ip: "185.255.10.64"
                )
            ]
        );

        $this->assertGetRequest(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testUpdateIpPool(): void
    {
        $givenRequest = <<<JSON
        {
          "name": "IP pool name"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "08A3A7608750CC6E6080325A6ADF45B6",
          "name": "IP pool name"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $request = new EmailIpPoolCreateRequest(
            name: "IP pool name"
        );

        $expectedPath = str_replace("{poolId}", "08A3A7608750CC6E6080325A6ADF45B6", self::POOL);

        $closures = [
            fn () => $emailApi->updateIpPool("08A3A7608750CC6E6080325A6ADF45B6", $request),
            fn () => $emailApi->updateIpPoolAsync("08A3A7608750CC6E6080325A6ADF45B6", $request)
        ];

        $expectedResponse = new EmailIpPoolResponse(
            id: "08A3A7608750CC6E6080325A6ADF45B6",
            name: "IP pool name"
        );

        $this->assertPutRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testDeleteIpPool(): void
    {
        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, statusCode: 204);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{poolId}", "08A3A7608750CC6E6080325A6ADF45B6", self::POOL);

        $closures = [
            fn () => $emailApi->deleteIpPool("08A3A7608750CC6E6080325A6ADF45B6"),
            fn () => $emailApi->deleteIpPoolAsync("08A3A7608750CC6E6080325A6ADF45B6")
        ];

        $this->assertNoContentDeleteRequest(
            $closures,
            $expectedPath,
            $requestHistoryContainer
        );
    }

    public function testAssignIpToPool(): void
    {
        $givenRequest = <<<JSON
        {
          "ipId": "DB3F9D439088BF73F5560443C8054AC4"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, null, 204);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $request = new EmailIpPoolAssignIpRequest(
            ipId: "DB3F9D439088BF73F5560443C8054AC4"
        );

        $expectedPath = str_replace("{poolId}", "08A3A7608750CC6E6080325A6ADF45B6", self::ASSIGN_IP_TO_POOL);

        $closures = [
            fn () => $emailApi->assignIpToPool("08A3A7608750CC6E6080325A6ADF45B6", $request),
            fn () => $emailApi->assignIpToPoolAsync("08A3A7608750CC6E6080325A6ADF45B6", $request)
        ];

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            null,
            $requestHistoryContainer
        );
    }

    public function testRemoveIpFromPool(): void
    {
        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, null, 204);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{poolId}", "08A3A7608750CC6E6080325A6ADF45B6", self::UNASSIGN_IP_TO_POOL);
        $expectedPath = str_replace("{ipId}", "DB3F9D439088BF73F5560443C8054AC4", $expectedPath);

        $closures = [
            fn () => $emailApi->removeIpFromPool("08A3A7608750CC6E6080325A6ADF45B6", "DB3F9D439088BF73F5560443C8054AC4"),
            fn () => $emailApi->removeIpFromPoolAsync("08A3A7608750CC6E6080325A6ADF45B6", "DB3F9D439088BF73F5560443C8054AC4")
        ];

        $this->assertNoContentDeleteRequest(
            $closures,
            $expectedPath,
            $requestHistoryContainer
        );
    }

    public function testGetIpDomain(): void
    {
        $givenResponse = <<<JSON
        {
          "id": 1,
          "name": "example.com",
          "pools": [
              {
                "id": "08A3A7608750CC6E6080325A6ADF45B6",
                "name": "IP pool name",
                "priority": 0,
                "ips": [
                  {
                    "id": "DB3F9D439088BF73F5560443C8054AC4",
                    "ip": "185.255.10.64"
                  }
                ]
              }
          ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{domainId}", "1", self::DOMAINS);

        $closures = [
            fn () => $emailApi->getIpDomain(1),
            fn () => $emailApi->getIpDomainAsync(1)
        ];

        $expectedResponse = new EmailIpDomainResponse(
            id: 1,
            name: "example.com",
            pools: [
                new EmailDomainIpPool(
                    id: "08A3A7608750CC6E6080325A6ADF45B6",
                    name: "IP pool name",
                    priority: 0,
                    ips: [
                        new EmailIpResponse(
                            id: "DB3F9D439088BF73F5560443C8054AC4",
                            ip: "185.255.10.64"
                        )
                    ]
                )
            ]
        );

        $this->assertGetRequest(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testAssignPoolToDomain(): void
    {
        $givenRequest = <<<JSON
        {
          "poolId": "08A3A7608750CC6E6080325A6ADF45B6",
          "priority": 0
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, null, 204);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $request = new EmailDomainIpPoolAssignRequest(
            poolId: "08A3A7608750CC6E6080325A6ADF45B6",
            priority: 0
        );

        $expectedPath = str_replace("{domainId}", "1", self::ASSIGN_POOL_TO_DOMAIN);

        $closures = [
            fn () => $emailApi->assignPoolToDomain(1, $request),
            fn () => $emailApi->assignPoolToDomainAsync(1, $request)
        ];

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            null,
            $requestHistoryContainer
        );
    }

    public function testUpdateDomainPoolPriority(): void
    {
        $givenRequest = <<<JSON
        {
          "priority": 1
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, null, 204);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $request = new EmailDomainIpPoolUpdateRequest(
            priority: 1
        );

        $expectedPath = str_replace("{domainId}", "1", self::UPDATE_DOMAIN_POOL);
        $expectedPath = str_replace("{poolId}", "08A3A7608750CC6E6080325A6ADF45B6", $expectedPath);

        $closures = [
            fn () => $emailApi->updateDomainPoolPriority(1, "08A3A7608750CC6E6080325A6ADF45B6", $request),
            fn () => $emailApi->updateDomainPoolPriorityAsync(1, "08A3A7608750CC6E6080325A6ADF45B6", $request)
        ];

        $this->assertPutRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            null,
            $requestHistoryContainer
        );
    }

    public function testRemoveIpPoolFromDomain(): void
    {
        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, null, 204);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $emailApi = new EmailApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{domainId}", "1", self::UPDATE_DOMAIN_POOL);
        $expectedPath = str_replace("{poolId}", "08A3A7608750CC6E6080325A6ADF45B6", $expectedPath);

        $closures = [
            fn () => $emailApi->removeIpPoolFromDomain(1, "08A3A7608750CC6E6080325A6ADF45B6"),
            fn () => $emailApi->removeIpPoolFromDomainAsync(1, "08A3A7608750CC6E6080325A6ADF45B6")
        ];

        $this->assertNoContentDeleteRequest(
            $closures,
            $expectedPath,
            $requestHistoryContainer
        );
    }
}
