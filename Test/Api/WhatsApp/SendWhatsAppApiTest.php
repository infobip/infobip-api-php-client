<?php

declare(strict_types=1);

namespace Infobip\Test\Api\WhatsApp;

use GuzzleHttp\Psr7\Response;
use Infobip\Api\WhatsAppApi;
use Infobip\Model\WhatsAppAddressContent;
use Infobip\Model\WhatsAppAudioContent;
use Infobip\Model\WhatsAppAudioMessage;
use Infobip\Model\WhatsAppBulkMessage;
use Infobip\Model\WhatsAppBulkMessageInfo;
use Infobip\Model\WhatsAppContactContent;
use Infobip\Model\WhatsAppContactsContent;
use Infobip\Model\WhatsAppContactsMessage;
use Infobip\Model\WhatsAppDocumentContent;
use Infobip\Model\WhatsAppDocumentHeaderApiData;
use Infobip\Model\WhatsAppDocumentMessage;
use Infobip\Model\WhatsAppEmailContent;
use Infobip\Model\WhatsAppFailover;
use Infobip\Model\WhatsAppImageContent;
use Infobip\Model\WhatsAppImageHeaderApiData;
use Infobip\Model\WhatsAppImageMessage;
use Infobip\Model\WhatsAppInteractiveBodyContent;
use Infobip\Model\WhatsAppInteractiveButtonsActionContent;
use Infobip\Model\WhatsAppInteractiveButtonsContent;
use Infobip\Model\WhatsAppInteractiveButtonsDocumentHeaderContent;
use Infobip\Model\WhatsAppInteractiveButtonsImageHeaderContent;
use Infobip\Model\WhatsAppInteractiveButtonsMessage;
use Infobip\Model\WhatsAppInteractiveButtonsTextHeaderContent;
use Infobip\Model\WhatsAppInteractiveButtonsVideoHeaderContent;
use Infobip\Model\WhatsAppInteractiveFlowMessage;
use Infobip\Model\WhatsAppInteractiveFooterContent;
use Infobip\Model\WhatsAppInteractiveListActionContent;
use Infobip\Model\WhatsAppInteractiveListContent;
use Infobip\Model\WhatsAppInteractiveListMessage;
use Infobip\Model\WhatsAppInteractiveListSectionContent;
use Infobip\Model\WhatsAppInteractiveListTextHeaderContent;
use Infobip\Model\WhatsAppInteractiveLocationRequestMessage;
use Infobip\Model\WhatsAppInteractiveMultiProductMessage;
use Infobip\Model\WhatsAppInteractiveOrderDetailsMessage;
use Infobip\Model\WhatsAppInteractiveOrderStatusMessage;
use Infobip\Model\WhatsAppInteractiveProductMessage;
use Infobip\Model\WhatsAppInteractiveReplyButtonContent;
use Infobip\Model\WhatsAppInteractiveRowContent;
use Infobip\Model\WhatsAppInteractiveUrlButtonMessage;
use Infobip\Model\WhatsAppLocationContent;
use Infobip\Model\WhatsAppLocationHeaderApiData;
use Infobip\Model\WhatsAppLocationMessage;
use Infobip\Model\WhatsAppMessage;
use Infobip\Model\WhatsAppNameContent;
use Infobip\Model\WhatsAppOrganizationContent;
use Infobip\Model\WhatsAppPhoneContent;
use Infobip\Model\WhatsAppQuickReplyButtonApiData;
use Infobip\Model\WhatsAppSingleMessageInfo;
use Infobip\Model\WhatsAppStickerContent;
use Infobip\Model\WhatsAppStickerMessage;
use Infobip\Model\WhatsAppTemplateBodyContent;
use Infobip\Model\WhatsAppTemplateContent;
use Infobip\Model\WhatsAppTemplateDataContent;
use Infobip\Model\WhatsAppTemplateDocumentHeaderContent;
use Infobip\Model\WhatsAppTemplateImageHeaderContent;
use Infobip\Model\WhatsAppTemplateLocationHeaderContent;
use Infobip\Model\WhatsAppTemplateQuickReplyButtonContent;
use Infobip\Model\WhatsAppTemplateTextHeaderContent;
use Infobip\Model\WhatsAppTemplateUrlButtonContent;
use Infobip\Model\WhatsAppTemplateVideoHeaderContent;
use Infobip\Model\WhatsAppTextContent;
use Infobip\Model\WhatsAppTextHeaderApiData;
use Infobip\Model\WhatsAppTextMessage;
use Infobip\Model\WhatsAppUrlButtonApiData;
use Infobip\Model\WhatsAppUrlContent;
use Infobip\Model\WhatsAppVideoContent;
use Infobip\Model\WhatsAppVideoHeaderApiData;
use Infobip\Model\WhatsAppVideoMessage;
use Infobip\Test\Api\ApiTestBase;
use InvalidArgumentException;

class SendWhatsAppApiTest extends ApiTestBase
{
    private const string BASE_ENDPOINT = '/whatsapp';

