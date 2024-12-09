<?php

// phpcs:ignorefile

declare(strict_types=1);

namespace Infobip\Test\Api\WebRtc;

use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Response;
use Infobip\Api\WebRtcApi;
use Infobip\Model\WebRtcAndroidPushNotificationConfig;
use Infobip\Model\WebRtcCapabilities;
use Infobip\Model\WebRtcFilePageResponse;
use Infobip\Model\WebRtcFileResponse;
use Infobip\Model\WebRtcPushConfigurationPageResponse;
use Infobip\Model\WebRtcPushConfigurationRequest;
use Infobip\Model\WebRtcPushConfigurationResponse;
use Infobip\Model\WebRtcTokenRequestModel;
use Infobip\Model\WebRtcTokenResponseModel;
use Infobip\Test\Api\ApiTestBase;

class WebRtcApiTest extends ApiTestBase
{
    private const string GENERATE_WEB_RTC_TOKEN = "/webrtc/1/token";
    private const string GET_PUSH_CONFIGURATIONS = "/webrtc/1/webrtc-push-config";
    private const string SAVE_PUSH_CONFIGURATION = "/webrtc/1/webrtc-push-config";
    private const string GET_PUSH_CONFIGURATION = "/webrtc/1/webrtc-push-config/{id}";
    private const string UPDATE_PUSH_CONFIGURATION = "/webrtc/1/webrtc-push-config/{id}";
    private const string PATCH_PUSH_CONFIGURATION = "/webrtc/1/webrtc-push-config/{id}";
    private const string DELETE_PUSH_CONFIGURATION = "/webrtc/1/webrtc-push-config/{id}";
    private const string GET_FILES = "/webrtc/1/files";
    private const string GET_FILE = "/webrtc/1/files/{id}";
    private const string DELETE_FILE = "/webrtc/1/files/{id}";

    public function testGenerateWebrtcToken(): void
    {
        $givenResponse = <<<JSON
        {
            "token": "token",
            "expirationTime": "2020-01-17T19:50:38.488589Z"
        }
        JSON;

        $expectedRequest = <<<JSON
        {
            "timeToLive" : 0,
            "capabilities" : {
                "recording" : "ALWAYS"
            },
            "identity" : "identity",
            "displayName" : "displayName"
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

        $api = new WebRtcApi($this->getConfiguration(), client: $client);

        $request = new WebRtcTokenRequestModel(
            identity: "identity",
            displayName: "displayName",
            capabilities: new WebRtcCapabilities(
                recording: "ALWAYS"
            ),
            timeToLive: 0
        );

        // Test sync method call
        $webrtcResponse = $api->generateWebrtcToken($request);
        $this->assertInstanceOf(WebRtcTokenResponseModel::class, $webrtcResponse);
        $this->assertEquals($this->getObjectSerializer()->deserialize($givenResponse, WebRtcTokenResponseModel::class), $webrtcResponse);

        $this->assertRequestWithHeadersAndJsonBody(
            'POST',
            self::GENERATE_WEB_RTC_TOKEN,
            $expectedRequest,
            $requestHistoryContainer[0]
        );

        // Test async method call
        $promise = $api->generateWebrtcTokenAsync($request);
        $webrtcResponseAsync = \GuzzleHttp\Promise\Utils::unwrap([$promise])[0];
        $this->assertInstanceOf(WebRtcTokenResponseModel::class, $webrtcResponseAsync);
        $this->assertEquals($this->getObjectSerializer()->deserialize($givenResponse, WebRtcTokenResponseModel::class), $webrtcResponseAsync);

        $this->assertRequestWithHeadersAndJsonBody(
            'POST',
            self::GENERATE_WEB_RTC_TOKEN,
            $expectedRequest,
            $requestHistoryContainer[1]
        );
    }

    public function testGetPushConfigurations(): void
    {
        $givenPage = 0;
        $givenSize = 2;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "id": "454d142b-a1ad-239a-d231-227fa335aadc3",
              "applicationId": "prod-application",
              "name": "Android Push Config Production",
              "androidConfigured": true,
              "iosConfigured": false
            },
            {
              "id": "894c822b-d7ba-439c-a761-141f591cace7",
              "applicationId": "test-application",
              "name": "Test Push Config",
              "androidConfigured": true,
              "iosConfigured": true
            }
          ],
          "pageInfo": {
            "page": 0,
            "size": 2,
            "totalPages": 1,
            "totalResults": 2
          }
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

