<?php

namespace Infobip\Test\Api\WebRtc;

use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Response;
use Infobip\Api\CallLinkApi;
use Infobip\Model\WebRtcCallLink;
use Infobip\Model\WebRtcCallLinkConfig;
use Infobip\Model\WebRtcCallLinkConfigPage;
use Infobip\Model\WebRtcCallLinkConfigRequest;
use Infobip\Model\WebRtcCallLinkPage;
use Infobip\Model\WebRtcCallLinkRequest;
use Infobip\Model\WebRtcCallLinkResponse;
use Infobip\Model\WebRtcImagePage;
use Infobip\Model\WebRtcImageResponse;
use Infobip\Model\WebRtcImageType;
use Infobip\Model\WebRtcSubdomain;
use Infobip\Model\WebRtcSubdomainRequest;
use Infobip\Model\WebRtcSubdomainResponse;
use Infobip\Test\Api\ApiTestBase;

class CallLinkApiTest extends ApiTestBase
{
    private const string CREATE_CALL_LINK = "/call-link/1/links";
    private const string GET_CALL_LINKS = "/call-link/1/links";
    private const string GET_CALL_LINK = "/call-link/1/links/{id}";
    private const string DELETE_CALL_LINK = "/call-link/1/links/{id}";
    private const string CREATE_CONFIGS = "/call-link/1/configs";
    private const string GET_CONFIGS = "/call-link/1/configs";
    private const string GET_CONFIG = "/call-link/1/configs/{id}";
    private const string UPDATE_CONFIG = "/call-link/1/configs/{id}";
    private const string PATCH_CONFIG = "/call-link/1/configs/{id}";
    private const string DELETE_CONFIG = "/call-link/1/configs/{id}";
    private const string GET_IMAGES = "/call-link/1/images";
    private const string UPLOAD_IMAGE = "/call-link/1/images/upload/{type}";
    private const string GET_IMAGE = "/call-link/1/images/{id}";
    private const string DELETE_IMAGE = "/call-link/1/images/{id}";
    private const string CREATE_SUBDOMAINS = "/call-link/1/subdomains";
    private const string GET_SUBDOMAINS = "/call-link/1/subdomains";
    private const string DELETE_SUBDOMAIN = "/call-link/1/subdomains/{id}";


