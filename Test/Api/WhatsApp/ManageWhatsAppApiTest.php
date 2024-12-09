<?php

declare(strict_types=1);

namespace Infobip\Test\Api\WhatsApp;

use GuzzleHttp\Psr7\Query;
use Infobip\Api\WhatsAppApi as ManageWhatsAppApi;
use Infobip\Model\WhatsAppBodyApiData;
use Infobip\Model\WhatsAppBusinessInfoRequest;
use Infobip\Model\WhatsAppBusinessInfoResponse;
use Infobip\Model\WhatsAppDefaultMarketingTemplateApiResponse;
use Infobip\Model\WhatsAppDefaultMarketingTemplatePublicApiRequest;
use Infobip\Model\WhatsAppDefaultTemplateStructureApiData;
use Infobip\Model\WhatsAppFooterApiData;
use Infobip\Model\WhatsAppOtpRequest;
use Infobip\Model\WhatsAppPayment;
use Infobip\Model\WhatsAppPhoneNumberButtonApiData;
use Infobip\Model\WhatsAppPhoneNumberRequest;
use Infobip\Model\WhatsAppQuickReplyButtonApiData;
use Infobip\Model\WhatsAppSenderQualityResponse;
use Infobip\Model\WhatsAppSenderRegistrationResponse;
use Infobip\Model\WhatsAppTemplateApiResponse;
use Infobip\Model\WhatsAppTemplateEditPublicApiRequest;
use Infobip\Model\WhatsAppTemplatesApiResponse;
use Infobip\Model\WhatsAppTextHeaderApiData;
use Infobip\Model\WhatsAppUrlButtonApiData;
use Infobip\Model\WhatsAppUrlDeletionRequest;
use Infobip\Model\WhatsAppVerifyCodeRequest;
use Infobip\ObjectSerializer;
use Infobip\Test\Api\ApiTestBase;

class ManageWhatsAppApiTest extends ApiTestBase
{
    private const string BASE_ENDPOINT = '/whatsapp';

    private const string CREATE_TEMPLATE_ENDPOINT = self::BASE_ENDPOINT . '/2/senders/{sender}/templates';
    private const string DELETE_MEDIA_ENDPOINT = self::BASE_ENDPOINT . '/1/senders/{sender}/media';
    private const string GET_TEMPLATES_ENDPOINT = self::BASE_ENDPOINT . '/2/senders/{sender}/templates';
    private const string GET_WHATSAPP_TEMPLATE = self::BASE_ENDPOINT . '/2/senders/{sender}/templates/{templateId}';
    private const string EDIT_WHATSAPP_TEMPLATE = self::BASE_ENDPOINT . '/2/senders/{sender}/templates/{templateId}';
    private const string DELETE_WHATSAPP_TEMPLATE = self::BASE_ENDPOINT . '/2/senders/{sender}/templates/{templatesName}';
    private const string GET_WHATSAPP_UPI_PAYU_PAYMENT_STATUS = self::BASE_ENDPOINT . '/1/senders/{sender}/payments/upi/payu/{paymentId}';
    private const string GET_WHATSAPP_BRAZIL_PAYMENT_STATUS = self::BASE_ENDPOINT . '/1/senders/{sender}/payments/br/{paymentId}';
    private const string GET_WHATSAPP_UPI_PAYMENT_STATUS = self::BASE_ENDPOINT . '/1/senders/{sender}/payments/upi/{paymentId}';
    private const string GET_WHATSAPP_SENDERS_QUALITY = self::BASE_ENDPOINT . '/1/senders/quality';
    private const string GET_WHATSAPP_SENDER_BUSINESS_INFO = self::BASE_ENDPOINT . '/1/senders/{sender}/business-info';
    private const string UPDATE_WHATSAPP_SENDER_BUSINESS_INFO = self::BASE_ENDPOINT . '/1/senders/{sender}/business-info';
    private const string ADD_WHATSAPP_SENDER = self::BASE_ENDPOINT . '/1/embedded-signup/registrations/business-account/{businessAccountId}/senders';
    private const string VERIFY_WHATSAPP_SENDER = self::BASE_ENDPOINT . '/1/embedded-signup/registrations/senders/{sender}/verification';
    private const string RETRY_WHATSAPP_SENDER_VERIFICATION = self::BASE_ENDPOINT . '/1/embedded-signup/registrations/senders/{sender}/verification';