    private const string AUDIO_MESSAGE_ENDPOINT = self::BASE_ENDPOINT . '/1/message/audio';
    private const string CONTACT_MESSAGE_ENDPOINT = self::BASE_ENDPOINT . '/1/message/contact';
    private const string DOCUMENT_MESSAGE_ENDPOINT = self::BASE_ENDPOINT . '/1/message/document';
    private const string IMAGE_MESSAGE_ENDPOINT = self::BASE_ENDPOINT . '/1/message/image';
    private const string INTERACTIVE_BUTTONS_MESSAGE_ENDPOINT = self::BASE_ENDPOINT . '/1/message/interactive/buttons';
    private const string INTERACTIVE_LIST_MESSAGE_ENDPOINT = self::BASE_ENDPOINT . '/1/message/interactive/list';
    private const string LOCATION_MESSAGE_ENDPOINT = self::BASE_ENDPOINT . '/1/message/location';
    private const string STICKER_MESSAGE_ENDPOINT = self::BASE_ENDPOINT . '/1/message/sticker';
    private const string TEMPLATE_MESSAGE_ENDPOINT = self::BASE_ENDPOINT . '/1/message/template';
    private const string TEXT_MESSAGE_ENDPOINT = self::BASE_ENDPOINT . '/1/message/text';
    private const string VIDEO_MESSAGE_ENDPOINT = self::BASE_ENDPOINT . '/1/message/video';
    private const string SEND_WHATSAPP_INTERACTIVE_LOCATION_REQUEST_MESSAGE = self::BASE_ENDPOINT . "/1/message/interactive/location-request";
    private const string SEND_WHATSAPP_INTERACTIVE_PRODUCT_MESSAGE = self::BASE_ENDPOINT . "/1/message/interactive/product";
    private const string SEND_WHATSAPP_INTERACTIVE_MULTI_PRODUCT_MESSAGE = self::BASE_ENDPOINT . "/1/message/interactive/multi-product";
    private const string SEND_WHATSAPP_INTERACTIVE_ORDER_DETAILS_MESSAGE = self::BASE_ENDPOINT . "/1/message/interactive/order-details";
    private const string SEND_WHATSAPP_INTERACTIVE_ORDER_STATUS_MESSAGE = self::BASE_ENDPOINT . "/1/message/interactive/order-status";
    private const string SEND_WHATSAPP_INTERACTIVE_FLOW_MESSAGE = self::BASE_ENDPOINT . "/1/message/interactive/flow";
    private const string SEND_WHATSAPP_INTERACTIVE_URL_BUTTON_MESSAGE = self::BASE_ENDPOINT . "/1/message/interactive/url-button";

