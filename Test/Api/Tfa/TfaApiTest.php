<?php

declare(strict_types=1);

namespace Infobip\Test\Api\Tfa;

use GuzzleHttp\Promise\Utils;
use GuzzleHttp\Psr7\Response;
use Infobip\Api\TfaApi;
use Infobip\Model\TfaApplicationConfiguration;
use Infobip\Model\TfaApplicationRequest;
use Infobip\Model\TfaApplicationResponse;
use Infobip\Model\TfaCreateEmailMessageRequest;
use Infobip\Model\TfaCreateMessageRequest;
use Infobip\Model\TfaEmailMessage;
use Infobip\Model\TfaMessage;
use Infobip\Model\TfaPinType;
use Infobip\Model\TfaResendPinRequest;
use Infobip\Model\TfaStartAuthenticationRequest;
use Infobip\Model\TfaStartAuthenticationResponse;
use Infobip\Model\TfaStartEmailAuthenticationRequest;
use Infobip\Model\TfaStartEmailAuthenticationResponse;
use Infobip\Model\TfaUpdateEmailMessageRequest;
use Infobip\Model\TfaUpdateMessageRequest;
use Infobip\Model\TfaVerifyPinRequest;
use Infobip\Model\TfaVerifyPinResponse;
use Infobip\Test\Api\ApiTestBase;

class TfaApiTest extends ApiTestBase
{
    # Endpoint URLs
    private const TFA_APPLICATIONS_URL         = "/2fa/2/applications";
    private const TFA_APPLICATION_URL          = "/2fa/2/applications/{appId}";
    private const TFA_TEMPLATES_URL            = "/2fa/2/applications/{appId}/messages";
    private const TFA_TEMPLATE_URL             = "/2fa/2/applications/{appId}/messages/{msgId}";
    private const TFA_TEMPLATES_EMAIL_URL      = "/2fa/2/applications/{appId}/email/messages";
    private const TFA_TEMPLATE_EMAIL_URL       = "/2fa/2/applications/{appId}/email/messages/{msgId}";
    private const SEND_TFA_PIN_OVER_SMS_URL        = "/2fa/2/pin";
    private const RESEND_TFA_PIN_OVER_SMS_URL      = "/2fa/2/pin/{pinId}/resend";
    private const SEND_TFA_PIN_OVER_VOICE_URL      = "/2fa/2/pin/voice";
    private const RESEND_TFA_PIN_OVER_VOICE_URL    = "/2fa/2/pin/{pinId}/resend/voice";
    private const SEND_TFA_PIN_OVER_EMAIL_URL      = "/2fa/2/pin/email";
    private const RESEND_TFA_PIN_OVER_EMAIL_URL    = "/2fa/2/pin/{pinId}/resend/email";
    private const VERIFY_PIN_URL                   = "/2fa/2/pin/{pinId}/verify";
    private const GET_TFA_VERIFICATION_STATUS_URL  = "/2fa/2/applications/{appId}/verifications";
    # /Endpoint URLs

    # Get TFA applications
    private $givenApplicationId1 = '0933F3BC087D2A617AC6DCB2EF5B8A61';
    private $givenName1 = 'Test application BASIC 1';
    private $givenPinAttempts1 = 10;
    private $givenAllowMultiplePinVerifications1 = true;
    private $givenPinTimeToLive1 = '2h';
    private $givenVerifyPinLimit1 = '1/3s';
    private $givenSendPinPerApplicationLimit1 = '10000/1d';
    private $givenSendPinPerPhoneNumberLimit1 = '3/1d';
    private $givenEnabled1 = true;

    private $givenApplicationId2 = '5F04FACFAA4978F62FCAEBA97B37E90F';
    private $givenName2 = 'Test application BASIC 2';
    private $givenPinAttempts2 = 12;
    private $givenAllowMultiplePinVerifications2 = true;
    private $givenPinTimeToLive2 = '10m';
    private $givenVerifyPinLimit2 = '2/1s';
    private $givenSendPinPerApplicationLimit2 = '10000/1d';
    private $givenSendPinPerPhoneNumberLimit2 = '5/1h';
    private $givenEnabled2 = true;

    private $givenApplicationId3 = 'B450F966A8EF017180F148AF22C42642';
    private $givenName3 = 'Test application BASIC 3';
    private $givenPinAttempts3 = 15;
    private $givenAllowMultiplePinVerifications3 = true;
    private $givenPinTimeToLive3 = '1h';
    private $givenVerifyPinLimit3 = '30/10s';
    private $givenSendPinPerApplicationLimit3 = '10000/3d';
    private $givenSendPinPerPhoneNumberLimit3 = '10/20m';
    private $givenEnabled3 = true;
    # /Get TFA applications

    # Create TFA application
    private $givenCreateApplicationApplicationId = '1234567';
    private $givenCreateApplicationName = '2fa application name';
    private $givenCreateApplicationPinAttempts = 5;
    private $givenCreateApplicationAllowMultiplePinVerifications = true;
    private $givenCreateApplicationPinTimeToLive = '10m';
    private $givenCreateApplicationVerifyPinLimit = '2/4s';
    private $givenCreateApplicationSendPinPerApplicationLimit = '5000/12h';
    private $givenCreateApplicationSendPinPerPhoneNumberLimit = '2/1d';
    private $givenCreateApplicationEnabled = true;
    # /Create TFA application

    # Get TFA application
    private $givenGetApplicationApplicationId = '1234567';
    private $givenGetApplicationName = '2fa application name';
    private $givenGetApplicationPinAttempts = 5;
    private $givenGetApplicationAllowMultiplePinVerifications = true;
    private $givenGetApplicationPinTimeToLive = '10m';
    private $givenGetApplicationVerifyPinLimit = '2/4s';
    private $givenGetApplicationSendPinPerApplicationLimit = '5000/12h';
    private $givenGetApplicationSendPinPerPhoneNumberLimit = '2/1d';
    private $givenGetApplicationEnabled = true;
    # /Get TFA application

    # Update TFA application
    private $givenUpdateApplicationApplicationId = '123456789';
    private $givenUpdateApplicationName = '2fa application name #2';
    private $givenUpdateApplicationPinAttempts = 4;
    private $givenUpdateApplicationAllowMultiplePinVerifications = true;
    private $givenUpdateApplicationPinTimeToLive = '8m';
    private $givenUpdateApplicationVerifyPinLimit = '2/5s';
    private $givenUpdateApplicationSendPinPerApplicationLimit = '5000/24h';
    private $givenUpdateApplicationSendPinPerPhoneNumberLimit = '2/2d';
    private $givenUpdateApplicationEnabled = true;
    # /Update TFA application

    # Get TFA Message templates
    private $givenMessageApplicationId = "HJ675435E3A6EA43432G5F37A635KJ8B";

    private $givenMessageId1 = "9C815F8AF3328";
    private $givenMessagePinPlaceholder1 = "{{pin}}";
    private $givenMessageMessageText1 = "Your PIN is {{pin}}.";
    private $givenMessagePinLength1 = 4;
    private $givenMessagePinType1 = "NUMERIC";
    private $givenMessageLanguage1 = "en";
    private $givenMessageRepeatDtmf1 = "1#";
    private $givenMessageSpeechRate1 = 1;

    private $givenMessageId2 = "8F0792F86035A";
    private $givenMessagePinPlaceholder2 = "{{pin}}";
    private $givenMessageMessageText2 = "Your PIN is {{pin}}.";
    private $givenMessagePinLength2 = 6;
    private $givenMessagePinType2 = "HEX";
    private $givenMessageRepeatDtmf2 = "1#";
    private $givenMessageSpeechRate2 = 1.5;
    # /Get TFA Message templates

    # Create TFA Message templates
    private $givenCreateMessagePinPlaceholder = "{{pin}}";
    private $givenCreateMessageMessageText = "Your PIN is {{pin}}";
    private $givenCreateMessagePinLength = 4;
    private $givenCreateMessagePinType = "NUMERIC";
    private $givenCreateMessageLanguage = "en";
    private $givenCreateMessageSenderId = "Infobip 2FA";
    private $givenCreateMessageRepeatDtmf = "1#";
    private $givenCreateMessageSpeechRate = 1;
    # /Create TFA Message templates

    # Get TFA Message templates
    private $givenGetMessagePinPlaceholder = "{{pin}}";
    private $givenGetMessageMessageText = "Your PIN is {{pin}}";
    private $givenGetMessagePinLength = 4;
    private $givenGetMessagePinType = "NUMERIC";
    private $givenGetMessageLanguage = "en";
    private $givenGetMessageSenderId = "Infobip 2FA";
    private $givenGetMessageRepeatDtmf = "1#";
    private $givenGetMessageSpeechRate = 1;
    private $givenGetMessageMessageId = "7654321";
    private $givenGetMessageApplicationId = "1234567";
    # /Get TFA Message templates

    # Update TFA Message templates
    private $givenUpdateMessagePinPlaceholder = "{{pin}}";
    private $givenUpdateMessageMessageText = "Your PIN is {{pin}}";
    private $givenUpdateMessagePinLength = 4;
    private $givenUpdateMessagePinType = "NUMERIC";
    private $givenUpdateMessageLanguage = "en";
    private $givenUpdateMessageSenderId = "Infobip 2FA";
    private $givenUpdateMessageRepeatDtmf = "1#";
    private $givenUpdateMessageSpeechRate = 1;
    private $givenUpdateMessageMessageId = "7654321";
    private $givenUpdateMessageApplicationId = "1234567";
    # /Update TFA Message templates

