<?php

declare(strict_types=1);

namespace Infobip\Test\Api\Email;

use GuzzleHttp\Psr7\Query;
use Infobip\Api\EmailApi;
use Infobip\Model\EmailAddSuppression;
use Infobip\Model\EmailAddSuppressionRequest;
use Infobip\Model\EmailAddSuppressionType;
use Infobip\Model\EmailDeleteSuppression;
use Infobip\Model\EmailDeleteSuppressionRequest;
use Infobip\Model\EmailDomainInfo;
use Infobip\Model\EmailDomainInfoPageResponse;
use Infobip\Model\EmailPageDetails;
use Infobip\Model\EmailSuppressionInfo;
use Infobip\Model\EmailSuppressionInfoPageResponse;
use Infobip\Model\EmailSuppressionType;
use Infobip\Test\Api\ApiTestBase;

class EmailSuppressionTest extends ApiTestBase
{
    private const string EMAIL_SUPPRESSION = "/email/1/suppressions";
    private const string EMAIL_SUPPRESSION_DOMAINS = "/email/1/suppressions/domains";

    public function testGetSuppressionDomains(): void
    {
        $givenPage = 0;
        $givenSize = 100;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "domainName": "example.com",
              "dataAccess": "OWNER",
              "readBounces": true,
              "createBounces": true,
              "deleteBounces": true,
              "readComplaints": true,
              "createComplaints": true,
              "deleteComplaints": true,
              "readOverquotas": true,
              "deleteOverquotas": true
            },
            {
              "domainName": "example.org",
              "dataAccess": "GRANTED",
              "readBounces": true,
              "createBounces": true,
              "deleteBounces": false,
              "readComplaints": true,
              "createComplaints": false,
              "deleteComplaints": false,
              "readOverquotas": false,
              "deleteOverquotas": false
            }
          ],
          "paging": {
            "page": 0,
            "size": 100
          }
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new EmailApi($this->getConfiguration(), client: $client);

        $expectedPath = self::EMAIL_SUPPRESSION_DOMAINS . '?' . Query::build([
                'page' => $givenPage,
                'size' => $givenSize
            ]);

        $closures = [
            fn () => $api->getDomains(),
            fn () => $api->getDomainsAsync(),
        ];

        $expectedResponse = new EmailDomainInfoPageResponse(
            results: [
                new EmailDomainInfo(
                    domainName: "example.com",
                    dataAccess: "OWNER",
                    readBounces: true,
                    createBounces: true,
                    deleteBounces: true,
                    readComplaints: true,
                    createComplaints: true,
                    deleteComplaints: true,
                    readOverquotas: true,
                    deleteOverquotas: true
                ),
                new EmailDomainInfo(
                    domainName: "example.org",
                    dataAccess: "GRANTED",
                    readBounces: true,
                    createBounces: true,
                    deleteBounces: false,
                    readComplaints: true,
                    createComplaints: false,
                    deleteComplaints: false,
                    readOverquotas: false,
                    deleteOverquotas: false
                )
            ],
            paging: new EmailPageDetails(
                page: $givenPage,
                size: $givenSize
            )
        );

        $this->assertGetRequest(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testGetEmailSuppressions(): void
    {
        $givenResponse = <<<JSON
        {
          "results": [
            {
              "domainName": "example.com",
              "emailAddress": "jane.smith@example.com",
              "type": "BOUNCE",
              "createdDate": "2024-08-14T14:02:17.366Z",
              "reason": "550 5.1.1 <jane.smith@example.com>: user does not exist"
            }
          ],
          "paging": {
            "page": 0,
            "size": 100
          }
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new EmailApi($this->getConfiguration(), client: $client);

        $expectedPath = self::EMAIL_SUPPRESSION . "?" . Query::build([
                'domainName' => 'example.com',
                'type' => 'BOUNCE',
                'page' => 0,
                'size' => 100
            ]);

        $closures = [
            fn () => $api->getSuppressions('example.com', EmailSuppressionType::BOUNCE()),
            fn () => $api->getSuppressionsAsync('example.com', EmailSuppressionType::BOUNCE()),
        ];

        $expectedResponse = new EmailSuppressionInfoPageResponse(
            results: [
                new EmailSuppressionInfo(
                    domainName: 'example.com',
                    emailAddress: 'jane.smith@example.com',
                    type: EmailSuppressionType::BOUNCE,
                    createdDate: new \DateTime('2024-08-14T14:02:17.366Z'),
                    reason: '550 5.1.1 <jane.smith@example.com>: user does not exist'
                )
            ],
            paging: new EmailPageDetails(
                page: 0,
                size: 100
            )
        );

        $this->assertGetRequest(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testAddEmailSuppressions(): void
    {
        $givenRequest = <<<JSON
        {
          "suppressions": [
            {
              "domainName": "example.com",
              "emailAddress": [
                "jane.smith@example.com",
                "john.doe@example.com"
              ],
              "type": "BOUNCE"
            },
            {
              "domainName": "example.org",
              "emailAddress": [
                "john.smith@example.org"
              ],
              "type": "COMPLAINT"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, null, 204);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new EmailApi($this->getConfiguration(), client: $client);

        $request = new EmailAddSuppressionRequest(
            suppressions: [
                new EmailAddSuppression(
                    domainName: 'example.com',
                    emailAddress: [
                        'jane.smith@example.com',
                        'john.doe@example.com'
                    ],
                    type: EmailAddSuppressionType::BOUNCE
                ),
                new EmailAddSuppression(
                    domainName: 'example.org',
                    emailAddress: [
                        'john.smith@example.org'
                    ],
                    type: EmailAddSuppressionType::COMPLAINT
                )
            ]
        );

        $closures = [
            fn () => $api->addSuppressions($request),
            fn () => $api->addSuppressionsAsync($request),
        ];

        $this->assertPostRequest(
            $closures,
            self::EMAIL_SUPPRESSION,
            $givenRequest,
            null,
            $requestHistoryContainer
        );
    }

    public function testDeleteEmailSuppressions(): void
    {
        $givenRequest = <<<JSON
        {
          "suppressions": [
            {
              "domainName": "example.com",
              "emailAddress": [
                "jane.smith@example.com",
                "john.doe@example.com"
              ],
              "type": "BOUNCE"
            },
            {
              "domainName": "example.org",
              "emailAddress": [
                "john.smith@example.org"
              ],
              "type": "OVER_QUOTA"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, null, 204);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new EmailApi($this->getConfiguration(), client: $client);

        $request = new EmailDeleteSuppressionRequest(
            suppressions: [
                new EmailDeleteSuppression(
                    domainName: 'example.com',
                    emailAddress: [
                        'jane.smith@example.com',
                        'john.doe@example.com'
                    ],
                    type: EmailSuppressionType::BOUNCE
                ),
                new EmailAddSuppression(
                    domainName: 'example.org',
                    emailAddress: [
                        'john.smith@example.org'
                    ],
                    type: EmailSuppressionType::OVER_QUOTA
                )
            ]
        );

        $closures = [
            fn () => $api->deleteSuppressions($request),
            fn () => $api->deleteSuppressionsAsync($request),
        ];

        $this->assertDeleteRequestWithBody(
            $closures,
            self::EMAIL_SUPPRESSION,
            $givenRequest,
            null,
            $requestHistoryContainer
        );
    }
}
