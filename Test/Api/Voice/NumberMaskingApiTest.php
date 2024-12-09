<?php

namespace Infobip\Test\Api\Voice;

use DateTime;
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

    public function testGetVoiceMaskingConfig(): void
    {
        $givenKey = "string";
        $givenName = "string";
        $givenCallbackUrl = "string";
        $givenStatusUrl = "string";
        $givenBackupCallbackUrl = "string";
        $givenBackupStatusUrl = "string";
        $givenDescription = "string";
        $givenInsertDateTimeString = "2019-11-09T17:00:00.000+01:00";
        $givenInsertDateTime = new DateTime($givenInsertDateTimeString);
        $givenUpdateDateTimeString = "2019-11-09T17:00:00.000+01:00";
        $givenUpdateDateTime = new DateTime($givenUpdateDateTimeString);

        $givenResponse = <<<JSON
        [{
          "key": "$givenKey",
          "name": "$givenName",
          "callbackUrl": "$givenCallbackUrl",
          "statusUrl": "$givenStatusUrl",
          "backupCallbackUrl": "$givenBackupCallbackUrl",
          "backupStatusUrl": "$givenBackupStatusUrl",
          "description": "$givenDescription",
          "insertDateTime": "$givenInsertDateTimeString",
          "updateDateTime": "$givenUpdateDateTimeString"
        }]
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);

        $expectedPath = self::NUMBER_MASKING_CONFIGURATIONS;
        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getNumberMaskingConfigurations(),
            fn () => $api->getNumberMaskingConfigurationsAsync(),
        ];

        foreach ($closures as $index => $closure) {
            /** @var NumberMaskingSetupResponse[] $responseModels */
            $responseModels = $this->getUnpackedModel($closure(), NumberMaskingSetupResponse::class);

            $this->assertCount(1, $responseModels);
            $responseModel = $responseModels[0];

            $expectedResponse = new NumberMaskingSetupResponse(
                key: $givenKey,
                name: $givenName,
                callbackUrl: $givenCallbackUrl,
                statusUrl: $givenStatusUrl,
                backupCallbackUrl: $givenBackupCallbackUrl,
                backupStatusUrl: $givenBackupStatusUrl,
                description: $givenDescription,
                insertDateTime: $givenInsertDateTime,
                updateDateTime: $givenUpdateDateTime
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

    public function testCreateNumberMaskingConfiguration(): void
    {
        $givenKey = "3FC0C9CB4AFAEAC67E8FC6BA3B1E044A";
        $givenName = "UniqueConfigurationName";
        $givenCallbackUrl = "http://xyz.com/1/callback";
        $givenStatusUrl = "http://xyz.com/1/status";
        $givenInsertDateTime = "2019-11-09T17:00:00.000+01:00";
        $givenUpdateDateTime = "2019-11-09T17:00:00.000+01:00";

        $expectedRequest = <<<JSON
        {
          "name": "$givenName",
          "callbackUrl": "$givenCallbackUrl",
          "statusUrl": "$givenStatusUrl"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "key": "$givenKey",
          "name": "$givenName",
          "callbackUrl": "$givenCallbackUrl",
          "statusUrl": "$givenStatusUrl",
          "insertDateTime": "$givenInsertDateTime",
          "updateDateTime": "$givenUpdateDateTime"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);

        $expectedPath = self::NUMBER_MASKING_CONFIGURATIONS;
        $expectedHttpMethod = "POST";
        $request = $this->getObjectSerializer()->deserialize($expectedRequest, NumberMaskingSetupBody::class);

        $closures = [
            fn () => $api->createNumberMaskingConfiguration($request),
            fn () => $api->createNumberMaskingConfigurationAsync($request),
        ];

        foreach ($closures as $index => $closure) {
            $responseModel = $this->getUnpackedModel($closure(), NumberMaskingSetupResponse::class);

            $expectedResponse = new NumberMaskingSetupResponse(
                key: $givenKey,
                name: $givenName,
                callbackUrl: $givenCallbackUrl,
                statusUrl: $givenStatusUrl,
                insertDateTime: new DateTime($givenInsertDateTime),
                updateDateTime: new DateTime($givenUpdateDateTime)
            );
            $this->assertEquals($expectedResponse, $responseModel);
            $this->assertRequestWithHeadersAndJsonBody(
                $expectedHttpMethod,
                $expectedPath,
                $expectedRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testUploadAudioFile(): void
    {
        $givenUrl = "http://www.winhistory.de/more/winstart/mp3/winxp.mp3";
        $givenFileId = "cb702ae4-f356-4efd-b2dd-7a667b570af5";

        $expectedRequest = <<<JSON
        {
          "url": "$givenUrl"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "fileId": "$givenFileId"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);

        $expectedPath = self::NUMBER_MASKING_UPLOAD_AUDIO;
        $expectedHttpMethod = "POST";
        $request = $this->getObjectSerializer()->deserialize($expectedRequest, NumberMaskingUploadBody::class);

        $closures = [
            fn () => $api->uploadAudioFiles($request),
            fn () => $api->uploadAudioFilesAsync($request),
        ];

        foreach ($closures as $index => $closure) {
            $responseModel = $this->getUnpackedModel($closure(), NumberMaskingUploadResponse::class);

            $expectedResponse = new NumberMaskingUploadResponse(
                fileId: $givenFileId
            );
            $this->assertEquals($expectedResponse, $responseModel);
            $this->assertRequestWithHeadersAndJsonBody(
                $expectedHttpMethod,
                $expectedPath,
                $expectedRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testGetNumberMaskingCredentials(): void
    {
        $givenApiId = "55ddccad2df62a4b615b7e3c472b2ab6";
        $givenKey = "5da086b6a8e4424993646b8699c333ca";

        $givenResponse = <<<JSON
        {
          "apiId": "$givenApiId",
          "key": "$givenKey"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);

        $expectedPath = self::NUMBER_MASKING_CREDENTIALS;
        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getNumberMaskingCredentials(),
            fn () => $api->getNumberMaskingCredentialsAsync(),
        ];

        foreach ($closures as $index => $closure) {
            $responseModel = $this->getUnpackedModel($closure(), NumberMaskingCredentialsResponse::class);

            $expectedResponse = new NumberMaskingCredentialsResponse(
                apiId: $givenApiId,
                key: $givenKey
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

    public function testCreateNumberMaskingCredentials(): void
    {
        $givenApiId = "55ddccad2df62a4b615b7e3c472b2ab6";
        $givenKey = "5da086b6a8e4424993646b8699c333ca";

        $expectedRequest = <<<JSON
        {
          "apiId": "$givenApiId",
          "key": "$givenKey"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "apiId": "$givenApiId",
          "key": "$givenKey"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);

        $expectedPath = self::NUMBER_MASKING_CREDENTIALS;
        $expectedHttpMethod = "POST";
        $request = $this->getObjectSerializer()->deserialize($expectedRequest, NumberMaskingCredentialsBody::class);

        $closures = [
            fn () => $api->createNumberMaskingCredentials($request),
            fn () => $api->createNumberMaskingCredentialsAsync($request),
        ];

        foreach ($closures as $index => $closure) {
            $responseModel = $this->getUnpackedModel($closure(), NumberMaskingCredentialsResponse::class);

            $expectedResponse = new NumberMaskingCredentialsResponse(
                apiId: $givenApiId,
                key: $givenKey
            );
            $this->assertEquals($expectedResponse, $responseModel);
            $this->assertRequestWithHeadersAndJsonBody(
                $expectedHttpMethod,
                $expectedPath,
                $expectedRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testUpdateNumberMaskingCredentials(): void
    {
        $givenApiId = "55ddccad2df62a4b615b7e3c472b2ab6";
        $givenKey = "5da086b6a8e4424993646b8699c333ca";

        $expectedRequest = <<<JSON
        {
          "apiId": "$givenApiId",
          "key": "$givenKey"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "apiId": "$givenApiId",
          "key": "$givenKey"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);
        $api = new NumberMaskingApi($this->getConfiguration(), client: $client);

        $expectedPath = self::NUMBER_MASKING_CREDENTIALS;
        $expectedHttpMethod = "PUT";
        $request = $this->getObjectSerializer()->deserialize($expectedRequest, NumberMaskingCredentialsBody::class);

        $closures = [
            fn () => $api->updateNumberMaskingCredentials($request),
            fn () => $api->updateNumberMaskingCredentialsAsync($request),
        ];

        foreach ($closures as $index => $closure) {
            $responseModel = $this->getUnpackedModel($closure(), NumberMaskingCredentialsResponse::class);

            $expectedResponse = new NumberMaskingCredentialsResponse(
                apiId: $givenApiId,
                key: $givenKey
            );
            $this->assertEquals($expectedResponse, $responseModel);
            $this->assertRequestWithHeadersAndJsonBody(
                $expectedHttpMethod,
                $expectedPath,
                $expectedRequest,
                $requestHistoryContainer[$index]
            );
        }
    }
}