    public function testCreateWhatsAppTemplate(): void
    {
        [
            $requestVars,
            $responseVars,
            $givenResponse,
            $expectedRequest
        ] = include(__DIR__ . '/Fixtures/TemplateCreateFixture.php');

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 201);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ManageWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $structureData = $requestVars['structure'];

        $structure = new WhatsAppDefaultTemplateStructureApiData(
            body: $this->makeOne($structureData['body'], WhatsAppBodyApiData::class),
            header: $this->makeOne(
                $structureData['header'],
                function (array &$inputData) {
                    unset($inputData['format']);

                    return new WhatsAppTextHeaderApiData(...$inputData);
                }
            ),
            footer: $this->makeOne($structureData['footer'], WhatsAppFooterApiData::class),
            buttons: $this->makeMany(
                $structureData['buttons'],
                function (array &$inputData) {
                    $type = $inputData['type'];

                    unset($inputData['type']);

                    return match ($type) {
                        WhatsAppPhoneNumberButtonApiData::TYPE => new WhatsAppPhoneNumberButtonApiData(...$inputData),
                        WhatsAppUrlButtonApiData::TYPE => new WhatsAppUrlButtonApiData(...$inputData),
                        WhatsAppQuickReplyButtonApiData::TYPE => new WhatsAppQuickReplyButtonApiData(...$inputData),
                        default => throw new \InvalidArgumentException(
                            sprintf(
                                'Invalid button type: %s',
                                $inputData['type']
                            )
                        ),
                    };
                }
            ),
            type: 'MEDIA'
        );

        $templateRequest = new WhatsAppDefaultMarketingTemplatePublicApiRequest(
            name: $requestVars['name'],
            language: $requestVars['language'],
            structure: $structure
        );

        $sender = '385958000000';

        $closures = [
            fn () => $api->createWhatsAppTemplate($sender, $templateRequest),
            fn () => $api->createWhatsAppTemplateAsync($sender, $templateRequest),
        ];

        $allParams = array_merge($requestVars, $responseVars);

        $expectedPath = str_replace('{sender}', $sender, self::CREATE_TEMPLATE_ENDPOINT);

