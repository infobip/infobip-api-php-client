<?php

namespace Infobip\Test\Api;

use Infobip\Model\SmsUpdateStatusRequest;
use Infobip\Model\WhatsAppAudioContent;
use Infobip\ObjectSerializer;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase
{
    private ObjectSerializer $objectSerializer;

    protected function setUp(): void
    {
        $this->objectSerializer = new ObjectSerializer();
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelValidationShouldTriggerException(
        object $model,
        array $expectedMessages = ['Validation failed']
    ): void {
        // given
        $this->expectException(InvalidArgumentException::class);

        // when, then
        try {
            $this->objectSerializer->serialize($model);
        } catch (InvalidArgumentException $exception) {
            $exceptionMessage = $exception->getMessage();

            foreach ($expectedMessages as $expectedMessage) {
                $this->assertStringContainsString($expectedMessage, $exceptionMessage);
            }

            throw $exception;
        }
    }

    public static function modelDataProvider(): array
    {
        return [
            [
                new SmsUpdateStatusRequest(status: ''),
                ['This value should not be blank.']
            ],
            [
                new WhatsAppAudioContent(mediaUrl: str_repeat('m', 2049)),
                ['This value is too long']
            ],
            [
                new WhatsAppAudioContent(mediaUrl: ''),
                [
                    'This value should not be blank',
                    'This value is too short'
                ]
            ]
        ];
    }
}
