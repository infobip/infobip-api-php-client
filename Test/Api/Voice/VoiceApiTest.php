<?php

namespace Infobip\Test\Api\Voice;

use DateTime;
use GuzzleHttp\Psr7\Query;
use Infobip\Api\VoiceApi;
use Infobip\Model\CallsAdvancedBody;
use Infobip\Model\CallsBulkRequest;
use Infobip\Model\CallsBulkResponse;
use Infobip\Model\CallsBulkStatusResponse;
use Infobip\Model\CallsCallApi;
use Infobip\Model\CallsCallApiOptions;
use Infobip\Model\CallsCapture;
use Infobip\Model\CallsCollect;
use Infobip\Model\CallsCollectOptions;
use Infobip\Model\CallsDestination;
use Infobip\Model\CallsDtmfOptions;
use Infobip\Model\CallsForEach;
use Infobip\Model\CallsGetVoicesResponse;
use Infobip\Model\CallsHangup;
use Infobip\Model\CallsHttpMethod;
use Infobip\Model\CallsIfThenElse;
use Infobip\Model\CallsIvrMessage;
use Infobip\Model\CallsLaunchScenarioRequest;
use Infobip\Model\CallsMultiBody;
use Infobip\Model\CallsRecordedAudioFilesResponse;
use Infobip\Model\CallsRecordedIvrFile;
use Infobip\Model\CallsRepeatWhile;
use Infobip\Model\CallsRetry;
use Infobip\Model\CallsSay;
use Infobip\Model\CallsSearchResponse;
use Infobip\Model\CallsSingleBody;
use Infobip\Model\CallsSingleMessageStatus;
use Infobip\Model\CallsSpeechOptions;
use Infobip\Model\CallsSynthesisVoice;
use Infobip\Model\CallsUpdateScenarioRequest;
use Infobip\Model\CallsUpdateScenarioResponse;
use Infobip\Model\CallsUpdateStatusRequest;
use Infobip\Model\CallsVoiceResponse;
use Infobip\Model\CallsVoiceResponseDetails;
use Infobip\Model\DeliveryDay;
use Infobip\Model\DeliveryTime;
use Infobip\Model\DeliveryTimeWindow;
use Infobip\Test\Api\ApiTestBase;
use SplFileObject;

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
    private const string IVR_FILES_DOWNLOAD = "/voice/ivr/1/files/{id}";


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

        $expectedResponse = new CallsGetVoicesResponse(
            voices: [
                new CallsSynthesisVoice(
                    name: "Benjamin",
                    gender: "male",
                    supplier: "Microsoft",
                    ssmlSupported: false,
                    isDefault: false,
                    isNeural: false
                ),
                new CallsSynthesisVoice(
                    name: "Ivy",
                    gender: "female",
                    supplier: "Amazon",
                    ssmlSupported: true,
                    isDefault: false,
                    isNeural: false
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

        $closures = [
            fn () => $api->searchVoiceIvrRecordedFiles(),
            fn () => $api->searchVoiceIvrRecordedFilesAsync(),
        ];

        $expectedResponse = [
            new CallsRecordedAudioFilesResponse(
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
            )
        ];

        $this->assertGetRequest(
            $closures,
            self::IVR_FILES,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testGetVoiceIvrScenario(): void
    {
        $givenResponse = <<<JSON
        {
          "id": "E83E787CF2613450157ADA3476171E3F",
          "name": "My scenario",
          "description": "Some description",
          "createTime": "2024-11-09T17:00:00.000+0100",
          "updateTime": "2024-11-10T17:00:00.000+0000",
          "script": [
            {
              "say": "Hello, please press 1 if you wish to subscribe to our newsletter."
            },
            {
              "collectInto": "myCollectedVariable",
              "options": {
                "maxInputLength": 1,
                "timeout": 5
              }
            }
          ],
          "lastUsageDate": "2025-01-02"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace('{id}', 'E83E787CF2613450157ADA3476171E3F', self::VOICE_SCENARIO);
        $closures = [
            fn () => $api->getAVoiceIvrScenario('E83E787CF2613450157ADA3476171E3F'),
            fn () => $api->getAVoiceIvrScenarioAsync('E83E787CF2613450157ADA3476171E3F'),
        ];

        $expectedResponse = new CallsUpdateScenarioResponse(
            createTime: new DateTime("2024-11-09T17:00:00.000+01:00"),
            description: "Some description",
            id: "E83E787CF2613450157ADA3476171E3F",
            name: "My scenario",
            script: [
                new CallsSay(
                    say: "Hello, please press 1 if you wish to subscribe to our newsletter."
                ),
                new CallsCollect(
                    collectInto: "myCollectedVariable",
                    options: new CallsCollectOptions(
                        maxInputLength: 1,
                        timeout: 5
                    )
                )
            ],
            updateTime: new DateTime("2024-11-10T17:00:00.000+00:00"),
            lastUsageDate: "2025-01-02"
        );

        $this->assertGetRequest(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testCreateVoiceIvrScenario(): void
    {
        $givenRequest = <<<JSON
        {
          "name": "Capture speech or digit",
          "description": "Capture speech or digit",
          "script": [
            {
              "say": "Say discount or press 1 to get discount. Say exit or press 0 to exit."
            },
            {
              "capture": "myVar",
              "timeout": 5,
              "speechOptions": {
                "language": "en-US",
                "maxSilence": 2,
                "keyPhrases": [
                  "discount",
                  "exit"
                ]
              },
              "dtmfOptions": {
                "maxInputLength": 1
              }
            },
            {
              "if": "\${myVar == 'discount' || myVar == '1'}",
              "then": [
                {
                  "say": "You will get discount"
                }
              ],
              "else": [
                {
                  "if": "\${myVar == 'exit' || myVar == '0'}",
                  "then": [
                    {
                      "say": "Goodbye"
                    }
                  ],
                  "else": [
                    {
                      "say": "I did not understand"
                    }
                  ]
                }
              ]
            },
            "hangup"
          ]
        }       
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "E83E787CF2613450157ADA3476171E3F",
          "name": "Capture speech or digit",
          "description": "Capture speech or digit",
          "script": [
            {
              "say": "Say discount or press 1 to get discount. Say exit or press 0 to exit."
            },
            {
              "capture": "myVar",
              "timeout": 5,
              "speechOptions": {
                "language": "en-US",
                "maxSilence": 2,
                "keyPhrases": [
                  "discount",
                  "exit"
                ]
              },
              "dtmfOptions": {
                "maxInputLength": 1
              }
            },
            {
              "if": "\${myVar == 'discount' || myVar == '1'}",
              "then": [
                {
                  "say": "You will get discount"
                }
              ],
              "else": [
                {
                  "if": "\${myVar == 'exit' || myVar == '0'}",
                  "then": [
                    {
                      "say": "Goodbye"
                    }
                  ],
                  "else": [
                    {
                      "say": "I did not understand"
                    }
                  ]
                }
              ]
            },
            "hangup"
          ],
          "createTime": "2024-11-09T17:00:00.000+01:00"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $request = new CallsUpdateScenarioRequest(
            name: "Capture speech or digit",
            script: [
                new CallsSay(
                    say: "Say discount or press 1 to get discount. Say exit or press 0 to exit."
                ),
                new CallsCapture(
                    capture: "myVar",
                    timeout: 5,
                    speechOptions: new CallsSpeechOptions(
                        language: "en-US",
                        keyPhrases: ["discount", "exit"],
                        maxSilence: 2
                    ),
                    dtmfOptions: new CallsDtmfOptions(
                        maxInputLength: 1
                    )
                ),
                new CallsIfThenElse(
                    if: '${myVar == \'discount\' || myVar == \'1\'}',
                    then: [
                        new CallsSay(
                            say: "You will get discount"
                        )
                    ],
                    else: [
                        new CallsIfThenElse(
                            if: '${myVar == \'exit\' || myVar == \'0\'}',
                            then: [
                                new CallsSay(
                                    say: "Goodbye"
                                )
                            ],
                            else: [
                                new CallsSay(
                                    say: "I did not understand"
                                )
                            ]
                        )
                    ]
                ),
                CallsHangup::HANGUP
            ],
            description: "Capture speech or digit"
        );

        $closures = [
            fn () => $api->createAVoiceIvrScenario($request),
            fn () => $api->createAVoiceIvrScenarioAsync($request),
        ];

        $expectedResponse = new CallsUpdateScenarioResponse(
            createTime: new DateTime("2024-11-09T17:00:00.000+01:00"),
            description: "Capture speech or digit",
            id: "E83E787CF2613450157ADA3476171E3F",
            name: "Capture speech or digit",
            script: [
                new CallsSay(
                    say: "Say discount or press 1 to get discount. Say exit or press 0 to exit."
                ),
                new CallsCapture(
                    capture: "myVar",
                    timeout: 5,
                    speechOptions: new CallsSpeechOptions(
                        language: "en-US",
                        keyPhrases: ["discount", "exit"],
                        maxSilence: 2
                    ),
                    dtmfOptions: new CallsDtmfOptions(
                        maxInputLength: 1
                    )
                ),
                new CallsIfThenElse(
                    if: '${myVar == \'discount\' || myVar == \'1\'}',
                    then: [
                        new CallsSay(
                            say: "You will get discount"
                        )
                    ],
                    else: [
                        new CallsIfThenElse(
                            if: '${myVar == \'exit\' || myVar == \'0\'}',
                            then: [
                                new CallsSay(
                                    say: "Goodbye"
                                )
                            ],
                            else: [
                                new CallsSay(
                                    say: "I did not understand"
                                )
                            ]
                        )
                    ]
                ),
                CallsHangup::HANGUP
            ]
        );

        $this->assertPostRequest(
            $closures,
            self::VOICE_SCENARIOS,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testCreateCallApiVoiceIvrScenario(): void
    {
        $givenRequest = <<<JSON
        {
          "name": "Call API",
          "description": "Perform a POST request to provided URL with headers and payload.",
          "script": [
            {
              "request": "https://example.com/api/calls",
              "options": {
                "method": "POST",
                "headers": {
                  "content-type": "application/json"
                },
                "body": "\${to} finished the IVR."
              }
            }
          ]
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "E83E787CF2613450157ADA3476171E3F",
          "name": "Call API",
          "description": "Perform a POST request to provided URL with headers and payload.",
          "script": [
            {
              "request": "https://example.com/api/calls",
              "options": {
                "method": "POST",
                "headers": {
                  "content-type": "application/json"
                },
                "body": "\${to} finished the IVR."
              }
            }
          ],
          "createTime": "2024-11-09T17:00:00.000+01:00"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $request = new CallsUpdateScenarioRequest(
            name: "Call API",
            script: [
                new CallsCallApi(
                    request: "https://example.com/api/calls",
                    options: new CallsCallApiOptions(
                        method: CallsHttpMethod::POST,
                        headers: [
                            "content-type" => "application/json"
                        ],
                        body: '${to} finished the IVR.'
                    )
                )
            ],
            description: "Perform a POST request to provided URL with headers and payload."
        );

        $closures = [
            fn () => $api->createAVoiceIvrScenario($request),
            fn () => $api->createAVoiceIvrScenarioAsync($request),
        ];

        $expectedResponse = new CallsUpdateScenarioResponse(
            createTime: new DateTime("2024-11-09T17:00:00.000+01:00"),
            description: "Perform a POST request to provided URL with headers and payload.",
            id: "E83E787CF2613450157ADA3476171E3F",
            name: "Call API",
            script: [
                new CallsCallApi(
                    request: "https://example.com/api/calls",
                    options: new CallsCallApiOptions(
                        method: CallsHttpMethod::POST,
                        headers: [
                            "content-type" => "application/json"
                        ],
                        body: '${to} finished the IVR.'
                    )
                )
            ]
        );

        $this->assertPostRequest(
            $closures,
            self::VOICE_SCENARIOS,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }


    public function testSearchVoiceIvrScenarios(): void
    {
        $givenResponse = <<<JSON
        [
            {
              "id": "E83E787CF2613450157ADA3476171E3F",
              "name": "My scenario",
              "description": "Some description",
              "createTime": "2024-11-09T17:00:00.000+0100",
              "updateTime": "2024-11-10T17:00:00.000+0000",
              "script": [
                {
                  "say": "Hello, please press 1 if you wish to subscribe to our newsletter."
                },
                {
                  "collectInto": "myCollectedVariable",
                  "options": {
                    "maxInputLength": 1,
                    "timeout": 5
                  }
                }
              ],
              "lastUsageDate": "2025-01-02"
            },
            {
              "id": "0157ADA3476171E3E83E787CF261345F",
              "name": "My another scenario",
              "description": "Another description",
              "createTime": "2024-10-09T17:00:00.000+0100",
              "updateTime": "2024-10-10T17:00:00.000+00:00",
              "script": [
                {
                  "repeat": [
                    {
                      "say": "For exit you must press one.",
                      "actionId": 100
                    },
                    {
                      "collectInto": "myVariable"
                    }
                  ],
                  "while": "\${myVariable} != 1"
                }
              ],
              "lastUsageDate": "2025-01-03"
            }
        ]
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $expectedPath = self::VOICE_SCENARIOS . '?' . Query::build([
                'page' => 1,
                'pageSize' => 2,
                'label' => 'myLabel',
                'lastUsageDateSince' => '2025-01-01',
                'lastUsageDateUntil' => '2025-01-04'
            ]);

        $closures = [
            fn () => $api->searchVoiceIvrScenarios(
                page: 1,
                pageSize: 2,
                label: "myLabel",
                lastUsageDateSince: "2025-01-01",
                lastUsageDateUntil: "2025-01-04"
            ),
            fn () => $api->searchVoiceIvrScenarios(
                page: 1,
                pageSize: 2,
                label: "myLabel",
                lastUsageDateSince: "2025-01-01",
                lastUsageDateUntil: "2025-01-04"
            )
        ];

        $expectedResponse = [
            new CallsSearchResponse(
                createTime: new DateTime("2024-11-09T17:00:00.000+01:00"),
                description: "Some description",
                id: "E83E787CF2613450157ADA3476171E3F",
                name: "My scenario",
                script: [
                    new CallsSay(
                        say: "Hello, please press 1 if you wish to subscribe to our newsletter."
                    ),
                    new CallsCollect(
                        collectInto: "myCollectedVariable",
                        options: new CallsCollectOptions(
                            maxInputLength: 1,
                            timeout: 5
                        )
                    )
                ],
                updateTime: new DateTime("2024-11-10T17:00:00.000+00:00"),
                lastUsageDate: "2025-01-02"
            ),
            new CallsSearchResponse(
                createTime: new DateTime("2024-10-09T17:00:00.000+01:00"),
                description: "Another description",
                id: "0157ADA3476171E3E83E787CF261345F",
                name: "My another scenario",
                script: [
                    new CallsRepeatWhile(
                        repeat: [
                            new CallsSay(
                                say: "For exit you must press one.",
                                actionId: 100
                            ),
                            new CallsCollect(
                                collectInto: "myVariable"
                            )
                        ],
                        while: '${myVariable} != 1'
                    )
                ],
                updateTime: new DateTime("2024-10-10T17:00:00.000+00:00"),
                lastUsageDate: "2025-01-03"
            )
        ];

        $this->assertGetRequest(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testUpdateVoiceIvrScenario(): void
    {
        $givenRequest = <<<JSON
        {
          "name": "For-Each",
          "description": "Use For-each to perform any action for each of provided values.",
          "script": [
            {
              "forEach": "city",
              "in": "New York,Los Angeles,Boston",
              "do": [
                {
                  "say": "Hello from \${city}"
                }
              ]
            }
          ]
        }      
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "E83E787CF2613450157ADA3476171E3F",
          "name": "For-Each",
          "description": "Use For-each to perform any action for each of provided values.",
          "script": [
            {
              "forEach": "city",
              "in": "New York,Los Angeles,Boston",
              "do": [
                {
                  "say": "Hello from \${city}"
                }
              ]
            }
          ],
          "createTime": "2024-11-09T17:00:00.000+0100",
          "updateTime": "2024-11-09T17:10:00.000+0100"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $request = new CallsUpdateScenarioRequest(
            name: "For-Each",
            script: [
                new CallsForEach(
                    forEach: "city",
                    in: "New York,Los Angeles,Boston",
                    do: [
                        new CallsSay(
                            say: "Hello from \${city}"
                        )
                    ]
                )
            ],
            description: "Use For-each to perform any action for each of provided values."
        );

        $closures = [
            fn () => $api->updateVoiceIvrScenario('E83E787CF2613450157ADA3476171E3F', $request),
            fn () => $api->updateVoiceIvrScenario('E83E787CF2613450157ADA3476171E3F', $request),
        ];

        $expectedResponse = new CallsUpdateScenarioResponse(
            createTime: new DateTime("2024-11-09T17:00:00.000+0100"),
            description: "Use For-each to perform any action for each of provided values.",
            id: "E83E787CF2613450157ADA3476171E3F",
            name: "For-Each",
            script: [
                new CallsForEach(
                    forEach: "city",
                    in: "New York,Los Angeles,Boston",
                    do: [
                        new CallsSay(
                            say: "Hello from \${city}"
                        )
                    ]
                )
            ],
            updateTime: new DateTime("2024-11-09T17:10:00.000+0100")
        );

        $this->assertPutRequest(
            $closures,
            str_replace('{id}', 'E83E787CF2613450157ADA3476171E3F', self::VOICE_SCENARIO),
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function deleteVoiceIvrScenario(): void
    {
        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, "{}", 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $closures = [
            fn () => $api->deleteAVoiceIvrScenario('E83E787CF2613450157ADA3476171E3F'),
            fn () => $api->deleteAVoiceIvrScenarioAsync('E83E787CF2613450157ADA3476171E3F'),
        ];

        $this->assertNoContentDeleteRequest(
            $closures,
            str_replace('{id}', 'E83E787CF2613450157ADA3476171E3F', self::VOICE_SCENARIO),
            $requestHistoryContainer
        );
    }

    public function testLaunchIvrScenario()
    {
        $givenRequest = <<<JSON
        {
          "bulkId": "BULK-ID-123-xyz",
          "messages": [
            {
              "scenarioId": "6298AA7707903A4ED680B436929681AD",
              "from": "41793026700",
              "destinations": [
                {
                  "to": "41793026727"
                },
                {
                  "to": "41793026731"
                }
              ],
              "notifyUrl": "https://www.example.com/voice/advanced",
              "notifyContentType": "application/json",
              "callbackData": "DLR callback data",
              "validityPeriod": 720,
              "sendAt": "2023-10-03T12:21:00.632+00:00",
              "retry": {
                "minPeriod": 1,
                "maxPeriod": 5,
                "maxCount": 5
              },
              "record": false,
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
                  "THURSDAY"
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

        $request = new CallsLaunchScenarioRequest(
            messages: [
                new CallsIvrMessage(
                    scenarioId: "6298AA7707903A4ED680B436929681AD",
                    destinations: [
                        new CallsDestination(to: "41793026727"),
                        new CallsDestination(to: "41793026731")
                    ],
                    from: "41793026700",
                    notifyUrl: "https://www.example.com/voice/advanced",
                    notifyContentType: "application/json",
                    callbackData: "DLR callback data",
                    validityPeriod: 720,
                    sendAt: new DateTime("2023-10-03T12:21:00.632+00:00"),
                    retry: new CallsRetry(
                        maxCount: 5,
                        maxPeriod: 5,
                        minPeriod: 1
                    ),
                    record: false,
                    deliveryTimeWindow: new DeliveryTimeWindow(
                        days: [
                            DeliveryDay::MONDAY(),
                            DeliveryDay::THURSDAY()
                        ],
                        from: new DeliveryTime(hour: 6, minute: 0),
                        to: new DeliveryTime(hour: 15, minute: 30)
                    )
                )
            ],
            bulkId: "BULK-ID-123-xyz"
        );

        $closures = [
            fn () => $api->sendVoiceMessagesWithAnIvrScenario($request),
            fn () => $api->sendVoiceMessagesWithAnIvrScenarioAsync($request),
        ];

        $expectedResponse = new CallsVoiceResponse(
            bulkId: "5028e2d42f19-42f1-4656-351e-a42c191e5fd2",
            messages: [
                new CallsVoiceResponseDetails(
                    to: "41793026727",
                    status: new CallsSingleMessageStatus(
                        groupId: 1,
                        groupName: "PENDING",
                        id: 26,
                        name: "PENDING_ACCEPTED",
                        description: "Message accepted, pending for delivery."
                    ),
                    messageId: "4242f196ba50-a356-2f91-831c4aa55f351ed2"
                ),
                new CallsVoiceResponseDetails(
                    to: "41793026731",
                    status: new CallsSingleMessageStatus(
                        groupId: 1,
                        groupName: "PENDING",
                        id: 26,
                        name: "PENDING_ACCEPTED",
                        description: "Message accepted, pending for delivery."
                    ),
                    messageId: "5f35f896ba50-a356-43a4-91cd81b85f8c689"
                )
            ]
        );

        $this->assertPostRequest(
            $closures,
            self::LAUNCH_IVR_SCENARIO,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testDownloadVoiceIvrRecordedFile()
    {
        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, "file content", 200, [
            'Content-Type' => 'audio/vnd.wave'
        ]);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new VoiceApi($this->getConfiguration(), client: $client);

        $closures = [
            fn () => $api->downloadVoiceIvrRecordedFile("file-id-123"),
            fn () => $api->downloadVoiceIvrRecordedFileAsync("file-id-123"),
        ];

        $expectedPath = str_replace('{id}', 'file-id-123', self::IVR_FILES_DOWNLOAD);

        foreach ($closures as $index => $closure) {
            $response = $this->getUnpackedModel($closure());

            $this->assertRequestWithHeaders(
                'GET',
                $expectedPath,
                $requestHistoryContainer[$index],
                [
                    'Accept' => 'application/octet-stream'
                ]
            );

            $this->assertInstanceOf(SplFileObject::class, $response);
            $this->assertEquals('file content', $response->fread($response->getSize()));
        }
    }
}
