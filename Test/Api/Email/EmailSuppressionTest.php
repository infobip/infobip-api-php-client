<?php

declare(strict_types=1);

namespace Infobip\Test\Api\Email;

use GuzzleHttp\Psr7\Query;
use Infobip\Api\EmailApi;
use Infobip\Model\EmailDomainInfo;
use Infobip\Model\EmailDomainInfoPageResponse;
use Infobip\Model\EmailGetSuppressionType;
use Infobip\Model\EmailPageDetails;
use Infobip\Model\EmailSuppressionInfo;
use Infobip\Model\EmailSuppressionInfoPageResponse;
use Infobip\Test\Api\ApiTestBase;

class EmailSuppressionTest extends ApiTestBase
{
    private const string EMAIL_SUPPRESSION = "/email/1/suppressions";
    private const string EMAIL_SUPPRESSION_DOMAINS = "/email/1/suppressions/domains";


    public function testGetSuppressionDomains(): void
    {
        $givenDomainName1 = "example.com";
        $givenDataAccess1 = "OWNER";
        $givenReadBounces1 = true;
        $givenCreateBounces1 = true;
        $givenDeleteBounces1 = true;
        $givenReadComplaints1 = true;
        $givenCreateComplaints1 = true;
        $givenDeleteComplaints1 = true;
        $givenReadOverquotas1 = true;

        $givenDomainName2 = "example.com";
        $givenDataAccess2 = "GRANTED";
        $givenReadBounces2 = true;
        $givenCreateBounces2 = true;
        $givenDeleteBounces2 = false;
        $givenReadComplaints2 = true;
        $givenCreateComplaints2 = false;
        $givenDeleteComplaints2 = false;
        $givenReadOverquotas2 = false;

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
              "readOverquotas": true
            },
            {
              "domainName": "example.com",
              "dataAccess": "GRANTED",
              "readBounces": true,
              "createBounces": true,
              "deleteBounces": false,
              "readComplaints": true,
              "createComplaints": false,
              "deleteComplaints": false,
              "readOverquotas": false
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

        $expectedPath = self::EMAIL_SUPPRESSION_DOMAINS . "?page=$givenPage&size=$givenSize";
        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getDomains(),
            fn () => $api->getDomainsAsync(),
        ];

        foreach ($closures as $index => $closure) {
            /** @var EmailDomainInfoPageResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure(), EmailDomainInfoPageResponse::class);

            $this->assertNotNull($responseModel);
            $this->assertCount(2, $responseModel->getResults());

            $expectedResponse = new EmailDomainInfoPageResponse(
                results: [
                    new EmailDomainInfo(
                        domainName: $givenDomainName1,
                        dataAccess: $givenDataAccess1,
                        readBounces: $givenReadBounces1,
                        createBounces: $givenCreateBounces1,
                        deleteBounces: $givenDeleteBounces1,
                        readComplaints: $givenReadComplaints1,
                        createComplaints: $givenCreateComplaints1,
                        deleteComplaints: $givenDeleteComplaints1,
                        readOverquotas: $givenReadOverquotas1
                    ),
                    new EmailDomainInfo(
                        domainName: $givenDomainName2,
                        dataAccess: $givenDataAccess2,
                        readBounces: $givenReadBounces2,
                        createBounces: $givenCreateBounces2,
                        deleteBounces: $givenDeleteBounces2,
                        readComplaints: $givenReadComplaints2,
                        createComplaints: $givenCreateComplaints2,
                        deleteComplaints: $givenDeleteComplaints2,
                        readOverquotas: $givenReadOverquotas2
                    )
                ],
                paging: new EmailPageDetails(
                    page: $givenPage,
                    size: $givenSize
                )
            );

            $this->assertEquals($expectedResponse, $responseModel);

            $this->assertRequestWithHeaders(
                $expectedHttpMethod,
                $expectedPath,
                $requestHistoryContainer[$index],
                ['Accept' => 'application/json']
            );
        }
    }

    public function testGetEmailSuppressions(): void
    {
        $givenDomainName = "example.com";
        $givenEmailAddress = "jane.smith@somecompany.com";
        $givenType = EmailGetSuppressionType::BOUNCE();
        $givenCreatedDate = "2024-08-14T14:02:17.366";
        $givenReason = "550 5.1.1 <jane.smith@somecompany.com>: user does not exist";
        $givenPage = 0;
        $givenSize = 100;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "domainName": "$givenDomainName",
              "emailAddress": "$givenEmailAddress",
              "type": "$givenType",
              "createdDate": "$givenCreatedDate",
              "reason": "$givenReason"
            }
          ],
          "paging": {
            "page": $givenPage,
            "size": $givenSize
          }
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new EmailApi($this->getConfiguration(), client: $client);

        $expectedPath = self::EMAIL_SUPPRESSION . "?" . Query::build([
            'domainName' => $givenDomainName,
            'type' => $givenType,
            'page' => $givenPage,
            'size' => $givenSize
        ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getSuppressions($givenDomainName, $givenType),
            fn () => $api->getSuppressionsAsync($givenDomainName, $givenType),
        ];

        foreach ($closures as $index => $closure) {
            /** @var EmailSuppressionInfoPageResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure(), EmailSuppressionInfoPageResponse::class);

            $expectedResponse = new EmailSuppressionInfoPageResponse(
                results: [
                    new EmailSuppressionInfo(
                        domainName: $givenDomainName,
                        emailAddress: $givenEmailAddress,
                        type: (string) $givenType,
                        createdDate: $givenCreatedDate,
                        reason: $givenReason
                    )
                ],
                paging: new EmailPageDetails(
                    page: $givenPage,
                    size: $givenSize
                )
            );

            $this->assertEquals($expectedResponse, $responseModel);

            $this->assertRequestWithHeaders(
                $expectedHttpMethod,
                $expectedPath,
                $requestHistoryContainer[$index],
                ['Accept' => 'application/json']
            );
        }
    }
}