        $api = new WebRtcApi($this->getConfiguration(), client: $client);

        $expectedPath = self::GET_PUSH_CONFIGURATIONS
            . "?"
            . Query::build(
                [
                    'page' => $givenPage,
                    'size' => $givenSize
                ]
            );

        // Test sync method call
        $pushConfigurationsResponse = $api->getPushConfigurations(page: $givenPage, size: $givenSize);
        $this->assertInstanceOf(WebRtcPushConfigurationPageResponse::class, $pushConfigurationsResponse);
        $this->assertEquals($this->getObjectSerializer()->deserialize($givenResponse, WebRtcPushConfigurationPageResponse::class), $pushConfigurationsResponse);

        $this->assertRequestWithHeaders(
            'GET',
            $expectedPath,
            $requestHistoryContainer[0],
            [
                'Accept' => 'application/json'
            ]
        );

        // Test async method call
        $promise = $api->getPushConfigurationsAsync(page: $givenPage, size: $givenSize);
        $pushConfigurationsResponseAsync = \GuzzleHttp\Promise\Utils::unwrap([$promise])[0];
        $this->assertInstanceOf(WebRtcPushConfigurationPageResponse::class, $pushConfigurationsResponseAsync);
        $this->assertEquals($this->getObjectSerializer()->deserialize($givenResponse, WebRtcPushConfigurationPageResponse::class), $pushConfigurationsResponseAsync);

