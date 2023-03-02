# Change Log

All notable changes to the library will be documented in this file.

The format of the file is based on [Keep a Changelog](http://keepachangelog.com/) and this library adheres to [Semantic Versioning](http://semver.org/) as mentioned in the [README.md][readme] file.

## [ [5.0.0](https://github.com/infobip/infobip-api-php-client/releases/tag/5.0.0) ] - 2023-03-01

⚠️ **IMPORTANT NOTE:** This release contains breaking changes!

🎉 **NEW Major Version of `infobip-api-php-client`.**

### Added
* Support for [Infobip MMS API](https://www.infobip.com/docs/api/channels/mms).
* Support for [Infobip Voice API](https://www.infobip.com/docs/api/channels/voice).
* Support for [Infobip WebRTC API](https://www.infobip.com/docs/api/channels/webrtc).
* Support for [Infobip Viber API](https://www.infobip.com/docs/api/channels/viber).
* Most recent [Infobip SMS API](https://www.infobip.com/docs/api/channels/sms) feature set.
* Most recent [Email](https://www.infobip.com/docs/api/channels/email) feature set.
* Most recent [WhatsApp](https://www.infobip.com/docs/api/channels/whatsapp) feature set.

### Changed
- Fully refactored codebase using Symfony components

## [ [4.0.0](https://github.com/infobip/infobip-api-php-client/releases/tag/4.0.0) ] - 2022-10-21

⚠️ **IMPORTANT NOTE:** This release contains breaking changes!

### Changed
- The minimum supported PHP version has been changed to 8.0
- Get WhatsApp template / Create WhatsApp template have breaking changes as they're using the new v2 API endpoints. The body and footer are no longer strings but objects.
- **getEmailLogs**' input parameters **sentSince** and **sentUntil** now correctly defined as `DateTime` type

### Added
- Delete WhatsApp template

### Fixed
- [PHP 8 deprecation issues](https://github.com/infobip/infobip-api-php-client/issues/47)

## [ [3.2.0](https://github.com/infobip/infobip-api-php-client/releases/tag/3.2.0) ] - 2022-03-29

### Added
- Support for [Infobip WhatsApp API](https://www.infobip.com/docs/api#channels/whatsapp)

### Changed
- Renamed **EmailLogResponse** to **EmailLogsResponse**
- Added default value of **false** for parameter **flash** in **SmsTextualMessage**

### Removed
- Dev dependencies
- Unused models

## [ [3.1.0](https://github.com/infobip/infobip-api-php-client/releases/tag/3.1.0) ] - 2021-11-19

### Added
- Support for [Infobip Email API](https://www.infobip.com/docs/api#channels/email)

### Changed
- Update Guzzle HTTP client version from 6.5 to 7.3

## [ [3.0.0](https://github.com/infobip/infobip-api-php-client/releases/tag/3.0.0) ] - 2021-03-23

🎉 **NEW Major Version**

⚠️ **IMPORTANT NOTE:** This release contains breaking changes!

In this release, the library is vastly changed and modernized. It is auto-generated and completely different from the previous version, so we do not provide an upgrade guide from 2.x to 3.x because such a document will be a similar size as the library itself.

### Added
- Support for async execution
- `CONTRIBUTING.md` containing guidelines for creating GitHub issues
- Support for [Infobip Two-factor Authentication API](https://www.infobip.com/docs/api#channels/sms/send-2fa-pin-code-over-sms)

### Changed
- Models, structure, examples, etc. for [Infobip SMS API](https://www.infobip.com/docs/api#channels/sms)
- Library dependencies
- `README.md` which contains necessary data and examples for quickstart as well as some other important pieces of information on versioning, licensing, etc.
- LICENSE which is now MIT

### Removed
- Support for [Infobip Omni API](https://www.infobip.com/docs/api#channels/omni-failover) (to be included back in one of the next releases)

[readme]: README.md