        foreach ($closures as $index => $closure) {
            $responseModel = $this->getUnpackedModel($closure(), WhatsAppTemplateApiResponse::class, $requestHistoryContainer);
            $this->assertTemplateResponse($responseModel, $allParams);

            $this->assertRequestWithHeadersAndJsonBody(
                'POST',
                $expectedPath,
                $expectedRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testDeleteWhatsAppMedia(): void
    {
        $requestHistoryContainer = [];

        $givenResponse = '';

        $responses = $this->makeResponses(2, $givenResponse, 204);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ManageWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $sender = '385958000000';

        $expectedPath = str_replace('{sender}', $sender, self::DELETE_MEDIA_ENDPOINT);

        $request = new WhatsAppUrlDeletionRequest(url: 'https://www.infobip.com/infobip-logo.png');

        $closures = [
            fn () => $api->deleteWhatsAppMedia($sender, $request),
            fn () => $api->deleteWhatsAppMediaAsync($sender, $request),
        ];

        foreach ($closures as $index => $closure) {
            $response = $this->getUnpackedModel($closure(), null);

            $this->assertSame(null, $response);

            $this->assertRequestWithHeaders(
                'DELETE',
                $expectedPath,
                $requestHistoryContainer[$index],
                []
            );
        }
    }

    public function testGetWhatsAppTemplates(): void
    {
        [
            $responseVars,
            $givenResponse,
        ] = include(__DIR__ . '/Fixtures/TemplateGetFixture.php');

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ManageWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $sender = '385958000000';

        $expectedPath = str_replace('{sender}', $sender, self::GET_TEMPLATES_ENDPOINT);

        $closures = [
            fn () => $api->getWhatsAppTemplates($sender),
            fn () => $api->getWhatsAppTemplatesAsync($sender),
        ];

        foreach ($closures as $index => $closure) {
            $response = $this->getUnpackedModel($closure());

            $this->assertRequestWithHeaders(
                'GET',
                $expectedPath,
                $requestHistoryContainer[$index],
                [
                    'Accept' => 'application/json',
                ]
            );

            $this->assertGetTemplatesResponse($response, $responseVars);
        }
    }

    public function testGetWhatsappTemplate(): void
    {
        $givenSender = "447796344125";
        $givenId = "5653923468715475";

        $givenResponse = <<<JSON
        {
          "id": "111",
          "businessAccountId": 222,
          "name": "media_template_with_header",
          "language": "en",
          "status": "APPROVED",
          "category": "MARKETING",
          "structure": {
            "header": {
              "text": "exampleContent",
              "format": "TEXT"
            },
            "body": {
              "text": "example {{1}} body"
            },
            "footer": {
              "text": "exampleFooter"
            },
            "type": "MEDIA"
          },
          "quality": "MEDIUM"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ManageWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace(
            ['{sender}', '{templateId}'],
            [$givenSender, $givenId],
            self::GET_WHATSAPP_TEMPLATE
        );

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getWhatsappTemplate($givenSender, $givenId),
            fn () => $api->getWhatsappTemplateAsync($givenSender, $givenId),
        ];

        $this->assertClosureResponses(
            $closures,
            WhatsAppTemplateApiResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testEditWhatsappTemplate(): void
    {
        $givenSender = "447796344125";
        $givenId = "5653923468715475";

        $givenRequest = <<<JSON
        {
          "category": "MARKETING",
          "structure": {
            "body": {
              "text": "body {{1}} content",
              "examples": [
                "example"
              ]
            },
            "type": "TEXT"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "111",
          "businessAccountId": 222,
          "name": "media_template_with_header",
          "language": "en",
          "status": "APPROVED",
          "category": "MARKETING",
          "structure": {
            "header": {
              "text": "exampleContent",
              "format": "TEXT"
            },
            "body": {
              "text": "example {{1}} body"
            },
            "footer": {
              "text": "exampleFooter"
            },
            "type": "MEDIA"
          },
          "quality": "MEDIUM"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ManageWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace(
            ['{sender}', '{templateId}'],
            [$givenSender, $givenId],
            self::EDIT_WHATSAPP_TEMPLATE
        );

        $expectedHttpMethod = "PATCH";

        $request = new WhatsAppTemplateEditPublicApiRequest(
            category: "MARKETING",
            structure: new WhatsAppDefaultTemplateStructureApiData(
                body: new WhatsAppBodyApiData(
                    text: "body {{1}} content",
                    examples: ["example"]
                ),
                type: "TEXT"
            )
        );

        $closures = [
            fn () => $api->editWhatsappTemplate($givenSender, $givenId, $request),
            fn () => $api->editWhatsappTemplateAsync($givenSender, $givenId, $request),
        ];

        foreach ($closures as $index => $closure) {
            $response = $this->getUnpackedModel($closure(), WhatsAppDefaultMarketingTemplateApiResponse::class);

            $this->assertRequestWithHeadersAndJsonBody(
                $expectedHttpMethod,
                $expectedPath,
                $givenRequest,
                $requestHistoryContainer[$index]
            );

            $expectedResponse = new WhatsAppDefaultMarketingTemplateApiResponse(
                structure: new WhatsAppDefaultTemplateStructureApiData(
                    body: new WhatsAppBodyApiData(
                        text: "example {{1}} body"
                    ),
                    header: new WhatsAppTextHeaderApiData(
                        text: "exampleContent"
                    ),
                    footer: new WhatsAppFooterApiData(
                        text: "exampleFooter"
                    ),
                    type: "MEDIA"
                ),
                id: "111",
                businessAccountId: 222,
                name: "media_template_with_header",
                language: "en",
                status: "APPROVED",
                quality: "MEDIUM"
            );

            $this->assertEquals(
                $response,
                $expectedResponse
            );
        }

    }

    public function testDeleteWhatsappTemplate(): void
    {
        $givenSender = "447796344125";
        $givenName = "media_template_with_header";

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, null, 204);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ManageWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace(
            ['{sender}', '{templatesName}'],
            [$givenSender, $givenName],
            self::DELETE_WHATSAPP_TEMPLATE
        );

        $expectedHttpMethod = "DELETE";

        $closures = [
            fn () => $api->deleteWhatsappTemplate($givenSender, $givenName),
            fn () => $api->deleteWhatsappTemplateAsync($givenSender, $givenName),
        ];

        foreach ($closures as $index => $closure) {
            $this->getUnpackedModel($closure());

            $this->assertRequestWithHeaders(
                $expectedHttpMethod,
                $expectedPath,
                $requestHistoryContainer[$index],
                []
            );
        }
    }

    public function testGetWhatsappUpiPayuPaymentStatus(): void
    {
        $givenSender = "447796344125";
        $givenPaymentId = "5653923468715475";

        $givenResponse = <<<JSON
        {
          "referenceId": "72123248136",
          "paymentId": "16085194825",
          "paymentStatus": "CAPTURED",
          "currency": "INR",
          "totalAmountValue": 21000,
          "totalAmountOffset": 100,
          "transactions": [
            {
              "id": "27194245144",
              "type": "UPI",
              "status": "SUCCESS",
              "createdTimestamp": "2023-01-01T00:00:00.000+00:00",
              "updatedTimestamp": "2023-01-01T01:00:00.000+00:00"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ManageWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace(
            ['{sender}', '{paymentId}'],
            [$givenSender, $givenPaymentId],
            self::GET_WHATSAPP_UPI_PAYU_PAYMENT_STATUS
        );

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getWhatsappUpiPayuPaymentStatus($givenSender, $givenPaymentId),
            fn () => $api->getWhatsappUpiPayuPaymentStatusAsync($givenSender, $givenPaymentId),
        ];

        $this->assertClosureResponses(
            $closures,
            null,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetWhatsappBrazilPaymentStatus(): void
    {
        $givenSender = "447796344125";
        $givenPaymentId = "5653923468715475";

        $givenResponse = <<<JSON
        {
          "referenceId": "72123248136",
          "paymentId": "16085194825",
          "paymentStatus": "CAPTURED",
          "currency": "INR",
          "totalAmountValue": 21000,
          "totalAmountOffset": 100,
          "transactions": [
            {
              "id": "27194245144",
              "type": "UPI",
              "status": "SUCCESS",
              "createdTimestamp": "2023-01-01T00:00:00.000+00:00",
              "updatedTimestamp": "2023-01-01T01:00:00.000+00:00"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ManageWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace(
            ['{sender}', '{paymentId}'],
            [$givenSender, $givenPaymentId],
            self::GET_WHATSAPP_BRAZIL_PAYMENT_STATUS
        );

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getWhatsappBrazilPaymentStatus($givenSender, $givenPaymentId),
            fn () => $api->getWhatsappBrazilPaymentStatusAsync($givenSender, $givenPaymentId),
        ];

        $this->assertClosureResponses(
            $closures,
            null,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetWhatsappAUpiPaymentStatus(): void
    {
        $givenSender = "447796344125";
        $givenPaymentId = "5653923468715475";

        $givenResponse = <<<JSON
        {
          "referenceId": "72123248136",
          "paymentId": "16085194825",
          "paymentStatus": "CAPTURED",
          "currency": "INR",
          "totalAmountValue": 21000,
          "totalAmountOffset": 100,
          "transactions": [
            {
              "id": "27194245144",
              "type": "UPI",
              "status": "SUCCESS",
              "createdTimestamp": "2023-01-01T00:00:00.000+00:00",
              "updatedTimestamp": "2023-01-01T01:00:00.000+00:00"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ManageWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace(
            ['{sender}', '{paymentId}'],
            [$givenSender, $givenPaymentId],
            self::GET_WHATSAPP_UPI_PAYMENT_STATUS
        );

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getWhatsappUpiPaymentStatus($givenSender, $givenPaymentId),
            fn () => $api->getWhatsappUpiPaymentStatusAsync($givenSender, $givenPaymentId),
        ];

        $this->assertClosureResponses(
            $closures,
            WhatsAppPayment::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetWhatsappSendersQuality(): void
    {
        $givenSenders = ["447796344125", "447796344126"];

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "sender": "441134960000",
              "qualityRating": "MEDIUM",
              "status": "CONNECTED",
              "currentLimit": "LIMIT_100K",
              "lastUpdated": "2022-02-18T08:12:26.422+00:00"
            },
            {
              "sender": "441134960001",
              "qualityRating": "LOW",
              "status": "BANNED",
              "currentLimit": "LIMIT_50",
              "lastUpdated": "2022-02-18T08:12:26.420+00:00"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ManageWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_WHATSAPP_SENDERS_QUALITY
            . "?"
            . Query::build(['senders' => $givenSenders]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getWhatsappSendersQuality($givenSenders),
            fn () => $api->getWhatsappSendersQualityAsync($givenSenders),
        ];

        $this->assertClosureResponses(
            $closures,
            WhatsAppSenderQualityResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testGetWhatsappSenderBusinessInfo(): void
    {
        $givenSender = "447796344125";

        $givenResponse = <<<JSON
        {
          "about": "Infobip Business Account",
          "address": "35-38 New Bridge Street, London EC4V 6BW",
          "description": "Infobip is a global cloud communications platform.",
          "email": "info@example.com",
          "vertical": "PROFESSIONAL_SERVICES",
          "websites": [
            "https://www.infobip.com"
          ],
          "displayName": "Infobip"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ManageWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace(
            '{sender}',
            $givenSender,
            self::GET_WHATSAPP_SENDER_BUSINESS_INFO
        );

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getWhatsappSenderBusinessInfo($givenSender),
            fn () => $api->getWhatsappSenderBusinessInfoAsync($givenSender),
        ];

        foreach ($closures as $index => $closure) {
            $response = $this->getUnpackedModel($closure());

            $this->assertRequestWithHeaders(
                $expectedHttpMethod,
                $expectedPath,
                $requestHistoryContainer[$index],
                [
                    'Accept' => 'application/json',
                ]
            );

            $this->assertEquals(
                $response,
                new WhatsAppBusinessInfoResponse(
                    about: "Infobip Business Account",
                    address: "35-38 New Bridge Street, London EC4V 6BW",
                    description: "Infobip is a global cloud communications platform.",
                    email: "info@example.com",
                    vertical: "PROFESSIONAL_SERVICES",
                    websites: ["https://www.infobip.com"],
                    displayName: "Infobip"
                )
            );
        }
    }

    public function testUpdateWhatsappSenderBusinessInfo(): void
    {
        $givenSender = "447796344125";

        $givenRequest = <<<JSON
        {
          "about": "Infobip Business Account",
          "address": "35-38 New Bridge Street, London EC4V 6BW",
          "description": "Infobip is a global cloud communications platform.",
          "email": "info@example.com",
          "vertical": "PROFESSIONAL_SERVICES",
          "websites": [
            "https://www.infobip.com"
          ],
          "logoUrl": "https://example.com/logo"
        }
        JSON;

        $givenResponse = "null";

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 204);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ManageWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace(
            '{sender}',
            $givenSender,
            self::UPDATE_WHATSAPP_SENDER_BUSINESS_INFO
        );

        $expectedHttpMethod = "PATCH";

        $request = new WhatsAppBusinessInfoRequest(
            about: "Infobip Business Account",
            address: "35-38 New Bridge Street, London EC4V 6BW",
            description: "Infobip is a global cloud communications platform.",
            email: "info@example.com",
            vertical: "PROFESSIONAL_SERVICES",
            websites: ["https://www.infobip.com"],
            logoUrl: "https://example.com/logo"
        );

        $closures = [
            fn () => $api->updateWhatsappSenderBusinessInfo($givenSender, $request),
            fn () => $api->updateWhatsappSenderBusinessInfoAsync($givenSender, $request),
        ];

        foreach ($closures as $index => $closure) {
            $this->getUnpackedModel($closure());

            $this->assertRequestWithHeadersAndJsonBody(
                $expectedHttpMethod,
                $expectedPath,
                $givenRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testAddWhatsappSender(): void
    {
        $givenBusinessAccountId = 12345567897878;

        $givenRequest = <<<JSON
        {
          "countryCode": "44",
          "phoneNumber": "7796344125",
          "displayName": "Infobip",
          "type": "EXTERNAL_SMS",
          "locale": "en_US"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "status": "SUBMITTED_FOR_REGISTRATION"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 202);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ManageWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace(
            '{businessAccountId}',
            (string)$givenBusinessAccountId,
            self::ADD_WHATSAPP_SENDER
        );

        $expectedHttpMethod = "POST";

        $request = new WhatsAppPhoneNumberRequest(
            countryCode: "44",
            phoneNumber: "7796344125",
            displayName: "Infobip",
            type: "EXTERNAL_SMS",
            locale: "en_US"
        );

        $closures = [
            fn () => $api->addWhatsappSender($givenBusinessAccountId, $request),
            fn () => $api->addWhatsappSenderAsync($givenBusinessAccountId, $request),
        ];

        foreach ($closures as $index => $closure) {
            $response = $this->getUnpackedModel($closure(), WhatsAppSenderRegistrationResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeadersAndJsonBody(
                $expectedHttpMethod,
                $expectedPath,
                $givenRequest,
                $requestHistoryContainer[$index]
            );

            $this->assertEquals(new WhatsAppSenderRegistrationResponse(status: "SUBMITTED_FOR_REGISTRATION"), $response);
        }
    }

    public function testVerifyWhatsappSender(): void
    {
        $givenSender = "447796344125";

        $givenRequest = <<<JSON
        {
          "code": "123456"
        }
        JSON;

        $givenResponse = "null";

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 204);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ManageWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace(
            '{sender}',
            $givenSender,
            self::VERIFY_WHATSAPP_SENDER
        );

        $expectedHttpMethod = "POST";

        $request = new WhatsAppVerifyCodeRequest(
            code: "123456"
        );

        $closures = [
            fn () => $api->verifyWhatsappSender($givenSender, $request),
            fn () => $api->verifyWhatsappSenderAsync($givenSender, $request),
        ];

        foreach ($closures as $index => $closure) {
            $this->getUnpackedModel($closure());

            $this->assertRequestWithHeadersAndJsonBody(
                $expectedHttpMethod,
                $expectedPath,
                $givenRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testRetryWhatsappSenderVerification(): void
    {
        $givenSender = "447796344125";

        $givenRequest = <<<JSON
        {
          "type": "EXTERNAL_SMS",
          "locale": "en_US"
        }
        JSON;

        $givenResponse = "null";

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 204);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ManageWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = str_replace(
            '{sender}',
            $givenSender,
            self::RETRY_WHATSAPP_SENDER_VERIFICATION
        );

        $expectedHttpMethod = "PUT";

        $request = new WhatsAppOtpRequest(
            type: "EXTERNAL_SMS",
            locale: "en_US"
        );

        $closures = [
            fn () => $api->retryWhatsappSenderVerification($givenSender, $request),
            fn () => $api->retryWhatsappSenderVerificationAsync($givenSender, $request),
        ];

        foreach ($closures as $index => $closure) {
            $this->getUnpackedModel($closure());

            $this->assertRequestWithHeadersAndJsonBody(
                $expectedHttpMethod,
                $expectedPath,
                $givenRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    private function assertTemplateResponse(WhatsAppTemplateApiResponse $sendResponse, array $responseVars): void
    {
        $objectSerializer = new ObjectSerializer();

        $this->assertEquals($responseVars['id'], $sendResponse->getId());
        $this->assertEquals($responseVars['businessAccountId'], $sendResponse->getBusinessAccountId());
        $this->assertEquals($responseVars['name'], $sendResponse->getName());
        $this->assertEquals($responseVars['language'], $sendResponse->getLanguage());
        $this->assertEquals($responseVars['status'], $sendResponse->getStatus());
        $this->assertEquals($responseVars['category'], $sendResponse->getCategory());

        $this->assertEquals(
            $responseVars['structure']['header']['format'],
            $sendResponse->getStructure()->getHeader()->getFormat()
        );

        $this->assertEquals(
            $responseVars['structure']['body'],
            \json_decode($objectSerializer->serialize($sendResponse->getStructure()->getBody()), true)
        );

        $this->assertEquals(
            $responseVars['structure']['footer'],
            \json_decode($objectSerializer->serialize($sendResponse->getStructure()->getFooter()), true)
        );

        $this->assertEquals(
            $responseVars['structure']['type'],
            $sendResponse->getStructure()->getType()
        );

    }

    private function assertGetTemplatesResponse(WhatsAppTemplatesApiResponse $sendResponses, array $responseVars): void
    {
        $objectSerializer = new ObjectSerializer();

        foreach ($sendResponses->getTemplates() as $index => $sendResponse) {
            $templateResponse = $responseVars['templates'][$index];

            $this->assertEquals($templateResponse['id'], $sendResponse->getId());
            $this->assertEquals($templateResponse['businessAccountId'], $sendResponse->getBusinessAccountId());
            $this->assertEquals($templateResponse['name'], $sendResponse->getName());
            $this->assertEquals($templateResponse['language'], $sendResponse->getLanguage());
            $this->assertEquals($templateResponse['status'], $sendResponse->getStatus());
            $this->assertEquals($templateResponse['category'], $sendResponse->getCategory());

            $this->assertEquals(
                $templateResponse['structure']['header']['format'],
                $sendResponse->getStructure()->getHeader()->getFormat()
            );

            $this->assertEquals(
                $templateResponse['structure']['body'],
                \json_decode($objectSerializer->serialize($sendResponse->getStructure()->getBody()), true)
            );

            $this->assertEquals(
                $templateResponse['structure']['footer'],
                \json_decode($objectSerializer->serialize($sendResponse->getStructure()->getFooter()), true)
            );

            $this->assertEquals(
                $templateResponse['structure']['type'],
                $sendResponse->getStructure()->getType()
            );
        }
    }
}