    public function testSendWhatsAppAudioMessage(): void
    {
        [
            $requestVars,
            $responseVars,
            $givenResponse,
            $expectedRequest
        ] = include(__DIR__ . '/Fixtures/AudioMessageFixture.php');

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

        $message = new WhatsAppAudioMessage(
            from: $requestVars['from'],
            to: $requestVars['to'],
            content: new WhatsAppAudioContent(mediaUrl: $requestVars['content']['mediaUrl']),
            callbackData: $requestVars['callbackData']
        );

        $closures = [
            fn () => $api->sendWhatsAppAudioMessage($message),
            fn () => $api->sendWhatsAppAudioMessageAsync($message),
        ];

        $allParams = array_merge($requestVars, $responseVars);

        foreach ($closures as $index => $closure) {
            $responseModel = $this->getUnpackedModel($closure(), WhatsAppSingleMessageInfo::class, $requestHistoryContainer);

            $this->assertSendWhatsAppMessageResponse($responseModel, $allParams);

            $this->assertRequestWithHeadersAndJsonBody(
                'POST',
                self::AUDIO_MESSAGE_ENDPOINT,
                $expectedRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testSendWhatsAppContactMessage(): void
    {
        [
            $requestVars,
            $responseVars,
            $givenResponse,
            $expectedRequest
        ] = include(__DIR__ . '/Fixtures/ContactMessageFixture.php');

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

        $contactData = current($requestVars['content']['contacts']);

        $addresses = $this->makeMany($contactData['addresses'], WhatsAppAddressContent::class);
        $emails = $this->makeMany($contactData['emails'], WhatsAppEmailContent::class);
        $name = $this->makeOne($contactData['name'], WhatsAppNameContent::class);
        $org = $this->makeOne($contactData['org'], WhatsAppOrganizationContent::class);
        $phones = $this->makeMany($contactData['phones'], WhatsAppPhoneContent::class);
        $urls = $this->makeMany($contactData['urls'], WhatsAppUrlContent::class);

        $message = new WhatsAppContactsMessage(
            from: $requestVars['from'],
            to: $requestVars['to'],
            content: new WhatsAppContactsContent(
                contacts: [
                    new WhatsAppContactContent(
                        name: $name,
                        addresses: $addresses,
                        birthday: $contactData['birthday'],
                        emails: $emails,
                        org: $org,
                        phones: $phones,
                        urls: $urls
                    )
                ]
            ),
            callbackData: $requestVars['callbackData'],
            notifyUrl: $requestVars['notifyUrl']
        );

        $closures = [
            fn () => $api->sendWhatsAppContactMessage($message),
            fn () => $api->sendWhatsAppContactMessageAsync($message),
        ];

        $allParams = array_merge($requestVars, $responseVars);

        foreach ($closures as $index => $closure) {
            $responseModel = $this->getUnpackedModel($closure(), WhatsAppSingleMessageInfo::class, $requestHistoryContainer);

            $this->assertSendWhatsAppMessageResponse($responseModel, $allParams);

            $this->assertRequestWithHeadersAndJsonBody(
                'POST',
                self::CONTACT_MESSAGE_ENDPOINT,
                $expectedRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testSendWhatsAppDocumentMessage(): void
    {
        [
            $requestVars,
            $responseVars,
            $givenResponse,
            $expectedRequest
        ] = include(__DIR__ . '/Fixtures/DocumentMessageFixture.php');

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

        $message = new WhatsAppDocumentMessage(
            from: $requestVars['from'],
            to: $requestVars['to'],
            content: $this->makeOne($requestVars['content'], WhatsAppDocumentContent::class),
            callbackData: $requestVars['callbackData'],
        );

        $closures = [
            fn () => $api->sendWhatsAppDocumentMessage($message),
            fn () => $api->sendWhatsAppDocumentMessageAsync($message),
        ];

        $allParams = array_merge($requestVars, $responseVars);

        foreach ($closures as $index => $closure) {
            $responseModel = $this->getUnpackedModel($closure(), WhatsAppSingleMessageInfo::class, $requestHistoryContainer);

            $this->assertSendWhatsAppMessageResponse($responseModel, $allParams);

            $this->assertRequestWithHeadersAndJsonBody(
                'POST',
                self::DOCUMENT_MESSAGE_ENDPOINT,
                $expectedRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testSendWhatsAppImageMessage(): void
    {
        [
            $requestVars,
            $responseVars,
            $givenResponse,
            $expectedRequest
        ] = include(__DIR__ . '/Fixtures/ImageMessageFixture.php');

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

        $message = new WhatsAppImageMessage(
            from: $requestVars['from'],
            to: $requestVars['to'],
            content: $this->makeOne($requestVars['content'], WhatsAppImageContent::class),
            callbackData: $requestVars['callbackData']
        );

        $closures = [
            fn () => $api->sendWhatsAppImageMessage($message),
            fn () => $api->sendWhatsAppImageMessageAsync($message),
        ];

        $allParams = array_merge($requestVars, $responseVars);

        foreach ($closures as $index => $closure) {
            $responseModel = $this->getUnpackedModel($closure(), WhatsAppSingleMessageInfo::class, $requestHistoryContainer);

            $this->assertSendWhatsAppMessageResponse($responseModel, $allParams);

            $this->assertRequestWithHeadersAndJsonBody(
                'POST',
                self::IMAGE_MESSAGE_ENDPOINT,
                $expectedRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testSendWhatsAppInteractiveButtonsMessage(): void
    {
        $fixturePaths = [
            'InteractiveButtonsTextHeaderMessageFixture.php',
            'InteractiveButtonsVideoHeaderMessageFixture.php',
            'InteractiveButtonsImageHeaderMessageFixture.php',
            'InteractiveButtonsDocumentHeaderMessageFixture.php',
        ];

        foreach ($fixturePaths as $fixturePath) {
            [
                $requestVars,
                $responseVars,
                $givenResponse,
                $expectedRequest
            ] = include(__DIR__ . '/Fixtures/' . $fixturePath);

            $requestHistoryContainer = [];

            $client = $this->mockClient(
                [
                    new Response(200, $this->givenRequestHeaders, $givenResponse),
                    new Response(200, $this->givenRequestHeaders, $givenResponse),
                ],
                $requestHistoryContainer
            );

            $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

            $content = $requestVars['content'];

            $buttonContent = new WhatsAppInteractiveButtonsContent(
                body: $this->makeOne($content['body'], WhatsAppInteractiveBodyContent::class),
                action: new WhatsAppInteractiveButtonsActionContent(
                    buttons: $this->makeMany(
                        $content['action']['buttons'],
                        function (array &$inputData) {
                            unset($inputData['type']);

                            return new WhatsAppInteractiveReplyButtonContent(...$inputData);
                        }
                    )
                ),
                header: $this->makeOne(
                    $content['header'],
                    function (array &$inputData) {
                        $type = $inputData['type'];

                        unset($inputData['type']);

                        return match ($type) {
                            'TEXT' => new WhatsAppInteractiveButtonsTextHeaderContent(...$inputData),
                            'VIDEO' => new WhatsAppInteractiveButtonsVideoHeaderContent(...$inputData),
                            'IMAGE' => new WhatsAppInteractiveButtonsImageHeaderContent(...$inputData),
                            'DOCUMENT' => new WhatsAppInteractiveButtonsDocumentHeaderContent(...$inputData),
                            default => throw new InvalidArgumentException(
                                sprintf(
                                    'Invalid header type: %s',
                                    $inputData['type']
                                )
                            ),
                        };
                    }
                ),
                footer: $this->makeOne($content['footer'], WhatsAppInteractiveFooterContent::class)
            );

            $message = new WhatsAppInteractiveButtonsMessage(
                from: $requestVars['from'],
                to: $requestVars['to'],
                content: $buttonContent,
                callbackData: $requestVars['callbackData'],
                notifyUrl: $requestVars['notifyUrl']
            );

            $closures = [
                fn () => $api->sendWhatsAppInteractiveButtonsMessage($message),
                fn () => $api->sendWhatsAppInteractiveButtonsMessageAsync($message),
            ];

            $allParams = array_merge($requestVars, $responseVars);

            foreach ($closures as $index => $closure) {
                $responseModel = $this->getUnpackedModel($closure(), WhatsAppSingleMessageInfo::class, $requestHistoryContainer);

                $this->assertSendWhatsAppMessageResponse($responseModel, $allParams);

                $this->assertRequestWithHeadersAndJsonBody(
                    'POST',
                    self::INTERACTIVE_BUTTONS_MESSAGE_ENDPOINT,
                    $expectedRequest,
                    $requestHistoryContainer[$index]
                );
            }
        }
    }

    public function testSendWhatsAppInteractiveListMessage(): void
    {
        $fixturePaths = [
            'InteractiveListMessageFixture.php'
        ];

        foreach ($fixturePaths as $fixturePath) {
            [
                $requestVars,
                $responseVars,
                $givenResponse,
                $expectedRequest
            ] = include(__DIR__ . '/Fixtures/' . $fixturePath);

            $requestHistoryContainer = [];

            $client = $this->mockClient(
                [
                    new Response(200, $this->givenRequestHeaders, $givenResponse),
                    new Response(200, $this->givenRequestHeaders, $givenResponse),
                ],
                $requestHistoryContainer
            );

            $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

            $content = $requestVars['content'];

            $sections = [];

            foreach ($content['action']['sections'] as $sectionData) {
                $sections[] = new WhatsAppInteractiveListSectionContent(
                    rows: $this->makeMany($sectionData['rows'], WhatsAppInteractiveRowContent::class),
                    title: $sectionData['title']
                );
            }

            $buttonContent = new WhatsAppInteractiveListContent(
                body: $this->makeOne($content['body'], WhatsAppInteractiveBodyContent::class),
                action: new WhatsAppInteractiveListActionContent(
                    title: $content['action']['title'],
                    sections: $sections
                ),
                header: $this->makeOne(
                    $content['header'],
                    function (array &$inputData) {
                        $type = $inputData['type'];

                        unset($inputData['type']);

                        return match ($type) {
                            'TEXT' => new WhatsAppInteractiveListTextHeaderContent(...$inputData),
                            default => throw new InvalidArgumentException(
                                sprintf(
                                    'Invalid header type: %s',
                                    $inputData['type']
                                )
                            ),
                        };
                    }
                ),
                footer: $this->makeOne($content['footer'], WhatsAppInteractiveFooterContent::class)
            );

            $message = new WhatsAppInteractiveListMessage(
                from: $requestVars['from'],
                to: $requestVars['to'],
                content: $buttonContent,
                callbackData: $requestVars['callbackData'],
                notifyUrl: $requestVars['notifyUrl']
            );

            $closures = [
                fn () => $api->sendWhatsAppInteractiveListMessage($message),
                fn () => $api->sendWhatsAppInteractiveListMessageAsync($message),
            ];

            $allParams = array_merge($requestVars, $responseVars);

            foreach ($closures as $index => $closure) {
                $responseModel = $this->getUnpackedModel($closure(), WhatsAppSingleMessageInfo::class, $requestHistoryContainer);

                $this->assertSendWhatsAppMessageResponse($responseModel, $allParams);

                $this->assertRequestWithHeadersAndJsonBody(
                    'POST',
                    self::INTERACTIVE_LIST_MESSAGE_ENDPOINT,
                    $expectedRequest,
                    $requestHistoryContainer[$index]
                );
            }
        }
    }

    public function testSendWhatsAppLocationMessage(): void
    {
        [
            $requestVars,
            $responseVars,
            $givenResponse,
            $expectedRequest
        ] = include(__DIR__ . '/Fixtures/LocationMessageFixture.php');

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

        $message = new WhatsAppLocationMessage(
            from: $requestVars['from'],
            to: $requestVars['to'],
            content: $this->makeOne($requestVars['content'], WhatsAppLocationContent::class),
            callbackData: $requestVars['callbackData']
        );

        $closures = [
            fn () => $api->sendWhatsAppLocationMessage($message),
            fn () => $api->sendWhatsAppLocationMessageAsync($message),
        ];

        $allParams = array_merge($requestVars, $responseVars);

        foreach ($closures as $index => $closure) {
            $responseModel = $this->getUnpackedModel($closure(), WhatsAppSingleMessageInfo::class, $requestHistoryContainer);

            $this->assertSendWhatsAppMessageResponse($responseModel, $allParams);

            $this->assertRequestWithHeadersAndJsonBody(
                'POST',
                self::LOCATION_MESSAGE_ENDPOINT,
                $expectedRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testSendWhatsAppStickerMessage(): void
    {
        [
            $requestVars,
            $responseVars,
            $givenResponse,
            $expectedRequest
        ] = include(__DIR__ . '/Fixtures/StickerMessageFixture.php');

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

        $message = new WhatsAppStickerMessage(
            from: $requestVars['from'],
            to: $requestVars['to'],
            content: $this->makeOne($requestVars['content'], WhatsAppStickerContent::class),
            callbackData: $requestVars['callbackData']
        );

        $closures = [
            fn () => $api->sendWhatsAppStickerMessage($message),
            fn () => $api->sendWhatsAppStickerMessageAsync($message),
        ];

        $allParams = array_merge($requestVars, $responseVars);

        foreach ($closures as $index => $closure) {
            $responseModel = $this->getUnpackedModel($closure(), WhatsAppSingleMessageInfo::class, $requestHistoryContainer);

            $this->assertSendWhatsAppMessageResponse($responseModel, $allParams);

            $this->assertRequestWithHeadersAndJsonBody(
                'POST',
                self::STICKER_MESSAGE_ENDPOINT,
                $expectedRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testSendWhatsAppTemplateMessage(): void
    {
        $fixturePaths = [
            'TemplateMessageFixture.php',
        ];

        foreach ($fixturePaths as $fixturePath) {
            [
                $requestVars,
                $responseVars,
                $givenResponse,
                $expectedRequest
            ] = include(__DIR__ . '/Fixtures/' . $fixturePath);

            $requestHistoryContainer = [];

            $responses = $this->makeResponses(count($requestVars['messages']) * 2, $givenResponse);

            $client = $this->mockClient(
                $responses,
                $requestHistoryContainer
            );

            $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

            $messages = array_map(function ($messageItem) {
                $content = $messageItem['content'];

                $messageContent = new WhatsAppTemplateContent(
                    templateName: $content['templateName'],
                    templateData: new WhatsAppTemplateDataContent(
                        body: $this->makeOne($content['templateData']['body'], WhatsAppTemplateBodyContent::class),
                        header: $this->makeOne(
                            $content['templateData']['header'],
                            function (array &$inputData) {
                                $type = $inputData['type'];

                                unset($inputData['type']);

                                return match ($type) {
                                    WhatsAppTextHeaderApiData::FORMAT => new WhatsAppTemplateTextHeaderContent(...$inputData),
                                    WhatsAppDocumentHeaderApiData::FORMAT => new WhatsAppTemplateDocumentHeaderContent(...$inputData),
                                    WhatsAppImageHeaderApiData::FORMAT => new WhatsAppTemplateImageHeaderContent(...$inputData),
                                    WhatsAppVideoHeaderApiData::FORMAT => new WhatsAppTemplateVideoHeaderContent(...$inputData),
                                    WhatsAppLocationHeaderApiData::FORMAT => new WhatsAppTemplateLocationHeaderContent(...$inputData),
                                    default => throw new InvalidArgumentException(
                                        sprintf(
                                            'Invalid header type: %s',
                                            $inputData['type']
                                        )
                                    ),
                                };
                            }
                        ),
                        buttons: $this->makeMany(
                            $content['templateData']['buttons'],
                            function (array &$inputData) {
                                $type = $inputData['type'];

                                unset($inputData['type']);
                                return match ($type) {
                                    WhatsAppQuickReplyButtonApiData::TYPE => new WhatsAppTemplateQuickReplyButtonContent(...$inputData),
                                    WhatsAppUrlButtonApiData::TYPE => new WhatsAppTemplateUrlButtonContent(...$inputData),
                                    default => throw new InvalidArgumentException(
                                        sprintf(
                                            'Invalid header type: %s',
                                            $inputData['type']
                                        )
                                    ),
                                };
                            }
                        )
                    ),
                    language: $content['language']
                );

                return new WhatsAppMessage(
                    from: $messageItem['from'],
                    to: $messageItem['to'],
                    content: $messageContent,
                    callbackData: $messageItem['callbackData'],
                    notifyUrl: $messageItem['notifyUrl'],
                    smsFailover: $this->makeOne($messageItem['smsFailover'], WhatsAppFailover::class)
                );
            }, $requestVars['messages']);

            $bulkMessage = new WhatsAppBulkMessage(messages: $messages);

            $closures = [
                fn () => $api->sendWhatsAppTemplateMessage($bulkMessage),
                fn () => $api->sendWhatsAppTemplateMessageAsync($bulkMessage),
            ];

            $allParams = array_merge($requestVars, $responseVars);

            foreach ($closures as $index => $closure) {
                $responseModel = $this->getUnpackedModel($closure(), WhatsAppBulkMessageInfo::class, $requestHistoryContainer);

                $this->assertSendWhatsAppBulkMessageResponse($responseModel, $allParams);

                $this->assertRequestWithHeadersAndJsonBody(
                    'POST',
                    self::TEMPLATE_MESSAGE_ENDPOINT,
                    $expectedRequest,
                    $requestHistoryContainer[$index]
                );
            }
        }
    }

    public function testSendWhatsAppTextMessage(): void
    {
        [
            $requestVars,
            $responseVars,
            $givenResponse,
            $expectedRequest
        ] = include(__DIR__ . '/Fixtures/TextMessageFixture.php');

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

        $message = new WhatsAppTextMessage(
            from: $requestVars['from'],
            to: $requestVars['to'],
            content: $this->makeOne($requestVars['content'], WhatsAppTextContent::class),
            callbackData: $requestVars['callbackData'],
            notifyUrl: $requestVars['notifyUrl']
        );

        $closures = [
            fn () => $api->sendWhatsAppTextMessage($message),
            fn () => $api->sendWhatsAppTextMessageAsync($message),
        ];

        $allParams = array_merge($requestVars, $responseVars);

        foreach ($closures as $index => $closure) {
            $responseModel = $this->getUnpackedModel($closure(), WhatsAppSingleMessageInfo::class, $requestHistoryContainer);

            $this->assertSendWhatsAppMessageResponse($responseModel, $allParams);

            $this->assertRequestWithHeadersAndJsonBody(
                'POST',
                self::TEXT_MESSAGE_ENDPOINT,
                $expectedRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testSendWhatsAppVideoMessage(): void
    {
        [
            $requestVars,
            $responseVars,
            $givenResponse,
            $expectedRequest
        ] = include(__DIR__ . '/Fixtures/VideoMessageFixture.php');

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

        $message = new WhatsAppVideoMessage(
            from: $requestVars['from'],
            to: $requestVars['to'],
            content: $this->makeOne($requestVars['content'], WhatsAppVideoContent::class),
            callbackData: $requestVars['callbackData'],
            notifyUrl: $requestVars['notifyUrl']
        );

        $closures = [
            fn () => $api->sendWhatsAppVideoMessage($message),
            fn () => $api->sendWhatsAppVideoMessageAsync($message),
        ];

        $allParams = array_merge($requestVars, $responseVars);

        foreach ($closures as $index => $closure) {
            $responseModel = $this->getUnpackedModel($closure(), WhatsAppSingleMessageInfo::class, $requestHistoryContainer);

            $this->assertSendWhatsAppMessageResponse($responseModel, $allParams);

            $this->assertRequestWithHeadersAndJsonBody(
                'POST',
                self::VIDEO_MESSAGE_ENDPOINT,
                $expectedRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testSendWhatsappInteractiveLocationRequestMessage(): void
    {
        $givenRequest = <<<JSON
        {
          "from": "441134960000",
          "to": "441134960001",
          "messageId": "a28dd97c-1ffb-4fcf-99f1-0b557ed381da",
          "content": {
            "body": {
              "text": "Some text"
            }
          },
          "callbackData": "Callback data",
          "notifyUrl": "https://www.example.com/whatsapp",
          "urlOptions": {
            "shortenUrl": true,
            "trackClicks": true,
            "trackingUrl": "https://example.com/click-report",
            "removeProtocol": true,
            "customDomain": "example.com"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "to": "441134960001",
          "messageCount": 1,
          "messageId": "a28dd97c-1ffb-4fcf-99f1-0b557ed381da",
          "status": {
            "groupId": 1,
            "groupName": "PENDING",
            "id": 7,
            "name": "PENDING_ENROUTE",
            "description": "Message sent to next instance"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::SEND_WHATSAPP_INTERACTIVE_LOCATION_REQUEST_MESSAGE;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, WhatsAppInteractiveLocationRequestMessage::class);

        $closures = [
            fn () => $api->sendWhatsAppInteractiveLocationRequestMessage($request),
            fn () => $api->sendWhatsAppInteractiveLocationRequestMessageAsync($request),
        ];

        $this->assertClosureResponses(
            $closures,
            WhatsAppSingleMessageInfo::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testSendWhatsappInteractiveProductMessage(): void
    {
        $givenRequest = <<<JSON
        {
          "from": "441134960000",
          "to": "441134960001",
          "messageId": "a28dd97c-1ffb-4fcf-99f1-0b557ed381da",
          "content": {
            "action": {
              "catalogId": "1",
              "productRetailerId": "2"
            },
            "body": {
              "text": "Some text"
            },
            "footer": {
              "text": "Footer"
            }
          },
          "callbackData": "Callback data",
          "notifyUrl": "https://www.example.com/whatsapp",
          "urlOptions": {
            "shortenUrl": true,
            "trackClicks": true,
            "trackingUrl": "https://example.com/click-report",
            "removeProtocol": true,
            "customDomain": "example.com"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "to": "441134960001",
          "messageCount": 1,
          "messageId": "a28dd97c-1ffb-4fcf-99f1-0b557ed381da",
          "status": {
            "groupId": 1,
            "groupName": "PENDING",
            "id": 7,
            "name": "PENDING_ENROUTE",
            "description": "Message sent to next instance"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::SEND_WHATSAPP_INTERACTIVE_PRODUCT_MESSAGE;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, WhatsAppInteractiveProductMessage::class);

        $closures = [
            fn () => $api->sendWhatsAppInteractiveProductMessage($request),
            fn () => $api->sendWhatsAppInteractiveProductMessageAsync($request),
        ];

        $this->assertClosureResponses(
            $closures,
            WhatsAppSingleMessageInfo::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testSendWhatsappInteractiveMultiProductMessage(): void
    {
        $givenRequest = <<<JSON
        {
          "from": "441134960000",
          "to": "441134960001",
          "messageId": "a28dd97c-1ffb-4fcf-99f1-0b557ed381da",
          "content": {
            "header": {
              "type": "TEXT",
              "text": "Header"
            },
            "body": {
              "text": "Some text"
            },
            "action": {
              "catalogId": "1",
              "sections": [
                {
                  "title": "Title",
                  "productRetailerIds": [
                    "1",
                    "2"
                  ]
                }
              ]
            },
            "footer": {
              "text": "Footer"
            }
          },
          "callbackData": "Callback data",
          "notifyUrl": "https://www.example.com/whatsapp",
          "urlOptions": {
            "shortenUrl": true,
            "trackClicks": true,
            "trackingUrl": "https://example.com/click-report",
            "removeProtocol": true,
            "customDomain": "example.com"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "to": "441134960001",
          "messageCount": 1,
          "messageId": "a28dd97c-1ffb-4fcf-99f1-0b557ed381da",
          "status": {
            "groupId": 1,
            "groupName": "PENDING",
            "id": 7,
            "name": "PENDING_ENROUTE",
            "description": "Message sent to next instance"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::SEND_WHATSAPP_INTERACTIVE_MULTI_PRODUCT_MESSAGE;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, WhatsAppInteractiveMultiProductMessage::class);

        $closures = [
            fn () => $api->sendWhatsAppInteractiveMultiProductMessage($request),
            fn () => $api->sendWhatsAppInteractiveMultiProductMessageAsync($request),
        ];

        $this->assertClosureResponses(
            $closures,
            WhatsAppSingleMessageInfo::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testSendWhatsappInteractiveOrderDetailsMessage(): void
    {
        $givenRequest = <<<JSON
        {
          "from": "441134960000",
          "to": "441134960001",
          "messageId": "a28dd97c-1ffb-4fcf-99f1-0b557ed381da",
          "content": {
            "body": {
              "text": "Some text"
            },
            "action": {
              "payment": {
                "type": "UPI_PAYU",
                "id": "fd3e847h2",
                "productDescription": "tshirt100",
                "customerFirstName": "John",
                "customerLastName": "Smith",
                "customerEmail": "John.Smith@example.com",
                "callbackData": [
                  "customData1",
                  "customData2",
                  "customData3",
                  "customData4",
                  "customData5"
                ]
              },
              "paymentConfiguration": "payment-config",
              "orderCurrency": "INR",
              "orderType": "DIGITAL_GOODS",
              "totalAmount": {
                "value": 21000
              },
              "order": {
                "catalogId": "1",
                "items": [
                  {
                    "retailerId": "1",
                    "name": "discounted product",
                    "amount": {
                      "value": 10000
                    },
                    "saleAmount": {
                      "value": 5000
                    },
                    "quantity": 2
                  },
                  {
                    "retailerId": "2",
                    "name": "product",
                    "amount": {
                      "value": 10000
                    },
                    "quantity": 1
                  }
                ],
                "subtotal": {
                  "value": 20000
                },
                "tax": {
                  "value": 1000,
                  "description": "tax included"
                },
                "shipping": {
                  "value": 1000,
                  "description": "shipping cost"
                },
                "discount": {
                  "amount": {
                    "value": 1000,
                    "description": "discount"
                  },
                  "programName": "membership discount"
                },
                "orderExpiration": {
                  "expirationSeconds": 500,
                  "description": "limited offer"
                }
              }
            },
            "footer": {
              "text": "Footer"
            }
          },
          "callbackData": "Callback data",
          "notifyUrl": "https://www.example.com/whatsapp",
          "urlOptions": {
            "shortenUrl": true,
            "trackClicks": true,
            "trackingUrl": "https://example.com/click-report",
            "removeProtocol": true,
            "customDomain": "example.com"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "to": "441134960001",
          "messageCount": 1,
          "messageId": "a28dd97c-1ffb-4fcf-99f1-0b557ed381da",
          "status": {
            "groupId": 1,
            "groupName": "PENDING",
            "id": 7,
            "name": "PENDING_ENROUTE",
            "description": "Message sent to next instance"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::SEND_WHATSAPP_INTERACTIVE_ORDER_DETAILS_MESSAGE;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, WhatsAppInteractiveOrderDetailsMessage::class);

        $closures = [
            fn () => $api->sendWhatsAppInteractiveOrderDetailsMessage($request),
            fn () => $api->sendWhatsAppInteractiveOrderDetailsMessageAsync($request),
        ];

        $this->assertClosureResponses(
            $closures,
            WhatsAppSingleMessageInfo::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testSendWhatsappInteractiveOrderStatusMessage(): void
    {
        $givenRequest = <<<JSON
        {
          "from": "441134960000",
          "to": "441134960001",
          "messageId": "a28dd97c-1ffb-4fcf-99f1-0b557ed381da",
          "content": {
            "action": {
              "payment": {
                "type": "UPI_PAYU",
                "id": "16085194825"
              },
              "status": "SHIPPED",
              "description": "Order shipped"
            },
            "body": {
              "text": "Some text"
            },
            "footer": {
              "text": "Footer"
            }
          },
          "callbackData": "Callback data",
          "notifyUrl": "https://www.example.com/whatsapp",
          "urlOptions": {
            "shortenUrl": true,
            "trackClicks": true,
            "trackingUrl": "https://example.com/click-report",
            "removeProtocol": true,
            "customDomain": "example.com"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "to": "441134960001",
          "messageCount": 1,
          "messageId": "a28dd97c-1ffb-4fcf-99f1-0b557ed381da",
          "status": {
            "groupId": 1,
            "groupName": "PENDING",
            "id": 7,
            "name": "PENDING_ENROUTE",
            "description": "Message sent to next instance"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::SEND_WHATSAPP_INTERACTIVE_ORDER_STATUS_MESSAGE;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, WhatsAppInteractiveOrderStatusMessage::class);

        $closures = [
            fn () => $api->sendWhatsAppInteractiveOrderStatusMessage($request),
            fn () => $api->sendWhatsAppInteractiveOrderStatusMessageAsync($request),
        ];

        $this->assertClosureResponses(
            $closures,
            WhatsAppSingleMessageInfo::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testSendWhatsappInteractiveFlowMessage(): void
    {
        $givenRequest = <<<JSON
        {
          "from": "441134960000",
          "to": "441134960001",
          "messageId": "a28dd97c-1ffb-4fcf-99f1-0b557ed381da",
          "content": {
            "body": {
              "text": "Some text"
            },
            "action": {
              "mode": "PUBLISHED",
              "flowMessageVersion": 3,
              "flowToken": "Flow token",
              "flowId": "98E8D4AA79E2697757FAA",
              "callToActionButton": "Button text",
              "flowAction": "NAVIGATE",
              "flowActionPayload": {
                "screen": "product_screen",
                "data": {
                  "product_name": "name",
                  "product_price": 200
                }
              }
            },
            "header": {
              "type": "TEXT",
              "text": "Header text"
            },
            "footer": {
              "text": "Footer text"
            }
          },
          "callbackData": "Callback data",
          "notifyUrl": "https://www.example.com/whatsapp",
          "urlOptions": {
            "shortenUrl": true,
            "trackClicks": true,
            "trackingUrl": "https://example.com/click-report",
            "removeProtocol": true,
            "customDomain": "example.com"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "to": "441134960001",
          "messageCount": 1,
          "messageId": "a28dd97c-1ffb-4fcf-99f1-0b557ed381da",
          "status": {
            "groupId": 1,
            "groupName": "PENDING",
            "id": 7,
            "name": "PENDING_ENROUTE",
            "description": "Message sent to next instance"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::SEND_WHATSAPP_INTERACTIVE_FLOW_MESSAGE;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, WhatsAppInteractiveFlowMessage::class);

        $closures = [
            fn () => $api->sendWhatsAppInteractiveFlowMessage($request),
            fn () => $api->sendWhatsAppInteractiveFlowMessageAsync($request),
        ];

        $this->assertClosureResponses(
            $closures,
            WhatsAppSingleMessageInfo::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    public function testSendWhatsappInteractiveUrlButtonMessage(): void
    {
        $givenRequest = <<<JSON
        {
          "from": "441134960000",
          "to": "441134960001",
          "messageId": "a28dd97c-1ffb-4fcf-99f1-0b557ed381da",
          "content": {
            "body": {
              "text": "Some text"
            },
            "action": {
              "displayText": "Display text",
              "url": "https://www.example.com"
            },
            "header": {
              "type": "TEXT",
              "text": "Header text"
            },
            "footer": {
              "text": "Footer text"
            }
          },
          "callbackData": "Callback data",
          "notifyUrl": "https://www.example.com/whatsapp",
          "urlOptions": {
            "shortenUrl": true,
            "trackClicks": true,
            "trackingUrl": "https://example.com/click-report",
            "removeProtocol": true,
            "customDomain": "example.com"
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "to": "441134960001",
          "messageCount": 1,
          "messageId": "a28dd97c-1ffb-4fcf-99f1-0b557ed381da",
          "status": {
            "groupId": 1,
            "groupName": "PENDING",
            "id": 7,
            "name": "PENDING_ENROUTE",
            "description": "Message sent to next instance"
          }
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new WhatsAppApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::SEND_WHATSAPP_INTERACTIVE_URL_BUTTON_MESSAGE;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, WhatsAppInteractiveUrlButtonMessage::class);

        $closures = [
            fn () => $api->sendWhatsAppInteractiveUrlButtonMessage($request),
            fn () => $api->sendWhatsAppInteractiveUrlButtonMessageAsync($request),
        ];

        $this->assertClosureResponses(
            $closures,
            WhatsAppSingleMessageInfo::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );

    }

    private function assertSendWhatsAppMessageResponse(WhatsAppSingleMessageInfo $sendResponse, array $responseVars): void
    {
        $this->assertEquals($responseVars['to'], $sendResponse->getTo());
        $this->assertEquals($responseVars['messageCount'], $sendResponse->getMessageCount());
        $this->assertEquals($responseVars['messageId'], $sendResponse->getMessageId());
        $this->assertEquals($responseVars['statusName'], $sendResponse->getStatus()->getName());
    }

    private function assertSendWhatsAppBulkMessageResponse(WhatsAppBulkMessageInfo $sendResponse, array $responseVars): void
    {
        $messageResponses = $sendResponse->getMessages();

        $this->assertIsIterable($messageResponses);

        $this->assertCount(count($responseVars['messages']), $messageResponses);

        foreach ($messageResponses as $index => $messageResponse) {
            $this->assertEquals($responseVars['messages'][$index]['to'], $messageResponse->getTo());
            $this->assertEquals($responseVars['messageCount'], $messageResponse->getMessageCount());
            $this->assertEquals($responseVars['messageId'], $messageResponse->getMessageId());
            $this->assertEquals($responseVars['statusName'], $messageResponse->getStatus()->getName());
        }
    }
}
