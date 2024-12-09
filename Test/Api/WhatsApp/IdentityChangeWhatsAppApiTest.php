<?php

declare(strict_types=1);

namespace Infobip\Test\Api\WhatsApp;

use DateTime;
use GuzzleHttp\Psr7\Response;
use Infobip\Api\WhatsAppApi as IdentityChangeWhatsAppApi;
use Infobip\Model\WhatsAppIdentityConfirmation;
use Infobip\Model\WhatsAppIdentityInfo;
use Infobip\Test\Api\ApiTestBase;

class IdentityChangeWhatsAppApiTest extends ApiTestBase
{
    private const string BASE_ENDPOINT = '/whatsapp';

    private const string CONFIRM_WHATSAPP_IDENTITY_ENDPOINT = self::BASE_ENDPOINT
        . '/1/{sender}/contacts/{userNumber}/identity';

    private const string GET_WHATSAPP_IDENTITY_ENDPOINT = self::BASE_ENDPOINT
        . '/1/{sender}/contacts/{userNumber}/identity';


    public function testConfirmWhatsappIdentity(): void
    {
        [
            $requestVars,
            $expectedRequest
        ] = include(__DIR__ . '/Fixtures/IdentityConfirmFixture.php');

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(204, $this->givenRequestHeaders),
                new Response(204, $this->givenRequestHeaders),
            ],
            $requestHistoryContainer
        );

        $api = new IdentityChangeWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $sender = '447796344125';
        $userNumber = '441134960001';

        $expectedPath = str_replace(
            ['{sender}', '{userNumber}'],
            [$sender, $userNumber],
            self::CONFIRM_WHATSAPP_IDENTITY_ENDPOINT
        );

        $confirmation = $this->makeOne($requestVars, WhatsAppIdentityConfirmation::class);

        $closures = [
            fn () => $api->confirmWhatsappIdentity($sender, $userNumber, $confirmation),
            fn () => $api->confirmWhatsappIdentityAsync($sender, $userNumber, $confirmation),
        ];

        foreach ($closures as $index => $closure) {
            $this->getUnpackedModel($closure(), null);

            $this->assertRequestWithHeadersAndJsonBody(
                'PUT',
                $expectedPath,
                $expectedRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testGetWhatsappIdentity(): void
    {
        [
            $responseVars,
            $givenResponse
        ] = include(__DIR__ . '/Fixtures/IdentityGetFixture.php');

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new IdentityChangeWhatsAppApi(config: $this->getConfiguration(), client: $client);

        $sender = '447796344125';
        $userNumber = '441134960001';

        $expectedPath = str_replace(
            ['{sender}', '{userNumber}'],
            [$sender, $userNumber],
            self::GET_WHATSAPP_IDENTITY_ENDPOINT
        );

        $closures = [
            fn () => $api->getWhatsappIdentity($sender, $userNumber),
            fn () => $api->getWhatsappIdentityAsync($sender, $userNumber),
        ];

        foreach ($closures as $index => $closure) {
            /**
             * @var WhatsAppIdentityInfo $response
             */
            $response = $this
                ->getUnpackedModel(
                    $closure(),
                    WhatsAppIdentityInfo::class
                );

            $this->assertSame($responseVars['acknowledged'], $response->getAcknowledged());

            $this->assertSame($responseVars['hash'], $response->getHash());

            $this->assertSame(
                (new DateTime($responseVars['createdAt']))->format(DATE_ISO8601),
                $response->getCreatedAt()->format(DATE_ISO8601)
            );

            $this->assertRequestWithHeaders(
                'GET',
                $expectedPath,
                $requestHistoryContainer[$index],
                [
                    'Accept' => 'application/json',
                ]
            );
        }
    }
}
