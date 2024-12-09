<?php

declare(strict_types=1);

namespace Infobip\Test\Api\Email;

use Infobip\Api\EmailApi as EmailValidationApi;
use Infobip\Model\EmailValidationRequest;
use Infobip\Model\EmailValidationResponse;
use Infobip\Test\Api\ApiTestBase;

class ValidationEmailTest extends ApiTestBase
{
    private const string VALIDATE_EMAIL_ADDRESSES = "/email/2/validation";

    public function testValidateEmailAddresses(): void
    {
        $methodParams = [
            'givenTo' => "john.smith@somedomain.com",
            'expectedValidMailbox' => true,
            'expectedValidSyntax' => true,
            'expectedCatchAll' => false,
            'expectedDidYouMean' => true,
            'expectedDisposable' => false,
            'expectedRoleBased' => true,
        ];

        $expectedRequest = <<<JSON
        {
            "to": "{$methodParams['givenTo']}"
        }
        JSON;

        $expectedValidSyntax = var_export($methodParams['expectedValidSyntax'], true);
        $expectedCatchAll = var_export($methodParams['expectedCatchAll'], true);
        $expectedDisposable = var_export($methodParams['expectedDisposable'], true);
        $expectedRoleBased = var_export($methodParams['expectedRoleBased'], true);

        $givenResponse = <<<JSON
        {
            "to": "{$methodParams['givenTo']}",
            "validMailbox": "{$methodParams['expectedValidMailbox']}",
            "validSyntax": $expectedValidSyntax,
            "catchAll": $expectedCatchAll,
            "didYouMean": "{$methodParams['expectedDidYouMean']}",
            "disposable": $expectedDisposable,
            "roleBased": $expectedRoleBased
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $validationApi = new EmailValidationApi(config: $this->getConfiguration(), client: $client);

        $request = new EmailValidationRequest(to: $methodParams['givenTo']);

        $closures = [
            fn () => $validationApi->validateEmailAddresses($request),
            fn () => $validationApi->validateEmailAddressesAsync($request),
        ];

        foreach ($closures as $index => $closure) {
            $responseModel = $this->getUnpackedModel($closure());

            $this->assertValidateEmail($responseModel, $methodParams);

            $this->assertRequestWithHeadersAndJsonBody(
                'POST',
                self::VALIDATE_EMAIL_ADDRESSES,
                $expectedRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    private function assertValidateEmail(EmailValidationResponse $response, $methodParams): void
    {
        $this->assertEquals($methodParams['givenTo'], $response->getTo());
        $this->assertEquals($methodParams['expectedValidMailbox'], $response->getValidMailbox());
        $this->assertEquals($methodParams['expectedValidSyntax'], $response->getValidSyntax());
        $this->assertEquals($methodParams['expectedCatchAll'], $response->getCatchAll());
        $this->assertEquals($methodParams['expectedDidYouMean'], $response->getDidYouMean());
        $this->assertEquals($methodParams['expectedDisposable'], $response->getDisposable());
        $this->assertEquals($methodParams['expectedRoleBased'], $response->getRoleBased());
    }
}
