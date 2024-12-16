<?php

namespace Infobip\Test\Api\Moments;

use GuzzleHttp\Psr7\Query;
use Infobip\Api\FlowApi;
use Infobip\ApiException;
use Infobip\Model\FlowAddFlowParticipantResult;
use Infobip\Model\FlowAddFlowParticipantsRequest;
use Infobip\Model\FlowAddFlowParticipantsResponse;
use Infobip\Model\FlowEmailContact;
use Infobip\Model\FlowExceptionResponse;
use Infobip\Model\FlowParticipant;
use Infobip\Model\FlowParticipantsReportResponse;
use Infobip\Model\FlowPerson;
use Infobip\Model\FlowPersonContacts;
use Infobip\Model\FlowPersonUniqueField;
use Infobip\Model\FlowPersonUniqueFieldType;
use Infobip\Test\Api\ApiTestBase;

class FlowApiTest extends ApiTestBase
{
    public function testAddParticipantsToFlow()
    {
        $givenRequest = <<<JSON
        {
          "participants": [
            {
              "identifyBy": {
                "identifier": "370329180020364",
                "type": "FACEBOOK"
              }
            },
            {
              "identifyBy": {
                "identifier": "test1@example.com",
                "type": "EMAIL"
              },
              "variables": {
                "orderNumber": 1167873391
              }
            },
            {
              "identifyBy": {
                "identifier": "test2@example.com",
                "type": "EMAIL"
              },
              "variables": {
                "orderNumber": 1595299041
              },
              "person": {
                "externalId": "optional_external_person_id",
                "customAttributes": {
                  "Contract Expiry": "2025-04-01",
                  "Company": "Infobip"
                },
                "contactInformation": {
                  "email": [
                    {
                      "address": "info@example.com"
                    }
                  ]
                }
              }
            }
          ],
          "notifyUrl": "https://example.com/callback",
          "callbackData": "Callback Data"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "operationId": "03f2d474-0508-46bf-9f3d-d8e2c28adaea"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $flowApi = new FlowApi($this->getConfiguration(), client: $client);
        $expectedPath = '/moments/1/flows/200000000000001/participants';

        $request = new FlowAddFlowParticipantsRequest(
            participants: [
                new FlowParticipant(
                    identifyBy: new FlowPersonUniqueField(
                        identifier: '370329180020364',
                        type: FlowPersonUniqueFieldType::FACEBOOK
                    )
                ),
                new FlowParticipant(
                    identifyBy: new FlowPersonUniqueField(
                        identifier: 'test1@example.com',
                        type: FlowPersonUniqueFieldType::EMAIL
                    ),
                    variables: ['orderNumber' => 1167873391]
                ),
                new FlowParticipant(
                    identifyBy: new FlowPersonUniqueField(
                        identifier: 'test2@example.com',
                        type: FlowPersonUniqueFieldType::EMAIL
                    ),
                    variables: ['orderNumber' => 1595299041],
                    person: new FlowPerson(
                        externalId: 'optional_external_person_id',
                        customAttributes: [
                            'Contract Expiry' => '2025-04-01',
                            'Company' => 'Infobip'
                        ],
                        contactInformation: new FlowPersonContacts(
                            email: [
                                new FlowEmailContact(
                                    address: 'info@example.com'
                                )
                            ]
                        )
                    )
                )
            ],
            notifyUrl: 'https://example.com/callback',
            callbackData: 'Callback Data'
        );

        $closures = [
            fn () => $flowApi->addFlowParticipants(
                '200000000000001',
                $request
            ),
            fn () => $flowApi->addFlowParticipantsAsync(
                '200000000000001',
                $request
            )
        ];

        $expectedResponse = new FlowAddFlowParticipantsResponse(
            operationId: '03f2d474-0508-46bf-9f3d-d8e2c28adaea'
        );

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testGetFlowParticipantsAddedResponse()
    {
        $givenResponse = <<<JSON
        {
          "operationId": "03f2d474-0508-46bf-9f3d-d8e2c28adaea",
          "campaignId": 200000000000001,
          "callbackData": "Callback Data",
          "participants": [
            {
              "identifyBy": {
                "identifier": "test1@example.com",
                "type": "EMAIL"
              },
              "status": "ACCEPTED"
            },
            {
              "identifyBy": {
                "identifier": "test2@example.com",
                "type": "EMAIL"
              },
              "status": "REJECTED",
              "errorReason": "REJECTED_INVALID_CONTACT"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $flowApi = new FlowApi($this->getConfiguration(), client: $client);
        $expectedPath = '/moments/1/flows/200000000000001/participants/report?'
            . Query::build(['operationId' => '03f2d474-0508-46bf-9f3d-d8e2c28adaea']);

        $closures = [
            fn () => $flowApi->getFlowParticipantsAddedReport('200000000000001', '03f2d474-0508-46bf-9f3d-d8e2c28adaea'),
            fn () => $flowApi->getFlowParticipantsAddedReportAsync('200000000000001', '03f2d474-0508-46bf-9f3d-d8e2c28adaea')
        ];

        $expectedResponse = new FlowParticipantsReportResponse(
            operationId: '03f2d474-0508-46bf-9f3d-d8e2c28adaea',
            campaignId: 200000000000001,
            participants: [
                new FlowAddFlowParticipantResult(
                    identifyBy: new FlowPersonUniqueField(
                        identifier: 'test1@example.com',
                        type: FlowPersonUniqueFieldType::EMAIL
                    ),
                    status: 'ACCEPTED'
                ),
                new FlowAddFlowParticipantResult(
                    identifyBy: new FlowPersonUniqueField(
                        identifier: 'test2@example.com',
                        type: FlowPersonUniqueFieldType::EMAIL
                    ),
                    status: 'REJECTED',
                    errorReason: 'REJECTED_INVALID_CONTACT'
                )
            ],
            callbackData: 'Callback Data'
        );

        $this->assertGetRequest(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testRemovingPeopleFromFlow()
    {
        $givenCampaignId = '200000000000001';
        $givenExternalId = '8edb24b5-0319-48cd-a1d9-1e8bc5d577ab';

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, null, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $flowApi = new FlowApi($this->getConfiguration(), client: $client);
        $expectedPath = "/communication/1/flows/200000000000001/participants?"
            . Query::build(['externalId' => '8edb24b5-0319-48cd-a1d9-1e8bc5d577ab']);

        $closures = [
            fn () => $flowApi->removePeopleFromFlow($givenCampaignId, null, null, $givenExternalId),
            fn () => $flowApi->removePeopleFromFlowAsync($givenCampaignId, null, null, $givenExternalId)
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

    public function testRemovingPeopleFromFlowOnInvalidRequest()
    {
        $givenCampaignId = '200000000000001';
        $givenExternalId = '8edb24b5-0319-48cd-a1d9-1e8bc5d577ab';

        $givenResponse = <<<JSON
        {
          "errorCode": 40001,
          "errorMessage": "Bad request."
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 400);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $flowApi = new FlowApi($this->getConfiguration(), client: $client);
        $expectedPath = "/communication/1/flows/200000000000001/participants?"
            . Query::build(['externalId' => '8edb24b5-0319-48cd-a1d9-1e8bc5d577ab']);

        try {
            $flowApi->removePeopleFromFlow($givenCampaignId, null, null, $givenExternalId);
        } catch (ApiException $e) {
            $this->assertEquals(400, $e->getCode());
            $this->assertInstanceOf(FlowExceptionResponse::class, $e->getResponseObject());
            /** @var FlowExceptionResponse $response */
            $response = $e->getResponseObject();
            $this->assertEquals(40001, $response->getErrorCode());
            $this->assertEquals('Bad request.', $response->getErrorMessage());
        }

        $this->assertRequestWithHeaders(
            'DELETE',
            $expectedPath,
            $requestHistoryContainer[0],
            ["Accept" => 'application/json']
        );
    }
}
