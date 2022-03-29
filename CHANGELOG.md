# Change Log

All notable changes to the library will be documented in this file.

The format of the file is based on [Keep a Changelog](http://keepachangelog.com/) and this library adheres to [Semantic Versioning](http://semver.org/) as mentioned in [README.md][readme] file.

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
