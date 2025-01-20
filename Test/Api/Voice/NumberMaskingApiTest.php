<?php

namespace Infobip\Test\Api\Voice;

use DateTime;
use DateTimeZone;
use Infobip\Api\NumberMaskingApi;
use Infobip\Model\NumberMaskingCredentialsBody;
use Infobip\Model\NumberMaskingCredentialsResponse;
use Infobip\Model\NumberMaskingSetupBody;
use Infobip\Model\NumberMaskingSetupResponse;
use Infobip\Model\NumberMaskingUploadBody;
use Infobip\Model\NumberMaskingUploadResponse;
use Infobip\Test\Api\ApiTestBase;

class NumberMaskingApiTest extends ApiTestBase
{
    private const NUMBER_MASKING_CONFIGURATIONS = "/voice/masking/2/config";
    private const NUMBER_MASKING_CONFIGURATION = "/voice/masking/2/config/{key}";
    private const NUMBER_MASKING_UPLOAD_AUDIO = "/voice/masking/1/upload";
    private const NUMBER_MASKING_CREDENTIALS = "/voice/masking/2/credentials";

    public function testGetNumberMaskingConfigurationWhenUtcDateIsReturned(): void
    {
        $givenResponse = <<<JSON
        {
          "key": "givenKey",
          "name": "givenName",
          "callbackUrl": "https://example.com/callback",
          "statusUrl": "https://example.com/status",
          "backupCallbackUrl": "https://example.com/backup/callback",
          "backupStatusUrl": "https://example.com/backup/status",
          "description": "givenDescription",
          "insertDateTime": "2025-01-07T15:06:33.68",
          "updateDateTime": "2025-02-07T15:06:33.68"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);


        $closures = [
            fn () => $api->getNumberMaskingConfiguration(key: "givenKey"),
            fn () => $api->getNumberMaskingConfigurationAsync(key: "givenKey"),
        ];

        $expectedResponse = new NumberMaskingSetupResponse(
            key: "givenKey",
            name: "givenName",
            callbackUrl: "https://example.com/callback",
            statusUrl: "https://example.com/status",
            backupCallbackUrl: "https://example.com/backup/callback",
            backupStatusUrl: "https://example.com/backup/status",
            description: "givenDescription",
            insertDateTime: new DateTime("2025-01-07T15:06:33.68", timezone: new DateTimeZone("UTC")),
            updateDateTime: new DateTime("2025-02-07T15:06:33.68", timezone: new DateTimeZone("UTC"))
        );

        $this->assertGetRequest(
            $closures,
            str_replace("{key}", "givenKey", self::NUMBER_MASKING_CONFIGURATION),
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testGetNumberMaskingConfigurationWhenUtcDateIsReturnedRegardlessOfDefaultTimezone(): void
    {
        $initialDefaultTimezone = date_default_timezone_get();
        $testDefaultTimezone = "Europe/Zagreb";

        $givenResponse = <<<JSON
        {
          "key": "givenKey",
          "name": "givenName",
          "callbackUrl": "https://example.com/callback",
          "statusUrl": "https://example.com/status",
          "backupCallbackUrl": "https://example.com/backup/callback",
          "backupStatusUrl": "https://example.com/backup/status",
          "description": "givenDescription",
          "insertDateTime": "2025-01-07T15:06:33.68",
          "updateDateTime": "2025-02-07T15:06:33.68"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);

        $closures = [
            fn () => $api->getNumberMaskingConfiguration(key: "givenKey"),
            fn () => $api->getNumberMaskingConfigurationAsync(key: "givenKey"),
        ];

        $expectedResponse = new NumberMaskingSetupResponse(
            key: "givenKey",
            name: "givenName",
            callbackUrl: "https://example.com/callback",
            statusUrl: "https://example.com/status",
            backupCallbackUrl: "https://example.com/backup/callback",
            backupStatusUrl: "https://example.com/backup/status",
            description: "givenDescription",
            insertDateTime: new DateTime("2025-01-07T15:06:33.68", timezone: new DateTimeZone("UTC")),
            updateDateTime: new DateTime("2025-02-07T15:06:33.68", timezone: new DateTimeZone("UTC"))
        );

        try {
            date_default_timezone_set($testDefaultTimezone);

            $this->assertGetRequest(
                $closures,
                str_replace("{key}", "givenKey", self::NUMBER_MASKING_CONFIGURATION),
                $expectedResponse,
                $requestHistoryContainer
            );
        } finally {
            date_default_timezone_set($initialDefaultTimezone);
        }
    }

    public function testGetNumberMaskingConfigurationWhenStandardDateIsReturned(): void
    {
        $givenResponse = <<<JSON
        {
          "key": "givenKey",
          "name": "givenName",
          "callbackUrl": "https://example.com/callback",
          "statusUrl": "https://example.com/status",
          "backupCallbackUrl": "https://example.com/backup/callback",
          "backupStatusUrl": "https://example.com/backup/status",
          "description": "givenDescription",
          "insertDateTime": "2025-01-07T15:06:33.68+0100",
          "updateDateTime": "2025-02-07T15:06:33.68+0100"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);

        $closures = [
            fn () => $api->getNumberMaskingConfiguration(key: "givenKey"),
            fn () => $api->getNumberMaskingConfigurationAsync(key: "givenKey"),
        ];

        $expectedResponse = new NumberMaskingSetupResponse(
            key: "givenKey",
            name: "givenName",
            callbackUrl: "https://example.com/callback",
            statusUrl: "https://example.com/status",
            backupCallbackUrl: "https://example.com/backup/callback",
            backupStatusUrl: "https://example.com/backup/status",
            description: "givenDescription",
            insertDateTime: new DateTime("2025-01-07T15:06:33.68+0100"),
            updateDateTime: new DateTime("2025-02-07T15:06:33.68+0100")
        );

        $this->assertGetRequest(
            $closures,
            str_replace("{key}", "givenKey", self::NUMBER_MASKING_CONFIGURATION),
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testGetNumberMaskingConfigurations(): void
    {
        $givenResponse = <<<JSON
        [
          {
            "key": "givenKey",
            "name": "givenName",
            "callbackUrl": "https://example.com/callback",
            "statusUrl": "https://example.com/status",
            "backupCallbackUrl": "https://example.com/backup/callback",
            "backupStatusUrl": "https://example.com/backup/status",
            "description": "givenDescription",
            "insertDateTime": "2025-01-07T15:06:33.68+0100",
            "updateDateTime": "2025-02-07T15:06:33.68+0100"
          }
        ]
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);

        $closures = [
            fn () => $api->getNumberMaskingConfigurations(),
            fn () => $api->getNumberMaskingConfigurationsAsync()
        ];

        $expectedResponse = [
            new NumberMaskingSetupResponse(
                key: "givenKey",
                name: "givenName",
                callbackUrl: "https://example.com/callback",
                statusUrl: "https://example.com/status",
                backupCallbackUrl: "https://example.com/backup/callback",
                backupStatusUrl: "https://example.com/backup/status",
                description: "givenDescription",
                insertDateTime: new DateTime("2025-01-07T15:06:33.68+0100"),
                updateDateTime: new DateTime("2025-02-07T15:06:33.68+0100")
            )
        ];

        $this->assertGetRequest(
            $closures,
            self::NUMBER_MASKING_CONFIGURATIONS,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testCreateNumberMaskingConfiguration(): void
    {
        $expectedRequest = <<<JSON
        {
          "name": "givenName",
          "callbackUrl": "https://example.com/callback",
          "statusUrl": "https://example.com/status",
          "backupCallbackUrl": "https://example.com/backup/callback",
          "backupStatusUrl": "https://example.com/backup/status",
          "description": "givenDescription"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "key": "givenKey",
          "name": "givenName",
          "callbackUrl": "https://example.com/callback",
          "statusUrl": "https://example.com/status",
          "backupCallbackUrl": "https://example.com/backup/callback",
          "backupStatusUrl": "https://example.com/backup/status",
          "description": "givenDescription",
          "insertDateTime": "2025-01-07T15:06:33.68+0100",
          "updateDateTime": "2025-01-07T15:06:33.68+0100"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);

        $request = new NumberMaskingSetupBody(
            name: "givenName",
            callbackUrl: "https://example.com/callback",
            statusUrl: "https://example.com/status",
            backupCallbackUrl: "https://example.com/backup/callback",
            backupStatusUrl: "https://example.com/backup/status",
            description: "givenDescription"
        );

        $closures = [
            fn () => $api->createNumberMaskingConfiguration($request),
            fn () => $api->createNumberMaskingConfigurationAsync($request),
        ];

        $expectedResponse = new NumberMaskingSetupResponse(
            key: "givenKey",
            name: "givenName",
            callbackUrl: "https://example.com/callback",
            statusUrl: "https://example.com/status",
            backupCallbackUrl: "https://example.com/backup/callback",
            backupStatusUrl: "https://example.com/backup/status",
            description: "givenDescription",
            insertDateTime: new DateTime("2025-01-07T15:06:33.68+0100"),
            updateDateTime: new DateTime("2025-01-07T15:06:33.68+0100")
        );

        $this->assertPostRequest(
            $closures,
            self::NUMBER_MASKING_CONFIGURATIONS,
            $expectedRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testUpdateNumberMaskingConfiguration(): void
    {
        $expectedRequest = <<<JSON
        {
          "name": "newName",
          "callbackUrl": "https://example.com/callback",
          "statusUrl": "https://example.com/status",
          "backupCallbackUrl": "https://example.com/backup/callback",
          "backupStatusUrl": "https://example.com/backup/status",
          "description": "newDescription"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "key": "givenKey",
          "name": "newName",
          "callbackUrl": "https://example.com/callback",
          "statusUrl": "https://example.com/status",
          "backupCallbackUrl": "https://example.com/backup/callback",
          "backupStatusUrl": "https://example.com/backup/status",
          "description": "newDescription",
          "insertDateTime": "2025-01-07T15:06:33.68+0100",
          "updateDateTime": "2025-01-10T15:06:33.68+0100"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);

        $request = new NumberMaskingSetupBody(
            name: "newName",
            callbackUrl: "https://example.com/callback",
            statusUrl: "https://example.com/status",
            backupCallbackUrl: "https://example.com/backup/callback",
            backupStatusUrl: "https://example.com/backup/status",
            description: "newDescription"
        );

        $closures = [
            fn () => $api->updateNumberMaskingConfiguration(key: "givenKey", numberMaskingSetupBody: $request),
            fn () => $api->updateNumberMaskingConfigurationAsync(key: "givenKey", numberMaskingSetupBody: $request),
        ];

        $expectedResponse = new NumberMaskingSetupResponse(
            key: "givenKey",
            name: "newName",
            callbackUrl: "https://example.com/callback",
            statusUrl: "https://example.com/status",
            backupCallbackUrl: "https://example.com/backup/callback",
            backupStatusUrl: "https://example.com/backup/status",
            description: "newDescription",
            insertDateTime: new DateTime("2025-01-07T15:06:33.68+0100"),
            updateDateTime: new DateTime("2025-01-10T15:06:33.68+0100")
        );

        $this->assertPutRequest(
            $closures,
            str_replace("{key}", "givenKey", self::NUMBER_MASKING_CONFIGURATION),
            $expectedRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testUploadAudioFileUsingUrl(): void
    {
        $expectedRequest = <<<JSON
        {
          "url": "https://example.com/audio.mp3"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "fileId": "givenFileId"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);

        $request = new NumberMaskingUploadBody(
            url: "https://example.com/audio.mp3"
        );

        $closures = [
            fn () => $api->uploadAudioFiles($request),
            fn () => $api->uploadAudioFilesAsync($request),
        ];

        $expectedResponse = new NumberMaskingUploadResponse(
            fileId: "givenFileId"
        );

        $this->assertPostRequest(
            $closures,
            self::NUMBER_MASKING_UPLOAD_AUDIO,
            $expectedRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testUploadAudioFileUsingEncodedContent(): void
    {
        $expectedRequest = <<<JSON
        {
          "content": "base64encodedContent"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "fileId": "givenFileId"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);

        $request = new NumberMaskingUploadBody(
            content: "base64encodedContent"
        );

        $closures = [
            fn () => $api->uploadAudioFiles($request),
            fn () => $api->uploadAudioFilesAsync($request),
        ];

        $expectedResponse = new NumberMaskingUploadResponse(
            fileId: "givenFileId"
        );

        $this->assertPostRequest(
            $closures,
            self::NUMBER_MASKING_UPLOAD_AUDIO,
            $expectedRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testGetNumberMaskingCredentials(): void
    {
        $givenResponse = <<<JSON
        {
          "apiId": "givenApiId",
          "key": "givenKey"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);

        $closures = [
            fn () => $api->getNumberMaskingCredentials(),
            fn () => $api->getNumberMaskingCredentialsAsync(),
        ];

        $expectedResponse = new NumberMaskingCredentialsResponse(
            apiId: "givenApiId",
            key: "givenKey"
        );

        $this->assertGetRequest(
            $closures,
            self::NUMBER_MASKING_CREDENTIALS,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testCreateNumberMaskingCredentials(): void
    {
        $expectedRequest = <<<JSON
        {
          "apiId": "givenApiId",
          "key": "givenKey"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "apiId": "givenApiId",
          "key": "givenKey"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);

        $request = new NumberMaskingCredentialsBody(
            apiId: "givenApiId",
            key: "givenKey"
        );

        $closures = [
            fn () => $api->createNumberMaskingCredentials($request),
            fn () => $api->createNumberMaskingCredentialsAsync($request),
        ];

        $expectedResponse = new NumberMaskingCredentialsResponse(
            apiId: "givenApiId",
            key: "givenKey"
        );

        $this->assertPostRequest(
            $closures,
            self::NUMBER_MASKING_CREDENTIALS,
            $expectedRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testUpdateNumberMaskingCredentials(): void
    {
        $expectedRequest = <<<JSON
        {
          "apiId": "givenApiId",
          "key": "givenKey"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "apiId": "givenApiId",
          "key": "givenKey"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);

        $request = new NumberMaskingCredentialsBody(
            apiId: "givenApiId",
            key: "givenKey"
        );

        $closures = [
            fn () => $api->updateNumberMaskingCredentials($request),
            fn () => $api->updateNumberMaskingCredentialsAsync($request),
        ];

        $expectedResponse = new NumberMaskingCredentialsResponse(
            apiId: "givenApiId",
            key: "givenKey"
        );

        $this->assertPutRequest(
            $closures,
            self::NUMBER_MASKING_CREDENTIALS,
            $expectedRequest,
            $expectedResponse,
            $requestHistoryContainer
        );
    }

    public function testDeleteNumberMaskingCredentials(): void
    {
        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, "{}", 204);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);

        $closures = [
            fn () => $api->deleteNumberMaskingCredentials(),
            fn () => $api->deleteNumberMaskingCredentialsAsync(),
        ];

        foreach ($closures as $index => $closure) {
            $this->getUnpackedModel($closure(), null, $requestHistoryContainer);

            $this->assertRequestWithHeaders(
                'DELETE',
                self::NUMBER_MASKING_CREDENTIALS,
                $requestHistoryContainer[$index],
                ["Accept" => 'application/json',]
            );
        }
    }
}
