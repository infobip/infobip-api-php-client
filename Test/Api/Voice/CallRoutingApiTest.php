<?php

namespace Infobip\Test\Api\Voice;

use GuzzleHttp\Psr7\Query;
use Infobip\Api\CallRoutingApi;
use Infobip\Model\CallRoutingRouteRequest;
use Infobip\Model\CallRoutingRouteResponse;
use Infobip\Model\CallRoutingRouteResponsePage;
use Infobip\Test\Api\ApiTestBase;

class CallRoutingApiTest extends ApiTestBase
{
    private const string GET_CALL_ROUTES = "/callrouting/1/routes";
    private const string CREATE_CALL_ROUTE = "/callrouting/1/routes";
    private const string GET_CALL_ROUTE = "/callrouting/1/routes/{routeId}";
    private const string UPDATE_CALL_ROUTE = "/callrouting/1/routes/{routeId}";
    private const string DELETE_CALL_ROUTE = "/callrouting/1/routes/{routeId}";


    public function testGetCallRoutes(): void
    {
        $givenPage = 0;
        $givenSize = 10;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "id": "f8fc8aca-786d-4943-9af2-e7ec01b5e80d",
              "name": "SIP endpoint route",
              "destinations": [
                {
                  "value": {
                    "username": "41793026834",
                    "sipTrunkId": "string",
                    "customHeaders": {
                      "string": "string"
                    },
                    "type": "SIP"
                  },
                  "connectTimeout": 30,
                  "recording": {
                    "recordingType": "AUDIO",
                    "recordingComposition": {
                      "enabled": true
                    },
                    "customData": {
                      "string": "string"
                    },
                    "filePrefix": "string"
                  },
                  "type": "ENDPOINT"
                }
              ]
            },
            {
              "id": "f8fc8aca-786d-4943-9af2-e7ec01b5e80d",
              "name": "Phone endpoint route",
              "destinations": [
                {
                  "value": {
                    "phoneNumber": "41793026834",
                    "type": "PHONE"
                  },
                  "connectTimeout": 30,
                  "recording": {
                    "recordingType": "AUDIO",
                    "recordingComposition": {
                      "enabled": true
                    },
                    "customData": {
                      "string": "string"
                    },
                    "filePrefix": "string"
                  },
                  "type": "ENDPOINT"
                }
              ]
            }
          ],
          "paging": {
            "page": 0,
            "size": 20,
            "totalPages": 1,
            "totalResults": 2
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallRoutingApi($this->getConfiguration(), client: $client);

        $expectedPath = self::GET_CALL_ROUTES
            . "?"
            . Query::build(
                [
                    "page" => $givenPage,
                    "size" => $givenSize
                ]
            );

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getCallRoutes(page: $givenPage, size: $givenSize),
            fn () => $api->getCallRoutesAsync(page: $givenPage, size: $givenSize)
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: CallRoutingRouteResponsePage::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );


    }

    public function testCreateCallRoute(): void
    {
        $givenRequest = <<<JSON
        {
          "name": "Route with a SIP endpoint destination",
          "destinations": [
            {
              "value": {
                "username": "41793026834",
                "sipTrunkId": "60d345fd3a799ec",
                "customHeaders": {
                  "Header-Name": "header value"
                },
                "type": "SIP"
              },
              "connectTimeout": 30,
              "recording": {
                "recordingType": "AUDIO",
                "recordingComposition": {
                  "enabled": true
                },
                "customData": {
                  "key1": "value1"
                },
                "filePrefix": "rec"
              },
              "type": "ENDPOINT"
            }
          ]
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "f8fc8aca-786d-4943-9af2-e7ec01b5e80d",
          "name": "Sample Route Name",
          "destinations": [
            {
              "value": {
                "username": "41793026834",
                "sipTrunkId": "string",
                "customHeaders": {
                  "string": "string"
                },
                "type": "SIP"
              },
              "connectTimeout": 30,
              "recording": {
                "recordingType": "AUDIO",
                "recordingComposition": {
                  "enabled": true
                },
                "customData": {
                  "string": "string"
                },
                "filePrefix": "string"
              },
              "type": "ENDPOINT"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 201);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallRoutingApi($this->getConfiguration(), client: $client);

        $expectedPath = self::CREATE_CALL_ROUTE;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallRoutingRouteRequest::class);

        $closures = [
            fn () => $api->createCallRoute($request),
            fn () => $api->createCallRouteAsync($request)
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: CallRoutingRouteResponse::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer,
        );


    }

    public function testGetCallRoute(): void
    {
        $givenRouteId = "f8fc8aca-786d-4943-9af2-e7ec01b5e80d";

        $givenResponse = <<<JSON
        {
          "id": "f8fc8aca-786d-4943-9af2-e7ec01b5e80d",
          "name": "Sample Route Name",
          "destinations": [
            {
              "value": {
                "username": "41793026834",
                "sipTrunkId": "string",
                "customHeaders": {
                  "string": "string"
                },
                "type": "SIP"
              },
              "connectTimeout": 30,
              "recording": {
                "recordingType": "AUDIO",
                "recordingComposition": {
                  "enabled": true
                },
                "customData": {
                  "string": "string"
                },
                "filePrefix": "string"
              },
              "type": "ENDPOINT"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallRoutingApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{routeId}", $givenRouteId, self::GET_CALL_ROUTE);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getCallRoute(routeId: $givenRouteId),
            fn () => $api->getCallRouteAsync(routeId: $givenRouteId)
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: CallRoutingRouteResponse::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );
    }

    public function testUpdateCallRoute(): void
    {
        $givenRouteId = "f8fc8aca-786d-4943-9af2-e7ec01b5e80d";

        $givenRequest = <<<JSON
        {
          "name": "Route with a SIP endpoint destination",
          "destinations": [
            {
              "value": {
                "username": "41793026834",
                "sipTrunkId": "60d345fd3a799ec",
                "customHeaders": {
                  "Header-Name": "header value"
                },
                "type": "SIP"
              },
              "connectTimeout": 30,
              "recording": {
                "recordingType": "AUDIO",
                "recordingComposition": {
                  "enabled": true
                },
                "customData": {
                  "key1": "value1"
                },
                "filePrefix": "rec"
              },
              "type": "ENDPOINT"
            }
          ]
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "f8fc8aca-786d-4943-9af2-e7ec01b5e80d",
          "name": "Sample Route Name",
          "destinations": [
            {
              "value": {
                "username": "41793026834",
                "sipTrunkId": "string",
                "customHeaders": {
                  "string": "string"
                },
                "type": "SIP"
              },
              "connectTimeout": 30,
              "recording": {
                "recordingType": "AUDIO",
                "recordingComposition": {
                  "enabled": true
                },
                "customData": {
                  "string": "string"
                },
                "filePrefix": "string"
              },
              "type": "ENDPOINT"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallRoutingApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{routeId}", $givenRouteId, self::UPDATE_CALL_ROUTE);

        $expectedHttpMethod = "PUT";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallRoutingRouteRequest::class);

        $closures = [
            fn () => $api->updateCallRoute(routeId: $givenRouteId, callRoutingRouteRequest: $request),
            fn () => $api->updateCallRouteAsync(routeId: $givenRouteId, callRoutingRouteRequest: $request)
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: CallRoutingRouteResponse::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );

    }

    public function testDeleteCallRoute(): void
    {
        $givenRouteId = "f8fc8aca-786d-4943-9af2-e7ec01b5e80d";

        $givenResponse = <<<JSON
        {
          "id": "f8fc8aca-786d-4943-9af2-e7ec01b5e80d",
          "name": "Sample Route Name",
          "destinations": [
            {
              "value": {
                "username": "41793026834",
                "sipTrunkId": "string",
                "customHeaders": {
                  "string": "string"
                },
                "type": "SIP"
              },
              "connectTimeout": 30,
              "recording": {
                "recordingType": "AUDIO",
                "recordingComposition": {
                  "enabled": true
                },
                "customData": {
                  "string": "string"
                },
                "filePrefix": "string"
              },
              "type": "ENDPOINT"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallRoutingApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{routeId}", $givenRouteId, self::DELETE_CALL_ROUTE);

        $expectedHttpMethod = "DELETE";

        $closures = [
            fn () => $api->deleteCallRoute(routeId: $givenRouteId),
            fn () => $api->deleteCallRouteAsync(routeId: $givenRouteId)
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: CallRoutingRouteResponse::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );

    }
}
