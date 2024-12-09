# Change Log

All notable changes to the library will be documented in this file.

The format of the file is based on [Keep a Changelog](http://keepachangelog.com/) and this library adheres to [Semantic Versioning](http://semver.org/) as mentioned in the [README.md][readme] file.

## [ [6.0.0](https://github.com/infobip/infobip-api-php-client/releases/tag/6.0.0) ] - 2024-12-09

⚠️ **IMPORTANT NOTE:** This release contains breaking changes! From this point onward PHP version 8.0 is no longer supported. Minimum PHP version required is 8.3.

In this release we updated the library to use the latest version of the Infobip API. We also updated the library to use the latest version of the Symfony components. Minimum Symfony
version required is 7.0.

🎉 **NEW Major Version of `infobip-api-php-client`.**

### Added
* Support for [Infobip Messages API](https://www.infobip.com/docs/api/platform/messages-api).
* Most recent [Infobip Voice API](https://www.infobip.com/docs/api/channels/voice) feature set.
* Most recent [Infobip SMS API](https://www.infobip.com/docs/api/channels/sms) feature set.
* Most recent [Infobip 2FA API](https://www.infobip.com/docs/api/platform/2fa) feature set.
* Most recent [Infobip MMS API](https://www.infobip.com/docs/api/channels/mms) feature set.
* Most recent [Infobip Email API](https://www.infobip.com/docs/api/channels/email) feature set.
* Most recent [Infobip WhatsApp API](https://www.infobip.com/docs/api/channels/whatsapp) feature set.
* Most recent [Infobip Viber API](https://www.infobip.com/docs/api/channels/viber) feature set.
* Most recent [Infobip WebRTC API](https://www.infobip.com/docs/api/channels/webrtc-calls) feature set.
* PHP CS Fixer and PHPStan dev dependencies for code quality checks.
* Additional set of integration tests.

### Changed

#### Dependencies
* Require PHP version 8.3 or higher.
* Bumped Symfony components to the latest major version.

#### Model changes
* Migration to the new SMS v3 API. Check the [README.md][readme] for updated examples.
  * Introduced the new [SmsMessage](Infobip/Model/SmsMessage.php) class to replace `SmsTextualMessage` and `SmsBinaryMessage`, providing a unified structure for SMS messaging.
  * Added a content field within `SmsMessage` to define the message content.
    This supports both textual and binary messages, which can be created using [SmsTextContent](Infobip/Model/SmsTextContent.php) or [SmsBinaryContent](Infobip/Model/SmsBinaryContent.php), respectively.
  * Unified request classes by replacing `SmsAdvancedTextualRequest` and `SmsAdvancedBinaryRequest` with the new [SmsRequest](Infobip/Model/SmsRequest.php) class.
  * Consolidated sending functions: use `sendSmsMessages` instead of the `sendSmsMessage` and `sendBinarySmsMessage` functions. 
* Across all Call models, the `applicationId` field has been removed and replaced with the `platform` field, as encapsulates platform fields and reflects the current state of the endpoint.
  In addition to that, a new required `callsConfigurationId` field has been added.
* Removed delivery time window configuration classes (`SmsDeliveryTimeWindow`, `MmsDeliveryTimeWindow`, `ViberDeliveryTimeWindow`, `CallRoutingAllowedTimeWindow`, `CallsDeliveryTimeWindow`, `SmsDeliveryTimeWindow`, `CallsTimeWindow`) in favor of a unified class: [DeliveryTimeWindow](Infobip/Model/DeliveryTimeWindow.php)
* Removed delivery time configuration classes (`SmsDeliveryTimeFrom`, `SmsDeliveryTimeTo`, `MmsDeliveryTime`, `ViberDeliveryTime`, `CallsTimeWindowPoint`, `WebRtcTimeOfDay`, `CallRoutingAllowedTimeFrom`, `CallRoutingAllowedTimeTo`, `WebRtcTimeOfDay`) in favor of a unified class: [DeliveryTime](Infobip/Model/DeliveryTime.php)
* Removed URL options configuration classes (`MessagesApiUrlOptions`, `ViberUrlOptions`, `WhatsAppUrlOptions`) in favor of a unified class: [UrlOptions](Infobip/Model/UrlOptions.php)
* Removed CPaaS X platform configuration classes (`ViberPlatform`, `MessagesApiPlatform`) in favor of a unified class: [Platform](Infobip/Model/Platform.php)
* Removed delivery day enumeration classes (`SmsDeliveryDay`, `MmsDeliveryDay`, `CallsDeliveryDay`, `CallRoutingAllowedDay`) in favor of a unified class: [DeliveryDay](Infobip/Model/DeliveryDay.php)
* Removed validity period configuration classes (`ViberValidityPeriod`, `MessagesApiValidityPeriod`) in favor of a unified class: [ValidityPeriod](Infobip/Model/ValidityPeriod.php)
* Removed validity period time unit enumeration classes (`ViberValidityPeriodTimeUnit`, `MessagesApiValidityPeriodTimeUnit`) in favor of a unified class: [ValidityPeriodTimeUnit](Infobip/Model/ValidityPeriodTimeUnit.php)
* Removed `ModelInterface` since it's no longer needed and not used in serialization anymore.

### Fixed
- Sending Email to multiple recipients.

## [ [5.1.4](https://github.com/infobip/infobip-api-php-client/releases/tag/5.1.4) ] - 2023-06-19

### Fixed
- Update composer.json to match the package version.

## [ [5.1.3](https://github.com/infobip/infobip-api-php-client/releases/tag/5.1.3) ] - 2023-06-19

### Fixed
- https://github.com/infobip/infobip-api-php-client/issues/54

## [ [5.1.2](https://github.com/infobip/infobip-api-php-client/releases/tag/5.1.2) ] - 2023-06-09

### Changed
- Removed Snyk

## [ [5.1.1](https://github.com/infobip/infobip-api-php-client/releases/tag/5.1.1) ] - 2023-05-19

### Changed
- Added composer.lock for Snyk

## [ [5.1.0](https://github.com/infobip/infobip-api-php-client/releases/tag/5.1.0) ] - 2023-04-24

⚠️ **IMPORTANT NOTE:** Obsolete models that are not used since release 5.0.0 have been removed. You should not use them anymore.

### Removed
- Obsolete code pre 5.0.0 release (API classes, models)

### Fixed
- Email sending with attachments and inline images

### Changed
- Updated email README

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
