<?php

namespace Infobip\Test\Api\Voice;

use DateTime;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Response;
use Infobip\Api\CallsApi;
use Infobip\Model\Call;
use Infobip\Model\CallBulkRequest;
use Infobip\Model\CallBulkResponse;
use Infobip\Model\CallBulkStatus;
use Infobip\Model\CallDirection;
use Infobip\Model\CallEndpointType;
use Infobip\Model\CallLog;
use Infobip\Model\CallLogPage;
use Infobip\Model\CallPage;
use Infobip\Model\CallRecording;
use Infobip\Model\CallRecordingPage;
use Infobip\Model\CallRecordingRequest;
use Infobip\Model\CallRequest;
use Infobip\Model\CallsActionCallRequest;
use Infobip\Model\CallsActionConferenceRequest;
use Infobip\Model\CallsActionResponse;
use Infobip\Model\CallsAddExistingCallRequest;
use Infobip\Model\CallsAddNewCallRequest;
use Infobip\Model\CallsAnswerRequest;
use Infobip\Model\CallsApplicationTransferRequest;
use Infobip\Model\CallsAudioMediaProperties;
use Infobip\Model\CallsConference;
use Infobip\Model\CallsConferenceAndCall;
use Infobip\Model\CallsConferenceBroadcastWebrtcTextRequest;
use Infobip\Model\CallsConferenceComposition;
use Infobip\Model\CallsConferenceLog;
use Infobip\Model\CallsConferenceLogPage;
use Infobip\Model\CallsConferencePage;
use Infobip\Model\CallsConferencePlayRequest;
use Infobip\Model\CallsConferenceRecording;
use Infobip\Model\CallsConferenceRecordingPage;
use Infobip\Model\CallsConferenceRecordingRequest;
use Infobip\Model\CallsConferenceRequest;
use Infobip\Model\CallsConnectRequest;
use Infobip\Model\CallsConnectWithNewCallRequest;
use Infobip\Model\CallsCountryList;
use Infobip\Model\CallsCreateSipTrunkResponse;
use Infobip\Model\CallsDialogBroadcastWebrtcTextRequest;
use Infobip\Model\CallsDialogLogPage;
use Infobip\Model\CallsDialogLogResponse;
use Infobip\Model\CallsDialogPage;
use Infobip\Model\CallsDialogPlayRequest;
use Infobip\Model\CallsDialogRecordingPage;
use Infobip\Model\CallsDialogRecordingRequest;
use Infobip\Model\CallsDialogRecordingResponse;
use Infobip\Model\CallsDialogRequest;
use Infobip\Model\CallsDialogResponse;
use Infobip\Model\CallsDialogSayRequest;
use Infobip\Model\CallsDialogState;
use Infobip\Model\CallsDialogWithExistingCallRequest;
use Infobip\Model\CallsDtmfCaptureRequest;
use Infobip\Model\CallsDtmfSendRequest;
use Infobip\Model\CallsDtmfTermination;
use Infobip\Model\CallsErrorCodeInfo;
use Infobip\Model\CallsExtendedSipTrunkStatusResponse;
use Infobip\Model\CallsFile;
use Infobip\Model\CallsFilePage;
use Infobip\Model\CallsFilePlayContent;
use Infobip\Model\CallsHangupRequest;
use Infobip\Model\CallsMachineDetectionProperties;
use Infobip\Model\CallsMediaProperties;
use Infobip\Model\CallsMediaStream;
use Infobip\Model\CallsMediaStreamAudioProperties;
use Infobip\Model\CallsMediaStreamConfigPage;
use Infobip\Model\CallsMediaStreamConfigRequest;
use Infobip\Model\CallsMediaStreamConfigResponse;
use Infobip\Model\CallsOnDemandComposition;
use Infobip\Model\CallsParticipant;
use Infobip\Model\CallsPhoneEndpoint;
use Infobip\Model\CallsPlayRequest;
use Infobip\Model\CallsPreAnswerRequest;
use Infobip\Model\CallsPublicSipTrunkServiceAddress;
use Infobip\Model\CallsPublicSipTrunkServiceAddressRequest;
use Infobip\Model\CallsRecordingFile;
use Infobip\Model\CallsRecordingLocation;
use Infobip\Model\CallsRecordingRequest;
use Infobip\Model\CallsRecordingStartRequest;
use Infobip\Model\CallsRegionList;
use Infobip\Model\CallsRescheduleRequest;
use Infobip\Model\CallsSayRequest;
use Infobip\Model\CallsSipTrunkPage;
use Infobip\Model\CallsSipTrunkRegistrationCredentials;
use Infobip\Model\CallsSipTrunkRequest;
use Infobip\Model\CallsSipTrunkResponse;
use Infobip\Model\CallsSipTrunkServiceAddressPage;
use Infobip\Model\CallsSipTrunkStatusRequest;
use Infobip\Model\CallsSipTrunkStatusResponse;
use Infobip\Model\CallsSipTrunkUpdateRequest;
use Infobip\Model\CallsSpeechCaptureRequest;
use Infobip\Model\CallsStartMediaStreamRequest;
use Infobip\Model\CallsStartTranscriptionRequest;
use Infobip\Model\CallsStopPlayRequest;
use Infobip\Model\CallState;
use Infobip\Model\CallsTranscription;
use Infobip\Model\CallsUpdateRequest;
use Infobip\Model\CallsVideoMediaProperties;
use Infobip\Model\CallsVoicePreferences;
use Infobip\Model\CallsWebRtcEndpoint;
use Infobip\Model\PageInfo;
use Infobip\Model\Platform;
use Infobip\Test\Api\ApiTestBase;

class CallsApiTest extends ApiTestBase
{
    private const string GET_CALLS = "/calls/1/calls";
    private const string CREATE_CALL = "/calls/1/calls";
    private const string GET_CALL = "/calls/1/calls/{callId}";
    private const string GET_CALLS_HISTORY = "/calls/1/calls/history";
    private const string GET_CALL_HISTORY = "/calls/1/calls/{callId}/history";
    private const string CONNECT_CALLS = "/calls/1/connect";
    private const string CONNECT_WITH_NEW_CALL = "/calls/1/calls/{callId}/connect";
    private const string SEND_RINGING = "/calls/1/calls/{callId}/send-ringing";
    private const string PRE_ANSWER_CALL = "/calls/1/calls/{callId}/pre-answer";
    private const string ANSWER_CALL = "/calls/1/calls/{callId}/answer";
    private const string HANGUP_CALL = "/calls/1/calls/{callId}/hangup";
    private const string CALL_PLAY_FILE = "/calls/1/calls/{callId}/play";
    private const string CALL_STOP_PLAYING_FILE = "/calls/1/calls/{callId}/stop-play";
    private const string CALL_SAY_TEXT = "/calls/1/calls/{callId}/say";
    private const string CALL_SEND_DTMF = "/calls/1/calls/{callId}/send-dtmf";
    private const string CALL_CAPTURE_DTMF = "/calls/1/calls/{callId}/capture/dtmf";
    private const string CALL_CAPTURE_SPEECH = "/calls/1/calls/{callId}/capture/speech";
    private const string CALL_START_TRANSCRIPTION = "/calls/1/calls/{callId}/start-transcription";
    private const string CALL_STOP_TRANSCRIPTION = "/calls/1/calls/{callId}/stop-transcription";
    private const string CALL_START_RECORDING = "/calls/1/calls/{callId}/start-recording";
    private const string CALL_STOP_RECORDING = "/calls/1/calls/{callId}/stop-recording";
    private const string START_MEDIA_STREAM = "/calls/1/calls/{callId}/start-media-stream";
    private const string STOP_MEDIA_STREAM = "/calls/1/calls/{callId}/stop-media-stream";
    private const string APPLICATION_TRANSFER = "/calls/1/calls/{callId}/application-transfer";
    private const string APPLICATION_TRANSFER_ACCEPT = "/calls/1/calls/{callId}/application-transfer/{transferId}/accept";
    private const string APPLICATION_TRANSFER_REJECT = "/calls/1/calls/{callId}/application-transfer/{transferId}/reject";
    private const string GET_CONFERENCES = "/calls/1/conferences";
    private const string CREATE_CONFERENCE = "/calls/1/conferences";
    private const string GET_CONFERENCE = "/calls/1/conferences/{conferenceId}";
    private const string UPDATE_CONFERENCE = "/calls/1/conferences/{conferenceId}";
    private const string GET_CONFERENCES_HISTORY = "/calls/1/conferences/history";
    private const string GET_CONFERENCE_HISTORY = "/calls/1/conferences/{conferenceId}/history";
    private const string ADD_NEW_CONFERENCE_CALL = "/calls/1/conferences/{conferenceId}/call";
    private const string ADD_EXISTING_CONFERENCE_CALL = "/calls/1/conferences/{conferenceId}/call/{callId}";
    private const string UPDATE_CONFERENCE_CALL = "/calls/1/conferences/{conferenceId}/call/{callId}";
    private const string REMOVE_CONFERENCE_CALL = "/calls/1/conferences/{conferenceId}/call/{callId}";
    private const string HANGUP_CONFERENCE = "/calls/1/conferences/{conferenceId}/hangup";
    private const string CONFERENCE_PLAY_FILE = "/calls/1/conferences/{conferenceId}/play";
    private const string CONFERENCE_STOP_PLAYING_FILE = "/calls/1/conferences/{conferenceId}/stop-play";
    private const string CONFERENCE_SAY_TEXT = "/calls/1/conferences/{conferenceId}/say";
    private const string CONFERENCE_START_RECORDING = "/calls/1/conferences/{conferenceId}/start-recording";
    private const string CONFERENCE_STOP_RECORDING = "/calls/1/conferences/{conferenceId}/stop-recording";
    private const string CONFERENCE_BROADCAST_WEBRTC_TEXT = "/calls/1/conferences/{conferenceId}/broadcast-webrtc-text";
    private const string GET_DIALOGS = "/calls/1/dialogs";
    private const string CREATE_DIALOG = "/calls/1/dialogs";
    private const string CREATE_DIALOG_WITH_EXISTING_CALLS = "/calls/1/dialogs/parent-call/{parentCallId}/child-call/{childCallId}";
    private const string GET_DIALOG = "/calls/1/dialogs/{dialogId}";
    private const string GET_DIALOGS_HISTORY = "/calls/1/dialogs/history";
    private const string GET_DIALOG_HISTORY = "/calls/1/dialogs/{dialogId}/history";
    private const string HANGUP_DIALOG = "/calls/1/dialogs/{dialogId}/hangup";
    private const string DIALOG_PLAY_FILE = "/calls/1/dialogs/{dialogId}/play";
    private const string DIALOG_STOP_PLAYING_FILE = "/calls/1/dialogs/{dialogId}/stop-play";
    private const string DIALOG_SAY_TEXT = "/calls/1/dialogs/{dialogId}/say";
    private const string DIALOG_START_RECORDING = "/calls/1/dialogs/{dialogId}/start-recording";
    private const string DIALOG_STOP_RECORDING = "/calls/1/dialogs/{dialogId}/stop-recording";
    private const string DIALOG_BROADCAST_WEBRTC_TEXT = "/calls/1/dialogs/{dialogId}/broadcast-webrtc-text";
    private const string GET_SIP_TRUNKS = "/calls/1/sip-trunks";
    private const string CREATE_SIP_TRUNK = "/calls/1/sip-trunks";
    private const string GET_SIP_TRUNK = "/calls/1/sip-trunks/{sipTrunkId}";
    private const string UPDATE_SIP_TRUNK = "/calls/1/sip-trunks/{sipTrunkId}";
    private const string DELETE_SIP_TRUNK = "/calls/1/sip-trunks/{sipTrunkId}";
    private const string RESET_SIP_TRUNK_PASSWORD = "/calls/1/sip-trunks/{sipTrunkId}/reset-password";
    private const string GET_SIP_TRUNK_STATUS = "/calls/1/sip-trunks/{sipTrunkId}/status";
    private const string SET_SIP_TRUNK_STATUS = "/calls/1/sip-trunks/{sipTrunkId}/status";
    private const string CREATE_SIP_TRUNK_SERVICE_ADDRESS = "/calls/1/sip-trunks/service-addresses";
    private const string GET_SIP_TRUNK_SERVICE_ADDRESSES = "/calls/1/sip-trunks/service-addresses";
    private const string GET_SIP_TRUNK_SERVICE_ADDRESS = "/calls/1/sip-trunks/service-addresses/{sipTrunkServiceAddressId}";
    private const string UPDATE_SIP_TRUNK_SERVICE_ADDRESS = "/calls/1/sip-trunks/service-addresses/{sipTrunkServiceAddressId}";
    private const string DELETE_SIP_TRUNK_SERVICE_ADDRESS = "/calls/1/sip-trunks/service-addresses/{sipTrunkServiceAddressId}";
    private const string GET_COUNTRIES = "/calls/1/sip-trunks/service-addresses/countries";
    private const string GET_REGIONS = "/calls/1/sip-trunks/service-addresses/countries/regions";
    private const string GET_CALLS_FILES = "/calls/1/files";
    private const string UPLOAD_CALLS_AUDIO_FILE = "/calls/1/files";
    private const string GET_CALLS_FILE = "/calls/1/files/{fileId}";
    private const string DELETE_CALLS_FILE = "/calls/1/files/{fileId}";
    private const string GET_CALLS_RECORDINGS = "/calls/1/recordings/calls";
    private const string GET_CALL_RECORDINGS = "/calls/1/recordings/calls/{callId}";
    private const string DELETE_CALL_RECORDINGS = "/calls/1/recordings/calls/{callId}";
    private const string GET_CONFERENCES_RECORDINGS = "/calls/1/recordings/conferences";
    private const string GET_CONFERENCE_RECORDINGS = "/calls/1/recordings/conferences/{conferenceId}";
    private const string DELETE_CONFERENCE_RECORDINGS = "/calls/1/recordings/conferences/{conferenceId}";
    private const string COMPOSE_CONFERENCE_RECORDING = "/calls/1/recordings/conferences/{conferenceId}/compose";
    private const string GET_DIALOGS_RECORDINGS = "/calls/1/recordings/dialogs";
    private const string GET_DIALOG_RECORDINGS = "/calls/1/recordings/dialogs/{dialogId}";
    private const string DELETE_DIALOG_RECORDINGS = "/calls/1/recordings/dialogs/{dialogId}";
    private const string COMPOSE_DIALOG_RECORDING = "/calls/1/recordings/dialogs/{dialogId}/compose";
    private const string DOWNLOAD_RECORDING_FILE = "/calls/1/recordings/files/{fileId}";
    private const string DELETE_RECORDING_FILE = "/calls/1/recordings/files/{fileId}";
    private const string CREATE_MEDIA_STREAM_CONFIG = "/calls/1/media-stream-configs";
    private const string GET_MEDIA_STREAM_CONFIGS = "/calls/1/media-stream-configs";
    private const string GET_MEDIA_STREAM_CONFIG = "/calls/1/media-stream-configs/{mediaStreamConfigId}";
    private const string DELETE_MEDIA_STREAM_CONFIG = "/calls/1/media-stream-configs/{mediaStreamConfigId}";
    private const string UPDATE_MEDIA_STREAM_CONFIG = "/calls/1/media-stream-configs/{mediaStreamConfigId}";
    private const string CREATE_BULK = "/calls/1/bulks";
    private const string GET_BULK_STATUS = "/calls/1/bulks/{bulkId}";
    private const string RESCHEDULE_BULK = "/calls/1/bulks/{bulkId}/reschedule";
    private const string PAUSE_BULK = "/calls/1/bulks/{bulkId}/pause";
    private const string RESUME_BULK = "/calls/1/bulks/{bulkId}/resume";
    private const string CANCEL_BULK = "/calls/1/bulks/{bulkId}/cancel";


