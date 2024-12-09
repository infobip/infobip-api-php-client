<?php

declare(strict_types=1);

namespace Infobip\Test\Api\WhatsApp;

use Infobip\Api\WhatsAppApi as ReceiveWhatsAppApi;
use Infobip\Test\Api\ApiTestBase;
use SplFileObject;

class ReceiveWhatsAppApiTest extends ApiTestBase
{
    private const string BASE_ENDPOINT = '/whatsapp';

    private const string DOWNLOAD_INBOUND_MEDIA_ENDPOINT = self::BASE_ENDPOINT . '/1/senders/{sender}/media/{mediaId}';
    private const string GET_MEDIA_METADATA_ENDPOINT = self::BASE_ENDPOINT . '/1/senders/{sender}/media/{mediaId}';
    private const string MARK_AS_READ_ENDPOINT = self::BASE_ENDPOINT . '/1/senders/{sender}/message/{messageId}/read';


    public function testDownloadWhatsAppInboundMedia(): void
    {
        [
            $media
        ] = include(__DIR__ . '/Fixtures/InboundMediaFixture.php');

        $givenResponse = base64_decode($media);

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ReceiveWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $sender = '385958000000';
        $mediaId = 'someMediaId';

        $expectedPath = str_replace(
            [
                '{sender}',
                '{mediaId}'
            ],
            [
                $sender,
                $mediaId
            ],
            self::DOWNLOAD_INBOUND_MEDIA_ENDPOINT
        );

        $closures = [
            fn () => $api->downloadWhatsAppInboundMedia($sender, $mediaId),
            fn () => $api->downloadWhatsAppInboundMediaAsync($sender, $mediaId),
        ];

        foreach ($closures as $index => $closure) {
            /**
             * @var SplFileObject $response
             */
            $response = $this->getUnpackedModel($closure(), expectedInstanceType: SplFileObject::class);

            $this->assertRequestWithHeaders(
                'GET',
                $expectedPath,
                $requestHistoryContainer[$index],
                [
                    'Accept' => 'application/json',
                ]
            );

            $content = '';

            while (!$response->eof()) {
                $content .=  $response->fgets();
            }

            $this->assertSame($givenResponse, $content);
        }
    }

    public function testGetWhatsAppMediaMetadata(): void
    {
        $requestHistoryContainer = [];

        $contentLength = '1024';

        $responseHeaders = [
            'Accept' => '*/*',
            'Content-Length' => $contentLength,
        ];

        $responses = $this->makeResponses(
            2,
            '',
            200,
            $responseHeaders
        );

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ReceiveWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $sender = '385958000000';
        $mediaId = 'someMediaId';

        $expectedPath = str_replace(
            [
                '{sender}',
                '{mediaId}'
            ],
            [
                $sender,
                $mediaId
            ],
            self::GET_MEDIA_METADATA_ENDPOINT
        );

        $closures = [
            fn () => $api->getWhatsAppMediaMetadata($sender, $mediaId),
            fn () => $api->getWhatsAppMediaMetadataAsync($sender, $mediaId),
        ];

        foreach ($closures as $index => $closure) {
            $response = $this->getUnpackedModel($closure(), null);

            $this->assertSame(null, $response);

            $this->assertRequestWithHeaders(
                'HEAD',
                $expectedPath,
                $requestHistoryContainer[$index],
                []
            );

            $actualResponse = $responses[$index];

            foreach ($responseHeaders as $headerName => $headerValue) {
                $this->assertSame($headerValue, $actualResponse->getHeaderLine($headerName));
            }
        }
    }

    public function testMarkWhatsAppMessageAsRead(): void
    {
        $requestHistoryContainer = [];

        $responses = $this->makeResponses(
            2,
            '',
            204
        );

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new ReceiveWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $sender = '385958000000';
        $messageId = 'someMessageId';

        $expectedPath = str_replace(
            [
                '{sender}',
                '{messageId}'
            ],
            [
                $sender,
                $messageId
            ],
            self::MARK_AS_READ_ENDPOINT
        );

        $closures = [
            fn () => $api->markWhatsAppMessageAsRead($sender, $messageId),
            fn () => $api->markWhatsAppMessageAsReadAsync($sender, $messageId),
        ];

        foreach ($closures as $index => $closure) {
            $response = $this->getUnpackedModel($closure(), expectedInstanceType: null);

            $this->assertTrue($response === '' || $response === null);

            $this->assertRequestWithHeaders(
                'POST',
                $expectedPath,
                $requestHistoryContainer[$index],
                [
                    'Accept' => 'application/json',
                ]
            );
        }
    }
}
