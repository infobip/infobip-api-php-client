<?php

namespace Infobip\Test\Api\Voice;

use DateTime;
use GuzzleHttp\Psr7\Query;
use Infobip\Api\VoiceApi;
use Infobip\Model\CallsAdvancedBody;
use Infobip\Model\CallsBulkRequest;
use Infobip\Model\CallsBulkResponse;
use Infobip\Model\CallsBulkStatusResponse;
use Infobip\Model\CallsGetVoicesResponse;
use Infobip\Model\CallsMultiBody;
use Infobip\Model\CallsRecordedAudioFilesResponse;
use Infobip\Model\CallsRecordedIvrFile;
use Infobip\Model\CallsSearchResponse;
use Infobip\Model\CallsSetVariable;
use Infobip\Model\CallsSingleBody;
use Infobip\Model\CallsUpdateScenarioRequest;
use Infobip\Model\CallsUpdateScenarioResponse;
use Infobip\Model\CallsUpdateStatusRequest;
use Infobip\Model\CallsVoiceResponse;
use Infobip\Test\Api\ApiTestBase;

class VoiceApiTest extends ApiTestBase
{
    private const string SEND_SINGLE_VOICE_TTS = "/tts/3/single";
    private const string SEND_MULTIPLE_VOICE_TTS = "/tts/3/multi";
    private const string SEND_ADVANCED_VOICE_TTS = "/tts/3/advanced";
    private const string GET_VOICES = "/tts/3/voices/{language}";
    private const string GET_SENT_BULKS = "/tts/3/bulks";
    private const string RESCHEDULE_SENT_BULK = "/tts/3/bulks";
    private const string GET_SENT_BULKS_STATUS = "/tts/3/bulks/status";
    private const string MANAGE_SENT_BULKS_STATUS = "/tts/3/bulks/status";
    private const string IVR_FILES = "/voice/ivr/1/files";
    private const string VOICE_SCENARIOS = "/voice/ivr/1/scenarios";
    private const string VOICE_SCENARIO = "/voice/ivr/1/scenarios/{id}";
    private const string LAUNCH_IVR_SCENARIO = "/voice/ivr/1/messages";


