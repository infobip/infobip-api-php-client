<?php

use Infobip\Api\Channel;
use Infobip\Configuration;
use Infobip\Client;

class Configs
{
    public string $host;
    public string $apiKey;
}
final class Infobip
{
    public Client $client;

    public Channel $channel;

    public function __construct(private Configuration|Configs $configuration)
    {
        // Initial configuration object
        if ($configuration instanceof Configuration) {
            $this->configuration = $configuration;
        } else {
            $this->configuration = new Configuration(
                host: $configuration->host,
                apiKey: $configuration->apiKey,
            );
        }

        // Configure the client
        $this->client = new Client($this->configuration);

        // Add the channels
        $this->channel = new Channel($this->client);
    }
}