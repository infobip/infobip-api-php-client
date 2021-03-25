# Change Log of `infobip-api-php-client`

All notable changes to the library will be documented in this file.

The format of the file is based on [Keep a Changelog](http://keepachangelog.com/) and this library adheres to [Semantic Versioning](http://semver.org/) as mentioned in [README.md][readme] file.

## [ [3.0.0](https://github.com/infobip/infobip-api-php-client/releases/tag/3.0.0) ] - 2021-03-23

🎉 **NEW Major Version of `infobip-api-php-client`.**

⚠️ **IMPORTANT NOTE:** This release contains breaking changes!

In this release, the infobip-api-php-client library is vastly changed and modernized. It is auto-generated and completely different from the previous version, so we do not provide an upgrade guide from 2.x to 3.x because such a document will be a similar size as the library itself.

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