    public function testSendSingleVoiceTts(): void
    {
        $givenRequest = <<<JSON
        {
          "text": "Test Voice message.",
          "language": "en",
          "voice": {
            "name": "Joanna",
            "gender": "female"
          },
          "from": "442032864231",
          "to": "41793026727"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "bulkId": "4fda521a-c680-470d-b134-83d468f7ac80",
          "messages": [
            {
              "to": "41793026727",
              "status": {
                "groupId": 1,
                "groupName": "PENDING",
                "id": 26,
                "name": "PENDING_ACCEPTED",
                "description": "Message accepted, pending for delivery."
              },
              "messageId": "2250be2d4219-3af1-78856-aabe-1362af1edfd2"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $expectedPath = self::SEND_SINGLE_VOICE_TTS;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsSingleBody::class);

        $closures = [
            fn () => $api->sendSingleVoiceTts($request),
            fn () => $api->sendSingleVoiceTtsAsync($request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsVoiceResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );


    }

    public function testSendMultipleVoiceTts(): void
    {
        $givenRequest = <<<JSON
        {
          "messages": [
            {
              "audioFileUrl": "https://www.example.com/media.mp3",
              "from": "41793026700",
              "to": [
                "41793026727",
                "41793026731"
              ]
            },
            {
              "text": "Hello world!",
              "language": "en",
              "voice": {
                "name": "Joanna",
                "gender": "female"
              },
              "from": "41793026800",
              "to": [
                "41793026785"
              ]
            }
          ]
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "bulkId": "4fda521a-c680-470d-b134-83d468f7ac80",
          "messages": [
            {
              "to": "41793026727",
              "status": {
                "groupId": 1,
                "groupName": "PENDING",
                "id": 26,
                "name": "PENDING_ACCEPTED",
                "description": "Message accepted, pending for delivery."
              },
              "messageId": "2250be2d4219-3af1-78856-aabe-1362af1edfd2"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $expectedPath = self::SEND_MULTIPLE_VOICE_TTS;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsMultiBody::class);

        $closures = [
            fn () => $api->sendMultipleVoiceTts($request),
            fn () => $api->sendMultipleVoiceTtsAsync($request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsVoiceResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testSendAdvancedVoiceTts(): void
    {
        $givenRequest = <<<JSON
        {
          "bulkId": "BULK-ID-123-xyz",
          "messages": [
            {
              "from": "41793026700",
              "destinations": [
                {
                  "to": "41793026727",
                  "messageId": "MESSAGE-ID-123-xyz"
                },
                {
                  "to": "41793026731"
                }
              ],
              "text": "Test Voice message.",
              "language": "en",
              "voice": {
                "name": "Joanna",
                "gender": "female"
              },
              "speechRate": 1,
              "notifyUrl": "https://www.example.com/voice/advanced",
              "notifyContentType": "application/json",
              "validityPeriod": 720,
              "sendAt": "2023-08-10T07:36:42.005+0000",
              "repeatDtmf": "123",
              "maxDtmf": 1,
              "ringTimeout": 45,
              "dtmfTimeout": 10,
              "callTimeout": 130,
              "callTransfers": [
                {
                  "equals": "2",
                  "transferTo": "41793026700",
                  "callTransferMaxDuration": 45,
                  "if": "DTMF"
                },
                {
                  "transferTo": "41793026701",
                  "callTransferMaxDuration": 45,
                  "if": "anyDtmf"
                }
              ],
              "callbackData": "DLR callback data",
              "pause": 3,
              "retry": {
                "minPeriod": 1,
                "maxPeriod": 5,
                "maxCount": 5
              },
              "sendingSpeed": {
                "speed": 5,
                "timeUnit": "minute"
              },
              "machineDetection": "continue",
              "deliveryTimeWindow": {
                "from": {
                  "hour": 6,
                  "minute": 0
                },
                "to": {
                  "hour": 15,
                  "minute": 30
                },
                "days": [
                  "MONDAY",
                  "TUESDAY",
                  "WEDNESDAY",
                  "THURSDAY",
                  "FRIDAY",
                  "SATURDAY",
                  "SUNDAY"
                ]
              }
            }
          ]
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "bulkId": "5028e2d42f19-42f1-4656-351e-a42c191e5fd2",
          "messages": [
            {
              "to": "41793026727",
              "status": {
                "groupId": 1,
                "groupName": "PENDING",
                "id": 26,
                "name": "PENDING_ACCEPTED",
                "description": "Message accepted, pending for delivery."
              },
              "messageId": "4242f196ba50-a356-2f91-831c4aa55f351ed2"
            },
            {
              "to": "41793026731",
              "status": {
                "groupId": 1,
                "groupName": "PENDING",
                "id": 26,
                "name": "PENDING_ACCEPTED",
                "description": "Message accepted, pending for delivery."
              },
              "messageId": "5f35f896ba50-a356-43a4-91cd81b85f8c689"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $expectedPath = self::SEND_ADVANCED_VOICE_TTS;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsAdvancedBody::class);

        $closures = [
            fn () => $api->sendAdvancedVoiceTts($request),
            fn () => $api->sendAdvancedVoiceTtsAsync($request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsVoiceResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetVoices(): void
    {
        $givenLanguage = "en";
        $givenIncludeNeural = "false";

        $givenResponse = <<<JSON
        {
          "voices": [
            {
              "name": "Benjamin",
              "gender": "male",
              "supplier": "Microsoft",
              "ssmlSupported": false,
              "isDefault": false,
              "isNeural": false
            },
            {
              "name": "Ivy",
              "gender": "female",
              "supplier": "Amazon",
              "ssmlSupported": true,
              "isDefault": false,
              "isNeural": false
            },
            {
              "name": "Joanna",
              "gender": "female",
              "supplier": "Amazon",
              "ssmlSupported": true,
              "isDefault": true,
              "isNeural": false
            },
            {
              "name": "Joey",
              "gender": "male",
              "supplier": "Amazon",
              "ssmlSupported": true,
              "isDefault": false,
              "isNeural": false
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{language}", $givenLanguage, self::GET_VOICES)
            . "?"
            . Query::build([
                "includeNeural" => $givenIncludeNeural
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getVoices($givenLanguage),
            fn () => $api->getVoicesAsync($givenLanguage),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsGetVoicesResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetSentBulks(): void
    {
        $givenBulkId = "5028e2d42f19-42f1-4656-351e-a42c191e5fd2";

        $givenResponse = <<<JSON
        {
          "bulkId": "5028e2d42f19-42f1-4656-351e-a42c191e5fd2",
          "sendAt": "2023-09-26T14:07:35.000+00:00"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $expectedPath = self::GET_SENT_BULKS
            . "?"
            . Query::build([
                "bulkId" => $givenBulkId
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getSentBulks($givenBulkId),
            fn () => $api->getSentBulksAsync($givenBulkId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsBulkResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testRescheduleSentBulk(): void
    {
        $givenBulkId = "5028e2d42f19-42f1-4656-351e-a42c191e5fd2";

        $givenRequest = <<<JSON
        {
          "sendAt": "2023-09-27T08:06:08.000+00:00"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "bulkId": "5028e2d42f19-42f1-4656-351e-a42c191e5fd2",
          "sendAt": "2023-09-27T08:06:08.000+00:00"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $expectedPath = self::RESCHEDULE_SENT_BULK
            . "?"
            . Query::build([
                "bulkId" => $givenBulkId
            ]);

        $expectedHttpMethod = "PUT";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsBulkRequest::class);

        $closures = [
            fn () => $api->rescheduleSentBulk(bulkId: $givenBulkId, callsBulkRequest: $request),
            fn () => $api->rescheduleSentBulkAsync(bulkId: $givenBulkId, callsBulkRequest: $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsBulkResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetSentBulksStatus(): void
    {
        $givenBulkId = "5028e2d42f19-42f1-4656-351e-a42c191e5fd2";

        $givenResponse = <<<JSON
        {
          "bulkId": "5028e2d42f19-42f1-4656-351e-a42c191e5fd2",
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $expectedPath = self::GET_SENT_BULKS_STATUS
            . "?"
            . Query::build([
                "bulkId" => $givenBulkId
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getSentBulksStatus($givenBulkId),
            fn () => $api->getSentBulksStatusAsync($givenBulkId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsBulkStatusResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testManageSentBulksStatus(): void
    {
        $givenBulkId = "5028e2d42f19-42f1-4656-351e-a42c191e5fd2";

        $givenRequest = <<<JSON
        {
          "status": "PAUSED"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "bulkId": "5028e2d42f19-42f1-4656-351e-a42c191e5fd2",
          "status": "PAUSED"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $expectedPath = self::MANAGE_SENT_BULKS_STATUS
            . "?"
            . Query::build([
                "bulkId" => $givenBulkId
            ]);

        $expectedHttpMethod = "PUT";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsUpdateStatusRequest::class);

        $closures = [
            fn () => $api->manageSentBulksStatus(bulkId: $givenBulkId, callsUpdateStatusRequest: $request),
            fn () => $api->manageSentBulksStatusAsync(bulkId: $givenBulkId, callsUpdateStatusRequest: $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsBulkStatusResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );
    }

    public function testSearchVoiceIvrRecordedFiles(): void
    {
        $givenMessageId1 = "453e161a-fe4f-4f3c-80c0-ab520de9a969";
        $givenFrom1 = "442032864231";
        $givenTo1 = "38712345678";
        $givenScenarioId1 = "C9CE33CF130511D8E333C1260BABA309";
        $givenGroupId1 = "#/script/1";
        $givenUrl1 = "/voice/ivr/1/files/3C67336FA555A606C85FA9637906A6AB98436B7AFC65D857A416F6521D39F8F0E1D3D2469FF580D8968D3DD89A2DB561";
        $givenRecordedAt1 = "2019-11-09T17:00:00.000+01:00";
        $givenRecordedAt1DateTime = new DateTime("2019-11-09T17:00:00.000+01:00");

        $givenMessageId2 = "05b2859d-85c6-4068-9347-2e563b5c9cf4";
        $givenFrom2 = "442032864231";
        $givenTo2 = "38712345678";
        $givenScenarioId2 = "4A6177C9B92039306F1F091708851A2E";
        $givenGroupId2 = "#/script/1";
        $givenUrl2 = "/voice/ivr/1/files/305DE72BA11D81D1BAED75BFC46706761580BDEC2218C22628447FD3814E7913D3058E4ECBFD6F55C80E976235EEB111";
        $givenRecordedAt2 = "2019-11-09T17:00:00.000+01:00";
        $givenRecordedAt2DateTime = new DateTime("2019-11-09T17:00:00.000+01:00");

        $givenResponse = <<<JSON
        [{
          "files": [
            {
              "messageId": "$givenMessageId1",
              "from": "$givenFrom1",
              "to": "$givenTo1",
              "scenarioId": "$givenScenarioId1",
              "groupId": "$givenGroupId1",
              "url": "$givenUrl1",
              "recordedAt": "$givenRecordedAt1"
            },
            {
              "messageId": "$givenMessageId2",
              "from": "$givenFrom2",
              "to": "$givenTo2",
              "scenarioId": "$givenScenarioId2",
              "groupId": "$givenGroupId2",
              "url": "$givenUrl2",
              "recordedAt": "$givenRecordedAt2"
            }
          ]
        }]
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $expectedPath = self::IVR_FILES;
        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->searchVoiceIvrRecordedFiles(),
            fn () => $api->searchVoiceIvrRecordedFilesAsync(),
        ];

        foreach ($closures as $index => $closure) {
            /** @var CallsRecordedAudioFilesResponse[] $responseModels */
            $responseModels = $this->getUnpackedModel($closure(), CallsRecordedAudioFilesResponse::class);
            $responseModel = $responseModels[0];

            $this->assertCount(1, $responseModels);

            $expectedResponse = new CallsRecordedAudioFilesResponse(
                files: [
                    new CallsRecordedIvrFile(
                        messageId: $givenMessageId1,
                        from: $givenFrom1,
                        to: $givenTo1,
                        scenarioId: $givenScenarioId1,
                        groupId: $givenGroupId1,
                        url: $givenUrl1,
                        recordedAt: $givenRecordedAt1DateTime
                    ),
                    new CallsRecordedIvrFile(
                        messageId: $givenMessageId2,
                        from: $givenFrom2,
                        to: $givenTo2,
                        scenarioId: $givenScenarioId2,
                        groupId: $givenGroupId2,
                        url: $givenUrl2,
                        recordedAt: $givenRecordedAt2DateTime
                    )
                ]
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

    public function testGetVoiceIvrScenario(): void
    {
        $givenId = "E83E787CF2613450157ADA3476171E3F";
        $givenName = "scenario";
        $givenDescription = "";
        $givenCreateTime = "2019-11-09T17:00:00.000+01:00";
        $givenCreateTimeDateTime = new DateTime("2019-11-09T17:00:00.000+01:00");
        $givenResponse = <<<JSON
        [{
          "id": "$givenId",
          "name": "$givenName",
          "description": "$givenDescription",
          "createTime": "$givenCreateTime",
          "updateTime": null
        }]
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $expectedPath = self::VOICE_SCENARIOS;
        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->searchVoiceIvrScenarios(),
            fn () => $api->searchVoiceIvrScenariosAsync(),
        ];

        foreach ($closures as $index => $closure) {
            /** @var CallsSearchResponse[] $responseModels */
            $responseModels = $this->getUnpackedModel($closure(), CallsSearchResponse::class);

            $this->assertCount(1, $responseModels);
            $responseModel = $responseModels[0];

            $expectedResponse = new CallsSearchResponse(
                createTime: $givenCreateTimeDateTime,
                description: $givenDescription,
                id: $givenId,
                name: $givenName,
                updateTime: null
            );

            $this->assertEquals($responseModel, $expectedResponse);

            $this->assertRequestWithHeaders(
                $expectedHttpMethod,
                $expectedPath,
                $requestHistoryContainer[$index],
                ['Accept' => 'application/json']
            );
        }
    }

    public function testCreateVoiceIvrScenario(): void
    {
        $givenId = "E83E787CF2613450157ADA3476171E3F";
        $givenName = "scenario";
        $givenDescription = "";
        $givenCreateTime = "2019-11-09T17:00:00.000+01:00";
        $givenCreateTimeDateTime = new DateTime("2019-11-09T17:00:00.000+01:00");
        $givenVariable = "variableName";
        $givenVariableValue = "hello_world";

        $givenResponse = <<<JSON
        {
          "id": "$givenId",
          "name": "$givenName",
          "description": "$givenDescription",
          "createTime": "$givenCreateTime",
          "updateTime": null,
          "script": [
            {
              "setVariable": "$givenVariable",
              "value": "$givenVariableValue"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $expectedPath = self::VOICE_SCENARIOS;
        $expectedHttpMethod = "POST";

        $request = new CallsUpdateScenarioRequest(
            name: $givenName,
            script: [
                new CallsSetVariable(
                    setVariable: $givenVariable,
                    value: $givenVariableValue
                )
            ],
            description: $givenDescription
        );

        $closures = [
            fn () => $api->createAVoiceIvrScenario($request),
            fn () => $api->createAVoiceIvrScenarioAsync($request),
        ];

        foreach ($closures as $index => $closure) {
            /** @var CallsUpdateScenarioResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure(), CallsUpdateScenarioResponse::class);

            $expectedResponse = new CallsUpdateScenarioResponse(
                createTime: $givenCreateTimeDateTime,
                description: $givenDescription,
                id: $givenId,
                name: $givenName,
                script: [
                    new CallsSetVariable(
                        setVariable: $givenVariable,
                        value: $givenVariableValue
                    )
                ],
                updateTime: null
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