    # Create TFA Email templates
    private $givenCreateEmailAppId = "0933F3BC087D2A617AC6DCB2EF5B8A61";
    private $givenCreateEmailTemplateId = 1234;
    private $givenCreateEmailFrom = "company@example.com";
    private $givenCreateEmailPinLength = 4;
    private $givenCreateEmailPinType = "NUMERIC";
    private $givenCreateEmailMessageId = "9C815F8AF3328";
    # /Create TFA Email templates

    # Update TFA Email template
    private $givenUpdateEmailAppId = "0933F3BC087D2A617AC6DCB2EF5B8A61";
    private $givenUpdateEmailMessageId = "16A8B5FE2BCD6CA716A2D780CB3F3390";
    private $givenUpdateEmailTemplateId = 1234;
    private $givenUpdateEmailFrom = "company@example.com";
    private $givenUpdateEmailPinLength = 4;
    private $givenUpdateEmailPinType = "NUMERIC";
    # /Update TFA Email template

    # Send 2FA PIN code over SMS
    private $givenSendPinOverSmsPlaceholder = "John";
    private $givenSendPinOverSmsFrom = "Sender 1";
    private $givenSendPinOverSmsTo = "41793026727";
    private $givenSendPinOverSmsMessageId = "7654321";
    private $givenSendPinOverSmsPinId = "9C817C6F8AF3D48F9FE553282AFA2B67";
    private $givenSendPinOverSmsNcStatus = "NC_DESTINATION_REACHABLE";
    private $givenSendPinOverSmsSmsStatus = "MESSAGE_SENT";
    private $givenSendPinOverSmsApplicationId = "1234567";
    # /Send 2FA PIN code over SMS

    # Resend 2FA PIN code over SMS
    private $givenResendPinOverSmsPlaceholder = "John";
    private $givenResendPinOverSmsTo = "41793026727";
    private $givenResendPinOverSmsPinId = "9C817C6F8AF3D48F9FE553282AFA2B67";
    private $givenResendPinOverSmsNcStatus = "NC_DESTINATION_REACHABLE";
    private $givenResendPinOverSmsSmsStatus = "MESSAGE_SENT";
    # /Resend 2FA PIN code over SMS

    # Send 2FA PIN code over voice
    private $givenSendPinOverVoicePlaceholder = "John";
    private $givenSendPinOverVoiceFrom = "Sender 1";
    private $givenSendPinOverVoiceTo = "41793026727";
    private $givenSendPinOverVoiceMessageId = "7654321";
    private $givenSendPinOverVoicePinId = "9C817C6F8AF3D48F9FE553282AFA2B67";
    private $givenSendPinOverVoiceCallStatus = "PENDING_ACCEPTED";
    private $givenSendPinOverVoiceApplicationId = "1234567";
    # /Send 2FA PIN code over voice

    # Resend 2FA PIN code over voice
    private $givenResendPinOverVoicePlaceholder = "John";
    private $givenResendPinOverVoiceTo = "41793026727";
    private $givenResendPinOverVoicePinId = "9C817C6F8AF3D48F9FE553282AFA2B67";
    private $givenResendPinOverVoiceCallStatus = "PENDING_ACCEPTED";
    # /Resend 2FA PIN code over voice

    # Send 2FA PIN code over email
    private $givenSendPinOverEmailPlaceholder = "John";
    private $givenSendPinOverEmailApplicationId = "1234567";
    private $givenSendPinOverEmailFrom = "sender.1@example.com";
    private $givenSendPinOverEmailMessageId = "7654321";
    private $givenSendPinOverEmailTo = "john.smith@example.com";
    private $givenSendPinOverEmailPinId = "9C817C6F8AF3D48F9FE553282AFA2B67";
    private $givenSendPinOverEmailName = "PENDING_ACCEPTED";
    # /Send 2FA PIN code over email

    # Resend 2FA PIN code over email
    private $givenResendPinOverEmailPlaceholder = "John";
    private $givenResendPinOverEmailPinId = "0933F3BC087D2A617AC6DCB2EF5B8A61";
    private $givenResendPinOverEmailTo = "john.smith@example.com";
    private $givenResendPinOverEmailName = "PENDING_ACCEPTED";
    # /Resend 2FA PIN code over email

    # Verify phone number
    private $givenVerifyPhoneNumberPin = "1598";
    private $givenVerifyPhoneNumberMsisdn = "41793026727";
    private $givenVerifyPhoneNumberVerified = true;
    private $givenVerifyPhoneNumberPinId = "9C817C6F8AF3D48F9FE553282AFA2B67";
    private $givenVerifyPhoneNumberAttemptsRemaining = 0;
    # /Verify phone number

    # Get TFA verification status
    private $givenGetVerificationStatusMsisdn1 = "41793026727";
    private $givenGetVerificationStatusVerified1 = true;
    private $givenGetVerificationStatusVerifiedAt1 = 1418364366;
    private $givenGetVerificationStatusSentAt1 = 1418364246;

    private $givenGetVerificationStatusMsisdn2 = "41793026746";
    private $givenGetVerificationStatusVerified2 = false;
    private $givenGetVerificationStatusVerifiedAt2 = 1418364226;
    private $givenGetVerificationStatusSentAt2 = 1418333246;
    # /Get TFA verification status

