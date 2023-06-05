<?php

use Infobip\Configuration;
use Infobip\Api\SMS;

class Configs {
    public string $host;
    public string $apiKey;
}
class Channel {
    public SMS $sms;

    public function __construct(Configuration $configuration) {
        $this->sms = new SMS($configuration);
    }
}
final class Infobip
{
    private Configuration $configuration;

    public Channel $channel;

    public function __construct(Configuration|Configs $configuration)
    {
        // Initial configuration object
        if ($configuration) {
            $this->configuration = $configuration;
        } else {
            $this->configuration = new Configuration(
                host: $configuration->host,
                apiKey: $configuration->apiKey,
            );
        }

        // Configure the client

        // Add the channels
        $this->channel = new Channel($this->configuration);
    }
}