# Changelog

All Notable changes to `Sitemap` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## v0.1-beta.2 [2017-02-01]

## Added
- Ability to specify admin middleware in config file
- Removed references to Laravel's form classes to reduce dependencies
- Added PHPUnit tests

## Changed
- All references in code to middleware changed to point to config file
- Fixed migrations
- Changed controller so it doesn't error out if no data in database
- Other bug fixes

## v0.1-beta.1 - 2017-01-18

### Added
- Dynamically generated sitemap index

### Fixed
- Fixed some migrations that were causing problems