    public function testGetTfaApplications()
    {
        $enabledJson1 = json_encode($this->givenEnabled1);
        $allowMultiplePinVerificationsJson1 = json_encode($this->givenAllowMultiplePinVerifications1);
        $enabledJson2 = json_encode($this->givenEnabled2);
        $allowMultiplePinVerificationsJson2 = json_encode($this->givenAllowMultiplePinVerifications2);
        $enabledJson3 = json_encode($this->givenEnabled3);
        $allowMultiplePinVerificationsJson3 = json_encode($this->givenAllowMultiplePinVerifications3);

        $expectedResponse = <<<JSON
        [
            {
                "applicationId": "$this->givenApplicationId1",
                "name": "$this->givenName1",
                "configuration": {
                    "pinAttempts": $this->givenPinAttempts1,
                    "allowMultiplePinVerifications": $allowMultiplePinVerificationsJson1,
                    "pinTimeToLive": "$this->givenPinTimeToLive1",
                    "verifyPinLimit": "$this->givenVerifyPinLimit1",
                    "sendPinPerApplicationLimit": "$this->givenSendPinPerApplicationLimit1",
                    "sendPinPerPhoneNumberLimit": "$this->givenSendPinPerPhoneNumberLimit1"
                },
                "enabled": $enabledJson1
            },
            {
                "applicationId": "$this->givenApplicationId2",
                "name": "$this->givenName2",
                "configuration": {
                    "pinAttempts": $this->givenPinAttempts2,
                    "allowMultiplePinVerifications": $allowMultiplePinVerificationsJson2,
                    "pinTimeToLive": "$this->givenPinTimeToLive2",
                    "verifyPinLimit": "$this->givenVerifyPinLimit2",
                    "sendPinPerApplicationLimit": "$this->givenSendPinPerApplicationLimit2",
                    "sendPinPerPhoneNumberLimit": "$this->givenSendPinPerPhoneNumberLimit2"
                },
                "enabled": $enabledJson2
            },
            {
                "applicationId": "$this->givenApplicationId3",
                "name": "$this->givenName3",
                "configuration": {
                    "pinAttempts": $this->givenPinAttempts3,
                    "allowMultiplePinVerifications": $allowMultiplePinVerificationsJson3,
                    "pinTimeToLive": "$this->givenPinTimeToLive3",
                    "verifyPinLimit": "$this->givenVerifyPinLimit3",
                    "sendPinPerApplicationLimit": "$this->givenSendPinPerApplicationLimit3",
                    "sendPinPerPhoneNumberLimit": "$this->givenSendPinPerPhoneNumberLimit3"
                },
                "enabled": $enabledJson3
            }
        ]
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $expectedResponse),
                new Response(200, $this->givenRequestHeaders, $expectedResponse),
            ],
            $requestHistoryContainer
        );

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);

        # Test sync method call
        $response = $tfaApi->getTfaApplications();
        $this->assertGetTfaApplications((array)$response);
        $this->assertRequestWithHeaders(
            'GET',
            self::TFA_APPLICATIONS_URL,
            $requestHistoryContainer[0],
            [
                'Accept' => 'application/json'
            ]
        );

        # Test async method call
        $promise = $tfaApi->getTfaApplicationsAsync();
        $responseAsync = Utils::unwrap([$promise])[0];
        $this->assertGetTfaApplications((array)$responseAsync);
        $this->assertRequestWithHeaders(
            'GET',
            self::TFA_APPLICATIONS_URL,
            $requestHistoryContainer[1],
            [
                'Accept' => 'application/json'
            ]
        );
    }

    public function testCreateTfaApplication()
    {
        $enabledJson = json_encode($this->givenCreateApplicationEnabled);
        $allowMultiplePinVerificationsJson = json_encode($this->givenCreateApplicationAllowMultiplePinVerifications);

        $givenRequest = <<<JSON
        {
            "name": "$this->givenCreateApplicationName",
            "enabled": $enabledJson,
            "configuration": {
                "pinAttempts": $this->givenCreateApplicationPinAttempts,
                "allowMultiplePinVerifications": $allowMultiplePinVerificationsJson,
                "pinTimeToLive": "$this->givenCreateApplicationPinTimeToLive",
                "verifyPinLimit": "$this->givenCreateApplicationVerifyPinLimit",
                "sendPinPerApplicationLimit": "$this->givenCreateApplicationSendPinPerApplicationLimit",
                "sendPinPerPhoneNumberLimit": "$this->givenCreateApplicationSendPinPerPhoneNumberLimit"
            }
        }
        JSON;

        $expectedResponse = <<<JSON
        {
            "applicationId": "$this->givenCreateApplicationApplicationId",
            "name": "$this->givenCreateApplicationName",
            "configuration": {
                "pinAttempts": $this->givenCreateApplicationPinAttempts,
                "allowMultiplePinVerifications": $allowMultiplePinVerificationsJson,
                "pinTimeToLive": "$this->givenCreateApplicationPinTimeToLive",
                "verifyPinLimit": "$this->givenCreateApplicationVerifyPinLimit",
                "sendPinPerApplicationLimit": "$this->givenCreateApplicationSendPinPerApplicationLimit",
                "sendPinPerPhoneNumberLimit": "$this->givenCreateApplicationSendPinPerPhoneNumberLimit"
            },
            "enabled": $enabledJson
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $expectedResponse),
                new Response(200, $this->givenRequestHeaders, $expectedResponse),
            ],
            $requestHistoryContainer
        );

        $givenConfiguration = (new TfaApplicationConfiguration())
            ->setSendPinPerApplicationLimit($this->givenCreateApplicationSendPinPerApplicationLimit)
            ->setAllowMultiplePinVerifications($this->givenCreateApplicationAllowMultiplePinVerifications)
            ->setSendPinPerPhoneNumberLimit($this->givenCreateApplicationSendPinPerPhoneNumberLimit)
            ->setPinAttempts($this->givenCreateApplicationPinAttempts)
            ->setPinTimeToLive($this->givenCreateApplicationPinTimeToLive)
            ->setVerifyPinLimit($this->givenCreateApplicationVerifyPinLimit);

        $request = new TfaApplicationRequest(
            name: $this->givenCreateApplicationName,
            configuration: $givenConfiguration,
            enabled: $this->givenCreateApplicationEnabled
        );

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);

        # Test sync method call
        $application = $tfaApi->createTfaApplication($request);
        $this->assertCreateTfaApplication($application, $givenConfiguration);

        $this->assertRequestWithHeadersAndJsonBody(
            'POST',
            self::TFA_APPLICATIONS_URL,
            $givenRequest,
            $requestHistoryContainer[0]
        );

        # Test async method call
        $promise = $tfaApi->createTfaApplicationAsync($request);
        $responseAsync = Utils::unwrap([$promise])[0];
        $this->assertCreateTfaApplication($responseAsync, $givenConfiguration);

        $this->assertRequestWithHeadersAndJsonBody(
            'POST',
            self::TFA_APPLICATIONS_URL,
            $givenRequest,
            $requestHistoryContainer[1]
        );
    }

    public function testTfaGetApplication()
    {
        $enabledJson = json_encode($this->givenGetApplicationEnabled);
        $allowMultiplePinVerificationsJson = json_encode($this->givenGetApplicationAllowMultiplePinVerifications);

        $expectedResponse = <<<JSON
        {
            "applicationId": "$this->givenGetApplicationApplicationId",
            "name": "$this->givenGetApplicationName",
            "configuration": {
                "pinAttempts": $this->givenGetApplicationPinAttempts,
                "allowMultiplePinVerifications": $allowMultiplePinVerificationsJson,
                "pinTimeToLive": "$this->givenGetApplicationPinTimeToLive",
                "verifyPinLimit": "$this->givenGetApplicationVerifyPinLimit",
                "sendPinPerApplicationLimit": "$this->givenGetApplicationSendPinPerApplicationLimit",
                "sendPinPerPhoneNumberLimit": "$this->givenGetApplicationSendPinPerPhoneNumberLimit"
            },
            "enabled": $enabledJson
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $expectedResponse),
                new Response(200, $this->givenRequestHeaders, $expectedResponse),
            ],
            $requestHistoryContainer
        );

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);
        $url = str_replace('{appId}', $this->givenGetApplicationApplicationId, self::TFA_APPLICATION_URL);

        # Test sync method call
        $application = $tfaApi->getTfaApplication($this->givenGetApplicationApplicationId);
        $this->assertGetApplication($application);
        $this->assertRequestWithHeaders(
            'GET',
            $url,
            $requestHistoryContainer[0],
            [
                'Accept' => 'application/json'
            ]
        );

        # Test async method call
        $promise = $tfaApi->getTfaApplicationAsync($this->givenGetApplicationApplicationId);
        $applicationAsync = Utils::unwrap([$promise])[0];
        $this->assertGetApplication($applicationAsync);
        $this->assertRequestWithHeaders(
            'GET',
            $url,
            $requestHistoryContainer[1],
            [
                'Accept' => 'application/json'
            ]
        );
    }

    public function testUpdateTfaApplication()
    {
        $enabledJson = json_encode($this->givenUpdateApplicationEnabled);
        $allowMultiplePinVerificationsJson = json_encode($this->givenUpdateApplicationAllowMultiplePinVerifications);

        $givenRequest = <<<JSON
        {
            "name": "$this->givenUpdateApplicationName",
            "enabled": $enabledJson,
            "configuration": {
                "pinAttempts": $this->givenUpdateApplicationPinAttempts,
                "allowMultiplePinVerifications": $allowMultiplePinVerificationsJson,
                "pinTimeToLive": "$this->givenUpdateApplicationPinTimeToLive",
                "verifyPinLimit": "$this->givenUpdateApplicationVerifyPinLimit",
                "sendPinPerApplicationLimit": "$this->givenUpdateApplicationSendPinPerApplicationLimit",
                "sendPinPerPhoneNumberLimit": "$this->givenUpdateApplicationSendPinPerPhoneNumberLimit"
            }
        }
        JSON;

        $expectedResponse = <<<JSON
        {
            "applicationId": "$this->givenUpdateApplicationApplicationId",
            "name": "$this->givenUpdateApplicationName",
            "configuration": {
                "pinAttempts": $this->givenUpdateApplicationPinAttempts,
                "allowMultiplePinVerifications": $allowMultiplePinVerificationsJson,
                "pinTimeToLive": "$this->givenUpdateApplicationPinTimeToLive",
                "verifyPinLimit": "$this->givenUpdateApplicationVerifyPinLimit",
                "sendPinPerApplicationLimit": "$this->givenUpdateApplicationSendPinPerApplicationLimit",
                "sendPinPerPhoneNumberLimit": "$this->givenUpdateApplicationSendPinPerPhoneNumberLimit"
            },
            "enabled": $enabledJson
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $expectedResponse),
                new Response(200, $this->givenRequestHeaders, $expectedResponse),
            ],
            $requestHistoryContainer
        );

        $givenConfiguration = (new TfaApplicationConfiguration())
            ->setSendPinPerApplicationLimit($this->givenUpdateApplicationSendPinPerApplicationLimit)
            ->setAllowMultiplePinVerifications($this->givenUpdateApplicationAllowMultiplePinVerifications)
            ->setSendPinPerPhoneNumberLimit($this->givenUpdateApplicationSendPinPerPhoneNumberLimit)
            ->setPinAttempts($this->givenUpdateApplicationPinAttempts)
            ->setPinTimeToLive($this->givenUpdateApplicationPinTimeToLive)
            ->setVerifyPinLimit($this->givenUpdateApplicationVerifyPinLimit);

        $request = new TfaApplicationRequest(
            name: $this->givenUpdateApplicationName,
            configuration: $givenConfiguration,
            enabled: $this->givenUpdateApplicationEnabled
        );

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);
        $url = str_replace('{appId}', $this->givenUpdateApplicationApplicationId, self::TFA_APPLICATION_URL);

        # Test sync method call
        $application = $tfaApi->updateTfaApplication($this->givenUpdateApplicationApplicationId, $request);
        $this->assertUpdateApplication($application);
        $this->assertRequestWithHeadersAndJsonBody('PUT', $url, $givenRequest, $requestHistoryContainer[0]);

        # Test async method call
        $promise = $tfaApi->updateTfaApplicationAsync($this->givenUpdateApplicationApplicationId, $request);
        $applicationAsync = Utils::unwrap([$promise])[0];
        $this->assertUpdateApplication($applicationAsync);
        $this->assertRequestWithHeadersAndJsonBody('PUT', $url, $givenRequest, $requestHistoryContainer[1]);
    }

    public function testGetTfaMessageTemplates()
    {
        $expectedResponse = <<<JSON
        [        
            {
                "messageId": "$this->givenMessageId1",
                "applicationId": "$this->givenMessageApplicationId",
                "pinPlaceholder": "$this->givenMessagePinPlaceholder1",
                "messageText": "$this->givenMessageMessageText1",
                "pinLength": $this->givenMessagePinLength1,
                "pinType": "$this->givenMessagePinType1",
                "language": "$this->givenMessageLanguage1",
                "repeatDTMF": "$this->givenMessageRepeatDtmf1",
                "speechRate": $this->givenMessageSpeechRate1
            },
            {
                "messageId": "$this->givenMessageId2",
                "applicationId": "$this->givenMessageApplicationId",
                "pinPlaceholder": "$this->givenMessagePinPlaceholder2",
                "messageText": "$this->givenMessageMessageText2",
                "pinLength": $this->givenMessagePinLength2,
                "pinType": "$this->givenMessagePinType2",
                "repeatDTMF": "$this->givenMessageRepeatDtmf2",
                "speechRate": $this->givenMessageSpeechRate2
            }
        ]
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $expectedResponse),
                new Response(200, $this->givenRequestHeaders, $expectedResponse),
            ],
            $requestHistoryContainer
        );

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);
        $url = str_replace('{appId}', $this->givenMessageApplicationId, self::TFA_TEMPLATES_URL);

        # Test sync method call
        $templates = $tfaApi->getTfaMessageTemplates($this->givenMessageApplicationId);
        $this->assertGetTfaMessageTemplates((array)$templates);
        $this->assertRequestWithHeaders(
            'GET',
            $url,
            $requestHistoryContainer[0],
            [
                'Accept' => 'application/json'
            ]
        );

        # Test async method call
        $promise = $tfaApi->getTfaMessageTemplatesAsync($this->givenMessageApplicationId);
        $templates = Utils::unwrap([$promise])[0];
        $this->assertGetTfaMessageTemplates($templates);
        $this->assertRequestWithHeaders(
            'GET',
            $url,
            $requestHistoryContainer[1],
            [
                'Accept' => 'application/json'
            ]
        );
    }

    public function testCreateTfaMessageTemplate()
    {
        $givenRequest = <<<JSON
        {
            "pinType": "$this->givenCreateMessagePinType",
            "messageText": "$this->givenCreateMessageMessageText",
            "pinLength": $this->givenCreateMessagePinLength,
            "language": "$this->givenCreateMessageLanguage",
            "senderId": "$this->givenCreateMessageSenderId",
            "repeatDTMF": "$this->givenCreateMessageRepeatDtmf",
            "speechRate": $this->givenCreateMessageSpeechRate
        }
        JSON;

        $expectedResponse = <<<JSON
        {
            "pinPlaceholder": "$this->givenCreateMessagePinPlaceholder",
            "messageText": "$this->givenCreateMessageMessageText",
            "pinLength": $this->givenCreateMessagePinLength,
            "pinType": "$this->givenCreateMessagePinType",
            "language": "$this->givenCreateMessageLanguage",
            "senderId": "$this->givenCreateMessageSenderId",
            "repeatDTMF": "$this->givenCreateMessageRepeatDtmf",
            "speechRate": $this->givenCreateMessageSpeechRate
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $expectedResponse),
                new Response(200, $this->givenRequestHeaders, $expectedResponse),
            ],
            $requestHistoryContainer
        );

        $request = new TfaCreateMessageRequest(
            messageText: $this->givenCreateMessageMessageText,
            pinType: $this->givenCreateMessagePinType,
            language: $this->givenCreateMessageLanguage,
            pinLength: $this->givenCreateMessagePinLength,
            repeatDTMF: $this->givenCreateMessageRepeatDtmf,
            senderId: $this->givenCreateMessageSenderId,
            speechRate: $this->givenCreateMessageSpeechRate
        );

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);
        $url = str_replace('{appId}', $this->givenMessageApplicationId, self::TFA_TEMPLATES_URL);

        # Test sync method call
        $messageTemplate = $tfaApi->createTfaMessageTemplate($this->givenMessageApplicationId, $request);
        $this->assertCreateTfaMessageTemplate($messageTemplate);
        $this->assertRequestWithHeadersAndJsonBody('POST', $url, $givenRequest, $requestHistoryContainer[0]);

        # Test async method call
        $promise = $tfaApi->createTfaMessageTemplateAsync($this->givenMessageApplicationId, $request);
        $messageTemplateAsync = Utils::unwrap([$promise])[0];
        $this->assertCreateTfaMessageTemplate($messageTemplateAsync);
        $this->assertRequestWithHeadersAndJsonBody('POST', $url, $givenRequest, $requestHistoryContainer[1]);
    }

    public function testGetTfaMessageTemplate()
    {
        $givenResponse = <<<JSON
        {
            "messageId": "$this->givenGetMessageMessageId",
            "applicationId": "$this->givenGetMessageApplicationId",
            "pinPlaceholder": "$this->givenGetMessagePinPlaceholder",
            "messageText": "$this->givenGetMessageMessageText",
            "pinLength": $this->givenGetMessagePinLength,
            "pinType": "$this->givenGetMessagePinType",
            "language": "$this->givenGetMessageLanguage",
            "senderId": "$this->givenGetMessageSenderId",
            "repeatDTMF": "$this->givenGetMessageRepeatDtmf",
            "speechRate": $this->givenGetMessageSpeechRate
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);
        $url = str_replace(array('{appId}', '{msgId}'), array($this->givenGetMessageApplicationId, $this->givenGetMessageMessageId), self::TFA_TEMPLATE_URL);

        # Test sync method call
        $messageTemplate = $tfaApi->getTfaMessageTemplate(
            $this->givenGetMessageApplicationId,
            $this->givenGetMessageMessageId
        );

        $this->assertGetTfaMessageTemplate($messageTemplate);
        $this->assertRequestWithHeaders(
            'GET',
            $url,
            $requestHistoryContainer[0],
            [
                'Accept' => 'application/json'
            ]
        );

        # Test async method call
        $promise = $tfaApi->getTfaMessageTemplateAsync(
            $this->givenGetMessageApplicationId,
            $this->givenGetMessageMessageId
        );

        $messageTemplateAsync = Utils::unwrap([$promise])[0];
        $this->assertGetTfaMessageTemplate($messageTemplateAsync);
        $this->assertRequestWithHeaders(
            'GET',
            $url,
            $requestHistoryContainer[1],
            [
                'Accept' => 'application/json'
            ]
        );
    }

    public function testUpdateTfaMessageTemplate()
    {
        $givenRequest = <<<JSON
        {
            "pinType": "$this->givenUpdateMessagePinType",
            "messageText": "$this->givenUpdateMessageMessageText",
            "pinLength": $this->givenUpdateMessagePinLength,
            "language": "$this->givenUpdateMessageLanguage",
            "senderId": "$this->givenUpdateMessageSenderId",
            "repeatDTMF": "$this->givenUpdateMessageRepeatDtmf",
            "speechRate": $this->givenUpdateMessageSpeechRate
        }
        JSON;

        $givenResponse = <<<JSON
        {
            "messageId": "$this->givenUpdateMessageMessageId",
            "applicationId": "$this->givenUpdateMessageApplicationId",
            "pinPlaceholder": "$this->givenUpdateMessagePinPlaceholder",
            "messageText": "$this->givenUpdateMessageMessageText",
            "pinLength": $this->givenUpdateMessagePinLength,
            "pinType": "$this->givenUpdateMessagePinType",
            "language": "$this->givenUpdateMessageLanguage",
            "senderId": "$this->givenUpdateMessageSenderId",
            "repeatDTMF": "$this->givenUpdateMessageRepeatDtmf",
            "speechRate": $this->givenUpdateMessageSpeechRate
        }
        JSON;

        $requestHistoryContainer = [];
        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $request = (new TfaUpdateMessageRequest())
            ->setRepeatDTMF($this->givenUpdateMessageRepeatDtmf)
            ->setSpeechRate($this->givenUpdateMessageSpeechRate)
            ->setMessageText($this->givenUpdateMessageMessageText)
            ->setPinType(TfaPinType::NUMERIC)
            ->setPinLength($this->givenUpdateMessagePinLength)
            ->setSenderId($this->givenUpdateMessageSenderId)
            ->setLanguage($this->givenUpdateMessageLanguage);

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);
        $url = str_replace(array('{appId}', '{msgId}'), array($this->givenGetMessageApplicationId, $this->givenGetMessageMessageId), self::TFA_TEMPLATE_URL);

        # Test sync method call
        $messageTemplate = $tfaApi->updateTfaMessageTemplate(
            $this->givenUpdateMessageApplicationId,
            $this->givenUpdateMessageMessageId,
            $request
        );

        $this->assertUpdateTfaMessageTemplate($messageTemplate);
        $this->assertRequestWithHeadersAndJsonBody('PUT', $url, $givenRequest, $requestHistoryContainer[0]);

        # Test async method call
        $promise = $tfaApi->updateTfaMessageTemplateAsync(
            $this->givenUpdateMessageApplicationId,
            $this->givenUpdateMessageMessageId,
            $request
        );

        $messageTemplateAsync = Utils::unwrap([$promise])[0];
        $this->assertUpdateTfaMessageTemplate($messageTemplateAsync);
        $this->assertRequestWithHeadersAndJsonBody('PUT', $url, $givenRequest, $requestHistoryContainer[1]);
    }

    public function testCreateTfaEmailMessageTemplate()
    {
        $givenResponse = <<<JSON
        {
          "messageId": "$this->givenCreateEmailMessageId",
          "applicationId": "$this->givenCreateEmailAppId",
          "pinLength": $this->givenCreateEmailPinLength,
          "pinType": "$this->givenCreateEmailPinType",
          "from": "$this->givenCreateEmailFrom",
          "emailTemplateId": $this->givenCreateEmailTemplateId
        }
        JSON;

        $givenRequest = <<<JSON
        {
          "pinType": "$this->givenCreateEmailPinType",
          "pinLength": $this->givenCreateEmailPinLength,
          "from": "$this->givenCreateEmailFrom",
          "emailTemplateId": $this->givenCreateEmailTemplateId
        }
        JSON;


        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $request = new TfaCreateEmailMessageRequest(
            emailTemplateId: $this->givenCreateEmailTemplateId,
            from: $this->givenCreateEmailFrom,
            pinLength: $this->givenCreateEmailPinLength,
            pinType: $this->givenCreateEmailPinType,
        );

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);

        $url = str_replace('{appId}', $this->givenCreateEmailAppId, self::TFA_TEMPLATES_EMAIL_URL);

        # Test sync method call

        $messageTemplate = $tfaApi->createTfaEmailMessageTemplate($this->givenCreateEmailAppId, $request);
        $this->assertCreateTfaEmailMessageTemplate($messageTemplate);
        $this->assertRequestWithHeadersAndJsonBody('POST', $url, $givenRequest, $requestHistoryContainer[0]);

        # Test async method call
        $promise = $tfaApi->createTfaEmailMessageTemplateAsync($this->givenCreateEmailAppId, $request);
        $messageTemplateAsync = Utils::unwrap([$promise])[0];
        $this->assertCreateTfaEmailMessageTemplate($messageTemplateAsync);
        $this->assertRequestWithHeadersAndJsonBody('POST', $url, $givenRequest, $requestHistoryContainer[1]);

    }

    public function testUpdateTfaEmailMessageTemplate()
    {
        $givenResponse = <<<JSON
        {
          "messageId": "$this->givenUpdateEmailMessageId",
          "applicationId": "$this->givenUpdateEmailAppId",
          "pinLength": $this->givenUpdateEmailPinLength,
          "pinType": "$this->givenUpdateEmailPinType",
          "from": "$this->givenUpdateEmailFrom",
          "emailTemplateId": $this->givenUpdateEmailTemplateId
        }
        JSON;

        $givenRequest = <<<JSON
        {
          "pinType": "$this->givenUpdateEmailPinType",
          "pinLength": $this->givenUpdateEmailPinLength,
          "from": "$this->givenUpdateEmailFrom",
          "emailTemplateId": $this->givenUpdateEmailTemplateId
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $request = new TfaUpdateEmailMessageRequest(
            emailTemplateId: $this->givenUpdateEmailTemplateId,
            from: $this->givenUpdateEmailFrom,
            pinLength: $this->givenUpdateEmailPinLength,
            pinType: $this->givenUpdateEmailPinType,
        );

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);

        $url = str_replace(array('{appId}', '{msgId}'), array($this->givenUpdateEmailAppId, $this->givenUpdateEmailMessageId), self::TFA_TEMPLATE_EMAIL_URL);

        # Test sync method call
        $messageTemplate = $tfaApi->updateTfaEmailMessageTemplate($this->givenUpdateEmailAppId, $this->givenUpdateEmailMessageId, $request);
        $this->assertUpdateTfaEmailMessageTemplate($messageTemplate);
        $this->assertRequestWithHeadersAndJsonBody('PUT', $url, $givenRequest, $requestHistoryContainer[0]);

        # Test async method call
        $promise = $tfaApi->updateTfaEmailMessageTemplateAsync($this->givenUpdateEmailAppId, $this->givenUpdateEmailMessageId, $request);
        $messageTemplateAsync = Utils::unwrap([$promise])[0];
        $this->assertUpdateTfaEmailMessageTemplate($messageTemplateAsync);
        $this->assertRequestWithHeadersAndJsonBody('PUT', $url, $givenRequest, $requestHistoryContainer[1]);

    }

    public function testSendTfaPinCodeOverSms()
    {
        $givenResponse = <<<JSON
        {
            "pinId": "$this->givenSendPinOverSmsPinId",
            "to": "$this->givenSendPinOverSmsTo",
            "ncStatus": "$this->givenSendPinOverSmsNcStatus",
            "smsStatus": "$this->givenSendPinOverSmsSmsStatus"
        }
        JSON;

        $expectedRequest = <<<JSON
        {
            "applicationId": "$this->givenSendPinOverSmsApplicationId",
            "messageId": "$this->givenSendPinOverSmsMessageId",
            "from": "$this->givenSendPinOverSmsFrom",
            "to": "$this->givenSendPinOverSmsTo",
            "placeholders": {
                "firstName": "$this->givenSendPinOverSmsPlaceholder"
            }
        }
        JSON;

        $ncNeeded = true;

        $authRequest = new TfaStartAuthenticationRequest(
            applicationId: $this->givenSendPinOverSmsApplicationId,
            messageId: $this->givenSendPinOverSmsMessageId,
            to: $this->givenSendPinOverSmsTo,
            from: $this->givenSendPinOverSmsFrom,
            placeholders: ["firstName" => $this->givenSendPinOverSmsPlaceholder]
        );

        $requestHistoryContainer = [];
        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);
        $url = self::SEND_TFA_PIN_OVER_SMS_URL . "?ncNeeded=true";

        # Test sync method call
        $authResponse = $tfaApi->sendTfaPinCodeOverSms(
            tfaStartAuthenticationRequest: $authRequest,
            ncNeeded: $ncNeeded
        );

        $this->assertSendPinOverSms($authResponse);
        $this->assertRequestWithHeadersAndJsonBody('POST', $url, $expectedRequest, $requestHistoryContainer[0]);

        # Test async method call
        $promise = $tfaApi->sendTfaPinCodeOverSmsAsync(
            tfaStartAuthenticationRequest: $authRequest,
            ncNeeded: $ncNeeded
        );

        $authResponseAsync = Utils::unwrap([$promise])[0];
        $this->assertSendPinOverSms($authResponseAsync);
        $this->assertRequestWithHeadersAndJsonBody('POST', $url, $expectedRequest, $requestHistoryContainer[1]);
    }

    public function testResendTfaPinCodeOverSms()
    {
        $givenResponse = <<<JSON
        {
            "pinId": "$this->givenResendPinOverSmsPinId",
            "to": "$this->givenResendPinOverSmsTo",
            "ncStatus": "$this->givenResendPinOverSmsNcStatus",
            "smsStatus": "$this->givenResendPinOverSmsSmsStatus"
        }
        JSON;

        $expectedRequest = <<<JSON
        {
            "placeholders": {
                "firstName": "$this->givenResendPinOverSmsPlaceholder"
            }
        }
        JSON;

        $resendRequest = new TfaResendPinRequest(
            placeholders: ["firstName" => $this->givenResendPinOverSmsPlaceholder]
        );

        $requestHistoryContainer = [];
        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);
        $url = str_replace("{pinId}", $this->givenResendPinOverSmsPinId, self::RESEND_TFA_PIN_OVER_SMS_URL);

        # Test sync method call
        $authResponse = $tfaApi->resendTfaPinCodeOverSms($this->givenResendPinOverSmsPinId, $resendRequest);
        $this->assertResendPinOverSms($authResponse);
        $this->assertRequestWithHeadersAndJsonBody('POST', $url, $expectedRequest, $requestHistoryContainer[0]);

        # Test async method call
        $promise = $tfaApi->resendTfaPinCodeOverSmsAsync($this->givenResendPinOverSmsPinId, $resendRequest);
        $authResponseAsync = Utils::unwrap([$promise])[0];
        $this->assertResendPinOverSms($authResponseAsync);
        $this->assertRequestWithHeadersAndJsonBody('POST', $url, $expectedRequest, $requestHistoryContainer[1]);
    }

    public function testSendTfaPinCodeOverVoice()
    {
        $givenResponse = <<<JSON
        {
            "pinId": "$this->givenSendPinOverVoicePinId",
            "to": "$this->givenSendPinOverVoiceTo",
            "callStatus": "$this->givenSendPinOverVoiceCallStatus"
        }
        JSON;

        $expectedRequest = <<<JSON
        {
            "applicationId": "$this->givenSendPinOverVoiceApplicationId",
            "messageId": "$this->givenSendPinOverVoiceMessageId",
            "from": "$this->givenSendPinOverVoiceFrom",
            "to": "$this->givenSendPinOverVoiceTo",
            "placeholders": {
                "firstName": "$this->givenSendPinOverVoicePlaceholder"
            }
        }
        JSON;

        $authRequest = new TfaStartAuthenticationRequest(
            applicationId: $this->givenSendPinOverVoiceApplicationId,
            messageId: $this->givenSendPinOverVoiceMessageId,
            to: $this->givenSendPinOverVoiceTo,
            from: $this->givenSendPinOverVoiceFrom,
            placeholders: ["firstName" => $this->givenSendPinOverVoicePlaceholder]
        );

        $requestHistoryContainer = [];
        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);

        # Test sync method call
        $authResponse = $tfaApi->sendTfaPinCodeOverVoice($authRequest);
        $this->assertSendPinOverVoice($authResponse);

        $this->assertRequestWithHeadersAndJsonBody(
            'POST',
            self::SEND_TFA_PIN_OVER_VOICE_URL,
            $expectedRequest,
            $requestHistoryContainer[0]
        );

        # Test async method call
        $promise = $tfaApi->sendTfaPinCodeOverVoiceAsync($authRequest);
        $authResponseAsync = Utils::unwrap([$promise])[0];
        $this->assertSendPinOverVoice($authResponseAsync);

        $this->assertRequestWithHeadersAndJsonBody(
            'POST',
            self::SEND_TFA_PIN_OVER_VOICE_URL,
            $expectedRequest,
            $requestHistoryContainer[1]
        );
    }

    public function testResendTfaPinCodeOverVoice()
    {
        $givenResponse = <<<JSON
        {
            "pinId": "$this->givenResendPinOverVoicePinId",
            "to": "$this->givenResendPinOverVoiceTo",
            "callStatus": "$this->givenResendPinOverVoiceCallStatus"
        }
        JSON;

        $expectedRequest = <<<JSON
        {
            "placeholders": {
                "firstName": "$this->givenResendPinOverVoicePlaceholder"
            }
        }
        JSON;

        $resendRequest = new TfaResendPinRequest(
            placeholders: ["firstName" => $this->givenResendPinOverVoicePlaceholder]
        );

        $requestHistoryContainer = [];
        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);
        $url = str_replace("{pinId}", $this->givenResendPinOverVoicePinId, self::RESEND_TFA_PIN_OVER_VOICE_URL);

        # Test sync method call
        $authResponse = $tfaApi->resendTfaPinCodeOverVoice($this->givenResendPinOverVoicePinId, $resendRequest);
        $this->assertResendPinOverVoice($authResponse);
        $this->assertRequestWithHeadersAndJsonBody('POST', $url, $expectedRequest, $requestHistoryContainer[0]);

        # Test async method call
        $promise = $tfaApi->resendTfaPinCodeOverVoiceAsync($this->givenResendPinOverVoicePinId, $resendRequest);
        $authResponseAsync = Utils::unwrap([$promise])[0];
        $this->assertResendPinOverVoice($authResponseAsync);
        $this->assertRequestWithHeadersAndJsonBody('POST', $url, $expectedRequest, $requestHistoryContainer[1]);
    }

    public function testSendTfaPinCodeOverEmail()
    {
        $givenResponse = <<<JSON
        {
            "pinId": "$this->givenSendPinOverEmailPinId",
            "to": "$this->givenSendPinOverEmailTo",
            "emailStatus": {
              "name": "$this->givenSendPinOverEmailName"
            }
        }
        JSON;

        $expectedRequest = <<<JSON
        {
            "applicationId": "$this->givenSendPinOverEmailApplicationId",
            "messageId": "$this->givenSendPinOverEmailMessageId",
            "to": "$this->givenSendPinOverEmailTo",
            "placeholders": {
                "firstName": "$this->givenSendPinOverEmailPlaceholder"
            }
        }
        JSON;

        $authRequest = new TfaStartEmailAuthenticationRequest(
            applicationId: $this->givenSendPinOverEmailApplicationId,
            messageId: $this->givenSendPinOverEmailMessageId,
            to: $this->givenSendPinOverEmailTo,
            placeholders: ["firstName" => $this->givenSendPinOverEmailPlaceholder]
        );

        $requestHistoryContainer = [];
        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);

        # Test sync method call
        $authResponse = $tfaApi->send2faPinCodeOverEmail($authRequest);
        $this->assertSendPinOverEmail($authResponse);

        $this->assertRequestWithHeadersAndJsonBody(
            'POST',
            self::SEND_TFA_PIN_OVER_EMAIL_URL,
            $expectedRequest,
            $requestHistoryContainer[0]
        );

        # Test async method call
        $promise = $tfaApi->send2faPinCodeOverEmailAsync($authRequest);
        $authResponseAsync = Utils::unwrap([$promise])[0];
        $this->assertSendPinOverEmail($authResponseAsync);

        $this->assertRequestWithHeadersAndJsonBody(
            'POST',
            self::SEND_TFA_PIN_OVER_EMAIL_URL,
            $expectedRequest,
            $requestHistoryContainer[1]
        );
    }

    public function testResendTfaPinCodeOverEmail()
    {
        $givenResponse = <<<JSON
        {
            "pinId": "$this->givenResendPinOverEmailPinId",
            "to": "$this->givenResendPinOverEmailTo",
            "emailStatus": {
              "name": "$this->givenResendPinOverEmailName"
            }
        }
        JSON;

        $expectedRequest = <<<JSON
        {
            "placeholders": {
                "firstName": "$this->givenResendPinOverEmailPlaceholder"
            }
        }
        JSON;

        $resendRequest = new TfaResendPinRequest(
            placeholders: ["firstName" => $this->givenResendPinOverEmailPlaceholder]
        );

        $requestHistoryContainer = [];
        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);
        $url = str_replace("{pinId}", $this->givenResendPinOverEmailPinId, self::RESEND_TFA_PIN_OVER_EMAIL_URL);

        # Test sync method call
        $authResponse = $tfaApi->resend2faPinCodeOverEmail($this->givenResendPinOverEmailPinId, $resendRequest);
        $this->assertResendPinOverEmail($authResponse);
        $this->assertRequestWithHeadersAndJsonBody('POST', $url, $expectedRequest, $requestHistoryContainer[0]);

        # Test async method call
        $promise = $tfaApi->resend2faPinCodeOverEmailAsync($this->givenResendPinOverEmailPinId, $resendRequest);
        $authResponseAsync = Utils::unwrap([$promise])[0];
        $this->assertResendPinOverEmail($authResponseAsync);
        $this->assertRequestWithHeadersAndJsonBody('POST', $url, $expectedRequest, $requestHistoryContainer[1]);
    }

    public function testVerifyPhoneNumber()
    {
        $verifyPhoneNumberVerifiedJson = var_export($this->givenVerifyPhoneNumberVerified, true);

        $givenResponse = <<<JSON
        {
            "pinId": "$this->givenVerifyPhoneNumberPinId",
            "msisdn": "$this->givenVerifyPhoneNumberMsisdn",
            "verified": $verifyPhoneNumberVerifiedJson,
            "attemptsRemaining": $this->givenVerifyPhoneNumberAttemptsRemaining
        }
        JSON;

        $expectedRequest = <<<JSON
        {
            "pin": "$this->givenVerifyPhoneNumberPin"
        }
        JSON;

        $verifyRequest = new TfaVerifyPinRequest(
            pin: $this->givenVerifyPhoneNumberPin
        );

        $requestHistoryContainer = [];
        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);
        $url = str_replace("{pinId}", $this->givenVerifyPhoneNumberPin, self::VERIFY_PIN_URL);

        # Test sync method call
        $verifyResponse = $tfaApi->verifyTfaPhoneNumber($this->givenVerifyPhoneNumberPin, $verifyRequest);
        $this->assertVerifyPhoneNumber($verifyResponse);
        $this->assertRequestWithHeadersAndJsonBody('POST', $url, $expectedRequest, $requestHistoryContainer[0]);

        # Test async method call
        $promise = $tfaApi->verifyTfaPhoneNumberAsync($this->givenVerifyPhoneNumberPin, $verifyRequest);
        $authResponseAsync = Utils::unwrap([$promise])[0];
        $this->assertVerifyPhoneNumber($authResponseAsync);
        $this->assertRequestWithHeadersAndJsonBody('POST', $url, $expectedRequest, $requestHistoryContainer[1]);
    }

    public function testGetTfaVerificationStatus()
    {
        $getVerificationStatusVerifiedJson1 = var_export($this->givenGetVerificationStatusVerified1, true);
        $getVerificationStatusVerifiedJson2 = var_export($this->givenGetVerificationStatusVerified2, true);

        $givenAppId = "16A8B5FE2BCD6CA716A2D780CB3F3390";
        $givenMsisdn = "385717284759547";
        $givenVerified = "false";
        $givenSent = "true";

        $givenVerifiedBool = false;
        $givenSentBool = true;

        $givenResponse = <<<JSON
        {
            "verifications": [
                {
                    "msisdn": "$this->givenGetVerificationStatusMsisdn1",
                    "verified": $getVerificationStatusVerifiedJson1,
                    "verifiedAt": $this->givenGetVerificationStatusVerifiedAt1,
                    "sentAt": $this->givenGetVerificationStatusSentAt1
                },
                {
                    "msisdn": "$this->givenGetVerificationStatusMsisdn2",
                    "verified": $getVerificationStatusVerifiedJson2,
                    "verifiedAt": $this->givenGetVerificationStatusVerifiedAt2,
                    "sentAt": $this->givenGetVerificationStatusSentAt2
                }
            ]
        }
        JSON;

        $requestHistoryContainer = [];
        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $tfaApi = new TfaApi(config: $this->getConfiguration(), client: $client);
        $url = str_replace('{appId}', $givenAppId, self::GET_TFA_VERIFICATION_STATUS_URL);
        $url = $url . sprintf('?msisdn=%s&verified=%s&sent=%s', $givenMsisdn, $givenVerified, $givenSent);

        # Test sync method call
        $verifyResponse = $tfaApi
            ->getTfaVerificationStatus($givenMsisdn, $givenAppId, $givenVerifiedBool, $givenSentBool);

        $verifications = $verifyResponse->getVerifications();
        $this->assertGetVerificationStatus($verifications);
        $this->assertRequestWithHeaders(
            'GET',
            $url,
            $requestHistoryContainer[0],
            [
                'Accept' => 'application/json'
            ]
        );

        # Test async method call
        $promise = $tfaApi
            ->getTfaVerificationStatusAsync($givenMsisdn, $givenAppId, $givenVerifiedBool, $givenSentBool);

        $verifyResponseAsync = Utils::unwrap([$promise])[0];
        $this->assertGetVerificationStatus($verifyResponseAsync->getVerifications());
        $this->assertRequestWithHeaders(
            'GET',
            $url,
            $requestHistoryContainer[1],
            [
                'Accept' => 'application/json'
            ]
        );
    }

    private function assertGetTfaApplications(array $applications)
    {
        $this->assertCount(3, $applications);

        $tfaApplication1 = $applications[0];
        $this->assertSame($this->givenApplicationId1, $tfaApplication1->getApplicationId());
        $this->assertSame($this->givenName1, $tfaApplication1->getName());
        $this->assertSame($this->givenEnabled1, $tfaApplication1->getEnabled());
        $this->assertSame($this->givenPinAttempts1, $tfaApplication1->getConfiguration()->getPinAttempts());
        $this->assertSame($this->givenPinTimeToLive1, $tfaApplication1->getConfiguration()->getPinTimeToLive());

        $this->assertSame(
            $this->givenSendPinPerApplicationLimit1,
            $tfaApplication1->getConfiguration()->getSendPinPerApplicationLimit()
        );

        $this->assertSame(
            $this->givenSendPinPerPhoneNumberLimit1,
            $tfaApplication1->getConfiguration()->getSendPinPerPhoneNumberLimit()
        );

        $this->assertSame(
            $this->givenAllowMultiplePinVerifications1,
            $tfaApplication1->getConfiguration()->getAllowMultiplePinVerifications()
        );

        $tfaApplication2 = $applications[1];
        $this->assertSame($this->givenApplicationId2, $tfaApplication2->getApplicationId());
        $this->assertSame($this->givenName2, $tfaApplication2->getName());
        $this->assertSame($this->givenEnabled2, $tfaApplication2->getEnabled());
        $this->assertSame($this->givenPinAttempts2, $tfaApplication2->getConfiguration()->getPinAttempts());
        $this->assertSame($this->givenPinTimeToLive2, $tfaApplication2->getConfiguration()->getPinTimeToLive());

        $this->assertSame(
            $this->givenSendPinPerApplicationLimit2,
            $tfaApplication2->getConfiguration()->getSendPinPerApplicationLimit()
        );

        $this->assertSame(
            $this->givenSendPinPerPhoneNumberLimit2,
            $tfaApplication2->getConfiguration()->getSendPinPerPhoneNumberLimit()
        );

        $this->assertSame(
            $this->givenAllowMultiplePinVerifications2,
            $tfaApplication2->getConfiguration()->getAllowMultiplePinVerifications()
        );

        $tfaApplication3 = $applications[2];
        $this->assertSame($this->givenApplicationId3, $tfaApplication3->getApplicationId());
        $this->assertSame($this->givenName3, $tfaApplication3->getName());
        $this->assertSame($this->givenEnabled3, $tfaApplication3->getEnabled());
        $this->assertSame($this->givenPinAttempts3, $tfaApplication3->getConfiguration()->getPinAttempts());
        $this->assertSame($this->givenPinTimeToLive3, $tfaApplication3->getConfiguration()->getPinTimeToLive());

        $this->assertSame(
            $this->givenSendPinPerApplicationLimit3,
            $tfaApplication3->getConfiguration()->getSendPinPerApplicationLimit()
        );

        $this->assertSame(
            $this->givenSendPinPerPhoneNumberLimit3,
            $tfaApplication3->getConfiguration()->getSendPinPerPhoneNumberLimit()
        );

        $this->assertSame(
            $this->givenAllowMultiplePinVerifications3,
            $tfaApplication3->getConfiguration()->getAllowMultiplePinVerifications()
        );
    }

    private function assertCreateTfaApplication(
        TfaApplicationResponse $application,
        TfaApplicationConfiguration $givenConfiguration
    ) {
        $this->assertNotNull($application);
        $this->assertEquals($this->givenCreateApplicationApplicationId, $application->getApplicationId());
        $this->assertEquals($this->givenCreateApplicationName, $application->getName());
        $this->assertEquals($this->givenCreateApplicationEnabled, $application->getEnabled());
        $this->assertEquals($givenConfiguration, $application->getConfiguration());
    }

    private function assertGetApplication(TfaApplicationResponse $application)
    {
        $this->assertNotNull($application);
        $this->assertSame($this->givenGetApplicationApplicationId, $application->getApplicationId());
        $this->assertSame($this->givenGetApplicationName, $application->getName());
        $this->assertSame($this->givenGetApplicationEnabled, $application->getEnabled());
        $this->assertSame($this->givenGetApplicationPinAttempts, $application->getConfiguration()->getPinAttempts());

        $this->assertSame(
            $this->givenGetApplicationAllowMultiplePinVerifications,
            $application->getConfiguration()->getAllowMultiplePinVerifications()
        );

        $this->assertSame(
            $this->givenGetApplicationPinTimeToLive,
            $application->getConfiguration()->getPinTimeToLive()
        );

        $this->assertSame(
            $this->givenGetApplicationVerifyPinLimit,
            $application->getConfiguration()->getVerifyPinLimit()
        );

        $this->assertSame(
            $this->givenGetApplicationSendPinPerApplicationLimit,
            $application->getConfiguration()->getSendPinPerApplicationLimit()
        );

        $this->assertSame(
            $this->givenGetApplicationSendPinPerPhoneNumberLimit,
            $application->getConfiguration()->getSendPinPerPhoneNumberLimit()
        );
    }

    private function assertUpdateApplication(TfaApplicationResponse $application)
    {
        $this->assertNotNull($application);
        $this->assertSame($this->givenUpdateApplicationApplicationId, $application->getApplicationId());
        $this->assertSame($this->givenUpdateApplicationName, $application->getName());
        $this->assertSame($this->givenUpdateApplicationEnabled, $application->getEnabled());
        $this->assertSame($this->givenUpdateApplicationPinAttempts, $application->getConfiguration()->getPinAttempts());

        $this->assertSame(
            $this->givenUpdateApplicationAllowMultiplePinVerifications,
            $application->getConfiguration()->getAllowMultiplePinVerifications()
        );

        $this->assertSame(
            $this->givenUpdateApplicationPinTimeToLive,
            $application->getConfiguration()->getPinTimeToLive()
        );

        $this->assertSame(
            $this->givenUpdateApplicationVerifyPinLimit,
            $application->getConfiguration()->getVerifyPinLimit()
        );

        $this->assertSame(
            $this->givenUpdateApplicationSendPinPerApplicationLimit,
            $application->getConfiguration()->getSendPinPerApplicationLimit()
        );

        $this->assertSame(
            $this->givenUpdateApplicationSendPinPerPhoneNumberLimit,
            $application->getConfiguration()->getSendPinPerPhoneNumberLimit()
        );
    }

    private function assertGetTfaMessageTemplates(array $tfaMessageTemplates)
    {
        $this->assertCount(2, $tfaMessageTemplates);
        $messageTemplate = $tfaMessageTemplates[0];
        $this->assertSame($this->givenMessageId1, $messageTemplate->getMessageId());
        $this->assertSame($this->givenMessageApplicationId, $messageTemplate->getApplicationId());
        $this->assertSame($this->givenMessagePinPlaceholder1, $messageTemplate->getPinPlaceholder());
        $this->assertSame($this->givenMessageMessageText1, $messageTemplate->getMessageText());
        $this->assertSame($this->givenMessagePinLength1, $messageTemplate->getPinLength());
        $this->assertSame($this->givenMessagePinType1, (string)$messageTemplate->getPinType());
        $this->assertSame($this->givenMessageLanguage1, (string)$messageTemplate->getLanguage());
        $this->assertSame($this->givenMessageRepeatDtmf1, $messageTemplate->getRepeatDtmf());
        $this->assertSame((float)$this->givenMessageSpeechRate1, $messageTemplate->getSpeechRate());

        $messageTemplate = $tfaMessageTemplates[1];
        $this->assertSame($this->givenMessageId2, $messageTemplate->getMessageId());
        $this->assertSame($this->givenMessageApplicationId, $messageTemplate->getApplicationId());
        $this->assertSame($this->givenMessagePinPlaceholder2, $messageTemplate->getPinPlaceholder());
        $this->assertSame($this->givenMessageMessageText2, $messageTemplate->getMessageText());
        $this->assertSame($this->givenMessagePinLength2, $messageTemplate->getPinLength());
        $this->assertSame($this->givenMessagePinType2, (string)$messageTemplate->getPinType());
        $this->assertSame($this->givenMessageRepeatDtmf2, $messageTemplate->getRepeatDtmf());
        $this->assertSame($this->givenMessageSpeechRate2, $messageTemplate->getSpeechRate());
    }

    private function assertCreateTfaMessageTemplate(TfaMessage $messageTemplate)
    {
        $this->assertNotNull($messageTemplate);
        $this->assertSame($this->givenCreateMessagePinType, (string)$messageTemplate->getPinType());
        $this->assertSame($this->givenCreateMessageMessageText, $messageTemplate->getMessageText());
        $this->assertSame($this->givenCreateMessagePinPlaceholder, $messageTemplate->getPinPlaceholder());
        $this->assertSame($this->givenCreateMessagePinLength, $messageTemplate->getPinLength());
        $this->assertSame($this->givenCreateMessageRepeatDtmf, $messageTemplate->getRepeatDTMF());
        $this->assertSame($this->givenCreateMessageSenderId, $messageTemplate->getSenderId());
        $this->assertSame($this->givenCreateMessageLanguage, (string)$messageTemplate->getLanguage());
        $this->assertSame((float)$this->givenCreateMessageSpeechRate, $messageTemplate->getSpeechRate());
    }

    private function assertGetTfaMessageTemplate(TfaMessage $messageTemplate)
    {
        $this->assertNotNull($messageTemplate);
        $this->assertSame($this->givenGetMessagePinType, (string)$messageTemplate->getPinType());
        $this->assertSame($this->givenGetMessageMessageText, $messageTemplate->getMessageText());
        $this->assertSame($this->givenGetMessagePinPlaceholder, $messageTemplate->getPinPlaceholder());
        $this->assertSame($this->givenGetMessagePinLength, $messageTemplate->getPinLength());
        $this->assertSame($this->givenGetMessageRepeatDtmf, $messageTemplate->getRepeatDTMF());
        $this->assertSame($this->givenGetMessageSenderId, $messageTemplate->getSenderId());
        $this->assertSame($this->givenGetMessageLanguage, (string)$messageTemplate->getLanguage());
        $this->assertSame((float)$this->givenGetMessageSpeechRate, $messageTemplate->getSpeechRate());
    }

    private function assertUpdateTfaMessageTemplate(TfaMessage $messageTemplate)
    {
        $this->assertNotNull($messageTemplate);
        $this->assertSame($this->givenUpdateMessagePinType, (string)$messageTemplate->getPinType());
        $this->assertSame($this->givenUpdateMessageMessageText, $messageTemplate->getMessageText());
        $this->assertSame($this->givenUpdateMessagePinPlaceholder, $messageTemplate->getPinPlaceholder());
        $this->assertSame($this->givenUpdateMessagePinLength, $messageTemplate->getPinLength());
        $this->assertSame($this->givenUpdateMessageRepeatDtmf, $messageTemplate->getRepeatDTMF());
        $this->assertSame($this->givenUpdateMessageSenderId, $messageTemplate->getSenderId());
        $this->assertSame($this->givenUpdateMessageLanguage, (string)$messageTemplate->getLanguage());
        $this->assertSame((float)$this->givenUpdateMessageSpeechRate, $messageTemplate->getSpeechRate());
    }

    private function assertCreateTfaEmailMessageTemplate(TfaEmailMessage $messageTemplate)
    {
        $this->assertNotNull($messageTemplate);
        $this->assertSame($this->givenCreateEmailMessageId, $messageTemplate->getMessageId());
        $this->assertSame($this->givenCreateEmailAppId, $messageTemplate->getApplicationId());
        $this->assertSame($this->givenCreateEmailPinLength, $messageTemplate->getPinLength());
        $this->assertSame($this->givenCreateEmailPinType, (string)$messageTemplate->getPinType());
        $this->assertSame($this->givenCreateEmailFrom, $messageTemplate->getFrom());
        $this->assertSame($this->givenCreateEmailTemplateId, $messageTemplate->getEmailTemplateId());

    }

    private function assertUpdateTfaEmailMessageTemplate(TfaEmailMessage $messageTemplate)
    {
        $this->assertNotNull($messageTemplate);
        $this->assertSame($this->givenUpdateEmailMessageId, $messageTemplate->getMessageId());
        $this->assertSame($this->givenUpdateEmailAppId, $messageTemplate->getApplicationId());
        $this->assertSame($this->givenUpdateEmailPinLength, $messageTemplate->getPinLength());
        $this->assertSame($this->givenUpdateEmailPinType, (string)$messageTemplate->getPinType());
        $this->assertSame($this->givenUpdateEmailFrom, $messageTemplate->getFrom());
        $this->assertSame($this->givenUpdateEmailTemplateId, $messageTemplate->getEmailTemplateId());
    }

    private function assertSendPinOverSms(TfaStartAuthenticationResponse $authResponse)
    {
        $this->assertNotNull($authResponse);
        $this->assertSame($this->givenSendPinOverSmsNcStatus, $authResponse->getNcStatus());
        $this->assertSame($this->givenSendPinOverSmsPinId, $authResponse->getPinId());
        $this->assertSame($this->givenSendPinOverSmsSmsStatus, $authResponse->getSmsStatus());
        $this->assertSame($this->givenSendPinOverSmsTo, $authResponse->getTo());
    }

    private function assertResendPinOverSms(TfaStartAuthenticationResponse $authResponse)
    {
        $this->assertNotNull($authResponse);
        $this->assertSame($this->givenSendPinOverSmsNcStatus, $authResponse->getNcStatus());
        $this->assertSame($this->givenSendPinOverSmsPinId, $authResponse->getPinId());
        $this->assertSame($this->givenSendPinOverSmsSmsStatus, $authResponse->getSmsStatus());
        $this->assertSame($this->givenSendPinOverSmsTo, $authResponse->getTo());
    }

    private function assertSendPinOverVoice(TfaStartAuthenticationResponse $authResponse)
    {
        $this->assertNotNull($authResponse);
        $this->assertSame($this->givenSendPinOverVoicePinId, $authResponse->getPinId());
        $this->assertSame($this->givenSendPinOverVoiceCallStatus, $authResponse->getCallStatus());
        $this->assertSame($this->givenSendPinOverVoiceTo, $authResponse->getTo());
    }

    private function assertResendPinOverVoice(TfaStartAuthenticationResponse $authResponse)
    {
        $this->assertNotNull($authResponse);
        $this->assertSame($this->givenResendPinOverVoicePinId, $authResponse->getPinId());
        $this->assertSame($this->givenResendPinOverVoiceCallStatus, $authResponse->getCallStatus());
        $this->assertSame($this->givenResendPinOverVoiceTo, $authResponse->getTo());
    }

    private function assertSendPinOverEmail(TfaStartEmailAuthenticationResponse $authResponse)
    {
        $this->assertNotNull($authResponse);
        $this->assertSame($this->givenSendPinOverEmailPinId, $authResponse->getPinId());
        $this->assertSame($this->givenSendPinOverEmailName, $authResponse->getEmailStatus()->getName());
        $this->assertSame($this->givenSendPinOverEmailTo, $authResponse->getTo());
    }

    private function assertResendPinOverEmail(TfaStartEmailAuthenticationResponse $authResponse)
    {
        $this->assertNotNull($authResponse);
        $this->assertSame($this->givenResendPinOverEmailPinId, $authResponse->getPinId());
        $this->assertSame($this->givenResendPinOverEmailName, $authResponse->getEmailStatus()->getName());
        $this->assertSame($this->givenResendPinOverEmailTo, $authResponse->getTo());
    }

    private function assertVerifyPhoneNumber(TfaVerifyPinResponse $verifyResponse)
    {
        $this->assertNotNull($verifyResponse);
        $this->assertSame($this->givenVerifyPhoneNumberPinId, $verifyResponse->getPinId());
        $this->assertSame($this->givenVerifyPhoneNumberMsisdn, $verifyResponse->getMsisdn());
        $this->assertSame($this->givenVerifyPhoneNumberVerified, $verifyResponse->getVerified());
        $this->assertSame($this->givenVerifyPhoneNumberAttemptsRemaining, $verifyResponse->getAttemptsRemaining());
    }

    private function assertGetVerificationStatus(array $verifications)
    {
        $this->assertCount(2, $verifications);

        $verification = $verifications[0];
        $this->assertSame($this->givenGetVerificationStatusMsisdn1, $verification->getMsisdn());
        $this->assertSame($this->givenGetVerificationStatusVerified1, $verification->getVerified());
        $this->assertSame($this->givenGetVerificationStatusVerifiedAt1, $verification->getVerifiedAt());
        $this->assertSame($this->givenGetVerificationStatusSentAt1, $verification->getSentAt());

        $verification = $verifications[1];
        $this->assertSame($this->givenGetVerificationStatusMsisdn2, $verification->getMsisdn());
        $this->assertSame($this->givenGetVerificationStatusVerified2, $verification->getVerified());
        $this->assertSame($this->givenGetVerificationStatusVerifiedAt2, $verification->getVerifiedAt());
        $this->assertSame($this->givenGetVerificationStatusSentAt2, $verification->getSentAt());
    }
}