    public function testCreateCallLink(): void
    {
        $givenRequest = <<<JSON
        {
          "destination": {
            "identity": "bob",
            "type": "WEBRTC"
          },
          "validityWindow": {
            "oneTime": true,
            "startTime": "2024-09-05T14:57:04.520+0000",
            "endTime": "2024-09-06T14:57:04.520+0000"
          },
          "callLinkConfigId": "638dbdc6ecede164c3799d04"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "string",
          "url": "https://call-link.com/string"
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(201, $this->givenRequestHeaders, $givenResponse),
                new Response(201, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallLinkApi($this->getConfiguration(), client: $client);

        $expectedPath = self::CREATE_CALL_LINK;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, WebRtcCallLinkRequest::class);

        $closures = [
            fn () => $api->createCallLink($request),
            fn () => $api->createCallLinkAsync($request),
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcCallLinkResponse::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer,
        );
    }

    public function testGetCallLinks(): void
    {
        $givenPage = 1;
        $givenSize = 10;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "id": "string",
              "identity": "john",
              "displayName": "John Doe",
               "showIdentity": true,
              "destination": {
                "identity": "bob",
                "type": "WEBRTC"
              },
              "customData": {
                "city": "New York",
                "language": "en"
              },
              "validityWindow": {
                "oneTime": true,
                "startTime": "2024-09-05T14:54:33.657+00:00",
                "endTime": "2024-09-06T14:54:33.657+00:00"
              },
              "callLinkConfigId": "638dbdc6ecede164c3799d04"
            },
            {
              "id": "1234",
              "identity": "jane",
              "displayName": "Jane Doe",
              "showIdentity": true,
              "destination": {
                "identity": "bob",
                "type": "WEBRTC"
              }
            }
          ],
          "paging": {
            "page": 1,
            "size": 10,
            "totalPages": 1,
            "totalResults": 2
          }
        }
        JSON;


        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallLinkApi($this->getConfiguration(), client: $client);

        $expectedPath = self::GET_CALL_LINKS
            . "?"
            . Query::build([
                "page" => $givenPage,
                "size" => $givenSize
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getCallLinks($givenPage, $givenSize),
            fn () => $api->getCallLinksAsync($givenPage, $givenSize),
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcCallLinkPage::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );

    }

    public function testGetCallLink(): void
    {
        $givenId = "string";

        $givenResponse = <<<JSON
        {
          "id": "string",
          "url": "string",
          "identity": "string",
          "displayName": "string",
          "showIdentity": true,
          "destination": {
            "identity": "bob",
            "type": "WEBRTC"
          },
          "customData": {
            "property1": "string",
            "property2": "string"
          },
          "validityWindow": {
            "oneTime": false,
            "startTime": "2023-01-01T08:00:00.000+00:00",
            "endTime": "2023-12-01T16:00:00.000+00:00",
            "acceptableHours": {
              "start": {
                "hour": 0,
                "minute": 0
              },
              "end": {
                "hour": 0,
                "minute": 0
              }
            },
            "acceptableDays": [
              "MONDAY"
            ]
          },
          "callLinkConfigId": "string"
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallLinkApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{id}", $givenId, self::GET_CALL_LINK);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getCallLink($givenId),
            fn () => $api->getCallLinkAsync($givenId),
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcCallLink::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );

    }

    public function testDeleteCallLink(): void
    {
        $givenId = "string";

        $givenResponse = <<<JSON
        {
          "id": "string",
          "url": "string",
          "identity": "string",
          "displayName": "string",
          "showIdentity": true,
          "destination": {
            "identity": "bob",
            "type": "WEBRTC"
          },
          "customData": {
            "property1": "string",
            "property2": "string"
          },
          "validityWindow": {
            "oneTime": false,
            "startTime": "2023-01-01T08:00:00.000+00:00",
            "endTime": "2023-12-01T16:00:00.000+00:00",
            "acceptableHours": {
              "start": {
                "hour": 0,
                "minute": 0
              },
              "end": {
                "hour": 0,
                "minute": 0
              }
            },
            "acceptableDays": [
              "MONDAY"
            ]
          },
          "callLinkConfigId": "string"
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallLinkApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{id}", $givenId, self::DELETE_CALL_LINK);

        $expectedHttpMethod = "DELETE";

        $closures = [
            fn () => $api->deleteCallLink($givenId),
            fn () => $api->deleteCallLinkAsync($givenId),
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcCallLink::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );
    }

    public function testCreateConfigs(): void
    {
        $givenRequest = <<<JSON
            {
              "name": "Company name",
              "theme": {
                "images": {
                  "logoImageId": "638dbe28ecede164c3799d06",
                  "backgroundImageId": "638dbe0cecede164c3799d05"
                },
                "messages": {
                  "welcomeText": "Call link page",
                  "inactiveText": "This link is no longer active.",
                  "expirationText": "This link has expired"
                },
                "colors": {
                  "primary": "D8D8D8",
                  "primaryText": "242424",
                  "background": "FFFFFF"
                }
              }
            }
            JSON;

        $givenResponse = <<<JSON
            {
                "callOptions": {
                    "camera": true,
                    "chat": false,
                    "dialPad": true,
                    "mute": true,
                    "recordingIndicator": false,
                    "screenShare": true,
                    "settings": true,
                    "switchCameraFacingMode": true
                },
                "id": "638dbdc6ecede164c3799d04",
                "initialOptions": {
                    "audio": true,
                    "cameraFacingMode": "FRONT",
                    "muted": false,
                    "settings": true,
                    "video": false
                },
                "isDefault": true,
                "name": "Company name",
                "theme": {
                    "colors": {
                        "background": "FFFFFF",
                        "primary": "D8D8D8",
                        "primaryText": "242424"
                    },
                    "images": {
                        "backgroundImageId": "638dbe0cecede164c3799d05",
                        "logoImageId": "638dbe28ecede164c3799d06"
                    },
                    "messages": {
                        "expirationText": "This link has expired",
                        "inactiveText": "This link is no longer active.",
                        "welcomeText": "Call link page"
                    }
                }
            }
            JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(201, $this->givenRequestHeaders, $givenResponse),
                new Response(201, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallLinkApi($this->getConfiguration(), client: $client);

        $expectedPath = self::CREATE_CONFIGS;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, WebRtcCallLinkConfigRequest::class);

        $closures = [
            fn () => $api->createConfig($request),
            fn () => $api->createConfigAsync($request),
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcCallLinkConfig::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer,
        );


    }

    public function testGetConfigs(): void
    {
        $givenPage = 0;
        $givenSize = 10;

        $givenResponse = <<<JSON
        {
            "paging": {
                "page": 0,
                "size": 10,
                "totalPages": 1,
                "totalResults": 2
            },
            "results": [
                {
                    "callOptions": {
                        "camera": true,
                        "chat": false,
                        "dialPad": true,
                        "mute": true,
                        "recordingIndicator": false,
                        "screenShare": true,
                        "settings": true,
                        "switchCameraFacingMode": true
                    },
                    "initialOptions": {
                        "audio": true,
                        "cameraFacingMode": "FRONT",
                        "muted": false,
                        "settings": true,
                        "video": false
                    },
                    "isDefault": false,
                    "name": "Company name",
                    "theme": {
                        "colors": {
                            "background": "FFFFFF",
                            "primary": "D8D8D8",
                            "primaryText": "242424"
                        },
                        "images": {
                            "backgroundImageId": "638dbe0cecede164c3799d05",
                            "logoImageId": "638dbe28ecede164c3799d06"
                        },
                        "messages": {
                            "expirationText": "This link has expired",
                            "inactiveText": "This link is no longer active.",
                            "welcomeText": "Call link page"
                        }
                    }
                },
                {
                    "isDefault": false,
                    "name": "Company name",
                    "theme": {
                        "colors": {
                            "background": "FFFFFF",
                            "primary": "D8D8D8",
                            "primaryText": "242424"
                        },
                        "images": {
                            "backgroundImageId": "638dbe0cecede164c3799d05",
                            "logoImageId": "638dbe28ecede164c3799d06"
                        },
                        "messages": {
                            "expirationText": "This link has expired",
                            "inactiveText": "This link is no longer active.",
                            "welcomeText": "Call link page"
                        }
                    }
                }
            ]
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallLinkApi($this->getConfiguration(), client: $client);

        $expectedPath = self::GET_CONFIGS
            . "?"
            . Query::build([
                "page" => $givenPage,
                "size" => $givenSize
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getConfigs(page: $givenPage, size: $givenSize),
            fn () => $api->getConfigsAsync(page: $givenPage, size: $givenSize)
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcCallLinkConfigPage::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );

    }

    public function testGetConfig(): void
    {
        $givenId = 1;

        $givenReponse = <<<JSON
        {
            "callOptions": {
                "camera": true,
                "chat": false,
                "dialPad": true,
                "mute": true,
                "recordingIndicator": false,
                "screenShare": true,
                "settings": true,
                "switchCameraFacingMode": true
            },
            "id": "638dbdc6ecede164c3799d04",
            "initialOptions": {
                "audio": true,
                "cameraFacingMode": "FRONT",
                "muted": false,
                "settings": true,
                "video": false
            },
            "isDefault": true,
            "name": "Company name",
            "theme": {
                "colors": {
                    "background": "FFFFFF",
                    "primary": "D8D8D8",
                    "primaryText": "242424"
                },
                "images": {
                    "backgroundImageId": "638dbe0cecede164c3799d05",
                    "logoImageId": "638dbe28ecede164c3799d06"
                },
                "messages": {
                    "expirationText": "This link has expired",
                    "inactiveText": "This link is no longer active.",
                    "welcomeText": "Call link page"
                }
            }
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenReponse),
                new Response(200, $this->givenRequestHeaders, $givenReponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallLinkApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{id}", $givenId, self::GET_CONFIG);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getConfig(id: $givenId),
            fn () => $api->getConfigAsync(id: $givenId)
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcCallLinkConfig::class,
            expectedResponse: $givenReponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );

    }

    public function testUpdateConfig(): void
    {
        $givenId = "638dbdc6ecede164c3799d04";

        $givenRequest = <<<JSON
        {
          "name": "Company name",
          "initialOptions": {
            "audio": true,
            "video": false,
            "muted": false,
            "cameraFacingMode": "FRONT"
          },
          "callOptions": {
            "mute": true,
            "screenShare": true,
            "switchCameraFacingMode": true,
            "dialPad": true
          },
          "theme": {
            "images": {
              "logoImageId": "638dbe28ecede164c3799d06",
              "backgroundImageId": "638dbe0cecede164c3799d05"
            },
            "messages": {
              "welcomeText": "Call link page",
              "inactiveText": "This link is no longer active.",
              "expirationText": "This link has expired"
            },
            "colors": {
              "primary": "D8D8D8",
              "primaryText": "242424",
              "background": "FFFFFF"
            }
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
            "callOptions": {
                "camera": true,
                "chat": false,
                "dialPad": true,
                "mute": true,
                "recordingIndicator": false,
                "screenShare": true,
                "settings": true,
                "switchCameraFacingMode": true
            },
            "id": "638dbdc6ecede164c3799d04",
            "initialOptions": {
                "audio": true,
                "cameraFacingMode": "FRONT",
                "muted": false,
                "settings": true,
                "video": false
            },
            "isDefault": true,
            "name": "Company name",
            "theme": {
                "colors": {
                    "background": "FFFFFF",
                    "primary": "D8D8D8",
                    "primaryText": "242424"
                },
                "images": {
                    "backgroundImageId": "638dbe0cecede164c3799d05",
                    "logoImageId": "638dbe28ecede164c3799d06"
                },
                "messages": {
                    "expirationText": "This link has expired",
                    "inactiveText": "This link is no longer active.",
                    "welcomeText": "Call link page"
                }
            }
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallLinkApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{id}", $givenId, self::UPDATE_CONFIG);

        $expectedHttpMethod = "PUT";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, WebRtcCallLinkConfigRequest::class);

        $closures = [
            fn () => $api->updateConfig(id: $givenId, webRtcCallLinkConfigRequest: $request),
            fn () => $api->updateConfigAsync(id: $givenId, webRtcCallLinkConfigRequest: $request)
        ];


        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcCallLinkConfig::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer,
        );

    }

    public function testPatchConfig(): void
    {
        $givenId = "638dbdc6ecede164c3799d04";

        $givenRequest = <<<JSON
        {
          "name": "Company name",
          "initialOptions": {
            "audio": true,
            "video": false,
            "muted": false,
            "cameraFacingMode": "FRONT"
          },
          "callOptions": {
            "mute": true,
            "screenShare": true,
            "switchCameraFacingMode": true,
            "dialPad": true
          },
          "theme": {
            "images": {
              "logoImageId": "638dbe28ecede164c3799d06",
              "backgroundImageId": "638dbe0cecede164c3799d05"
            },
            "messages": {
              "welcomeText": "Call link page",
              "inactiveText": "This link is no longer active.",
              "expirationText": "This link has expired"
            },
            "colors": {
              "primary": "D8D8D8",
              "primaryText": "242424",
              "background": "FFFFFF"
            }
          }
        }
        JSON;

        $givenResponse = <<<JSON
        {
            "callOptions": {
                "camera": true,
                "chat": false,
                "dialPad": true,
                "mute": true,
                "recordingIndicator": false,
                "screenShare": true,
                "settings": true,
                "switchCameraFacingMode": true
            },
            "id": "638dbdc6ecede164c3799d04",
            "initialOptions": {
                "audio": true,
                "cameraFacingMode": "FRONT",
                "muted": false,
                "settings": true,
                "video": false
            },
            "isDefault": true,
            "name": "Company name",
            "theme": {
                "colors": {
                    "background": "FFFFFF",
                    "primary": "D8D8D8",
                    "primaryText": "242424"
                },
                "images": {
                    "backgroundImageId": "638dbe0cecede164c3799d05",
                    "logoImageId": "638dbe28ecede164c3799d06"
                },
                "messages": {
                    "expirationText": "This link has expired",
                    "inactiveText": "This link is no longer active.",
                    "welcomeText": "Call link page"
                }
            }
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallLinkApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{id}", $givenId, self::PATCH_CONFIG);

        $expectedHttpMethod = "PATCH";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, WebRtcCallLinkConfigRequest::class);

        $closures = [
            fn () => $api->patchConfig(id: $givenId, webRtcCallLinkConfigRequest: $request),
            fn () => $api->patchConfigAsync(id: $givenId, webRtcCallLinkConfigRequest: $request)
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcCallLinkConfig::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer,
        );


    }

    public function testDeleteConfig(): void
    {
        $givenId = "638dbdc6ecede164c3799d04";

        $givenResponse = <<<JSON
        {
            "callOptions": {
                "camera": true,
                "chat": false,
                "dialPad": true,
                "mute": true,
                "recordingIndicator": false,
                "screenShare": true,
                "settings": true,
                "switchCameraFacingMode": true
            },
            "id": "638dbdc6ecede164c3799d04",
            "initialOptions": {
                "audio": true,
                "cameraFacingMode": "FRONT",
                "muted": false,
                "settings": true,
                "video": false
            },
            "isDefault": true,
            "name": "Company name",
            "theme": {
                "colors": {
                    "background": "FFFFFF",
                    "primary": "D8D8D8",
                    "primaryText": "242424"
                },
                "images": {
                    "backgroundImageId": "638dbe0cecede164c3799d05",
                    "logoImageId": "638dbe28ecede164c3799d06"
                },
                "messages": {
                    "expirationText": "This link has expired",
                    "inactiveText": "This link is no longer active.",
                    "welcomeText": "Call link page"
                }
            }
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallLinkApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{id}", $givenId, self::DELETE_CONFIG);

        $expectedHttpMethod = "DELETE";

        $closures = [
            fn () => $api->deleteConfig(id: $givenId),
            fn () => $api->deleteConfigAsync(id: $givenId)
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcCallLinkConfig::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );

    }

    public function testGetImages(): void
    {
        $givenPage = 0;
        $givenSize = 10;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "id": "638f29f0ee8f0c1da369a722",
              "name": "logo.png",
              "type": "LOGO",
              "size": 512
            },
            {
              "id": "968f29f0ee8f0c1da369a545",
              "name": "background.jpg",
              "type": "BACKGROUND",
              "size": 1512
            }
          ],
          "paging": {
            "page": 0,
            "size": 10,
            "totalPages": 1,
            "totalResults": 2
          }
        }
        JSON;


        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallLinkApi($this->getConfiguration(), client: $client);

        $expectedPath = self::GET_IMAGES
            . "?"
            . Query::build([
                "page" => $givenPage,
                "size" => $givenSize
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getImages($givenPage, $givenSize),
            fn () => $api->getImagesAsync($givenPage, $givenSize)
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcImagePage::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );


    }

    public function testUploadImage(): void
    {
        $givenType = new WebRtcImageType("LOGO");

        $givenRequest = new \SplFileObject(dirname(__DIR__) . "/resources/test.png");

        $givenResponse = <<<JSON
        {
          "id": "638f29f0ee8f0c1da369a722",
          "name": "test.png",
          "type": "LOGO",
          "size": 360
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(201, $this->givenRequestHeaders, $givenResponse),
                new Response(201, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallLinkApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{type}", (string) $givenType, self::UPLOAD_IMAGE);

        $expectedHttpMethod = "POST";

        $this -> getObjectSerializer() -> toPathvalue((string) $givenType);

        $closures = [
            fn () => $api->uploadImage(type : $givenType, file : $givenRequest),
            fn () => $api->uploadImageAsync(type : $givenType, file : $givenRequest)
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcImageResponse::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer,
        );
    }

    public function testGetImage(): void
    {
        $givenId = "638f29f0ee8f0c1da369a722";

        $givenResponse = <<<JSON
        {
          "id": "638f29f0ee8f0c1da369a722",
          "name": "logo.png",
          "type": "LOGO",
          "size": 512
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallLinkApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{id}", $givenId, self::GET_IMAGE);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getImage($givenId),
            fn () => $api->getImageAsync($givenId)
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcImageResponse::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );

    }

    public function testDeleteImage(): void
    {
        $givenId = "638f29f0ee8f0c1da369a722";

        $givenResponse = <<<JSON
        {
          "id": "638f29f0ee8f0c1da369a722",
          "name": "logo.png",
          "type": "LOGO",
          "size": 512
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallLinkApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{id}", $givenId, self::DELETE_IMAGE);

        $expectedHttpMethod = "DELETE";

        $closures = [
            fn () => $api->deleteImage($givenId),
            fn () => $api->deleteImageAsync($givenId)
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcImageResponse::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );

    }

    public function testCreateSubdomain(): void
    {
        $givenRequest = <<<JSON
        {
          "name": "infobip"
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "id": "638f29f0ee8f0c1da369a722",
          "name": "infobip"
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallLinkApi($this->getConfiguration(), client: $client);

        $expectedPath = self::CREATE_SUBDOMAINS;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, WebRtcSubdomainRequest::class);

        $closures = [
            fn () => $api->createSubdomain($request),
            fn () => $api->createSubdomainAsync($request),
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcSubdomain::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );

    }

    public function testGetSubdomains(): void
    {
        $givenResponse = <<<JSON
        [
          {
            "id": "string",
            "name": "string"
          }
        ]
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallLinkApi($this->getConfiguration(), client: $client);

        $expectedPath = self::GET_SUBDOMAINS;

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getSubdomains(),
            fn () => $api->getSubdomainsAsync(),
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcSubdomainResponse::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );

    }

    public function testDeleteSubdomain(): void
    {
        $givenId = "string";

        $givenResponse = <<<JSON
        {
          "id": "string",
          "name": "string"
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response(200, $this->givenRequestHeaders, $givenResponse),
                new Response(200, $this->givenRequestHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $api = new CallLinkApi($this->getConfiguration(), client: $client);

        $expectedPath = str_replace("{id}", $givenId, self::DELETE_SUBDOMAIN);

        $expectedHttpMethod = "DELETE";

        $closures = [
            fn () => $api->deleteSubdomain($givenId),
            fn () => $api->deleteSubdomainAsync($givenId),
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: WebRtcSubdomain::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );
    }

}