    public function testGetCalls(): void
    {
        $givenType = CallEndpointType::PHONE();
        $givenCallsConfigurationId = "dc5942707c704551a00cd2ea";
        $givenApplicationId = "61c060db2675060027d8c7a6";
        $givenFrom = "44790123456";
        $givenTo = "44790987654";
        $givenDirection = CallDirection::OUTBOUND();
        $givenStatus = CallState::FINISHED();
        $givenStartTimeAfter = new DateTime("2022-05-01T14:25:45.125+00:00");
        $givenConferenceId = "066675c6-0db6-0db9-b032-031964d09af4";
        $givenDialogId = "6c73cbdc-c956-4bf5-a026-318236559167";
        $givenBulkId = "bde6deaa-23af-4340-aac7-f3fa063c4215";
        $givenPage = 0;
        $givenSize = 10;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "endpoint": {
                "phoneNumber": "41792030000",
                "type": "PHONE"
              },
              "from": "44790123456",
              "to": "44790987654",
              "direction": "INBOUND",
              "state": "CALLING",
              "media": {
                "audio": {
                  "muted": true,
                  "userMuted": true,
                  "deaf": true
                },
                "video": {
                  "camera": true,
                  "screenShare": true
                }
              },
              "startTime": "2024-09-18T13:36:22.000+00:00",
              "answerTime": "2024-09-18T13:36:22.000+00:00",
              "endTime": "2024-09-18T13:36:22.000+00:00",
              "parentCallId": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
              "machineDetection": {
                "detectionResult": "HUMAN",
                "customData": {
                  "property1": "string",
                  "property2": "string"
                }
              },
              "ringDuration": 3,
              "callsConfigurationId": "dc5942707c704551a00cd2ea",
              "platform": {
                "entityId": "string",
                "applicationId": "string"
              },
              "conferenceId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
              "customData": {
                "key1": "value1",
                "key2": "value2"
              },
              "dialogId": "5aee53f4-72f8-484b-bfcc-10c5f5476f70"
            }
          ],
          "paging": {
            "page": 0,
            "size": 1,
            "totalPages": 0,
            "totalResults": 0
          }
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_CALLS
            . "?"
            . Query::build(
                [
                    "type" => $givenType,
                    "callsConfigurationId" => $givenCallsConfigurationId,
                    "applicationId" => $givenApplicationId,
                    "from" => $givenFrom,
                    "to" => $givenTo,
                    "direction" => $givenDirection,
                    "status" => $givenStatus,
                    "startTimeAfter" => "2022-05-01T14:25:45.125+00:00",
                    "conferenceId" => $givenConferenceId,
                    "dialogId" => $givenDialogId,
                    "bulkId" => $givenBulkId,
                    "page" => $givenPage,
                    "size" => $givenSize
                ]
            );

        $closures = [
            fn () => $api->getCalls(
                type: $givenType,
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                from: $givenFrom,
                to: $givenTo,
                direction: $givenDirection,
                status: $givenStatus,
                startTimeAfter: $givenStartTimeAfter,
                conferenceId: $givenConferenceId,
                dialogId: $givenDialogId,
                bulkId: $givenBulkId,
                page: $givenPage,
                size: $givenSize
            ),
            fn () => $api->getCallsAsync(
                type: $givenType,
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                from: $givenFrom,
                to: $givenTo,
                direction: $givenDirection,
                status: $givenStatus,
                startTimeAfter: $givenStartTimeAfter,
                conferenceId: $givenConferenceId,
                dialogId: $givenDialogId,
                bulkId: $givenBulkId,
                page: $givenPage,
                size: $givenSize
            ),
        ];

        $expectedResponse = new CallPage(
            results: [
                new Call(
                    endpoint: new CallsPhoneEndpoint(
                        phoneNumber: "41792030000"
                    ),
                    id: "d8d84155-3831-43fb-91c9-bb897149a79d",
                    from: "44790123456",
                    to: "44790987654",
                    direction: "INBOUND",
                    state: "CALLING",
                    media: new CallsMediaProperties(
                        audio: new CallsAudioMediaProperties(
                            muted: true,
                            userMuted: true,
                            deaf: true
                        ),
                        video: new CallsVideoMediaProperties(
                            camera: true,
                            screenShare: true
                        )
                    ),
                    startTime: new DateTime("2024-09-18T13:36:22.000+00:00"),
                    answerTime: new DateTime("2024-09-18T13:36:22.000+00:00"),
                    endTime: new DateTime("2024-09-18T13:36:22.000+00:00"),
                    parentCallId: "3ad8805e-d401-424e-9b03-e02a2016a5e2",
                    machineDetection: new CallsMachineDetectionProperties(
                        detectionResult: "HUMAN",
                        customData: [
                            "property1" => "string",
                            "property2" => "string"
                        ]
                    ),
                    ringDuration: 3,
                    callsConfigurationId: "dc5942707c704551a00cd2ea",
                    platform: new Platform(
                        entityId: "string",
                        applicationId: "string"
                    ),
                    conferenceId: "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
                    customData: [
                        "key1" => "value1",
                        "key2" => "value2"
                    ],
                    dialogId: "5aee53f4-72f8-484b-bfcc-10c5f5476f70"
                )
            ],
            paging: new PageInfo(
                page: 0,
                size: 1,
                totalPages: 0,
                totalResults: 0
            )
        );

        $this->assertGetRequest(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testCreateCall(): void
    {
        $givenRequest = <<<JSON
        {
          "endpoint": {
            "type": "WEBRTC",
            "identity": "Bob"
          },
          "from": "Alice",
          "fromDisplayName": "Alice in Wonderland",
          "connectTimeout": 30,
          "recording": {
            "recordingType": "AUDIO_AND_VIDEO"
          },
          "maxDuration": 300,
          "callsConfigurationId": "dc5942707c704551a00cd2ea",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          }
        }
        JSON;

        $givenResponse = <<< JSON
        {
          "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
          "endpoint": {
            "type": "WEBRTC",
            "identity": "Bob"
          },
          "from": "Alice",
          "to": "Bob",
          "direction": "OUTBOUND",
          "state": "CALLING",
          "media": {
            "audio": {
              "muted": false,
              "deaf": false
            },
            "video": {
              "camera": false,
              "screenShare": false
            }
          },
          "startTime": "2022-01-01T00:00:00.100+00:00",
          "answerTime": "2022-01-01T00:00:02.100+00:00",
          "ringDuration": 2,
          "callsConfigurationId": "dc5942707c704551a00cd2ea",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          },
          "conferenceId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
          "customData": {
            "key1": "value1",
            "key2": "value2"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(201, $this->givenRequestHeaders, $givenResponse),
                new Response(201, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $request = new CallRequest(
            endpoint: new CallsWebRtcEndpoint(
                identity: "Bob"
            ),
            from: "Alice",
            callsConfigurationId: "dc5942707c704551a00cd2ea",
            fromDisplayName: "Alice in Wonderland",
            connectTimeout: 30,
            recording: new CallRecordingRequest(
                recordingType: "AUDIO_AND_VIDEO"
            ),
            maxDuration: 300,
            platform: new Platform(
                applicationId: "61c060db2675060027d8c7a6"
            )
        );

        $closures = [
            fn () => $api->createCall($request),
            fn () => $api->createCallAsync($request),
        ];

        $expectedResponse = new Call(
            endpoint: new CallsWebRtcEndpoint(
                identity: "Bob"
            ),
            id: "d8d84155-3831-43fb-91c9-bb897149a79d",
            from: "Alice",
            to: "Bob",
            direction: "OUTBOUND",
            state: "CALLING",
            media: new CallsMediaProperties(
                audio: new CallsAudioMediaProperties(
                    muted: false,
                    deaf: false
                ),
                video: new CallsVideoMediaProperties(
                    camera: false,
                    screenShare: false
                )
            ),
            startTime: new DateTime("2022-01-01T00:00:00.100+00:00"),
            answerTime: new DateTime("2022-01-01T00:00:02.100+00:00"),
            ringDuration: 2,
            callsConfigurationId: "dc5942707c704551a00cd2ea",
            platform: new Platform(
                applicationId: "61c060db2675060027d8c7a6"
            ),
            conferenceId: "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
            customData: [
                "key1" => "value1",
                "key2" => "value2"
            ]
        );

        $this->assertPostRequest(
            $closures,
            self::CREATE_CALL,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testGetCall(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenResponse = <<<JSON
        {
          "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
          "endpoint": {
            "type": "PHONE",
            "phoneNumber": "44790123456"
          },
          "from": "44790123456",
          "to": "44790123456",
          "direction": "OUTBOUND",
          "state": "CALLING",
          "media": {
            "audio": {
              "muted": false,
              "deaf": false
            },
            "video": {
              "camera": false,
              "screenShare": false
            }
          },
          "startTime": "2022-01-01T00:00:00.100+00:00",
          "answerTime": "2022-01-01T00:00:02.100+00:00",
          "ringDuration": 2,
          "callsConfigurationId": "dc5942707c704551a00cd2ea",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          },
          "conferenceId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
          "customData": {
            "key1": "value1",
            "key2": "value2"
          }
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{callId}", $givenCallId, self::GET_CALL);

        $closures = [
            fn () => $api->getCall($givenCallId),
            fn () => $api->getCallAsync($givenCallId),
        ];

        $expectedResponse = new Call(
            endpoint: new CallsPhoneEndpoint(
                phoneNumber: "44790123456"
            ),
            id: "d8d84155-3831-43fb-91c9-bb897149a79d",
            from: "44790123456",
            to: "44790123456",
            direction: "OUTBOUND",
            state: "CALLING",
            media: new CallsMediaProperties(
                audio: new CallsAudioMediaProperties(
                    muted: false,
                    deaf: false
                ),
                video: new CallsVideoMediaProperties(
                    camera: false,
                    screenShare: false
                )
            ),
            startTime: new DateTime("2022-01-01T00:00:00.100+00:00"),
            answerTime: new DateTime("2022-01-01T00:00:02.100+00:00"),
            ringDuration: 2,
            callsConfigurationId: "dc5942707c704551a00cd2ea",
            platform: new Platform(
                applicationId: "61c060db2675060027d8c7a6"
            ),
            conferenceId: "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
            customData: [
                "key1" => "value1",
                "key2" => "value2"
            ]
        );

        $this->assertGetRequest(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testGetCallsHistory(): void
    {
        $givenType = CallEndpointType::PHONE();
        $givenCallsConfigurationId = "dc5942707c704551a00cd2ea";
        $givenApplicationId = "61c060db2675060027d8c7a6";
        $givenFrom = "44790123456";
        $givenTo = "44790987654";
        $givenDirection = CallDirection::OUTBOUND();
        $givenStatus = CallState::FINISHED();
        $givenStartTimeAfter = new DateTime("2022-05-01T14:25:45.125+00:00");
        $givenEndTimeBefore = new DateTime("2022-05-01T14:26:45.125+00:00");
        $givenConferenceId = "066675c6-0db6-0db9-b032-031964d09af4";
        $givenDialogId = "6c73cbdc-c956-4bf5-a026-318236559167";
        $givenBulkId = "bde6deaa-23af-4340-aac7-f3fa063c4215";
        $givenPage = 0;
        $givenSize = 10;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "endpoint": {
                "phoneNumber": "41792030000",
                "type": "PHONE"
              },
              "from": "44790123456",
              "to": "44790987654",
              "direction": "INBOUND",
              "state": "CALLING",
              "startTime": "2024-09-19T09:40:41.000+00:00",
              "answerTime": "2024-09-19T09:40:41.000+00:00",
              "endTime": "2024-09-19T09:40:41.000+00:00",
              "parentCallId": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
              "machineDetection": {
                "detectionResult": "HUMAN",
                "customData": {
                  "property1": "string",
                  "property2": "string"
                }
              },
              "ringDuration": 3,
              "callsConfigurationIds": [
                "a1b06592152e08646b08c057"
              ],
              "platform": {
                "entityId": "string",
                "applicationId": "string"
              },
              "conferenceIds": [
                "066675c6-0db6-0db9-b032-031964d09af4"
              ],
              "duration": 5,
              "hasCameraVideo": false,
              "hasScreenshareVideo": false,
              "errorCode": {
                "id": 10000,
                "name": "NORMAL_HANGUP",
                "description": "The call has ended with hangup initiated by caller, callee or API"
              },
              "customData": {
                "key1": "value1",
                "key2": "value2"
              },
              "dialogId": "string",
              "sender": "string",
              "hangupSource": "ENDPOINT"
            }
          ],
          "paging": {
            "page": 0,
            "size": 1,
            "totalPages": 0,
            "totalResults": 0
          }
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_CALLS_HISTORY
            . "?"
            . Query::build(
                [
                    "type" => $givenType,
                    "callsConfigurationId" => $givenCallsConfigurationId,
                    "applicationId" => $givenApplicationId,
                    "from" => $givenFrom,
                    "to" => $givenTo,
                    "direction" => $givenDirection,
                    "status" => $givenStatus,
                    "startTimeAfter" => $givenStartTimeAfter->format(DateTime::RFC3339_EXTENDED),
                    "endTimeBefore" => $givenEndTimeBefore->format(DateTime::RFC3339_EXTENDED),
                    "conferenceId" => $givenConferenceId,
                    "dialogId" => $givenDialogId,
                    "bulkId" => $givenBulkId,
                    "page" => $givenPage,
                    "size" => $givenSize
                ]
            );

        $closures = [
            fn () => $api->getCallsHistory(
                type: $givenType,
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                from: $givenFrom,
                to: $givenTo,
                direction: $givenDirection,
                status: $givenStatus,
                startTimeAfter: $givenStartTimeAfter,
                endTimeBefore: $givenEndTimeBefore,
                conferenceId: $givenConferenceId,
                dialogId: $givenDialogId,
                bulkId: $givenBulkId,
                page: $givenPage,
                size: $givenSize
            ),
            fn () => $api->getCallsHistoryAsync(
                type: $givenType,
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                from: $givenFrom,
                to: $givenTo,
                direction: $givenDirection,
                status: $givenStatus,
                startTimeAfter: $givenStartTimeAfter,
                endTimeBefore: $givenEndTimeBefore,
                conferenceId: $givenConferenceId,
                dialogId: $givenDialogId,
                bulkId: $givenBulkId,
                page: $givenPage,
                size: $givenSize
            ),
        ];

        $expectedResponse = new CallLogPage(
            results: [
                new CallLog(
                    endpoint: new CallsPhoneEndpoint(
                        phoneNumber: "41792030000"
                    ),
                    callId: "d8d84155-3831-43fb-91c9-bb897149a79d",
                    from: "44790123456",
                    to: "44790987654",
                    direction: "INBOUND",
                    state: "CALLING",
                    startTime: new DateTime("2024-09-19T09:40:41.000+00:00"),
                    answerTime: new DateTime("2024-09-19T09:40:41.000+00:00"),
                    endTime: new DateTime("2024-09-19T09:40:41.000+00:00"),
                    parentCallId: "3ad8805e-d401-424e-9b03-e02a2016a5e2",
                    machineDetection: new CallsMachineDetectionProperties(
                        detectionResult: "HUMAN",
                        customData: [
                            "property1" => "string",
                            "property2" => "string"
                        ]
                    ),
                    ringDuration: 3,
                    callsConfigurationIds: ["a1b06592152e08646b08c057"],
                    platform: new Platform(
                        entityId: "string",
                        applicationId: "string"
                    ),
                    conferenceIds: ["066675c6-0db6-0db9-b032-031964d09af4"],
                    duration: 5,
                    hasCameraVideo: false,
                    hasScreenshareVideo: false,
                    errorCode: new CallsErrorCodeInfo(
                        id: 10000,
                        name: "NORMAL_HANGUP",
                        description: "The call has ended with hangup initiated by caller, callee or API"
                    ),
                    customData: [
                        "key1" => "value1",
                        "key2" => "value2"
                    ],
                    dialogId: "string",
                    sender: "string",
                    hangupSource: "ENDPOINT"
                )
            ],
            paging: new PageInfo(
                page: 0,
                size: 1,
                totalPages: 0,
                totalResults: 0
            )
        );

        $this->assertGetRequest(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testGetCallHistory(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenResponse = <<<JSON
        {
          "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
          "endpoint": {
            "type": "PHONE",
            "phoneNumber": "44790123456"
          },
          "from": "44790123456",
          "to": "44790123456",
          "direction": "OUTBOUND",
          "state": "FINISHED",
          "startTime": "2022-01-01T00:00:00.100+00:00",
          "answerTime": "2022-01-01T00:00:02.100+00:00",
          "endTime": "2022-01-01T00:00:06.100+00:00",
          "machineDetection": {
            "detectionResult": "MACHINE"
          },
          "ringDuration": 2,
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          },
          "conferenceIds": [
            "034e622a-cc7e-456d-8a10-0ba43b11aa5e"
          ],
          "duration": 4,
          "hasCameraVideo": true,
          "hasScreenshareVideo": false,
          "errorCode": {
            "id": 10000,
            "name": "NORMAL_HANGUP",
            "description": "The call has ended with hangup initiated by caller, callee or API"
          },
          "customData": {
            "key1": "value1",
            "key2": "value2"
          },
          "hangupSource": "ENDPOINT"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{callId}", $givenCallId, self::GET_CALL_HISTORY);

        $closures = [
            fn () => $api->getCallHistory($givenCallId),
            fn () => $api->getCallHistoryAsync($givenCallId),
        ];

        $expectedResponse = new CallLog(
            endpoint: new CallsPhoneEndpoint(
                phoneNumber: "44790123456"
            ),
            callId: "d8d84155-3831-43fb-91c9-bb897149a79d",
            from: "44790123456",
            to: "44790123456",
            direction: "OUTBOUND",
            state: "FINISHED",
            startTime: new DateTime("2022-01-01T00:00:00.100+00:00"),
            answerTime: new DateTime("2022-01-01T00:00:02.100+00:00"),
            endTime: new DateTime("2022-01-01T00:00:06.100+00:00"),
            machineDetection: new CallsMachineDetectionProperties(
                detectionResult: "MACHINE"
            ),
            ringDuration: 2,
            platform: new Platform(
                applicationId: "61c060db2675060027d8c7a6"
            ),
            conferenceIds: ["034e622a-cc7e-456d-8a10-0ba43b11aa5e"],
            duration: 4,
            hasCameraVideo: true,
            hasScreenshareVideo: false,
            errorCode: new CallsErrorCodeInfo(
                id: 10000,
                name: "NORMAL_HANGUP",
                description: "The call has ended with hangup initiated by caller, callee or API"
            ),
            customData: [
                "key1" => "value1",
                "key2" => "value2"
            ],
            hangupSource: "ENDPOINT",
        );

        $this->assertGetRequest(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testConnectCalls(): void
    {
        $givenRequest = <<<JSON
        {
          "callIds": [
            "d6d6058c-5077-49f9-a030-2fc40e8ca195",
            "6539fcb4-4b2a-4ac9-a43a-d60807af29b0",
            "d8d84155-3831-43fb-91c9-bb897149a79d"
          ],
          "conferenceRequest": {
            "name": "Example conference",
            "recording": {
              "recordingType": "AUDIO",
              "conferenceComposition": {
                "enabled": true
              }
            },
            "maxDuration": 600
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
          "name": "Example conference",
          "participants": [
            {
              "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "state": "JOINED",
              "joinTime": "2021-12-31T23:59:55.100+00:00",
              "media": {
                "audio": {
                  "muted": false,
                  "deaf": false
                },
                "video": {
                  "camera": false,
                  "screenShare": false
                }
              }
            },
            {
              "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "state": "JOINING",
              "media": {
                "audio": {
                  "muted": false,
                  "deaf": false
                },
                "video": {
                  "camera": false,
                  "screenShare": false
                }
              }
            }
          ],
          "callsConfigurationId": "dc5942707c704551a00cd2ea",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          }
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $request = new CallsConnectRequest(
            callIds: [
                "d6d6058c-5077-49f9-a030-2fc40e8ca195",
                "6539fcb4-4b2a-4ac9-a43a-d60807af29b0",
                "d8d84155-3831-43fb-91c9-bb897149a79d"
            ],
            conferenceRequest: new CallsActionConferenceRequest(
                name: "Example conference",
                recording: new CallsConferenceRecordingRequest(
                    recordingType: "AUDIO",
                    conferenceComposition: new CallsConferenceComposition(
                        enabled: true
                    )
                ),
                maxDuration: 600
            )
        );

        $closures = [
            fn () => $api->connectCalls($request),
            fn () => $api->connectCallsAsync($request),
        ];

        $expectedResponse = new CallsConference(
            id: "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
            name: "Example conference",
            participants: [
                new CallsParticipant(
                    endpoint: new CallsPhoneEndpoint(
                        phoneNumber: "44790123456"
                    ),
                    callId: "d8d84155-3831-43fb-91c9-bb897149a79d",
                    state: "JOINED",
                    joinTime: new DateTime("2021-12-31T23:59:55.100+00:00"),
                    media: new CallsMediaProperties(
                        audio: new CallsAudioMediaProperties(
                            muted: false,
                            deaf: false
                        ),
                        video: new CallsVideoMediaProperties(
                            camera: false,
                            screenShare: false
                        )
                    )
                ),
                new CallsParticipant(
                    endpoint: new CallsPhoneEndpoint(
                        phoneNumber: "44790123456"
                    ),
                    callId: "d8d84155-3831-43fb-91c9-bb897149a79d",
                    state: "JOINING",
                    media: new CallsMediaProperties(
                        audio: new CallsAudioMediaProperties(
                            muted: false,
                            deaf: false
                        ),
                        video: new CallsVideoMediaProperties(
                            camera: false,
                            screenShare: false
                        )
                    )
                )
            ],
            callsConfigurationId: "dc5942707c704551a00cd2ea",
            platform: new Platform(
                applicationId: "61c060db2675060027d8c7a6"
            )
        );

        $this->assertPostRequest(
            $closures,
            self::CONNECT_CALLS,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testConnectWithNewCall(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenRequest = <<<JSON
        {
          "callRequest": {
            "endpoint": {
              "type": "PHONE",
              "phoneNumber": "41792036727"
            },
            "from": "41793026834",
            "maxDuration": 300
          },
          "connectOnEarlyMedia": false,
          "conferenceRequest": {
            "name": "Example conference",
            "recording": {
              "recordingType": "AUDIO",
              "conferenceComposition": {
                "enabled": true
              }
            },
            "maxDuration": 600
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "conference": {
            "id": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
            "name": "Example conference",
            "participants": [
              {
                "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
                "endpoint": {
                  "type": "PHONE",
                  "phoneNumber": "44790123456"
                },
                "state": "JOINED",
                "joinTime": "2021-12-31T23:59:55.100+00:00",
                "media": {
                  "audio": {
                    "muted": false,
                    "deaf": false
                  },
                  "video": {
                    "camera": false,
                    "screenShare": false
                  }
                }
              },
              {
                "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
                "endpoint": {
                  "type": "PHONE",
                  "phoneNumber": "44790123456"
                },
                "state": "JOINING",
                "media": {
                  "audio": {
                    "muted": false,
                    "deaf": false
                  },
                  "video": {
                    "camera": false,
                    "screenShare": false
                  }
                }
              }
            ],
            "callsConfigurationId": "dc5942707c704551a00cd2ea",
            "platform": {
              "applicationId": "61c060db2675060027d8c7a6"
            }
          },
          "call": {
            "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
            "endpoint": {
              "type": "PHONE",
              "phoneNumber": "44790123456"
            },
            "from": "44790123456",
            "to": "44790123456",
            "direction": "OUTBOUND",
            "state": "CALLING",
            "media": {
              "audio": {
                "muted": false,
                "deaf": false
              },
              "video": {
                "camera": false,
                "screenShare": false
              }
            },
            "startTime": "2022-01-01T00:00:00.100+00:00",
            "answerTime": "2022-01-01T00:00:02.100+00:00",
            "ringDuration": 2,
            "callsConfigurationId": "dc5942707c704551a00cd2ea",
            "platform": {
              "applicationId": "61c060db2675060027d8c7a6"
            },
            "conferenceId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
            "customData": {
              "key1": "value1",
              "key2": "value2"
            }
          }
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{callId}", $givenCallId, self::CONNECT_WITH_NEW_CALL);

        $request = new CallsConnectWithNewCallRequest(
            callRequest: new CallsActionCallRequest(
                endpoint: new CallsPhoneEndpoint(
                    phoneNumber: "41792036727"
                ),
                from: "41793026834",
                maxDuration: 300
            ),
            connectOnEarlyMedia: false,
            conferenceRequest: new CallsActionConferenceRequest(
                name: "Example conference",
                recording: new CallsConferenceRecordingRequest(
                    recordingType: "AUDIO",
                    conferenceComposition: new CallsConferenceComposition(
                        enabled: true
                    )
                ),
                maxDuration: 600
            )
        );

        $closures = [
            fn () => $api->connectWithNewCall($givenCallId, $request),
            fn () => $api->connectWithNewCallAsync($givenCallId, $request),
        ];

        $expectedResponse = new CallsConferenceAndCall(
            conference: new CallsConference(
                id: "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
                name: "Example conference",
                participants: [
                    new CallsParticipant(
                        endpoint: new CallsPhoneEndpoint(
                            phoneNumber: "44790123456"
                        ),
                        callId: "d8d84155-3831-43fb-91c9-bb897149a79d",
                        state: "JOINED",
                        joinTime: new DateTime("2021-12-31T23:59:55.100+00:00"),
                        media: new CallsMediaProperties(
                            audio: new CallsAudioMediaProperties(
                                muted: false,
                                deaf: false
                            ),
                            video: new CallsVideoMediaProperties(
                                camera: false,
                                screenShare: false
                            )
                        )
                    ),
                    new CallsParticipant(
                        endpoint: new CallsPhoneEndpoint(
                            phoneNumber: "44790123456"
                        ),
                        callId: "d8d84155-3831-43fb-91c9-bb897149a79d",
                        state: "JOINING",
                        media: new CallsMediaProperties(
                            audio: new CallsAudioMediaProperties(
                                muted: false,
                                deaf: false
                            ),
                            video: new CallsVideoMediaProperties(
                                camera: false,
                                screenShare: false
                            )
                        )
                    )
                ],
                callsConfigurationId: "dc5942707c704551a00cd2ea",
                platform: new Platform(
                    applicationId: "61c060db2675060027d8c7a6"
                )
            ),
            call: new Call(
                endpoint: new CallsPhoneEndpoint(
                    phoneNumber: "44790123456"
                ),
                id: "d8d84155-3831-43fb-91c9-bb897149a79d",
                from: "44790123456",
                to: "44790123456",
                direction: "OUTBOUND",
                state: "CALLING",
                media: new CallsMediaProperties(
                    audio: new CallsAudioMediaProperties(
                        muted: false,
                        deaf: false
                    ),
                    video: new CallsVideoMediaProperties(
                        camera: false,
                        screenShare: false
                    )
                ),
                startTime: new DateTime("2022-01-01T00:00:00.100+00:00"),
                answerTime: new DateTime("2022-01-01T00:00:02.100+00:00"),
                ringDuration: 2,
                callsConfigurationId: "dc5942707c704551a00cd2ea",
                platform: new Platform(
                    applicationId: "61c060db2675060027d8c7a6"
                ),
                conferenceId: "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
                customData: [
                    "key1" => "value1",
                    "key2" => "value2"
                ]
            )
        );

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testSendRinging(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);
        $expectedPath = str_replace("{callId}", $givenCallId, self::SEND_RINGING);

        $closures = [
            fn () => $api->sendRinging($givenCallId),
            fn () => $api->sendRingingAsync($givenCallId),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );

        $this->assertPostRequestWithNoBody(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testPreAnswerCall(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenRequest = <<<JSON
        {
          "ringing": false,
          "customData": {
            "property1": "string",
            "property2": "string"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{callId}", $givenCallId, self::PRE_ANSWER_CALL);

        $request = new CallsPreAnswerRequest(
            ringing: false,
            customData: [
                "property1" => "string",
                "property2" => "string"
            ]
        );

        $closures = [
            fn () => $api->preAnswerCall($givenCallId, $request),
            fn () => $api->preAnswerCallAsync($givenCallId, $request),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testAnswerCall(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenRequest = <<<JSON
        {
          "customData": {
            "property1": "string",
            "property2": "string"
          },
          "recording": {
            "recordingType": "AUDIO",
            "customData": {
              "property1": "string",
              "property2": "string"
            },
            "filePrefix": "string"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{callId}", $givenCallId, self::ANSWER_CALL);

        $request = new CallsAnswerRequest(
            customData: [
                "property1" => "string",
                "property2" => "string"
            ],
            recording: new CallRecordingRequest(
                recordingType: "AUDIO",
                customData: [
                    "property1" => "string",
                    "property2" => "string"
                ],
                filePrefix: "string"
            )
        );

        $closures = [
            fn () => $api->answerCall($givenCallId, $request),
            fn () => $api->answerCallAsync($givenCallId, $request),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testHangupCall(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenRequest = <<<JSON
        {
          "errorCode": "NORMAL_HANGUP"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
          "endpoint": {
            "type": "PHONE",
            "phoneNumber": "44790123456"
          },
          "from": "44790123456",
          "to": "44790123456",
          "direction": "OUTBOUND",
          "state": "CALLING",
          "media": {
            "audio": {
              "muted": false,
              "deaf": false
            },
            "video": {
              "camera": false,
              "screenShare": false
            }
          },
          "startTime": "2022-01-01T00:00:00.100+00:00",
          "answerTime": "2022-01-01T00:00:02.100+00:00",
          "ringDuration": 2,
          "callsConfigurationId": "dc5942707c704551a00cd2ea",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          },
          "conferenceId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
          "customData": {
            "key1": "value1",
            "key2": "value2"
          }
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{callId}", $givenCallId, self::HANGUP_CALL);

        $request = new CallsHangupRequest(
            errorCode: "NORMAL_HANGUP"
        );

        $closures = [
            fn () => $api->hangupCall($givenCallId, $request),
            fn () => $api->hangupCallAsync($givenCallId, $request),
        ];

        $expectedResponse = new Call(
            endpoint: new CallsPhoneEndpoint(
                phoneNumber: "44790123456"
            ),
            id: "d8d84155-3831-43fb-91c9-bb897149a79d",
            from: "44790123456",
            to: "44790123456",
            direction: "OUTBOUND",
            state: "CALLING",
            media: new CallsMediaProperties(
                audio: new CallsAudioMediaProperties(
                    muted: false,
                    deaf: false
                ),
                video: new CallsVideoMediaProperties(
                    camera: false,
                    screenShare: false
                )
            ),
            startTime: new DateTime("2022-01-01T00:00:00.100+00:00"),
            answerTime: new DateTime("2022-01-01T00:00:02.100+00:00"),
            ringDuration: 2,
            callsConfigurationId: "dc5942707c704551a00cd2ea",
            platform: new Platform(
                applicationId: "61c060db2675060027d8c7a6"
            ),
            conferenceId: "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
            customData: [
                "key1" => "value1",
                "key2" => "value2"
            ]
        );

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testCallPlayFile(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenRequest = <<<JSON
        {
          "timeout": 30000,
          "offset": 5000,
          "content": {
            "fileId": "218eceba-c044-430d-9f26-8f1a7f0g2d03",
            "type": "FILE"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{callId}", $givenCallId, self::CALL_PLAY_FILE);

        $request = new CallsPlayRequest(
            content: new CallsFilePlayContent(
                fileId: "218eceba-c044-430d-9f26-8f1a7f0g2d03"
            ),
            timeout: 30000,
            offset: 5000
        );

        $closures = [
            fn () => $api->callPlayFile($givenCallId, $request),
            fn () => $api->callPlayFileAsync($givenCallId, $request),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testCallStopPlayingFile(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenRequest = <<<JSON
        {
          "customData": {
            "property1": "string",
            "property2": "string"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);
        $expectedPath = str_replace("{callId}", $givenCallId, self::CALL_STOP_PLAYING_FILE);

        $request = new CallsStopPlayRequest(
            customData: [
                "property1" => "string",
                "property2" => "string"
            ]
        );

        $closures = [
            fn () => $api->callStopPlayingFile($givenCallId, $request),
            fn () => $api->callStopPlayingFileAsync($givenCallId, $request),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testCallSayText(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenRequest = <<<JSON
        {
          "text": "This is an advanced example of text to speech",
          "language": "en",
          "speechRate": 1.5,
          "loopCount": 2,
          "preferences": {
            "voiceGender": "MALE"
          },
          "stopOn": {
            "terminator": "#",
            "type": "DTMF"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{callId}", $givenCallId, self::CALL_SAY_TEXT);

        $request = new CallsSayRequest(
            text: "This is an advanced example of text to speech",
            language: "en",
            speechRate: 1.5,
            loopCount: 2,
            preferences: new CallsVoicePreferences(
                voiceGender: "MALE"
            ),
            stopOn: new CallsDtmfTermination(
                terminator: "#"
            )
        );

        $closures = [
            fn () => $api->callSayText($givenCallId, $request),
            fn () => $api->callSayTextAsync($givenCallId, $request),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testCallSendDtmf(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenRequest = <<<JSON
        {
          "dtmf": "341#"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);
        $expectedPath = str_replace("{callId}", $givenCallId, self::CALL_SEND_DTMF);

        $request = new CallsDtmfSendRequest(
            dtmf: "341#"
        );

        $closures = [
            fn () => $api->callSendDtmf($givenCallId, $request),
            fn () => $api->callSendDtmfAsync($givenCallId, $request),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testCallCaptureDtmf(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenRequest = <<<JSON
        {
          "maxLength": 4,
          "timeout": 5000,
          "terminator": "#",
          "digitTimeout": 3000
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);
        $expectedPath = str_replace("{callId}", $givenCallId, self::CALL_CAPTURE_DTMF);

        $request = new CallsDtmfCaptureRequest(
            maxLength: 4,
            timeout: 5000,
            terminator: "#",
            digitTimeout: 3000
        );

        $closures = [
            fn () => $api->callCaptureDtmf($givenCallId, $request),
            fn () => $api->callCaptureDtmfAsync($givenCallId, $request),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testCallCaptureSpeech(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenRequest = <<<JSON
        {
          "language": "en-GB",
          "timeout": 30,
          "maxSilence": 3,
          "keyPhrases": [
            "phrase",
            "word"
          ]
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);
        $expectedPath = str_replace("{callId}", $givenCallId, self::CALL_CAPTURE_SPEECH);

        $request = new CallsSpeechCaptureRequest(
            language: "en-GB",
            timeout: 30,
            maxSilence: 3,
            keyPhrases: [
                "phrase",
                "word"
            ]
        );

        $closures = [
            fn () => $api->callCaptureSpeech($givenCallId, $request),
            fn () => $api->callCaptureSpeechAsync($givenCallId, $request),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testCallStartTranscription(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenRequest = <<<JSON
        {
          "transcription": {
            "language": "en-GB",
            "sendInterimResults": false
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{callId}", $givenCallId, self::CALL_START_TRANSCRIPTION);

        $request = new CallsStartTranscriptionRequest(
            transcription: new CallsTranscription(
                language: "en-GB",
                sendInterimResults: false
            )
        );

        $closures = [
            fn () => $api->callStartTranscription($givenCallId, $request),
            fn () => $api->callStartTranscriptionAsync($givenCallId, $request),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testCallStopTranscription(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);
        $expectedPath = str_replace("{callId}", $givenCallId, self::CALL_STOP_TRANSCRIPTION);

        $closures = [
            fn () => $api->callStopTranscription($givenCallId),
            fn () => $api->callStopTranscriptionAsync($givenCallId),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );

        $this->assertPostRequestWithNoBody(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testCallStartRecording(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenRequest = <<<JSON
        {
          "recording": {
            "recordingType": "AUDIO",
            "maxSilence": 5,
            "beep": true,
            "maxDuration": 20,
            "customData": {
              "key1": "value1",
              "key2": "value2"
            },
            "filePrefix": "customFilename"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);
        $expectedPath = str_replace("{callId}", $givenCallId, self::CALL_START_RECORDING);

        $request = new CallsRecordingStartRequest(
            recording: new CallsRecordingRequest(
                recordingType: "AUDIO",
                maxSilence: 5,
                beep: true,
                maxDuration: 20,
                customData: [
                    "key1" => "value1",
                    "key2" => "value2"
                ],
                filePrefix: "customFilename"
            )
        );

        $closures = [
            fn () => $api->callStartRecording($givenCallId, $request),
            fn () => $api->callStartRecordingAsync($givenCallId, $request),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testCallStopRecording(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);
        $expectedPath = str_replace("{callId}", $givenCallId, self::CALL_STOP_RECORDING);
        
        $closures = [
            fn () => $api->callStopRecording($givenCallId),
            fn () => $api->callStopRecordingAsync($givenCallId),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );
        
        $this->assertPostRequestWithNoBody(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testStartMediaStream(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenRequest = <<<JSON
        {
          "mediaStream": {
            "audioProperties": {
              "mediaStreamConfigId": "63467c6e2885a5389ba11d80",
              "replaceMedia": false
            }
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);
        $expectedPath = str_replace("{callId}", $givenCallId, self::START_MEDIA_STREAM);

        $request = new CallsStartMediaStreamRequest(
            mediaStream: new CallsMediaStream(
                audioProperties: new CallsMediaStreamAudioProperties(
                    mediaStreamConfigId: "63467c6e2885a5389ba11d80",
                    replaceMedia: false
                )
            )
        );

        $closures = [
            fn () => $api->startMediaStream($givenCallId, $request),
            fn () => $api->startMediaStreamAsync($givenCallId, $request),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testStopMediaStream(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);
        $expectedPath = str_replace("{callId}", $givenCallId, self::STOP_MEDIA_STREAM);

        $closures = [
            fn () => $api->stopMediaStream($givenCallId),
            fn () => $api->stopMediaStreamAsync($givenCallId),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );

        $this->assertPostRequestWithNoBody(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testApplicationTransfer(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenRequest = <<<JSON
        {
          "destinationCallsConfigurationId": "dc5942707c704551a00cd2ea",
          "timeout": 20
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);
        $expectedPath = str_replace("{callId}", $givenCallId, self::APPLICATION_TRANSFER);

        $request = new CallsApplicationTransferRequest(
            destinationCallsConfigurationId: "dc5942707c704551a00cd2ea",
            timeout: 20
        );

        $closures = [
            fn () => $api->applicationTransfer($givenCallId, $request),
            fn () => $api->applicationTransferAsync($givenCallId, $request),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testApplicationTransferAccept(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";
        $givenTransferId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);
        $expectedPath = str_replace(array("{callId}", "{transferId}"), array($givenCallId, $givenTransferId), self::APPLICATION_TRANSFER_ACCEPT);

        $closures = [
            fn () => $api->applicationTransferAccept($givenCallId, $givenTransferId),
            fn () => $api->applicationTransferAcceptAsync($givenCallId, $givenTransferId),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );

        $this->assertPostRequestWithNoBody(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testApplicationTransferReject(): void
    {
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";
        $givenTransferId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace(array("{callId}", "{transferId}"), array($givenCallId, $givenTransferId), self::APPLICATION_TRANSFER_REJECT);

        $closures = [
            fn () => $api->applicationTransferReject($givenCallId, $givenTransferId),
            fn () => $api->applicationTransferRejectAsync($givenCallId, $givenTransferId),
        ];

        $expectedResponse = new CallsActionResponse(
            status: "PENDING"
        );

        $this->assertPostRequestWithNoBody(
            $closures,
            $expectedPath,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testGetConferences(): void
    {

        $givenName = "Conference";
        $givenCallId = "066675c6-0db6-0db9-b032-031964d09af4";
        $givenCallsConfigurationId = "dc5942707c704551a00cd2ea";
        $givenApplicationId = "61c060db2675060027d8c7a6";
        $givenStartTimeAfter = new DateTime("2022-05-01T14:25:45.125+00:00");
        $givenPage = 0;
        $givenSize = 10;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "id": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
              "name": "Example conference",
              "participants": [
                {
                  "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
                  "endpoint": {
                    "type": "PHONE",
                    "phoneNumber": "44790123456"
                  },
                  "state": "JOINED",
                  "joinTime": "2021-12-31T23:59:55.100+00:00",
                  "media": {
                    "audio": {
                      "muted": false,
                      "deaf": false
                    },
                    "video": {
                      "camera": false,
                      "screenShare": false
                    }
                  }
                },
                {
                  "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
                  "endpoint": {
                    "type": "PHONE",
                    "phoneNumber": "44790123456"
                  },
                  "state": "JOINING",
                  "media": {
                    "audio": {
                      "muted": false,
                      "deaf": false
                    },
                    "video": {
                      "camera": false,
                      "screenShare": false
                    }
                  }
                }
              ],
              "callsConfigurationId": "dc5942707c704551a00cd2ea",
              "platform": {
                "applicationId": "61c060db2675060027d8c7a6"
              }
            }
          ],
          "paging": {
            "page": 0,
            "size": 1,
            "totalPages": 1,
            "totalResults": 1
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_CONFERENCES
            . "?"
            . Query::build([
                "name" => $givenName,
                "callId" => $givenCallId,
                "callsConfigurationId" => $givenCallsConfigurationId,
                "applicationId" => $givenApplicationId,
                "startTimeAfter" => $givenStartTimeAfter->format(DateTime::RFC3339_EXTENDED),
                "page" => $givenPage,
                "size" => $givenSize
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getConferences(
                name: $givenName,
                callId: $givenCallId,
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                startTimeAfter: $givenStartTimeAfter,
                page: $givenPage,
                size: $givenSize
            ),
            fn () => $api->getConferencesAsync(
                name: $givenName,
                callId: $givenCallId,
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                startTimeAfter: $givenStartTimeAfter,
                page: $givenPage,
                size: $givenSize
            )
        ];

        $this->assertClosureResponses(
            $closures,
            CallsConferencePage::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );


    }

    public function testCreateConference(): void
    {
        $givenRequest = <<<JSON
        {
          "name": "Example conference",
          "recording": {
            "recordingType": "AUDIO",
            "conferenceComposition": {
              "enabled": true
            }
          },
          "callsConfigurationId": "dc5942707c704551a00cd2ea",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
          "name": "Example conference",
          "participants": [
            {
              "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "state": "JOINED",
              "joinTime": "2021-12-31T23:59:55.100+00:00",
              "media": {
                "audio": {
                  "muted": false,
                  "deaf": false
                },
                "video": {
                  "camera": false,
                  "screenShare": false
                }
              }
            },
            {
              "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "state": "JOINING",
              "media": {
                "audio": {
                  "muted": false,
                  "deaf": false
                },
                "video": {
                  "camera": false,
                  "screenShare": false
                }
              }
            }
          ],
          "callsConfigurationId": "dc5942707c704551a00cd2ea",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(201, $this->givenRequestHeaders, $givenResponse),
                new Response(201, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::CREATE_CONFERENCE;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsConferenceRequest::class);

        $closures = [
            fn () => $api->createConference($request),
            fn () => $api->createConferenceAsync($request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsConference::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer,
        );

    }

    public function testGetConference(): void
    {
        $givenConferenceId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenResponse = <<<JSON
        {
          "id": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
          "name": "Example conference",
          "participants": [
            {
              "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "state": "JOINED",
              "joinTime": "2021-12-31T23:59:55.100+00:00",
              "media": {
                "audio": {
                  "muted": false,
                  "deaf": false
                },
                "video": {
                  "camera": false,
                  "screenShare": false
                }
              }
            },
            {
              "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "state": "JOINING",
              "media": {
                "audio": {
                  "muted": false,
                  "deaf": false
                },
                "video": {
                  "camera": false,
                  "screenShare": false
                }
              }
            }
          ],
          "callsConfigurationId": "dc5942707c704551a00cd2ea",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{conferenceId}", $givenConferenceId, self::GET_CONFERENCE);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getConference($givenConferenceId),
            fn () => $api->getConferenceAsync($givenConferenceId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsConference::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testUpdateConference(): void
    {
        $givenConferenceId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenRequest = <<<JSON
        {
          "muted": false,
          "deaf": true
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{conferenceId}", $givenConferenceId, self::UPDATE_CONFERENCE);

        $expectedHttpMethod = "PATCH";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsUpdateRequest::class);

        $closures = [
            fn () => $api->updateConference($givenConferenceId, $request),
            fn () => $api->updateConferenceAsync($givenConferenceId, $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsActionResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );
    }

    public function testGetConferencesHistory(): void
    {
        $givenName = "Conference";
        $givenCallId = "066675c6-0db6-0db9-b032-031964d09af4";
        $givenCallsConfigurationId = "dc5942707c704551a00cd2ea";
        $givenApplicationId = "61c060db2675060027d8c7a6";
        $givenStartTimeAfter = new DateTime("2022-05-01T14:25:45.125+00:00");
        $givenEndTimeBefore = new DateTime("2022-05-01T14:26:45.125+00:00");
        $givenPage = 0;
        $givenSize = 10;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "conferenceId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
              "name": "Example conference",
              "platform": {
                "applicationId": "61c060db2675060027d8c7a6"
              },
              "startTime": "2021-12-31T23:57:30.100+00:00",
              "endTime": "2021-12-31T23:59:20.100+00:00",
              "duration": 110,
              "sessions": [
                {
                  "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
                  "joinTime": "2021-12-31T23:58:00.100+00:00",
                  "leaveTime": "2021-12-31T23:59:00.100+00:00"
                },
                {
                  "callId": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
                  "joinTime": "2021-12-31T23:57:30.100+00:00",
                  "leaveTime": "2021-12-31T23:59:20.100+00:00"
                }
              ],
              "recording": {
                "composedFiles": [
                  {
                    "id": "b72cde3c-7d9c-4a5c-8e48-5a947244c013",
                    "name": "d8d84155-3831-43fb-91c9-bb897149a79d_41792030001_1652725357412_recording.wav",
                    "fileFormat": "WAV",
                    "size": 67564,
                    "creationTime": "2022-01-01T00:00:00.100+00:00",
                    "duration": 10,
                    "startTime": "2021-12-31T23:57:30.100+00:00",
                    "endTime": "2021-12-31T23:59:20.100+00:00",
                    "location": "HOSTED"
                  }
                ],
                "callRecordings": [
                  {
                    "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
                    "endpoint": {
                      "type": "PHONE",
                      "phoneNumber": "44790123456"
                    },
                    "direction": "INBOUND",
                    "files": [
                      {
                        "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                        "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                        "fileFormat": "WAV",
                        "size": 67564,
                        "creationTime": "2022-01-01T00:00:00.250+00:00",
                        "duration": 10,
                        "startTime": "2021-12-31T23:59:50.100+00:00",
                        "endTime": "2022-01-01T00:00:00.100+00:00",
                        "location": "HOSTED"
                      }
                    ],
                    "status": "SUCCESSFUL"
                  },
                  {
                    "callId": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
                    "endpoint": {
                      "type": "PHONE",
                      "phoneNumber": "44790123456"
                    },
                    "direction": "INBOUND",
                    "files": [
                      {
                        "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                        "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                        "fileFormat": "WAV",
                        "size": 67564,
                        "creationTime": "2022-01-01T00:00:00.250+00:00",
                        "duration": 10,
                        "startTime": "2021-12-31T23:59:50.100+00:00",
                        "endTime": "2022-01-01T00:00:00.100+00:00",
                        "location": "HOSTED"
                      }
                    ],
                    "status": "SUCCESSFUL"
                  }
                ]
              },
              "errorCode": {
                "id": 10000,
                "name": "NORMAL_HANGUP",
                "description": "The call has ended with hangup initiated by caller, callee or API"
              }
            }
          ],
          "paging": {
            "page": 0,
            "size": 1,
            "totalPages": 1,
            "totalResults": 1
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_CONFERENCES_HISTORY
            . "?"
            . Query::build([
                "name" => $givenName,
                "callId" => $givenCallId,
                "callsConfigurationId" => $givenCallsConfigurationId,
                "applicationId" => $givenApplicationId,
                "startTimeAfter" => $givenStartTimeAfter->format(DateTime::RFC3339_EXTENDED),
                "endTimeBefore" => $givenEndTimeBefore->format(DateTime::RFC3339_EXTENDED),
                "page" => $givenPage,
                "size" => $givenSize
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getConferencesHistory(
                name: $givenName,
                callId: $givenCallId,
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                startTimeAfter: $givenStartTimeAfter,
                endTimeBefore: $givenEndTimeBefore,
                page: $givenPage,
                size: $givenSize
            ),
            fn () => $api->getConferencesHistoryAsync(
                name: $givenName,
                callId: $givenCallId,
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                startTimeAfter: $givenStartTimeAfter,
                endTimeBefore: $givenEndTimeBefore,
                page: $givenPage,
                size: $givenSize
            )
        ];

        $this->assertClosureResponses(
            $closures,
            CallsConferenceLogPage::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );
    }

    public function testGetConferenceHistory(): void
    {
        $givenConferenceId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenResponse = <<<JSON
        {
            "conferenceId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
            "duration": 110,
            "endTime": "2021-12-31T23:59:20.100+00:00",
            "errorCode": {
                "description": "The call has ended with hangup initiated by caller, callee or API",
                "id": 10000,
                "name": "NORMAL_HANGUP"
            },
            "name": "Example conference",
            "platform": {
                "applicationId": "61c060db2675060027d8c7a6"
            },
            "recording": {
                "callRecordings": [
                    {
                        "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
                        "direction": "INBOUND",
                        "endpoint": {
                            "phoneNumber": "44790123456",
                            "type": "PHONE"
                        },
                        "files": [
                            {
                                "creationTime": "2022-01-01T00:00:00.250+00:00",
                                "duration": 10,
                                "endTime": "2022-01-01T00:00:00.100+00:00",
                                "fileFormat": "WAV",
                                "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                                "location": "HOSTED",
                                "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                                "size": 67564,
                                "startTime": "2021-12-31T23:59:50.100+00:00"
                            }
                        ],
                        "status": "SUCCESSFUL"
                    },
                    {
                        "callId": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
                        "direction": "INBOUND",
                        "endpoint": {
                            "phoneNumber": "44790123456",
                            "type": "PHONE"
                        },
                        "files": [
                            {
                                "creationTime": "2022-01-01T00:00:00.250+00:00",
                                "duration": 10,
                                "endTime": "2022-01-01T00:00:00.100+00:00",
                                "fileFormat": "WAV",
                                "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                                "location": "HOSTED",
                                "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                                "size": 67564,
                                "startTime": "2021-12-31T23:59:50.100+00:00"
                            }
                        ],
                        "status": "SUCCESSFUL"
                    }
                ],
                "composedFiles": [
                    {
                        "creationTime": "2022-01-01T00:00:00.100+00:00",
                        "duration": 10,
                        "endTime": "2021-12-31T23:59:20.100+00:00",
                        "fileFormat": "WAV",
                        "id": "b72cde3c-7d9c-4a5c-8e48-5a947244c013",
                        "location": "HOSTED",
                        "name": "d8d84155-3831-43fb-91c9-bb897149a79d_41792030001_1652725357412_recording.wav",
                        "size": 67564,
                        "startTime": "2021-12-31T23:57:30.100+00:00"
                    }
                ]
            },
            "sessions": [
                {
                    "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
                    "joinTime": "2021-12-31T23:58:00.100+00:00",
                    "leaveTime": "2021-12-31T23:59:00.100+00:00"
                },
                {
                    "callId": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
                    "joinTime": "2021-12-31T23:57:30.100+00:00",
                    "leaveTime": "2021-12-31T23:59:20.100+00:00"
                }
            ],
            "startTime": "2021-12-31T23:57:30.100+00:00"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{conferenceId}", $givenConferenceId, self::GET_CONFERENCE_HISTORY);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getConferenceHistory($givenConferenceId),
            fn () => $api->getConferenceHistoryAsync($givenConferenceId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsConferenceLog::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testAddNewConferenceCall(): void
    {
        $givenConferenceId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenRequest = <<<JSON
        {
          "callRequest": {
            "endpoint": {
              "type": "PHONE",
              "phoneNumber": "41792036727"
            },
            "from": "41793026834"
          },
          "connectOnEarlyMedia": false
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "conference": {
            "id": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
            "name": "Example conference",
            "participants": [
              {
                "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
                "endpoint": {
                  "type": "PHONE",
                  "phoneNumber": "44790123456"
                },
                "state": "JOINED",
                "joinTime": "2021-12-31T23:59:55.100+00:00",
                "media": {
                  "audio": {
                    "muted": false,
                    "deaf": false
                  },
                  "video": {
                    "camera": false,
                    "screenShare": false
                  }
                }
              },
              {
                "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
                "endpoint": {
                  "type": "PHONE",
                  "phoneNumber": "44790123456"
                },
                "state": "JOINING",
                "media": {
                  "audio": {
                    "muted": false,
                    "deaf": false
                  },
                  "video": {
                    "camera": false,
                    "screenShare": false
                  }
                }
              }
            ],
            "callsConfigurationId": "dc5942707c704551a00cd2ea",
            "platform": {
              "applicationId": "61c060db2675060027d8c7a6"
            }
          },
          "call": {
            "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
            "endpoint": {
              "type": "PHONE",
              "phoneNumber": "44790123456"
            },
            "from": "44790123456",
            "to": "44790123456",
            "direction": "OUTBOUND",
            "state": "CALLING",
            "media": {
              "audio": {
                "muted": false,
                "deaf": false
              },
              "video": {
                "camera": false,
                "screenShare": false
              }
            },
            "startTime": "2022-01-01T00:00:00.100+00:00",
            "answerTime": "2022-01-01T00:00:02.100+00:00",
            "ringDuration": 2,
            "callsConfigurationId": "dc5942707c704551a00cd2ea",
            "platform": {
              "applicationId": "61c060db2675060027d8c7a6"
            },
            "conferenceId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
            "customData": {
              "key1": "value1",
              "key2": "value2"
            }
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{conferenceId}", $givenConferenceId, self::ADD_NEW_CONFERENCE_CALL);

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsAddNewCallRequest::class);

        $closures = [
            fn () => $api->addNewConferenceCall($givenConferenceId, $request),
            fn () => $api->addNewConferenceCallAsync($givenConferenceId, $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsConferenceAndCall::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );
    }

    public function testAddExistingConferenceCall(): void
    {
        $givenConferenceId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenRequest = <<<JSON
        {
          "connectOnEarlyMedia": false
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
          "name": "Example conference",
          "participants": [
            {
              "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "state": "JOINED",
              "joinTime": "2021-12-31T23:59:55.100+00:00",
              "media": {
                "audio": {
                  "muted": false,
                  "deaf": false
                },
                "video": {
                  "camera": false,
                  "screenShare": false
                }
              }
            },
            {
              "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "state": "JOINING",
              "media": {
                "audio": {
                  "muted": false,
                  "deaf": false
                },
                "video": {
                  "camera": false,
                  "screenShare": false
                }
              }
            }
          ],
          "callsConfigurationId": "dc5942707c704551a00cd2ea",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace(array("{conferenceId}", "{callId}"), array($givenConferenceId, $givenCallId), self::ADD_EXISTING_CONFERENCE_CALL);

        $expectedHttpMethod = "PUT";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsAddExistingCallRequest::class);

        $closures = [
            fn () => $api->addExistingConferenceCall($givenConferenceId, $givenCallId, $request),
            fn () => $api->addExistingConferenceCallAsync($givenConferenceId, $givenCallId, $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsConference::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );


    }

    public function testRemoveConferenceCall(): void
    {
        $givenConferenceId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace(array("{conferenceId}", "{callId}"), array($givenConferenceId, $givenCallId), self::REMOVE_CONFERENCE_CALL);

        $expectedHttpMethod = "DELETE";

        $closures = [
            fn () => $api->removeConferenceCall($givenConferenceId, $givenCallId),
            fn () => $api->removeConferenceCallAsync($givenConferenceId, $givenCallId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsActionResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );


    }

    public function testUpdateConferenceCall(): void
    {
        $givenConferenceId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";
        $givenCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";

        $givenRequest = <<<JSON
        {
          "muted": false,
          "deaf": true
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace(array("{conferenceId}", "{callId}"), array($givenConferenceId, $givenCallId), self::UPDATE_CONFERENCE_CALL);

        $expectedHttpMethod = "PATCH";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsUpdateRequest::class);

        $closures = [
            fn () => $api->updateConferenceCall($givenConferenceId, $givenCallId, $request),
            fn () => $api->updateConferenceCallAsync($givenConferenceId, $givenCallId, $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsActionResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );
    }

    public function testHangupConference(): void
    {
        $givenConferenceId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenResponse = <<<JSON
        {
          "id": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
          "name": "Example conference",
          "participants": [
            {
              "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "state": "JOINED",
              "joinTime": "2021-12-31T23:59:55.100+00:00",
              "media": {
                "audio": {
                  "muted": false,
                  "deaf": false
                },
                "video": {
                  "camera": false,
                  "screenShare": false
                }
              }
            },
            {
              "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "state": "JOINING",
              "media": {
                "audio": {
                  "muted": false,
                  "deaf": false
                },
                "video": {
                  "camera": false,
                  "screenShare": false
                }
              }
            }
          ],
          "callsConfigurationId": "dc5942707c704551a00cd2ea",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{conferenceId}", $givenConferenceId, self::HANGUP_CONFERENCE);

        $expectedHttpMethod = "POST";

        $closures = [
            fn () => $api->hangupConference($givenConferenceId),
            fn () => $api->hangupConferenceAsync($givenConferenceId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsConference::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testConferencePlayFile(): void
    {
        $givenConferenceId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenRequest = <<<JSON
        {
          "loopCount": 0,
          "content": {
            "type": "FILE",
            "fileId": "b72cde3c-7d9c-4a5c-8e48-5a947244c013"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{conferenceId}", $givenConferenceId, self::CONFERENCE_PLAY_FILE);

        $request = new CallsConferencePlayRequest(
            content: new CallsFilePlayContent(
                fileId: "b72cde3c-7d9c-4a5c-8e48-5a947244c013"
            ),
            loopCount: 0
        );

        $closures = [
            fn () => $api->conferencePlayFile($givenConferenceId, $request),
            fn () => $api->conferencePlayFileAsync($givenConferenceId, $request),
        ];

        $expectedResponse = new CallsActionResponse(status: "PENDING");

        $this->assertPostRequest(
            $closures,
            $expectedPath,
            $givenRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testConferenceStopPlayingFile(): void
    {
        $givenConferenceId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{conferenceId}", $givenConferenceId, self::CONFERENCE_STOP_PLAYING_FILE);

        $expectedHttpMethod = "POST";

        $closures = [
            fn () => $api->conferenceStopPlayingFile($givenConferenceId),
            fn () => $api->conferenceStopPlayingFileAsync($givenConferenceId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsActionResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testConferenceSayText(): void
    {
        $givenConferenceId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenRequest = <<<JSON
        {
          "text": "string",
          "language": "ar",
          "speechRate": 0.5,
          "loopCount": 0,
          "preferences": {
            "voiceGender": "FEMALE",
            "voiceName": "Zeina"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{conferenceId}", $givenConferenceId, self::CONFERENCE_SAY_TEXT);

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsSayRequest::class);

        $closures = [
            fn () => $api->conferenceSayText($givenConferenceId, $request),
            fn () => $api->conferenceSayTextAsync($givenConferenceId, $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsActionResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );
    }

    public function testConferenceStartRecording(): void
    {
        $givenConferenceId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenRequest = <<<JSON
        {
          "recordingType": "AUDIO",
          "conferenceComposition": {
            "enabled": true
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{conferenceId}", $givenConferenceId, self::CONFERENCE_START_RECORDING);

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsConferenceRecordingRequest::class);

        $closures = [
            fn () => $api->conferenceStartRecording($givenConferenceId, $request),
            fn () => $api->conferenceStartRecordingAsync($givenConferenceId, $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsActionResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testConferenceStopRecording(): void
    {
        $givenConferenceId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{conferenceId}", $givenConferenceId, self::CONFERENCE_STOP_RECORDING);

        $expectedHttpMethod = "POST";

        $closures = [
            fn () => $api->conferenceStopRecording($givenConferenceId),
            fn () => $api->conferenceStopRecordingAsync($givenConferenceId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsActionResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testConferenceBroadcastWebRtcText(): void
    {
        $givenConferenceId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenRequest = <<<JSON
        {
          "text": "string"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{conferenceId}", $givenConferenceId, self::CONFERENCE_BROADCAST_WEBRTC_TEXT);

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsConferenceBroadcastWebrtcTextRequest::class);

        $closures = [
            fn () => $api->conferenceBroadcastWebRtcText($givenConferenceId, $request),
            fn () => $api->conferenceBroadcastWebRtcTextAsync($givenConferenceId, $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsActionResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetDialogs(): void
    {
        $givenCallsConfigurationId = "dc5942707c704551a00cd2ea";
        $givenApplicationId = "61c060db2675060027d8c7a6";
        $givenState = CallsDialogState::ESTABLISHED();
        $givenParentCallId = "066675c6-0db6-0db9-b032-031964d09af4";
        $givenChildCallId = "072675c6-3db6-0fb9-b632-031264d09ck2";
        $givenStartTimeAfter = new DateTime("2022-05-01T14:25:45.125+00:00");
        $givenPage = 0;
        $givenSize = 1;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "id": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
              "platform": {
                "applicationId": "61c060db2675060027d8c7a6"
              },
              "state": "ESTABLISHED",
              "startTime": "2022-01-01T00:00:00.100+00:00",
              "establishTime": "2022-01-01T00:00:02.100+00:00",
              "endTime": "2022-01-01T00:01:00.100+00:00",
              "parentCall": {
                "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                "endpoint": {
                  "type": "PHONE",
                  "phoneNumber": "44790123456"
                },
                "direction": "INBOUND",
                "state": "ESTABLISHED",
                "media": {
                  "audio": {
                    "muted": false,
                    "deaf": false
                  },
                  "video": {
                    "camera": false,
                    "screenShare": false
                  }
                },
                "startTime": "2022-01-01T00:00:00.100+00:00",
                "answerTime": "2022-01-01T00:00:02.100+00:00",
                "endTime": "2022-01-01T00:01:00.100+00:00",
                "ringDuration": 2,
                "platform": {
                  "applicationId": "61c060db2675060027d8c7a6"
                },
                "dialogId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e"
              },
              "childCall": {
                "id": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
                "endpoint": {
                  "type": "PHONE",
                  "phoneNumber": "44790987654"
                },
                "direction": "OUTBOUND",
                "state": "ESTABLISHED",
                "media": {
                  "audio": {
                    "muted": false,
                    "deaf": false
                  },
                  "video": {
                    "camera": false,
                    "screenShare": false
                  }
                },
                "startTime": "2022-01-01T00:00:00.100+00:00",
                "answerTime": "2022-01-01T00:00:02.100+00:00",
                "endTime": "2022-01-01T00:01:00.100+00:00",
                "ringDuration": 2,
                "platform": {
                  "applicationId": "61c060db2675060027d8c7a6"
                },
                "dialogId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e"
              }
            }
          ],
          "paging": {
            "page": 0,
            "size": 1,
            "totalPages": 1,
            "totalResults": 1
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_DIALOGS
            . "?"
            . Query::build([
                "callsConfigurationId" => $givenCallsConfigurationId,
                "applicationId" => $givenApplicationId,
                "state" => $givenState,
                "parentCallId" => $givenParentCallId,
                "childCallId" => $givenChildCallId,
                "startTimeAfter" => $givenStartTimeAfter->format(DateTime::RFC3339_EXTENDED),
                "page" => $givenPage,
                "size" => $givenSize
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getDialogs(
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                state: $givenState,
                parentCallId: $givenParentCallId,
                childCallId: $givenChildCallId,
                startTimeAfter: $givenStartTimeAfter,
                page: $givenPage,
                size: $givenSize
            ),
            fn () => $api->getDialogsAsync(
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                state: $givenState,
                parentCallId: $givenParentCallId,
                childCallId: $givenChildCallId,
                startTimeAfter: $givenStartTimeAfter,
                page: $givenPage,
                size: $givenSize
            )
        ];

        $this->assertClosureResponses(
            $closures,
            CallsDialogPage::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer,
        );


    }

    public function testCreateDialog(): void
    {
        $givenRequest = <<<JSON
        {
          "parentCallId": "d8d84155-3831-43fb-91c9-bb897149a79d",
          "childCallRequest": {
            "endpoint": {
              "type": "PHONE",
              "phoneNumber": "44790987654"
            },
            "from": "44790123456",
            "connectTimeout": 60,
            "machineDetection": {
              "enabled": true
            },
            "customData": {
              "key1": "value1",
              "key2": "value2"
            }
          },
          "recording": {
            "recordingType": "AUDIO",
            "dialogComposition": {
              "enabled": false
            }
          },
          "maxDuration": 3600,
          "propagationOptions": {
            "childCallHangup": false
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          },
          "state": "ESTABLISHED",
          "startTime": "2022-01-01T00:00:00.100+00:00",
          "establishTime": "2022-01-01T00:00:02.100+00:00",
          "endTime": "2022-01-01T00:01:00.100+00:00",
          "parentCall": {
            "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
            "endpoint": {
              "type": "PHONE",
              "phoneNumber": "44790123456"
            },
            "direction": "INBOUND",
            "state": "ESTABLISHED",
            "media": {
              "audio": {
                "muted": false,
                "deaf": false
              },
              "video": {
                "camera": false,
                "screenShare": false
              }
            },
            "startTime": "2022-01-01T00:00:00.100+00:00",
            "answerTime": "2022-01-01T00:00:02.100+00:00",
            "endTime": "2022-01-01T00:01:00.100+00:00",
            "ringDuration": 2,
            "platform": {
              "applicationId": "61c060db2675060027d8c7a6"
            },
            "dialogId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e"
          },
          "childCall": {
            "id": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
            "endpoint": {
              "type": "PHONE",
              "phoneNumber": "44790987654"
            },
            "direction": "OUTBOUND",
            "state": "ESTABLISHED",
            "media": {
              "audio": {
                "muted": false,
                "deaf": false
              },
              "video": {
                "camera": false,
                "screenShare": false
              }
            },
            "startTime": "2022-01-01T00:00:00.100+00:00",
            "answerTime": "2022-01-01T00:00:02.100+00:00",
            "endTime": "2022-01-01T00:01:00.100+00:00",
            "ringDuration": 2,
            "platform": {
              "applicationId": "61c060db2675060027d8c7a6"
            },
            "dialogId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(201, $this->givenRequestHeaders, $givenResponse),
                new Response(201, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::CREATE_DIALOG;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsDialogRequest::class);

        $closures = [
            fn () => $api->createDialog($request),
            fn () => $api->createDialogAsync($request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsDialogResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer,
        );


    }

    public function testCreateDialogWithExistingCalls(): void
    {
        $givenParentCallId = "d8d84155-3831-43fb-91c9-bb897149a79d";
        $givenChildCallId = "3ad8805e-d401-424e-9b03-e02a2016a5e2";

        $givenRequest = <<<JSON
        {
          "recording": {
            "recordingType": "AUDIO",
            "dialogComposition": {
              "enabled": false
            },
            "customData": {
              "property1": "string",
              "property2": "string"
            },
            "filePrefix": "string"
          },
          "maxDuration": 28800,
          "propagationOptions": {
            "childCallHangup": true,
            "childCallRinging": false
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          },
          "state": "ESTABLISHED",
          "startTime": "2022-01-01T00:00:00.100+00:00",
          "establishTime": "2022-01-01T00:00:02.100+00:00",
          "endTime": "2022-01-01T00:01:00.100+00:00",
          "parentCall": {
            "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
            "endpoint": {
              "type": "PHONE",
              "phoneNumber": "44790123456"
            },
            "direction": "INBOUND",
            "state": "ESTABLISHED",
            "media": {
              "audio": {
                "muted": false,
                "deaf": false
              },
              "video": {
                "camera": false,
                "screenShare": false
              }
            },
            "startTime": "2022-01-01T00:00:00.100+00:00",
            "answerTime": "2022-01-01T00:00:02.100+00:00",
            "endTime": "2022-01-01T00:01:00.100+00:00",
            "ringDuration": 2,
            "platform": {
              "applicationId": "61c060db2675060027d8c7a6"
            },
            "dialogId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e"
          },
          "childCall": {
            "id": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
            "endpoint": {
              "type": "PHONE",
              "phoneNumber": "44790987654"
            },
            "direction": "OUTBOUND",
            "state": "ESTABLISHED",
            "media": {
              "audio": {
                "muted": false,
                "deaf": false
              },
              "video": {
                "camera": false,
                "screenShare": false
              }
            },
            "startTime": "2022-01-01T00:00:00.100+00:00",
            "answerTime": "2022-01-01T00:00:02.100+00:00",
            "endTime": "2022-01-01T00:01:00.100+00:00",
            "ringDuration": 2,
            "platform": {
              "applicationId": "61c060db2675060027d8c7a6"
            },
            "dialogId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(201, $this->givenRequestHeaders, $givenResponse),
                new Response(201, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace(array("{parentCallId}", "{childCallId}"), array($givenParentCallId, $givenChildCallId), self::CREATE_DIALOG_WITH_EXISTING_CALLS);

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsDialogWithExistingCallRequest::class);

        $closures = [
            fn () => $api->createDialogWithExistingCalls($givenParentCallId, $givenChildCallId, $request),
            fn () => $api->createDialogWithExistingCallsAsync($givenParentCallId, $givenChildCallId, $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsDialogResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer,
        );


    }

    public function testGetDialog(): void
    {
        $givenDialogId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenResponse = <<<JSON
        {
          "id": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          },
          "state": "ESTABLISHED",
          "startTime": "2022-01-01T00:00:00.100+00:00",
          "establishTime": "2022-01-01T00:00:02.100+00:00",
          "endTime": "2022-01-01T00:01:00.100+00:00",
          "parentCall": {
            "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
            "endpoint": {
              "type": "PHONE",
              "phoneNumber": "44790123456"
            },
            "direction": "INBOUND",
            "state": "ESTABLISHED",
            "media": {
              "audio": {
                "muted": false,
                "deaf": false
              },
              "video": {
                "camera": false,
                "screenShare": false
              }
            },
            "startTime": "2022-01-01T00:00:00.100+00:00",
            "answerTime": "2022-01-01T00:00:02.100+00:00",
            "endTime": "2022-01-01T00:01:00.100+00:00",
            "ringDuration": 2,
            "platform": {
              "applicationId": "61c060db2675060027d8c7a6"
            },
            "dialogId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e"
          },
          "childCall": {
            "id": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
            "endpoint": {
              "type": "PHONE",
              "phoneNumber": "44790987654"
            },
            "direction": "OUTBOUND",
            "state": "ESTABLISHED",
            "media": {
              "audio": {
                "muted": false,
                "deaf": false
              },
              "video": {
                "camera": false,
                "screenShare": false
              }
            },
            "startTime": "2022-01-01T00:00:00.100+00:00",
            "answerTime": "2022-01-01T00:00:02.100+00:00",
            "endTime": "2022-01-01T00:01:00.100+00:00",
            "ringDuration": 2,
            "platform": {
              "applicationId": "61c060db2675060027d8c7a6"
            },
            "dialogId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{dialogId}", $givenDialogId, self::GET_DIALOG);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getDialog($givenDialogId),
            fn () => $api->getDialogAsync($givenDialogId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsDialogResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetDialogsHistory(): void
    {
        $givenCallsConfigurationId = "dc5942707c704551a00cd2ea";
        $givenApplicationId = "61c060db2675060027d8c7a6";
        $givenState = CallsDialogState::ESTABLISHED();
        $givenParentCallId = "066675c6-0db6-0db9-b032-031964d09af4";
        $givenChildCallId = "072675c6-3db6-0fb9-b632-031264d09ck2";
        $givenStartTimeAfter = new DateTime("2022-05-01T14:25:45.125+00:00");
        $givenEndTimeBefore = new DateTime("2022-05-01T14:26:45.125+00:00");
        $givenPage = 0;
        $givenSize = 1;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "dialogId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
              "platform": {
                "applicationId": "61c060db2675060027d8c7a6"
              },
              "state": "ESTABLISHED",
              "startTime": "2022-01-01T00:00:00.100+00:00",
              "establishTime": "2022-01-01T00:00:02.100+00:00",
              "endTime": "2022-01-01T00:01:00.100+00:00",
              "parentCallId": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "childCallId": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
              "duration": 60,
              "recording": {
                "composedFiles": [
                  {
                    "id": "b72cde3c-7d9c-4a5c-8e48-5a947244c013",
                    "name": "d8d84155-3831-43fb-91c9-bb897149a79d_41792030001_1652725357412_recording.wav",
                    "fileFormat": "WAV",
                    "size": 67564,
                    "creationTime": "2022-01-01T00:00:00.100+00:00",
                    "duration": 10,
                    "startTime": "2021-12-31T23:57:30.100+00:00",
                    "endTime": "2021-12-31T23:59:20.100+00:00",
                    "location": "SFTP",
                    "sftpUploadStatus": "UPLOADED"
                  }
                ],
                "callRecordings": [
                  {
                    "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
                    "endpoint": {
                      "type": "PHONE",
                      "phoneNumber": "44790123456"
                    },
                    "direction": "INBOUND",
                    "files": [
                      {
                        "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                        "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                        "fileFormat": "WAV",
                        "size": 67564,
                        "creationTime": "2022-01-01T00:00:00.250+00:00",
                        "duration": 10,
                        "startTime": "2021-12-31T23:59:50.100+00:00",
                        "endTime": "2022-01-01T00:00:00.100+00:00",
                        "location": "HOSTED"
                      }
                    ],
                    "status": "SUCCESSFUL"
                  },
                  {
                    "callId": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
                    "endpoint": {
                      "type": "PHONE",
                      "phoneNumber": "44790123456"
                    },
                    "direction": "INBOUND",
                    "files": [
                      {
                        "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                        "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                        "fileFormat": "WAV",
                        "size": 67564,
                        "creationTime": "2022-01-01T00:00:00.250+00:00",
                        "duration": 10,
                        "startTime": "2021-12-31T23:59:50.100+00:00",
                        "endTime": "2022-01-01T00:00:00.100+00:00",
                        "location": "HOSTED"
                      }
                    ],
                    "status": "SUCCESSFUL"
                  }
                ]
              },
              "errorCode": {
                "id": 10000,
                "name": "NORMAL_HANGUP",
                "description": "The call has ended with hangup initiated by caller, callee or API"
              }
            }
          ],
          "paging": {
            "page": 0,
            "size": 1,
            "totalPages": 1,
            "totalResults": 1
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_DIALOGS_HISTORY
            . "?"
            . Query::build([
                "callsConfigurationId" => $givenCallsConfigurationId,
                "applicationId" => $givenApplicationId,
                "state" => $givenState,
                "parentCallId" => $givenParentCallId,
                "childCallId" => $givenChildCallId,
                "startTimeAfter" => $givenStartTimeAfter->format(DateTime::RFC3339_EXTENDED),
                "endTimeBefore" => $givenEndTimeBefore->format(DateTime::RFC3339_EXTENDED),
                "page" => $givenPage,
                "size" => $givenSize
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getDialogsHistory(
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                state: $givenState,
                parentCallId: $givenParentCallId,
                childCallId: $givenChildCallId,
                startTimeAfter: $givenStartTimeAfter,
                endTimeBefore: $givenEndTimeBefore,
                page: $givenPage,
                size: $givenSize
            ),
            fn () => $api->getDialogsHistoryAsync(
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                state: $givenState,
                parentCallId: $givenParentCallId,
                childCallId: $givenChildCallId,
                startTimeAfter: $givenStartTimeAfter,
                endTimeBefore: $givenEndTimeBefore,
                page: $givenPage,
                size: $givenSize
            )
        ];

        $this->assertClosureResponses(
            $closures,
            CallsDialogLogPage::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer,
        );

    }

    public function testGetDialogHistory(): void
    {
        $givenDialogId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenResponse = <<<JSON
        {
          "dialogId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          },
          "state": "ESTABLISHED",
          "startTime": "2022-01-01T00:00:00.100+00:00",
          "establishTime": "2022-01-01T00:00:02.100+00:00",
          "endTime": "2022-01-01T00:01:00.100+00:00",
          "parentCallId": "d8d84155-3831-43fb-91c9-bb897149a79d",
          "childCallId": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
          "duration": 60,
          "recording": {
            "composedFiles": [
              {
                "id": "b72cde3c-7d9c-4a5c-8e48-5a947244c013",
                "name": "d8d84155-3831-43fb-91c9-bb897149a79d_41792030001_1652725357412_recording.wav",
                "fileFormat": "WAV",
                "size": 67564,
                "creationTime": "2022-01-01T00:00:00.100+00:00",
                "duration": 10,
                "startTime": "2021-12-31T23:57:30.100+00:00",
                "endTime": "2021-12-31T23:59:20.100+00:00",
                "location": "SFTP",
                "sftpUploadStatus": "UPLOADED"
              }
            ],
            "callRecordings": [
              {
                "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
                "endpoint": {
                  "type": "PHONE",
                  "phoneNumber": "44790123456"
                },
                "direction": "INBOUND",
                "files": [
                  {
                    "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                    "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                    "fileFormat": "WAV",
                    "size": 67564,
                    "creationTime": "2022-01-01T00:00:00.250+00:00",
                    "duration": 10,
                    "startTime": "2021-12-31T23:59:50.100+00:00",
                    "endTime": "2022-01-01T00:00:00.100+00:00",
                    "location": "HOSTED"
                  }
                ],
                "status": "SUCCESSFUL"
              },
              {
                "callId": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
                "endpoint": {
                  "type": "PHONE",
                  "phoneNumber": "44790123456"
                },
                "direction": "INBOUND",
                "files": [
                  {
                    "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                    "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                    "fileFormat": "WAV",
                    "size": 67564,
                    "creationTime": "2022-01-01T00:00:00.250+00:00",
                    "duration": 10,
                    "startTime": "2021-12-31T23:59:50.100+00:00",
                    "endTime": "2022-01-01T00:00:00.100+00:00",
                    "location": "HOSTED"
                  }
                ],
                "status": "SUCCESSFUL"
              }
            ]
          },
          "errorCode": {
            "id": 10000,
            "name": "NORMAL_HANGUP",
            "description": "The call has ended with hangup initiated by caller, callee or API"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{dialogId}", $givenDialogId, self::GET_DIALOG_HISTORY);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getDialogHistory($givenDialogId),
            fn () => $api->getDialogHistoryAsync($givenDialogId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsDialogLogResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testHangupDialog(): void
    {
        $givenDialogId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenResponse = <<<JSON
        {
          "id": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          },
          "state": "ESTABLISHED",
          "startTime": "2022-01-01T00:00:00.100+00:00",
          "establishTime": "2022-01-01T00:00:02.100+00:00",
          "endTime": "2022-01-01T00:01:00.100+00:00",
          "parentCall": {
            "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
            "endpoint": {
              "type": "PHONE",
              "phoneNumber": "44790123456"
            },
            "direction": "INBOUND",
            "state": "ESTABLISHED",
            "media": {
              "audio": {
                "muted": false,
                "deaf": false
              },
              "video": {
                "camera": false,
                "screenShare": false
              }
            },
            "startTime": "2022-01-01T00:00:00.100+00:00",
            "answerTime": "2022-01-01T00:00:02.100+00:00",
            "endTime": "2022-01-01T00:01:00.100+00:00",
            "ringDuration": 2,
            "platform": {
              "applicationId": "61c060db2675060027d8c7a6"
            },
            "dialogId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e"
          },
          "childCall": {
            "id": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
            "endpoint": {
              "type": "PHONE",
              "phoneNumber": "44790987654"
            },
            "direction": "OUTBOUND",
            "state": "ESTABLISHED",
            "media": {
              "audio": {
                "muted": false,
                "deaf": false
              },
              "video": {
                "camera": false,
                "screenShare": false
              }
            },
            "startTime": "2022-01-01T00:00:00.100+00:00",
            "answerTime": "2022-01-01T00:00:02.100+00:00",
            "endTime": "2022-01-01T00:01:00.100+00:00",
            "ringDuration": 2,
            "platform": {
              "applicationId": "61c060db2675060027d8c7a6"
            },
            "dialogId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{dialogId}", $givenDialogId, self::HANGUP_DIALOG);

        $expectedHttpMethod = "POST";

        $closures = [
            fn () => $api->hangupDialog($givenDialogId),
            fn () => $api->hangupDialogAsync($givenDialogId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsDialogResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testDialogPlayFile(): void
    {
        $givenDialogId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenRequest = <<<JSON
        {
          "content": {
            "fileId": "218eceba-c044-430d-9f26-8f1a7f0g2d03",
            "type": "FILE"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{dialogId}", $givenDialogId, self::DIALOG_PLAY_FILE);

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsDialogPlayRequest::class);

        $closures = [
            fn () => $api->dialogPlayFile($givenDialogId, $request),
            fn () => $api->dialogPlayFileAsync($givenDialogId, $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsActionResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testDialogStopPlayingFile(): void
    {
        $givenDialogId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{dialogId}", $givenDialogId, self::DIALOG_STOP_PLAYING_FILE);

        $expectedHttpMethod = "POST";

        $closures = [
            fn () => $api->dialogStopPlayingFile($givenDialogId),
            fn () => $api->dialogStopPlayingFileAsync($givenDialogId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsActionResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testDialogSayText(): void
    {
        $givenDialogId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenRequest = <<<JSON
        {
          "text": "Hello world",
          "language": "en",
          "speechRate": 1.2,
          "loopCount": 3,
          "preferences": {
            "voiceGender": "FEMALE",
            "voiceName": "Joanna"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{dialogId}", $givenDialogId, self::DIALOG_SAY_TEXT);

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsDialogSayRequest::class);

        $closures = [
            fn () => $api->dialogSayText($givenDialogId, $request),
            fn () => $api->dialogSayTextAsync($givenDialogId, $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsActionResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );


    }

    public function testDialogStartRecording(): void
    {
        $givenDialogId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenRequest = <<<JSON
        {
          "recordingType": "AUDIO_AND_VIDEO",
          "dialogComposition": {
            "enabled": true
          },
          "customData": {
            "key1": "value1",
            "key2": "value2"
          },
          "filePrefix": "customFilename"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{dialogId}", $givenDialogId, self::DIALOG_START_RECORDING);

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsDialogRecordingRequest::class);

        $closures = [
            fn () => $api->dialogStartRecording($givenDialogId, $request),
            fn () => $api->dialogStartRecordingAsync($givenDialogId, $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsActionResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testDialogStopRecording(): void
    {
        $givenDialogId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{dialogId}", $givenDialogId, self::DIALOG_STOP_RECORDING);

        $expectedHttpMethod = "POST";

        $closures = [
            fn () => $api->dialogStopRecording($givenDialogId),
            fn () => $api->dialogStopRecordingAsync($givenDialogId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsActionResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testDialogBroadcastWebRtcText(): void
    {
        $givenDialogId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";

        $givenRequest = <<<JSON
        {
          "text": "This dialog will end in 5 minutes."
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{dialogId}", $givenDialogId, self::DIALOG_BROADCAST_WEBRTC_TEXT);

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsDialogBroadcastWebrtcTextRequest::class);

        $closures = [
            fn () => $api->dialogBroadcastWebRtcText($givenDialogId, $request),
            fn () => $api->dialogBroadcastWebRtcTextAsync($givenDialogId, $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsActionResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );


    }

    public function testGetSipTrunks(): void
    {
        $givenName = "sip-trunk-1";
        $givenPage = 0;
        $givenSize = 1;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "id": "a8cbf843-12b9-4ad6-be1e-d186fe63963d",
              "type": "STATIC",
              "name": "Static SIP Trunk",
              "location": "NEW_YORK",
              "tls": false,
              "codecs": [
                "PCMU",
                "PCMA"
              ],
              "dtmf": "INBAND",
              "fax": "T38",
              "numberFormat": "US_NATIONAL",
              "internationalCallsAllowed": false,
              "channelLimit": 10,
              "anonymization": "REMOTE_PARTY_ID",
              "billingPackage": {
                "packageType": "UNLIMITED",
                "countryCode": "USA",
                "addressId": "562949953421333"
              },
              "sbcHosts": {
                "primary": [
                  "111.111.111.111:5060"
                ],
                "backup": [
                  "222.222.222.222:5060"
                ]
              },
              "sipOptions": {
                "enabled": false
              },
              "sourceHosts": [
                "10.10.10.10"
              ],
              "destinationHosts": [
                "100.100.100.100:5060",
                "my.destination.com",
                "my.destination.com:5060"
              ],
              "strategy": "ROUND_ROBIN"
            },
            {
              "id": "a8cbf843-12b9-4ad6-be1e-d186fe63963d",
              "type": "REGISTERED",
              "name": "Registered SIP Trunk",
              "location": "SAO_PAULO",
              "tls": true,
              "codecs": [
                "G729"
              ],
              "dtmf": "RFC2833",
              "fax": "NONE",
              "numberFormat": "E164",
              "internationalCallsAllowed": true,
              "channelLimit": 999,
              "anonymization": "PREFERRED_IDENTITY",
              "billingPackage": {
                "packageType": "METERED"
              },
              "sbcHosts": {
                "primary": [
                  "111.111.111.111:5061"
                ],
                "backup": [
                  "222.222.222.222:5061"
                ]
              },
              "username": "426c8402-691c-11ee-8c99-0242ac120002",
              "inviteAuthentication": true
            }
          ],
          "paging": {
            "page": 0,
            "size": 2,
            "totalPages": 1,
            "totalResults": 2
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_SIP_TRUNKS
            . "?"
            . Query::build([
                "name" => $givenName,
                "page" => $givenPage,
                "size" => $givenSize
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getSipTrunks(
                name: $givenName,
                page: $givenPage,
                size: $givenSize
            ),
            fn () => $api->getSipTrunksAsync(
                name: $givenName,
                page: $givenPage,
                size: $givenSize
            )
        ];

        $this->assertClosureResponses(
            $closures,
            CallsSipTrunkPage::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer,
        );

    }

    public function testCreateSipTrunk(): void
    {
        $givenRequest = <<<JSON
        {
          "type": "STATIC",
          "name": "Static SIP trunk",
          "location": "NEW_YORK",
          "tls": false,
          "internationalCallsAllowed": false,
          "channelLimit": 10,
          "billingPackage": {
            "packageType": "UNLIMITED",
            "countryCode": "USA",
            "addressId": "562949953421333"
          },
          "codecs": [
            "PCMU",
            "PCMA"
          ],
          "dtmf": "INBAND",
          "fax": "T38",
          "numberFormat": "US_NATIONAL",
          "anonymization": "REMOTE_PARTY_ID",
          "sourceHosts": [
            "10.10.10.10"
          ],
          "destinationHosts": [
            "100.100.100.101:5060",
            "my.destination.com",
            "my.destination.com:5060"
          ],
          "strategy": "ROUND_ROBIN",
          "sipOptions": {
            "enabled": false
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "a8cbf843-12b9-4ad6-be1e-d186fe63963d",
          "type": "STATIC",
          "name": "Static SIP Trunk",
          "location": "NEW_YORK",
          "internationalCallsAllowed": false,
          "channelLimit": 10,
          "billingPackage": {
            "packageType": "UNLIMITED",
            "countryCode": "USA",
            "addressId": "562949953421333"
          },
          "sbcHosts": {
            "primary": [
              "111.111.111.111:5060"
            ],
            "backup": [
              "222.222.222.222:5060"
            ]
          },
          "tls": false,
          "codecs": [
            "PCMU",
            "PCMA"
          ],
          "dtmf": "INBAND",
          "fax": "T38",
          "numberFormat": "US_NATIONAL",
          "anonymization": "REMOTE_PARTY_ID",
          "sourceHosts": [
            "10.10.10.10"
          ],
          "destinationHosts": [
            "100.100.100.100:5060",
            "my.destination.com",
            "my.destination.com:5060"
          ],
          "strategy": "ROUND_ROBIN",
          "sipOptions": {
            "enabled": false
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(202, $this->givenRequestHeaders, $givenResponse),
                new Response(202, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::CREATE_SIP_TRUNK;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsSipTrunkRequest::class);

        $closures = [
            fn () => $api->createSipTrunk($request),
            fn () => $api->createSipTrunkAsync($request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsCreateSipTrunkResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );


    }

    public function testGetSipTrunk(): void
    {
        $givenSipTrunkId = "a8cbf843-12b9-4ad6-be1e-d186fe63963d";

        $givenResponse = <<<JSON
        {
          "id": "a8cbf843-12b9-4ad6-be1e-d186fe63963d",
          "type": "STATIC",
          "name": "Static SIP Trunk",
          "location": "NEW_YORK",
          "tls": false,
          "codecs": [
            "PCMU",
            "PCMA"
          ],
          "dtmf": "INBAND",
          "fax": "T38",
          "numberFormat": "US_NATIONAL",
          "internationalCallsAllowed": false,
          "channelLimit": 10,
          "anonymization": "REMOTE_PARTY_ID",
          "billingPackage": {
            "packageType": "UNLIMITED",
            "countryCode": "USA",
            "addressId": "562949953421333"
          },
          "sbcHosts": {
            "primary": [
              "111.111.111.111:5060"
            ],
            "backup": [
              "222.222.222.222:5060"
            ]
          },
          "sipOptions": {
            "enabled": false
          },
          "sourceHosts": [
            "10.10.10.10"
          ],
          "destinationHosts": [
            "100.100.100.100:5060",
            "my.destination.com",
            "my.destination.com:5060"
          ],
          "strategy": "ROUND_ROBIN"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{sipTrunkId}", $givenSipTrunkId, self::GET_SIP_TRUNK);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getSipTrunk($givenSipTrunkId),
            fn () => $api->getSipTrunkAsync($givenSipTrunkId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsSipTrunkResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testUpdateSipTrunk(): void
    {
        $givenSipTrunkId = "a8cbf843-12b9-4ad6-be1e-d186fe63963d";

        $givenRequest = <<<JSON
        {
          "type": "STATIC",
          "name": "Static SIP trunk",
          "codecs": [
            "PCMA",
            "PCMU"
          ],
          "dtmf": "INBAND",
          "fax": "T38",
          "numberFormat": "US_NATIONAL",
          "internationalCallsAllowed": false,
          "channelLimit": 10,
          "anonymization": "REMOTE_PARTY_ID",
          "sourceHosts": [
            "10.10.10.10"
          ],
          "destinationHosts": [
            "100.100.100.101:5060",
            "my.destination.com",
            "my.destination.com:5060"
          ],
          "sipOptions": {
            "enabled": false
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "a8cbf843-12b9-4ad6-be1e-d186fe63963d",
          "type": "STATIC",
          "name": "Static SIP Trunk",
          "location": "NEW_YORK",
          "tls": false,
          "codecs": [
            "PCMU",
            "PCMA"
          ],
          "dtmf": "INBAND",
          "fax": "T38",
          "numberFormat": "US_NATIONAL",
          "internationalCallsAllowed": false,
          "channelLimit": 10,
          "anonymization": "REMOTE_PARTY_ID",
          "billingPackage": {
            "packageType": "UNLIMITED",
            "countryCode": "USA",
            "addressId": "562949953421333"
          },
          "sbcHosts": {
            "primary": [
              "111.111.111.111:5060"
            ],
            "backup": [
              "222.222.222.222:5060"
            ]
          },
          "sipOptions": {
            "enabled": false
          },
          "sourceHosts": [
            "10.10.10.10"
          ],
          "destinationHosts": [
            "100.100.100.100:5060",
            "my.destination.com",
            "my.destination.com:5060"
          ],
          "strategy": "ROUND_ROBIN"
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(202, $this->givenRequestHeaders, $givenResponse),
                new Response(202, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{sipTrunkId}", $givenSipTrunkId, self::UPDATE_SIP_TRUNK);

        $expectedHttpMethod = "PUT";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsSipTrunkUpdateRequest::class);

        $closures = [
            fn () => $api->updateSipTrunk($givenSipTrunkId, $request),
            fn () => $api->updateSipTrunkAsync($givenSipTrunkId, $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsSipTrunkResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );


    }

    public function testDeleteSipTrunk(): void
    {
        $givenSipTrunkId = "a8cbf843-12b9-4ad6-be1e-d186fe63963d";

        $givenResponse = <<<JSON
        {
          "id": "a8cbf843-12b9-4ad6-be1e-d186fe63963d",
          "type": "STATIC",
          "name": "Static SIP Trunk",
          "location": "NEW_YORK",
          "tls": false,
          "codecs": [
            "PCMU",
            "PCMA"
          ],
          "dtmf": "INBAND",
          "fax": "T38",
          "numberFormat": "US_NATIONAL",
          "internationalCallsAllowed": false,
          "channelLimit": 10,
          "anonymization": "REMOTE_PARTY_ID",
          "billingPackage": {
            "packageType": "UNLIMITED",
            "countryCode": "USA",
            "addressId": "562949953421333"
          },
          "sbcHosts": {
            "primary": [
              "111.111.111.111:5060"
            ],
            "backup": [
              "222.222.222.222:5060"
            ]
          },
          "sipOptions": {
            "enabled": false
          },
          "sourceHosts": [
            "10.10.10.10"
          ],
          "destinationHosts": [
            "100.100.100.100:5060",
            "my.destination.com",
            "my.destination.com:5060"
          ],
          "strategy": "ROUND_ROBIN"
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(202, $this->givenRequestHeaders, $givenResponse),
                new Response(202, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{sipTrunkId}", $givenSipTrunkId, self::DELETE_SIP_TRUNK);

        $expectedHttpMethod = "DELETE";

        $closures = [
            fn () => $api->deleteSipTrunk($givenSipTrunkId),
            fn () => $api->deleteSipTrunkAsync($givenSipTrunkId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsSipTrunkResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testResetSipTrunkPassword(): void
    {
        $givenSipTrunkId = "a8cbf843-12b9-4ad6-be1e-d186fe63963d";

        $givenResponse = <<<JSON
        {
          "username": "426c8402-691c-11ee-8c99-0242ac120002 ",
          "password": "fkZ1921tM87"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{sipTrunkId}", $givenSipTrunkId, self::RESET_SIP_TRUNK_PASSWORD);

        $expectedHttpMethod = "POST";

        $closures = [
            fn () => $api->resetSipTrunkPassword($givenSipTrunkId),
            fn () => $api->resetSipTrunkPasswordAsync($givenSipTrunkId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsSipTrunkRegistrationCredentials::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetSipTrunkStatus(): void
    {
        $givenSipTrunkId = "a8cbf843-12b9-4ad6-be1e-d186fe63963d";

        $givenResponse = <<<JSON
        {
          "adminStatus": "DISABLED",
          "actionStatus": {
            "status": "RESET",
            "reason": "Not enough credits."
          },
          "registrationStatus": "UNREGISTERED",
          "activeCalls": 0
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{sipTrunkId}", $givenSipTrunkId, self::GET_SIP_TRUNK_STATUS);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getSipTrunkStatus($givenSipTrunkId),
            fn () => $api->getSipTrunkStatusAsync($givenSipTrunkId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsExtendedSipTrunkStatusResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testSetSipTrunkStatus(): void
    {
        $givenSipTrunkId = "a8cbf843-12b9-4ad6-be1e-d186fe63963d";

        $givenRequest = <<<JSON
        {
          "adminStatus": "ENABLED"
        }
        JSON;

        $givenResponse = $givenRequest;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{sipTrunkId}", $givenSipTrunkId, self::SET_SIP_TRUNK_STATUS);

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsSipTrunkStatusRequest::class);

        $closures = [
            fn () => $api->setSipTrunkStatus($givenSipTrunkId, $request),
            fn () => $api->setSipTrunkStatusAsync($givenSipTrunkId, $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsSipTrunkStatusResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );


    }

    public function testGetSipTrunkServiceAddresses(): void
    {
        $givenPage = 0;
        $givenSize = 20;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "id": "abc-def-ghi",
              "name": "Location address name",
              "street": "Location address street",
              "city": "My city",
              "postCode": "71000",
              "suite": "1030",
              "country": {
                "name": "Croatia",
                "code": "HRV"
              },
              "region": {
                "name": "Zagreb County",
                "code": "HR-01"
              }
            }
          ],
          "paging": {
            "page": 0,
            "size": 20,
            "totalPages": 1,
            "totalResults": 1
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_SIP_TRUNK_SERVICE_ADDRESSES
            . "?"
            . Query::build([
                "page" => $givenPage,
                "size" => $givenSize
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getSipTrunkServiceAddresses(
                page: $givenPage,
                size: $givenSize
            ),
            fn () => $api->getSipTrunkServiceAddressesAsync(
                page: $givenPage,
                size: $givenSize
            )
        ];

        $this->assertClosureResponses(
            $closures,
            CallsSipTrunkServiceAddressPage::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer,
        );

    }

    public function testCreateSipTrunkServiceAddress(): void
    {
        $givenRequest = <<<JSON
        {
          "name": "Location address name",
          "street": "Location address street",
          "city": "My city",
          "postCode": "71000",
          "suite": "1030",
          "countryCode": "HRV",
          "countryRegionCode": "HR-01"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "abc-def-ghi",
          "name": "Location address name",
          "street": "Location address street",
          "city": "My city",
          "postCode": "71000",
          "suite": "1030",
          "country": {
            "name": "Croatia",
            "code": "HRV"
          },
          "region": {
            "name": "Zagreb County",
            "code": "HR-01"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(201, $this->givenRequestHeaders, $givenResponse),
                new Response(201, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::CREATE_SIP_TRUNK_SERVICE_ADDRESS;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsPublicSipTrunkServiceAddressRequest::class);

        $closures = [
            fn () => $api->createSipTrunkServiceAddress($request),
            fn () => $api->createSipTrunkServiceAddressAsync($request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsPublicSipTrunkServiceAddress::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );
    }

    public function testGetSipTrunkServiceAddress(): void
    {
        $givenSipTrunkServiceAddressId = "abc-def-ghi";

        $givenResponse = <<<JSON
        {
          "id": "abc-def-ghi",
          "name": "Location address name",
          "street": "Location address street",
          "city": "My city",
          "postCode": "71000",
          "suite": "1030",
          "country": {
            "name": "Croatia",
            "code": "HRV"
          },
          "region": {
            "name": "Zagreb County",
            "code": "HR-01"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{sipTrunkServiceAddressId}", $givenSipTrunkServiceAddressId, self::GET_SIP_TRUNK_SERVICE_ADDRESS);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getSipTrunkServiceAddress($givenSipTrunkServiceAddressId),
            fn () => $api->getSipTrunkServiceAddressAsync($givenSipTrunkServiceAddressId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsPublicSipTrunkServiceAddress::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testUpdateSipTrunkServiceAddress(): void
    {
        $givenSipTrunkServiceAddressId = "abc-def-ghi";

        $givenRequest = <<<JSON
        {
          "name": "Location address name",
          "street": "Location address street",
          "city": "My city",
          "postCode": "71000",
          "suite": "1030",
          "countryCode": "HRV",
          "countryRegionCode": "HR-01"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "abc-def-ghi",
          "name": "Location address name",
          "street": "Location address street",
          "city": "My city",
          "postCode": "71000",
          "suite": "1030",
          "country": {
            "name": "Croatia",
            "code": "HRV"
          },
          "region": {
            "name": "Zagreb County",
            "code": "HR-01"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{sipTrunkServiceAddressId}", $givenSipTrunkServiceAddressId, self::UPDATE_SIP_TRUNK_SERVICE_ADDRESS);

        $expectedHttpMethod = "PUT";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsPublicSipTrunkServiceAddressRequest::class);

        $closures = [
            fn () => $api->updateSipTrunkServiceAddress($givenSipTrunkServiceAddressId, $request),
            fn () => $api->updateSipTrunkServiceAddressAsync($givenSipTrunkServiceAddressId, $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsPublicSipTrunkServiceAddress::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testDeleteSipTrunkServiceAddress(): void
    {
        $givenSipTrunkServiceAddressId = "abc-def-ghi";

        $givenResponse = <<<JSON
        {
          "id": "abc-def-ghi",
          "name": "Location address name",
          "street": "Location address street",
          "city": "My city",
          "postCode": "71000",
          "suite": "1030",
          "country": {
            "name": "Croatia",
            "code": "HRV"
          },
          "region": {
            "name": "Zagreb County",
            "code": "HR-01"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{sipTrunkServiceAddressId}", $givenSipTrunkServiceAddressId, self::DELETE_SIP_TRUNK_SERVICE_ADDRESS);

        $expectedHttpMethod = "DELETE";

        $closures = [
            fn () => $api->deleteSipTrunkServiceAddress($givenSipTrunkServiceAddressId),
            fn () => $api->deleteSipTrunkServiceAddressAsync($givenSipTrunkServiceAddressId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsPublicSipTrunkServiceAddress::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );
    }

    public function testGetCountries(): void
    {
        $givenResponse = <<<JSON
        {
        "countries": 
            [
              {
                "name": "New Zealand",
                "code": "NZL"
              },
              {
                "name": "Fiji",
                "code": "FJI"
              },
              {
                "name": "Guadeloupe",
                "code": "GLP"
              }
            ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_COUNTRIES;

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getCountries(),
            fn () => $api->getCountriesAsync(),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsCountryList::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetRegions(): void
    {
        $givenCountryCode = "HRV";

        $givenResponse = <<<JSON
        {
          "regions": 
              [
              {
                "name": "Dubrovnik-Neretva County",
                "code": "HR-19",
                "countryCode": "HRV"
              },
              {
                "name": "Međimurje County",
                "code": "HR-20",
                "countryCode": "HRV"
              },
              {
                "name": "City of Zagreb",
                "code": "HR-21",
                "countryCode": "HRV"
              }
            ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_REGIONS
            . "?"
            . Query::build([
                "countryCode" => $givenCountryCode
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getRegions($givenCountryCode),
            fn () => $api->getRegionsAsync($givenCountryCode),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsRegionList::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetCallsFiles(): void
    {
        $givenPage = 0;
        $givenSize = 1;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "id": "218eceba-c044-430d-9f26-8f1a7f0g2d03",
              "name": "Example file",
              "fileFormat": "WAV",
              "size": 292190,
              "creationMethod": "RECORDED",
              "creationTime": "2024-09-20T14:02:08.000+00:00",
              "expirationTime": "2024-09-20T14:02:08.000+00:00",
              "duration": 3
            }
          ],
          "paging": {
            "page": 0,
            "size": 1,
            "totalPages": 0,
            "totalResults": 0
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_CALLS_FILES
            . "?"
            . Query::build([
                "page" => $givenPage,
                "size" => $givenSize
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getCallsFiles(
                page: $givenPage,
                size: $givenSize
            ),
            fn () => $api->getCallsFilesAsync(
                page: $givenPage,
                size: $givenSize
            )
        ];

        $this->assertClosureResponses(
            $closures,
            CallsFilePage::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer,
        );

    }

    //    public function testUploadCallsAudioFile(): void
    //    {
    //        $givenFile = "binary file";
    //
    //        $givenResponse = <<<JSON
    //        {
    //          "id": "218eceba-c044-430d-9f26-8f1a7f0g2d03",
    //          "name": "Example file",
    //          "fileFormat": "WAV",
    //          "size": 292190,
    //          "creationMethod": "RECORDED",
    //          "creationTime": "2024-09-20T14:04:15Z",
    //          "expirationTime": "2024-09-20T14:04:15Z",
    //          "duration": 3
    //        }
    //        JSON;
    //
    //        $requestHistoryContainer = [];
    //
    //        $client = $this->mockClient(
    //            [
    //                new Response(201, $this->givenRequestHeaders, $givenResponse),
    //                new Response(201, $this->givenRequestHeaders, $givenResponse),
    //            ],
    //            $requestHistoryContainer
    //        );
    //
    //        $api = new CallsApi(config: $this->getConfiguration(), client: $client);
    //
    //        $expectedPath = self::UPLOAD_CALLS_AUDIO_FILE;
    //
    //        $expectedHttpMethod = "POST";
    //
    //        $closures = [
    //            fn() => $api->uploadCallsAudioFile($givenFile),
    //            fn() => $api->uploadCallsAudioFileAsync($givenFile),
    //        ];
    //
    //        $this->assertClosureResponses(
    //            $closures,
    //            CallsFile::class,
    //            $givenResponse,
    //            $expectedPath,
    //            $expectedHttpMethod,
    //            $requestHistoryContainer
    //        );
    //
    //    }

    public function testGetCallsFile(): void
    {
        $givenFileId = "218eceba-c044-430d-9f26-8f1a7f0g2d03";

        $givenResponse = <<<JSON
        {
          "id": "218eceba-c044-430d-9f26-8f1a7f0g2d03",
          "name": "Example file",
          "fileFormat": "WAV",
          "size": 292190,
          "creationMethod": "RECORDED",
          "creationTime": "2024-09-20T14:05:33.000+00:00",
          "expirationTime": "2024-09-20T14:05:33.000+00:00",
          "duration": 3
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{fileId}", $givenFileId, self::GET_CALLS_FILE);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getCallsFile($givenFileId),
            fn () => $api->getCallsFileAsync($givenFileId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsFile::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testDeleteCallsFile(): void
    {
        $givenFileId = "218eceba-c044-430d-9f26-8f1a7f0g2d03";

        $givenResponse = <<<JSON
        {
          "id": "218eceba-c044-430d-9f26-8f1a7f0g2d03",
          "name": "Example file",
          "fileFormat": "WAV",
          "size": 292190,
          "creationMethod": "RECORDED",
          "creationTime": "2024-09-20T14:06:55.000+00:00",
          "expirationTime": "2024-09-20T14:06:55.000+00:00",
          "duration": 3
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{fileId}", $givenFileId, self::DELETE_CALLS_FILE);

        $expectedHttpMethod = "DELETE";

        $closures = [
            fn () => $api->deleteCallsFile($givenFileId),
            fn () => $api->deleteCallsFileAsync($givenFileId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsFile::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetCallsRecordings(): void
    {
        $givenCallId = "64d214c5-70b7-4ea6-b2a6-8334d1f34fb4";
        $givenCallsConfigurationId = "dc5942707c704551a00cd2ea";
        $givenApplicationId = "61c060db2675060027d8c7a6";
        $givenEndpointIdentifier = "44790123456";
        $givenStartTimeAfter = new DateTime("2022-05-01T14:25:45.134+00:00");
        $givenEndTimeBefore = new DateTime("2022-05-01T14:35:45.154+00:00");
        $givenDirection = CallDirection::OUTBOUND();
        $givenEndpointType = CallEndpointType::WEBRTC();
        $givenLocation = CallsRecordingLocation::FRANKFURT();
        $givenPage = 0;
        $givenSize = 1;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "direction": "INBOUND",
              "files": [
                {
                  "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                  "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                  "fileFormat": "WAV",
                  "size": 67564,
                  "creationTime": "2022-01-01T00:00:00.250+00:00",
                  "duration": 10,
                  "startTime": "2021-12-31T23:59:50.100+00:00",
                  "endTime": "2022-01-01T00:00:00.100+00:00",
                  "location": "HOSTED"
                }
              ],
              "status": "SUCCESSFUL"
            },
            {
              "callId": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "direction": "INBOUND",
              "files": [
                {
                  "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                  "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                  "fileFormat": "WAV",
                  "size": 67564,
                  "creationTime": "2022-01-01T00:00:00.250+00:00",
                  "duration": 10,
                  "startTime": "2021-12-31T23:59:50.100+00:00",
                  "endTime": "2022-01-01T00:00:00.100+00:00",
                  "location": "HOSTED"
                }
              ],
              "status": "PARTIALLY_FAILED",
              "reason": "Recording postprocessing failed"
            }
          ],
          "paging": {
            "page": 0,
            "size": 2,
            "totalPages": 1,
            "totalResults": 2
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_CALLS_RECORDINGS
            . "?"
            . Query::build([
                "callId" => $givenCallId,
                "callsConfigurationId" => $givenCallsConfigurationId,
                "applicationId" => $givenApplicationId,
                "endpointIdentifier" => $givenEndpointIdentifier,
                "startTimeAfter" => $givenStartTimeAfter->format(DateTime::RFC3339_EXTENDED),
                "endTimeBefore" => $givenEndTimeBefore->format(DateTime::RFC3339_EXTENDED),
                "direction" => $givenDirection,
                "endpointType" => $givenEndpointType,
                "location" => $givenLocation,
                "page" => $givenPage,
                "size" => $givenSize
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getCallsRecordings(
                callId: $givenCallId,
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                endpointIdentifier: $givenEndpointIdentifier,
                startTimeAfter: $givenStartTimeAfter,
                endTimeBefore: $givenEndTimeBefore,
                direction: $givenDirection,
                endpointType: $givenEndpointType,
                location: $givenLocation,
                page: $givenPage,
                size: $givenSize
            ),
            fn () => $api->getCallsRecordingsAsync(
                callId: $givenCallId,
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                endpointIdentifier: $givenEndpointIdentifier,
                startTimeAfter: $givenStartTimeAfter,
                endTimeBefore: $givenEndTimeBefore,
                direction: $givenDirection,
                endpointType: $givenEndpointType,
                location: $givenLocation,
                page: $givenPage,
                size: $givenSize
            )
        ];

        $this->assertClosureResponses(
            $closures,
            CallRecordingPage::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer,
        );


    }

    public function testGetCallRecordings(): void
    {
        $givenCallId = "64d214c5-70b7-4ea6-b2a6-8334d1f34fb4";
        $givenLocation = CallsRecordingLocation::BOGOTA();

        $givenResponse = <<<JSON
        {
          "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
          "endpoint": {
            "type": "PHONE",
            "phoneNumber": "44790123456"
          },
          "direction": "INBOUND",
          "files": [
            {
              "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
              "fileFormat": "WAV",
              "size": 67564,
              "creationTime": "2022-01-01T00:00:00.250+00:00",
              "duration": 10,
              "startTime": "2021-12-31T23:59:50.100+00:00",
              "endTime": "2022-01-01T00:00:00.100+00:00",
              "location": "HOSTED"
            }
          ],
          "status": "SUCCESSFUL"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{callId}", $givenCallId, self::GET_CALL_RECORDINGS)
            . "?"
            . Query::build([
                "location" => $givenLocation
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getCallRecordings($givenCallId, $givenLocation),
            fn () => $api->getCallRecordingsAsync($givenCallId, $givenLocation),
        ];

        $this->assertClosureResponses(
            $closures,
            CallRecording::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testDeleteCallRecordings(): void
    {
        $givenCallId = "64d214c5-70b7-4ea6-b2a6-8334d1f34fb4";
        $givenLocation = CallsRecordingLocation::BOGOTA();

        $givenResponse = <<<JSON
        {
          "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
          "endpoint": {
            "type": "PHONE",
            "phoneNumber": "44790123456"
          },
          "direction": "INBOUND",
          "files": [
            {
              "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
              "fileFormat": "WAV",
              "size": 67564,
              "creationTime": "2022-01-01T00:00:00.250+00:00",
              "duration": 10,
              "startTime": "2021-12-31T23:59:50.100+00:00",
              "endTime": "2022-01-01T00:00:00.100+00:00",
              "location": "HOSTED"
            }
          ],
          "status": "SUCCESSFUL"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{callId}", $givenCallId, self::DELETE_CALL_RECORDINGS)
            . "?"
            . Query::build([
                "location" => $givenLocation
            ]);

        $expectedHttpMethod = "DELETE";

        $closures = [
            fn () => $api->deleteCallRecordings($givenCallId, $givenLocation),
            fn () => $api->deleteCallRecordingsAsync($givenCallId, $givenLocation),
        ];

        $this->assertClosureResponses(
            $closures,
            CallRecording::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetConferencesRecordings(): void
    {
        $givenConferenceId = "64d214c5-70b7-4ea6-b2a6-8334d1f34fb4";
        $givenCallsConfigurationId = "dc5942707c704551a00cd2ea";
        $givenApplicationId = "61c060db2675060027d8c7a6";
        $givenConferenceName = "Conference";
        $givenCallId = "64d214c5-70b7-4ea6-b2a6-8334d1f34fb4";
        $givenCallEndpointType = CallEndpointType::WEBRTC();
        $givenCallEndpointIdentifier = "44790123456";
        $givenStartTimeAfter = new DateTime("2022-05-01T14:25:45.134+00:00");
        $givenEndTimeBefore = new DateTime("2022-05-01T14:35:45.154+00:00");
        $givenComposition = true;
        $givenLocation = CallsRecordingLocation::FRANKFURT();
        $givenPage = 0;
        $givenSize = 1;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "conferenceId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
              "conferenceName": "Example conference",
              "platform": {
                "applicationId": "61c060db2675060027d8c7a6"
              },
              "composedFiles": [
                {
                  "id": "b72cde3c-7d9c-4a5c-8e48-5a947244c013",
                  "name": "d8d84155-3831-43fb-91c9-bb897149a79d_41792030001_1652725357412_recording.wav",
                  "fileFormat": "WAV",
                  "size": 67564,
                  "creationTime": "2022-01-01T00:00:00.250+00:00",
                  "duration": 10,
                  "startTime": "2021-12-31T23:59:50.100+00:00",
                  "endTime": "2022-01-01T00:00:00.100+00:00",
                  "location": "SFTP",
                  "sftpUploadStatus": "UPLOADED"
                }
              ],
              "callRecordings": [
                {
                  "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
                  "endpoint": {
                    "type": "PHONE",
                    "phoneNumber": "44790123456"
                  },
                  "direction": "INBOUND",
                  "files": [
                    {
                      "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                      "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                      "fileFormat": "WAV",
                      "size": 67564,
                      "creationTime": "2022-01-01T00:00:00.250+00:00",
                      "duration": 10,
                      "startTime": "2021-12-31T23:59:50.100+00:00",
                      "endTime": "2022-01-01T00:00:00.100+00:00",
                      "location": "HOSTED"
                    }
                  ],
                  "status": "SUCCESSFUL"
                },
                {
                  "callId": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
                  "endpoint": {
                    "type": "PHONE",
                    "phoneNumber": "44790123456"
                  },
                  "direction": "INBOUND",
                  "files": [
                    {
                      "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                      "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                      "fileFormat": "WAV",
                      "size": 67564,
                      "creationTime": "2022-01-01T00:00:00.250+00:00",
                      "duration": 10,
                      "startTime": "2021-12-31T23:59:50.100+00:00",
                      "endTime": "2022-01-01T00:00:00.100+00:00",
                      "location": "HOSTED"
                    }
                  ],
                  "status": "SUCCESSFUL"
                }
              ]
            }
          ],
          "paging": {
            "page": 0,
            "size": 1,
            "totalPages": 1,
            "totalResults": 1
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_CONFERENCES_RECORDINGS
            . "?"
            . Query::build([
                "conferenceId" => $givenConferenceId,
                "callsConfigurationId" => $givenCallsConfigurationId,
                "applicationId" => $givenApplicationId,
                "conferenceName" => $givenConferenceName,
                "callId" => $givenCallId,
                "callEndpointType" => $givenCallEndpointType,
                "callEndpointIdentifier" => $givenCallEndpointIdentifier,
                "startTimeAfter" => $givenStartTimeAfter->format(DateTime::RFC3339_EXTENDED),
                "endTimeBefore" => $givenEndTimeBefore->format(DateTime::RFC3339_EXTENDED),
                "composition" => var_export($givenComposition, true),
                "location" => $givenLocation,
                "page" => $givenPage,
                "size" => $givenSize
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getConferencesRecordings(
                conferenceId: $givenConferenceId,
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                conferenceName: $givenConferenceName,
                callId: $givenCallId,
                callEndpointType: $givenCallEndpointType,
                callEndpointIdentifier: $givenCallEndpointIdentifier,
                startTimeAfter: $givenStartTimeAfter,
                endTimeBefore: $givenEndTimeBefore,
                composition: $givenComposition,
                location: $givenLocation,
                page: $givenPage,
                size: $givenSize
            ),
            fn () => $api->getConferencesRecordingsAsync(
                conferenceId: $givenConferenceId,
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                conferenceName: $givenConferenceName,
                callId: $givenCallId,
                callEndpointType: $givenCallEndpointType,
                callEndpointIdentifier: $givenCallEndpointIdentifier,
                startTimeAfter: $givenStartTimeAfter,
                endTimeBefore: $givenEndTimeBefore,
                composition: $givenComposition,
                location: $givenLocation,
                page: $givenPage,
                size: $givenSize
            )
        ];

        $this->assertClosureResponses(
            $closures,
            CallsConferenceRecordingPage::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer,
        );

    }

    public function testGetConferenceRecordings(): void
    {
        $givenConferenceId = "64d214c5-70b7-4ea6-b2a6-8334d1f34fb4";
        $givenLocation = CallsRecordingLocation::BOGOTA();

        $givenResponse = <<<JSON
        {
          "conferenceId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
          "conferenceName": "Example conference",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          },
          "composedFiles": [
            {
              "id": "b72cde3c-7d9c-4a5c-8e48-5a947244c013",
              "name": "d8d84155-3831-43fb-91c9-bb897149a79d_41792030001_1652725357412_recording.wav",
              "fileFormat": "WAV",
              "size": 67564,
              "creationTime": "2022-01-01T00:00:00.250+00:00",
              "duration": 10,
              "startTime": "2021-12-31T23:59:50.100+00:00",
              "endTime": "2022-01-01T00:00:00.100+00:00",
              "location": "SFTP",
              "sftpUploadStatus": "UPLOADED"
            }
          ],
          "callRecordings": [
            {
              "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "direction": "INBOUND",
              "files": [
                {
                  "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                  "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                  "fileFormat": "WAV",
                  "size": 67564,
                  "creationTime": "2022-01-01T00:00:00.250+00:00",
                  "duration": 10,
                  "startTime": "2021-12-31T23:59:50.100+00:00",
                  "endTime": "2022-01-01T00:00:00.100+00:00",
                  "location": "HOSTED"
                }
              ],
              "status": "SUCCESSFUL"
            },
            {
              "callId": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "direction": "INBOUND",
              "files": [
                {
                  "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                  "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                  "fileFormat": "WAV",
                  "size": 67564,
                  "creationTime": "2022-01-01T00:00:00.250+00:00",
                  "duration": 10,
                  "startTime": "2021-12-31T23:59:50.100+00:00",
                  "endTime": "2022-01-01T00:00:00.100+00:00",
                  "location": "HOSTED"
                }
              ],
              "status": "SUCCESSFUL"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{conferenceId}", $givenConferenceId, self::GET_CONFERENCE_RECORDINGS)
            . "?"
            . Query::build([
                "location" => $givenLocation
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getConferenceRecordings($givenConferenceId, $givenLocation),
            fn () => $api->getConferenceRecordingsAsync($givenConferenceId, $givenLocation),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsConferenceRecording::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testDeleteConferenceRecordings(): void
    {
        $givenConferenceId = "64d214c5-70b7-4ea6-b2a6-8334d1f34fb4";
        $givenLocation = CallsRecordingLocation::BOGOTA();

        $givenResponse = <<<JSON
        {
          "conferenceId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
          "conferenceName": "Example conference",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          },
          "composedFiles": [
            {
              "id": "b72cde3c-7d9c-4a5c-8e48-5a947244c013",
              "name": "d8d84155-3831-43fb-91c9-bb897149a79d_41792030001_1652725357412_recording.wav",
              "fileFormat": "WAV",
              "size": 67564,
              "creationTime": "2022-01-01T00:00:00.250+00:00",
              "duration": 10,
              "startTime": "2021-12-31T23:59:50.100+00:00",
              "endTime": "2022-01-01T00:00:00.100+00:00",
              "location": "SFTP",
              "sftpUploadStatus": "UPLOADED"
            }
          ],
          "callRecordings": [
            {
              "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "direction": "INBOUND",
              "files": [
                {
                  "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                  "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                  "fileFormat": "WAV",
                  "size": 67564,
                  "creationTime": "2022-01-01T00:00:00.250+00:00",
                  "duration": 10,
                  "startTime": "2021-12-31T23:59:50.100+00:00",
                  "endTime": "2022-01-01T00:00:00.100+00:00",
                  "location": "HOSTED"
                }
              ],
              "status": "SUCCESSFUL"
            },
            {
              "callId": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "direction": "INBOUND",
              "files": [
                {
                  "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                  "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                  "fileFormat": "WAV",
                  "size": 67564,
                  "creationTime": "2022-01-01T00:00:00.250+00:00",
                  "duration": 10,
                  "startTime": "2021-12-31T23:59:50.100+00:00",
                  "endTime": "2022-01-01T00:00:00.100+00:00",
                  "location": "HOSTED"
                }
              ],
              "status": "SUCCESSFUL"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{conferenceId}", $givenConferenceId, self::DELETE_CONFERENCE_RECORDINGS)
            . "?"
            . Query::build([
                "location" => $givenLocation
            ]);

        $expectedHttpMethod = "DELETE";

        $closures = [
            fn () => $api->deleteConferenceRecordings($givenConferenceId, $givenLocation),
            fn () => $api->deleteConferenceRecordingsAsync($givenConferenceId, $givenLocation),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsConferenceRecording::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testComposeConferenceRecording(): void
    {
        $givenConferenceId = "64d214c5-70b7-4ea6-b2a6-8334d1f34fb4";
        $givenLocation = CallsRecordingLocation::BOGOTA();

        $givenRequest = <<<JSON
        {
          "deleteCallRecordings": true
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{conferenceId}", $givenConferenceId, self::COMPOSE_CONFERENCE_RECORDING)
            . "?"
            . Query::build([
                "location" => $givenLocation
            ]);

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsOnDemandComposition::class);

        $closures = [
            fn () => $api->composeConferenceRecording(
                conferenceId: $givenConferenceId,
                callsOnDemandComposition: $request,
                location: $givenLocation
            ),
            fn () => $api->composeConferenceRecordingAsync(
                conferenceId: $givenConferenceId,
                callsOnDemandComposition: $request,
                location: $givenLocation
            ),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsActionResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetDialogsRecordings(): void
    {
        $givenDialogId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";
        $givenCallsConfigurationId = "dc5942707c704551a00cd2ea";
        $givenApplicationId = "61c060db2675060027d8c7a6";
        $givenCallId = "64d214c5-70b7-4ea6-b2a6-8334d1f34fb4";
        $givenCallEndpointType = CallEndpointType::PHONE();
        $givenCallEndpointIdentifier = "44790123456";
        $givenStartTimeAfter = new DateTime("2022-05-01T14:25:45.134+00:00");
        $givenEndTimeBefore = new DateTime("2022-05-01T14:35:45.154+00:00");
        $givenComposition = true;
        $givenLocation = CallsRecordingLocation::FRANKFURT();
        $givenPage = 0;
        $givenSize = 1;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "dialogId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
              "platform": {
                "applicationId": "61c060db2675060027d8c7a6"
              },
              "composedFiles": [
                {
                  "id": "b72cde3c-7d9c-4a5c-8e48-5a947244c013",
                  "name": "d8d84155-3831-43fb-91c9-bb897149a79d_41792030001_1652725357412_recording.wav",
                  "fileFormat": "WAV",
                  "size": 67564,
                  "creationTime": "2022-01-01T00:00:00.250+00:00",
                  "duration": 10,
                  "startTime": "2021-12-31T23:59:50.100+00:00",
                  "endTime": "2022-01-01T00:00:00.100+00:00",
                  "location": "HOSTED"
                }
              ],
              "callRecordings": [
                {
                  "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
                  "endpoint": {
                    "type": "PHONE",
                    "phoneNumber": "44790123456"
                  },
                  "direction": "INBOUND",
                  "files": [
                    {
                      "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                      "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                      "fileFormat": "WAV",
                      "size": 67564,
                      "creationTime": "2022-01-01T00:00:00.250+00:00",
                      "duration": 10,
                      "startTime": "2021-12-31T23:59:50.100+00:00",
                      "endTime": "2022-01-01T00:00:00.100+00:00",
                      "location": "HOSTED"
                    }
                  ],
                  "status": "SUCCESSFUL"
                },
                {
                  "callId": "64d214c5-70b7-4ea6-b2a6-8334d1f34fb4",
                  "endpoint": {
                    "type": "PHONE",
                    "phoneNumber": "44790123456"
                  },
                  "direction": "INBOUND",
                  "files": [
                    {
                      "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                      "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                      "fileFormat": "WAV",
                      "size": 67564,
                      "creationTime": "2022-01-01T00:00:00.250+00:00",
                      "duration": 10,
                      "startTime": "2021-12-31T23:59:50.100+00:00",
                      "endTime": "2022-01-01T00:00:00.100+00:00",
                      "location": "HOSTED"
                    }
                  ],
                  "status": "SUCCESSFUL"
                }
              ]
            }
          ],
          "paging": {
            "page": 0,
            "size": 1,
            "totalPages": 1,
            "totalResults": 1
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_DIALOGS_RECORDINGS
            . "?"
            . Query::build([
                "dialogId" => $givenDialogId,
                "callsConfigurationId" => $givenCallsConfigurationId,
                "applicationId" => $givenApplicationId,
                "callId" => $givenCallId,
                "callEndpointType" => $givenCallEndpointType,
                "callEndpointIdentifier" => $givenCallEndpointIdentifier,
                "startTimeAfter" => $givenStartTimeAfter->format(DateTime::RFC3339_EXTENDED),
                "endTimeBefore" => $givenEndTimeBefore->format(DateTime::RFC3339_EXTENDED),
                "composition" => var_export($givenComposition, true),
                "location" => $givenLocation,
                "page" => $givenPage,
                "size" => $givenSize
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getDialogsRecordings(
                dialogId: $givenDialogId,
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                callId: $givenCallId,
                callEndpointType: $givenCallEndpointType,
                callEndpointIdentifier: $givenCallEndpointIdentifier,
                startTimeAfter: $givenStartTimeAfter,
                endTimeBefore: $givenEndTimeBefore,
                composition: $givenComposition,
                location: $givenLocation,
                page: $givenPage,
                size: $givenSize
            ),
            fn () => $api->getDialogsRecordingsAsync(
                dialogId: $givenDialogId,
                callsConfigurationId: $givenCallsConfigurationId,
                applicationId: $givenApplicationId,
                callId: $givenCallId,
                callEndpointType: $givenCallEndpointType,
                callEndpointIdentifier: $givenCallEndpointIdentifier,
                startTimeAfter: $givenStartTimeAfter,
                endTimeBefore: $givenEndTimeBefore,
                composition: $givenComposition,
                location: $givenLocation,
                page: $givenPage,
                size: $givenSize
            )
        ];

        $this->assertClosureResponses(
            $closures,
            CallsDialogRecordingPage::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer,
        );


    }

    public function testGetDialogRecordings(): void
    {
        $givenDialogId = "034e622a-cc7e-456d-8a10-0ba43b11aa5e";
        $givenLocation = CallsRecordingLocation::BOGOTA();

        $givenResponse = <<<JSON
        {
          "dialogId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          },
          "composedFiles": [
            {
              "id": "b72cde3c-7d9c-4a5c-8e48-5a947244c013",
              "name": "d8d84155-3831-43fb-91c9-bb897149a79d_41792030001_1652725357412_recording.wav",
              "fileFormat": "WAV",
              "size": 67564,
              "creationTime": "2022-01-01T00:00:00.250+00:00",
              "duration": 10,
              "startTime": "2021-12-31T23:59:50.100+00:00",
              "endTime": "2022-01-01T00:00:00.100+00:00",
              "location": "HOSTED"
            }
          ],
          "callRecordings": [
            {
              "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "direction": "INBOUND",
              "files": [
                {
                  "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                  "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                  "fileFormat": "WAV",
                  "size": 67564,
                  "creationTime": "2022-01-01T00:00:00.250+00:00",
                  "duration": 10,
                  "startTime": "2021-12-31T23:59:50.100+00:00",
                  "endTime": "2022-01-01T00:00:00.100+00:00",
                  "location": "HOSTED"
                }
              ],
              "status": "SUCCESSFUL"
            },
            {
              "callId": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "direction": "INBOUND",
              "files": [
                {
                  "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                  "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                  "fileFormat": "WAV",
                  "size": 67564,
                  "creationTime": "2022-01-01T00:00:00.250+00:00",
                  "duration": 10,
                  "startTime": "2021-12-31T23:59:50.100+00:00",
                  "endTime": "2022-01-01T00:00:00.100+00:00",
                  "location": "HOSTED"
                }
              ],
              "status": "SUCCESSFUL"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{dialogId}", $givenDialogId, self::GET_DIALOG_RECORDINGS)
            . "?"
            . Query::build([
                "location" => $givenLocation
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getDialogRecordings($givenDialogId, $givenLocation),
            fn () => $api->getDialogRecordingsAsync($givenDialogId, $givenLocation),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsDialogRecordingResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testDeleteDialogRecordings(): void
    {
        $givenDialogId = "64d214c5-70b7-4ea6-b2a6-8334d1f34fb4";
        $givenLocation = CallsRecordingLocation::BOGOTA();

        $givenResponse = <<<JSON
        {
          "dialogId": "034e622a-cc7e-456d-8a10-0ba43b11aa5e",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          },
          "composedFiles": [
            {
              "id": "b72cde3c-7d9c-4a5c-8e48-5a947244c013",
              "name": "d8d84155-3831-43fb-91c9-bb897149a79d_41792030001_1652725357412_recording.wav",
              "fileFormat": "WAV",
              "size": 67564,
              "creationTime": "2022-01-01T00:00:00.250+00:00",
              "duration": 10,
              "startTime": "2021-12-31T23:59:50.100+00:00",
              "endTime": "2022-01-01T00:00:00.100+00:00",
              "location": "HOSTED"
            }
          ],
          "callRecordings": [
            {
              "callId": "d8d84155-3831-43fb-91c9-bb897149a79d",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "direction": "INBOUND",
              "files": [
                {
                  "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                  "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                  "fileFormat": "WAV",
                  "size": 67564,
                  "creationTime": "2022-01-01T00:00:00.250+00:00",
                  "duration": 10,
                  "startTime": "2021-12-31T23:59:50.100+00:00",
                  "endTime": "2022-01-01T00:00:00.100+00:00",
                  "location": "HOSTED"
                }
              ],
              "status": "SUCCESSFUL"
            },
            {
              "callId": "3ad8805e-d401-424e-9b03-e02a2016a5e2",
              "endpoint": {
                "type": "PHONE",
                "phoneNumber": "44790123456"
              },
              "direction": "INBOUND",
              "files": [
                {
                  "id": "d8d84155-3831-43fb-91c9-bb897149a79d",
                  "name": "d8d84155-3831-43fb-91c9-bb897149a79d_1652725357412.wav",
                  "fileFormat": "WAV",
                  "size": 67564,
                  "creationTime": "2022-01-01T00:00:00.250+00:00",
                  "duration": 10,
                  "startTime": "2021-12-31T23:59:50.100+00:00",
                  "endTime": "2022-01-01T00:00:00.100+00:00",
                  "location": "HOSTED"
                }
              ],
              "status": "SUCCESSFUL"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{dialogId}", $givenDialogId, self::DELETE_DIALOG_RECORDINGS)
            . "?"
            . Query::build([
                "location" => $givenLocation
            ]);

        $expectedHttpMethod = "DELETE";

        $closures = [
            fn () => $api->deleteDialogRecordings($givenDialogId, $givenLocation),
            fn () => $api->deleteDialogRecordingsAsync($givenDialogId, $givenLocation),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsDialogRecordingResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testComposeDialogRecording(): void
    {
        $givenDialogId = "64d214c5-70b7-4ea6-b2a6-8334d1f34fb4";
        $givenLocation = CallsRecordingLocation::BOGOTA();

        $givenRequest = <<<JSON
        {
          "deleteCallRecordings": true
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{dialogId}", $givenDialogId, self::COMPOSE_DIALOG_RECORDING)
            . "?"
            . Query::build([
                "location" => $givenLocation
            ]);

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsOnDemandComposition::class);

        $closures = [
            fn () => $api->composeDialogRecording(
                dialogId: $givenDialogId,
                callsOnDemandComposition: $request,
                location: $givenLocation
            ),
            fn () => $api->composeDialogRecordingAsync(
                dialogId: $givenDialogId,
                callsOnDemandComposition: $request,
                location: $givenLocation
            ),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsActionResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testDeleteRecordingFile(): void
    {
        $givenFileId = "64d214c5-70b7-4ea6-b2a6-8334d1f34fb4";
        $givenLocation = CallsRecordingLocation::BOGOTA();

        $givenResponse = <<<JSON
        {
          "id": "b72cde3c-7d9c-4a5c-8e48-5a947244c013",
          "name": "b72cde3c-7d9c-4a5c-8e48-5a947244c013_1652725357412.wav",
          "fileFormat": "WAV",
          "size": 67564,
          "creationTime": "2022-01-01T00:00:00.250+00:00",
          "duration": 10,
          "startTime": "2021-12-31T23:59:50.100+00:00",
          "endTime": "2022-01-01T00:00:00.100+00:00",
          "location": "HOSTED"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{fileId}", $givenFileId, self::DELETE_RECORDING_FILE)
            . "?"
            . Query::build([
                "location" => $givenLocation
            ]);

        $expectedHttpMethod = "DELETE";

        $closures = [
            fn () => $api->deleteRecordingFile($givenFileId, $givenLocation),
            fn () => $api->deleteRecordingFileAsync($givenFileId, $givenLocation),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsRecordingFile::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetMediaStreamConfigs(): void
    {
        $givenPage = 0;
        $givenSize = 1;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "id": "63467c6e2885a5389ba11d80",
              "name": "Media-stream config",
              "url": "ws://example-web-socket.com:3001"
            }
          ],
          "paging": {
            "page": 0,
            "size": 1,
            "totalPages": 1,
            "totalResults": 1
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_MEDIA_STREAM_CONFIGS
            . "?"
            . Query::build([
                "page" => $givenPage,
                "size" => $givenSize
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getMediaStreamConfigs($givenPage, $givenSize),
            fn () => $api->getMediaStreamConfigsAsync($givenPage, $givenSize),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsMediaStreamConfigPage::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testCreateMediaStreamConfig(): void
    {
        $givenRequest = <<<JSON
        {
          "name": "Media-stream config",
          "url": "ws://example-web-socket.com:3001",
          "securityConfig": {
            "username": "my-username",
            "password": "my-password",
            "type": "BASIC"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "63467c6e2885a5389ba11d80",
          "name": "Media-stream config",
          "url": "ws://example-web-socket.com:3001"
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(201, $this->givenRequestHeaders, $givenResponse),
                new Response(201, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::CREATE_MEDIA_STREAM_CONFIG;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsMediaStreamConfigRequest::class);

        $closures = [
            fn () => $api->createMediaStreamConfig($request),
            fn () => $api->createMediaStreamConfigAsync($request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsMediaStreamConfigResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetMediaStreamConfig(): void
    {
        $givenMediaStreamConfigId = "63467c6e2885a5389ba11d80";

        $givenResponse = <<<JSON
        {
          "id": "63467c6e2885a5389ba11d80",
          "name": "Media-stream config",
          "url": "ws://example-web-socket.com:3001"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{mediaStreamConfigId}", $givenMediaStreamConfigId, self::GET_MEDIA_STREAM_CONFIG);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getMediaStreamConfig($givenMediaStreamConfigId),
            fn () => $api->getMediaStreamConfigAsync($givenMediaStreamConfigId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsMediaStreamConfigResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testUpdateMediaStreamConfig(): void
    {
        $givenMediaStreamConfigId = "63467c6e2885a5389ba11d80";

        $givenRequest = <<<JSON
        {
          "name": "Media-stream config",
          "url": "ws://example-web-socket.com:3001",
          "securityConfig": {
            "username": "my-username",
            "password": "my-password",
            "type": "BASIC"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "63467c6e2885a5389ba11d80",
          "name": "Media-stream config",
          "url": "ws://example-web-socket.com:3001"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{mediaStreamConfigId}", $givenMediaStreamConfigId, self::UPDATE_MEDIA_STREAM_CONFIG);

        $expectedHttpMethod = "PUT";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsMediaStreamConfigRequest::class);

        $closures = [
            fn () => $api->updateMediaStreamConfig($givenMediaStreamConfigId, $request),
            fn () => $api->updateMediaStreamConfigAsync($givenMediaStreamConfigId, $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsMediaStreamConfigResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );
    }

    public function testDeleteMediaStreamConfig(): void
    {
        $givenMediaStreamConfigId = "63467c6e2885a5389ba11d80";

        $givenResponse = <<<JSON
        {
          "id": "63467c6e2885a5389ba11d80",
          "name": "Media-stream config",
          "url": "ws://example-web-socket.com:3001"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{mediaStreamConfigId}", $givenMediaStreamConfigId, self::DELETE_MEDIA_STREAM_CONFIG);

        $expectedHttpMethod = "DELETE";

        $closures = [
            fn () => $api->deleteMediaStreamConfig($givenMediaStreamConfigId),
            fn () => $api->deleteMediaStreamConfigAsync($givenMediaStreamConfigId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsMediaStreamConfigResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testCreateBulk(): void
    {
        $givenRequest = <<<JSON
        {
          "bulkId": "46ab0413-448f-4153-ada9-b68b14242dc3",
          "callsConfigurationId": "dc5942707c704551a00cd2ea",
          "platform": {
            "applicationId": "61c060db2675060027d8c7a6"
          },
          "items": [
            {
              "from": "41793026834",
              "callRequests": [
                {
                  "externalId": "your-external-id-1",
                  "endpoint": {
                    "phoneNumber": "41792036727",
                    "type": "PHONE"
                  }
                },
                {
                  "externalId": "your-external-id-2",
                  "endpoint": {
                    "phoneNumber": "41792036728",
                    "type": "PHONE"
                  }
                },
                {
                  "externalId": "your-external-id-3",
                  "endpoint": {
                    "phoneNumber": "41792036729",
                    "type": "PHONE"
                  }
                }
              ],
              "recording": {
                "recordingType": "AUDIO"
              },
              "machineDetection": {
                "enabled": true
              },
              "maxDuration": 28000,
              "connectTimeout": 20000,
              "callRate": {
                "maxCalls": 10,
                "timeUnit": "MINUTES"
              },
              "validityPeriod": 60,
              "retryOptions": {
                "minWaitPeriod": 5,
                "maxWaitPeriod": 10,
                "maxAttempts": 5
              },
              "schedulingOptions": {
                "startTime": "2022-01-01T00:00:00.100+00:00",
                "callingTimeWindow": {
                  "from": {
                    "hour": 9,
                    "minute": 0
                  },
                  "to": {
                    "hour": 17,
                    "minute": 0
                  },
                  "days": [
                    "MONDAY",
                    "TUESDAY",
                    "WEDNESDAY",
                    "THURSDAY",
                    "FRIDAY"
                  ]
                }
              }
            }
          ]
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "bulkId": "46ab0413-448f-4153-ada9-b68b14242dc3",
          "calls": [
            {
              "callsConfigurationId": "dc5942707c704551a00cd2ea",
              "platform": {
                "applicationId": "61c060db2675060027d8c7a6"
              },
              "callId": "266f8375-33d3-482f-a258-51e86b5ae9ac",
              "externalId": "your-external-id-1",
              "from": "41793026834",
              "endpoint": {
                "phoneNumber": "41792036727",
                "type": "PHONE"
              },
              "status": "PENDING"
            },
            {
              "callsConfigurationId": "dc5942707c704551a00cd2ea",
              "platform": {
                "applicationId": "61c060db2675060027d8c7a6"
              },
              "callId": "366f8375-33d3-482f-a258-51e86b5ae9ad",
              "externalId": "your-external-id-2",
              "from": "41793026834",
              "endpoint": {
                "phoneNumber": "41792036728",
                "type": "PHONE"
              },
              "status": "PENDING"
            },
            {
              "callsConfigurationId": "dc5942707c704551a00cd2ea",
              "platform": {
                "applicationId": "61c060db2675060027d8c7a6"
              },
              "callId": "466f8375-33d3-482f-a258-51e86b5ae9ae",
              "externalId": "your-external-id-3",
              "from": "41793026834",
              "endpoint": {
                "phoneNumber": "41792036729",
                "type": "PHONE"
              },
              "status": "PENDING"
            }
          ]
        }
        JSON;


        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(201, $this->givenRequestHeaders, $givenResponse),
                new Response(201, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::CREATE_BULK;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallBulkRequest::class);

        $closures = [
            fn () => $api->createBulk($request),
            fn () => $api->createBulkAsync($request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallBulkResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetBulkStatus(): void
    {
        $givenBulkId = "46ab0413-448f-4153-ada9-b68b14242dc3";

        $givenResponse = <<<JSON
        {
          "bulkId": "46ab0413-448f-4153-ada9-b68b14242dc3",
          "startTime": "2024-09-25T09:52:12.000+00:00",
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{bulkId}", $givenBulkId, self::GET_BULK_STATUS);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getBulkStatus($givenBulkId),
            fn () => $api->getBulkStatusAsync($givenBulkId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallBulkStatus::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testRescheduleBulk(): void
    {
        $givenBulkId = "46ab0413-448f-4153-ada9-b68b14242dc3";

        $givenRequest = <<<JSON
        {
          "startTime": "2024-09-25T09:53:44.000+00:00"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "bulkId": "46ab0413-448f-4153-ada9-b68b14242dc3",
          "startTime": "2024-09-25T09:52:12.000+00:00",
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{bulkId}", $givenBulkId, self::RESCHEDULE_BULK);

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsRescheduleRequest::class);

        $closures = [
            fn () => $api->rescheduleBulk($givenBulkId, $request),
            fn () => $api->rescheduleBulkAsync($givenBulkId, $request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallBulkStatus::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );
    }

    public function testPauseBulk(): void
    {
        $givenBulkId = "46ab0413-448f-4153-ada9-b68b14242dc3";

        $givenResponse = <<<JSON
        {
          "bulkId": "46ab0413-448f-4153-ada9-b68b14242dc3",
          "startTime": "2024-09-25T09:55:24.000+00:00",
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{bulkId}", $givenBulkId, self::PAUSE_BULK);

        $expectedHttpMethod = "POST";

        $closures = [
            fn () => $api->pauseBulk($givenBulkId),
            fn () => $api->pauseBulkAsync($givenBulkId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallBulkStatus::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testResumeBulk(): void
    {
        $givenBulkId = "46ab0413-448f-4153-ada9-b68b14242dc3";

        $givenResponse = <<<JSON
        {
          "bulkId": "46ab0413-448f-4153-ada9-b68b14242dc3",
          "startTime": "2024-09-25T09:56:35.000+00:00",
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{bulkId}", $givenBulkId, self::RESUME_BULK);

        $expectedHttpMethod = "POST";

        $closures = [
            fn () => $api->resumeBulk($givenBulkId),
            fn () => $api->resumeBulkAsync($givenBulkId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallBulkStatus::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testCancelBulk(): void
    {
        $givenBulkId = "46ab0413-448f-4153-ada9-b68b14242dc3";

        $givenResponse = <<<JSON
        {
          "bulkId": "46ab0413-448f-4153-ada9-b68b14242dc3",
          "startTime": "2024-09-25T09:56:35.000+00:00",
          "status": "PENDING"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new CallsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{bulkId}", $givenBulkId, self::CANCEL_BULK);

        $expectedHttpMethod = "POST";

        $closures = [
            fn () => $api->cancelBulk($givenBulkId),
            fn () => $api->cancelBulkAsync($givenBulkId),
        ];

        $this->assertClosureResponses(
            $closures,
            CallBulkStatus::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    private function assertGetRequest(
        array  $closures,
        string $expectedPath,
        object $expectedResponse,
        array  &$requestHistoryContainer
    ): void {
        foreach ($closures as $index => $closure) {
            $response = $this->getUnpackedModel($closure(), $expectedResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeaders(
                'GET',
                $expectedPath,
                $requestHistoryContainer[$index],
                ['Accept' => 'application/json']
            );

            $this->assertEquals($expectedResponse, $response);
        }
    }

    private function assertPostRequest(
        array  $closures,
        string $expectedPath,
        string $givenRawRequest,
        object $expectedResponse,
        array  &$requestHistoryContainer
    ): void {
        foreach ($closures as $index => $closure) {
            $response = $this->getUnpackedModel($closure(), $expectedResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeadersAndJsonBody(
                'POST',
                $expectedPath,
                $givenRawRequest,
                $requestHistoryContainer[$index]
            );

            $this->assertEquals($expectedResponse, $response);
        }
    }

    private function assertPostRequestWithNoBody(
        array  $closures,
        string $expectedPath,
        object $expectedResponse,
        array  &$requestHistoryContainer
    ): void {
        foreach ($closures as $index => $closure) {
            $response = $this->getUnpackedModel($closure(), $expectedResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeaders(
                'POST',
                $expectedPath,
                $requestHistoryContainer[$index],
                ['Accept' => 'application/json']
            );

            $this->assertEquals($expectedResponse, $response);
        }
    }
}