        $this->assertRequestWithHeaders(
            'GET',
            $expectedPath,
            $requestHistoryContainer[1],
            [
                'Accept' => 'application/json'
            ]
        );
    }

    public function testSavePushConfiguration(): void
    {
        $givenRequest = <<<JSON
    {
      "applicationId": "prod-application",
      "name": "Android Push Config Production",
      "android": {
        "privateKeyJson": "{\"type\":\"service_account\",\"project_id\":\"PROJECT_ID\",\"private_key_id\":\"PRIVATE_KEY_ID\",\"private_key\":\"PRIVATE_KEY\",\"client_email\":\"FIREBASE_ADMIN_SDK_EMAIL\",\"client_id\":\"CLIENT_ID\",\"auth_uri\":\"https://accounts.google.com/o/oauth2/auth\",\"token_uri\":\"https://oauth2.googleapis.com/token\",\"auth_provider_x509_cert_url\":\"https://www.googleapis.com/oauth2/v1/certs\",\"client_x509_cert_url\":\"CLIENT_X509_CERT_URL\"}"
      }
    }
    JSON;

        $givenResponse = <<<JSON
    {
      "id": "454d142b-a1ad-239a-d231-227fa335aadc3",
      "applicationId": "prod-application",
      "name": "Android Push Config Production",
      "androidConfigured": true,
      "iosConfigured": false
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

        $api = new WebRtcApi($this->getConfiguration(), client: $client);

        $request = new WebRtcPushConfigurationRequest(
            applicationId: "prod-application",
            name: "Android Push Config Production",
            android: new WebRtcAndroidPushNotificationConfig(
                privateKeyJson: "{\"type\":\"service_account\",\"project_id\":\"PROJECT_ID\",\"private_key_id\":\"PRIVATE_KEY_ID\",\"private_key\":\"PRIVATE_KEY\",\"client_email\":\"FIREBASE_ADMIN_SDK_EMAIL\",\"client_id\":\"CLIENT_ID\",\"auth_uri\":\"https://accounts.google.com/o/oauth2/auth\",\"token_uri\":\"https://oauth2.googleapis.com/token\",\"auth_provider_x509_cert_url\":\"https://www.googleapis.com/oauth2/v1/certs\",\"client_x509_cert_url\":\"CLIENT_X509_CERT_URL\"}"
            )
        );

        // Test sync method call
        $pushConfigResponse = $api->savePushConfiguration($request);
        $this->assertInstanceOf(WebRtcPushConfigurationResponse::class, $pushConfigResponse);
        $this->assertEquals($this->getObjectSerializer()->deserialize($givenResponse, WebRtcPushConfigurationResponse::class), $pushConfigResponse);

        $this->assertRequestWithHeadersAndJsonBody(
            'POST',
            self::SAVE_PUSH_CONFIGURATION,
            $givenRequest,
            $requestHistoryContainer[0]
        );

        // Test async method call
        $promise = $api->savePushConfigurationAsync($request);
        $pushConfigResponseAsync = \GuzzleHttp\Promise\Utils::unwrap([$promise])[0];
        $this->assertInstanceOf(WebRtcPushConfigurationResponse::class, $pushConfigResponseAsync);
        $this->assertEquals($this->getObjectSerializer()->deserialize($givenResponse, WebRtcPushConfigurationResponse::class), $pushConfigResponseAsync);

        $this->assertRequestWithHeadersAndJsonBody(
            'POST',
            self::SAVE_PUSH_CONFIGURATION,
            $givenRequest,
            $requestHistoryContainer[1]
        );
    }

    public function testGetPushConfiguration(): void
    {
        $givenId = "454d142b-a1ad-239a-d231-227fa335aadc3";

        $givenResponse = <<<JSON
        {
          "id": "454d142b-a1ad-239a-d231-227fa335aadc3",
          "applicationId": "prod-application",
          "name": "Android Push Config Production",
          "androidConfigured": true,
          "iosConfigured": false
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

        $api = new WebRtcApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{id}", $givenId, self::GET_PUSH_CONFIGURATION);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getPushConfiguration($givenId),
            fn () => $api->getPushConfigurationAsync($givenId),
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcPushConfigurationResponse::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );


    }

    public function testUpdatePushConfiguration(): void
    {
        $givenId = "454d142b-a1ad-239a-d231-227fa335aadc3";

        $givenRequest = <<<JSON
    {
      "applicationId": "prod-application",
      "name": "Android Push Config Production",
      "android": {
        "privateKeyJson": "{\"type\":\"service_account\",\"project_id\":\"PROJECT_ID\",\"private_key_id\":\"PRIVATE_KEY_ID\",\"private_key\":\"PRIVATE_KEY\",\"client_email\":\"FIREBASE_ADMIN_SDK_EMAIL\",\"client_id\":\"CLIENT_ID\",\"auth_uri\":\"https://accounts.google.com/o/oauth2/auth\",\"token_uri\":\"https://oauth2.googleapis.com/token\",\"auth_provider_x509_cert_url\":\"https://www.googleapis.com/oauth2/v1/certs\",\"client_x509_cert_url\":\"CLIENT_X509_CERT_URL\"}"
      }
    }
    JSON;

        $givenResponse = <<<JSON
    {
      "id": "454d142b-a1ad-239a-d231-227fa335aadc3",
      "applicationId": "prod-application",
      "name": "Android Push Config Production",
      "androidConfigured": true,
      "iosConfigured": false
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

        $api = new WebRtcApi($this->getConfiguration(), client: $client);

        $request = new WebRtcPushConfigurationRequest(
            applicationId: "prod-application",
            name: "Android Push Config Production",
            android: new WebRtcAndroidPushNotificationConfig(
                privateKeyJson: "{\"type\":\"service_account\",\"project_id\":\"PROJECT_ID\",\"private_key_id\":\"PRIVATE_KEY_ID\",\"private_key\":\"PRIVATE_KEY\",\"client_email\":\"FIREBASE_ADMIN_SDK_EMAIL\",\"client_id\":\"CLIENT_ID\",\"auth_uri\":\"https://accounts.google.com/o/oauth2/auth\",\"token_uri\":\"https://oauth2.googleapis.com/token\",\"auth_provider_x509_cert_url\":\"https://www.googleapis.com/oauth2/v1/certs\",\"client_x509_cert_url\":\"CLIENT_X509_CERT_URL\"}"
            )
        );

        $expectedPath = str_replace("{id}", $givenId, self::UPDATE_PUSH_CONFIGURATION);

        // Test sync method call
        $pushConfigResponse = $api->updatePushConfiguration($givenId, $request);
        $this->assertInstanceOf(WebRtcPushConfigurationResponse::class, $pushConfigResponse);
        $this->assertEquals($this->getObjectSerializer()->deserialize($givenResponse, WebRtcPushConfigurationResponse::class), $pushConfigResponse);

        $this->assertRequestWithHeadersAndJsonBody(
            'PUT',
            $expectedPath,
            $givenRequest,
            $requestHistoryContainer[0]
        );

        // Test async method call
        $promise = $api->updatePushConfigurationAsync($givenId, $request);
        $pushConfigResponseAsync = \GuzzleHttp\Promise\Utils::unwrap([$promise])[0];
        $this->assertInstanceOf(WebRtcPushConfigurationResponse::class, $pushConfigResponseAsync);
        $this->assertEquals($this->getObjectSerializer()->deserialize($givenResponse, WebRtcPushConfigurationResponse::class), $pushConfigResponseAsync);

        $this->assertRequestWithHeadersAndJsonBody(
            'PUT',
            $expectedPath,
            $givenRequest,
            $requestHistoryContainer[1]
        );
    }

    public function testPatchPushConfiguration(): void
    {
        $givenId = "454d142b-a1ad-239a-d231-227fa335aadc3";

        $givenRequest = <<<JSON
    {
      "applicationId": "prod-application",
      "name": "Android Push Config Production",
      "android": {
        "privateKeyJson": "{\"type\":\"service_account\",\"project_id\":\"PROJECT_ID\",\"private_key_id\":\"PRIVATE_KEY_ID\",\"private_key\":\"PRIVATE_KEY\",\"client_email\":\"FIREBASE_ADMIN_SDK_EMAIL\",\"client_id\":\"CLIENT_ID\",\"auth_uri\":\"https://accounts.google.com/o/oauth2/auth\",\"token_uri\":\"https://oauth2.googleapis.com/token\",\"auth_provider_x509_cert_url\":\"https://www.googleapis.com/oauth2/v1/certs\",\"client_x509_cert_url\":\"CLIENT_X509_CERT_URL\"}"
      }
    }
    JSON;

        $givenResponse = <<<JSON
    {
      "id": "454d142b-a1ad-239a-d231-227fa335aadc3",
      "applicationId": "prod-application",
      "name": "Android Push Config Production",
      "androidConfigured": true,
      "iosConfigured": false
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

        $api = new WebRtcApi($this->getConfiguration(), client: $client);

        $request = new WebRtcPushConfigurationRequest(
            applicationId: "prod-application",
            name: "Android Push Config Production",
            android: new WebRtcAndroidPushNotificationConfig(
                privateKeyJson: "{\"type\":\"service_account\",\"project_id\":\"PROJECT_ID\",\"private_key_id\":\"PRIVATE_KEY_ID\",\"private_key\":\"PRIVATE_KEY\",\"client_email\":\"FIREBASE_ADMIN_SDK_EMAIL\",\"client_id\":\"CLIENT_ID\",\"auth_uri\":\"https://accounts.google.com/o/oauth2/auth\",\"token_uri\":\"https://oauth2.googleapis.com/token\",\"auth_provider_x509_cert_url\":\"https://www.googleapis.com/oauth2/v1/certs\",\"client_x509_cert_url\":\"CLIENT_X509_CERT_URL\"}"
            )
        );

        $expectedPath = str_replace("{id}", $givenId, self::PATCH_PUSH_CONFIGURATION);

        // Test sync method call
        $pushConfigResponse = $api->patchPushConfiguration($givenId, $request);
        $this->assertInstanceOf(WebRtcPushConfigurationResponse::class, $pushConfigResponse);
        $this->assertEquals($this->getObjectSerializer()->deserialize($givenResponse, WebRtcPushConfigurationResponse::class), $pushConfigResponse);

        $this->assertRequestWithHeadersAndJsonBody(
            'PATCH',
            $expectedPath,
            $givenRequest,
            $requestHistoryContainer[0]
        );

        // Test async method call
        $promise = $api->patchPushConfigurationAsync($givenId, $request);
        $pushConfigResponseAsync = \GuzzleHttp\Promise\Utils::unwrap([$promise])[0];
        $this->assertInstanceOf(WebRtcPushConfigurationResponse::class, $pushConfigResponseAsync);
        $this->assertEquals($this->getObjectSerializer()->deserialize($givenResponse, WebRtcPushConfigurationResponse::class), $pushConfigResponseAsync);

        $this->assertRequestWithHeadersAndJsonBody(
            'PATCH',
            $expectedPath,
            $givenRequest,
            $requestHistoryContainer[1]
        );
    }

    public function testDeletePushConfiguration(): void
    {
        $givenId = "454d142b-a1ad-239a-d231-227fa335aadc3";

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders),
                new Response(200, $this->givenRequestHeaders),
            ],
            $requestHistoryContainer
        );

        $api = new WebRtcApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{id}", $givenId, self::DELETE_PUSH_CONFIGURATION);

        // Test sync method call
        $api->deletePushConfiguration($givenId);
        $this->assertRequestWithHeaders(
            'DELETE',
            $expectedPath,
            $requestHistoryContainer[0],
            [
                'Accept' => 'application/json'
            ]
        );

        // Test async method call
        $promise = $api->deletePushConfigurationAsync($givenId);
        \GuzzleHttp\Promise\Utils::unwrap([$promise]);
        $this->assertRequestWithHeaders(
            'DELETE',
            $expectedPath,
            $requestHistoryContainer[1],
            [
                'Accept' => 'application/json'
            ]
        );
    }

    public function testGetFiles(): void
    {
        $givenPage = 0;
        $givenSize = 1;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "id": "5f4e8861-8ed7-4521-b8c8-f26346726716",
              "name": "5f4e8861-8ed7-4521-b8c8-f26346726716_alice_1680266280000.png",
              "fileFormat": "PNG",
              "size": 10780,
              "creationTime": "2023-03-31T12:38:00.000+00:00"
            }
          ],
          "pageInfo": {
            "page": 0,
            "size": 1,
            "totalPages": 1,
            "totalResults": 1
          }
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

        $api = new WebRtcApi($this->getConfiguration(), client: $client);

        $expectedPath = self::GET_FILES
            . "?"
            . Query::build(
                [
                    "page" => $givenPage,
                    "size" => $givenSize
                ]
            );

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getFiles(page: $givenPage, size: $givenSize),
            fn () => $api->getFilesAsync(page: $givenPage, size: $givenSize),
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcFilePageResponse::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );


    }

    public function testGetFile(): void
    {
        $givenId = "5f4e8861-8ed7-4521-b8c8-f26346726716";

        $givenResponse = <<<JSON
        {
          "id": "5f4e8861-8ed7-4521-b8c8-f26346726716",
          "name": "5f4e8861-8ed7-4521-b8c8-f26346726716_alice_1680266280000.png",
          "fileFormat": "PNG",
          "size": 10780,
          "creationTime": "2023-03-31T12:38:00.000+00:00"
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

        $api = new WebRtcApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{id}", $givenId, self::GET_FILE);

        // Test sync method call
        $fileResponse = $api->getFile($givenId);
        $this->assertInstanceOf(WebRtcFileResponse::class, $fileResponse);
        $this->assertEquals($this->getObjectSerializer()->deserialize($givenResponse, WebRtcFileResponse::class), $fileResponse);

        $this->assertRequestWithHeaders(
            'GET',
            $expectedPath,
            $requestHistoryContainer[0],
            [
                'Accept' => 'application/json'
            ]
        );

        // Test async method call
        $promise = $api->getFileAsync($givenId);
        $fileResponseAsync = \GuzzleHttp\Promise\Utils::unwrap([$promise])[0];
        $this->assertInstanceOf(WebRtcFileResponse::class, $fileResponseAsync);
        $this->assertEquals($this->getObjectSerializer()->deserialize($givenResponse, WebRtcFileResponse::class), $fileResponseAsync);

        $this->assertRequestWithHeaders(
            'GET',
            $expectedPath,
            $requestHistoryContainer[1],
            [
                'Accept' => 'application/json'
            ]
        );
    }

    public function testDeleteFile(): void
    {
        $givenId = "5f4e8861-8ed7-4521-b8c8-f26346726716";

        $givenResponse = <<<JSON
        {
          "id": "5f4e8861-8ed7-4521-b8c8-f26346726716",
          "name": "5f4e8861-8ed7-4521-b8c8-f26346726716_alice_1680266280000.png",
          "fileFormat": "PNG",
          "size": 10780,
          "creationTime": "2023-03-31T12:38:00.000+00:00"
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

        $api = new WebRtcApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{id}", $givenId, self::DELETE_FILE);

        // Test sync method call
        $api->deleteFile($givenId);
        $this->assertRequestWithHeaders(
            'DELETE',
            $expectedPath,
            $requestHistoryContainer[0],
            [
                'Accept' => 'application/json'
            ]
        );

        // Test async method call
        $promise = $api->deleteFileAsync($givenId);
        \GuzzleHttp\Promise\Utils::unwrap([$promise]);
        $this->assertRequestWithHeaders(
            'DELETE',
            $expectedPath,
            $requestHistoryContainer[1],
            [
                'Accept' => 'application/json'
            ]
        );
    }

}
