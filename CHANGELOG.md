# Changelog

## 3.0.0 - 2024-09-29

### Changed
- Now requires Craft 5.0+.

## 2.0.0 - 2024-09-29
> {note} The plugin’s package name has changed to `verbb/readability`. Readability will need be updated to 2.0 from a terminal, by running `composer require verbb/readability && composer remove mikestecker/craft-readability`.

### Changed
- Migration to `verbb/readability`.
- Now requires Craft 4.0+.

## 1.0.4 - 2018-04-04

### Changed
- Simply updated the base `craftcms/cms1` requirement from `^3.0.0-RC1` to `^3.0.0`.

## 1.0.3 - 2018-01-29

### Changed
- Updated path and repo name to fit within new recommended guidelines [as discussed here](https://craftcms.stackexchange.com/questions/23535/craft-3-plugin-backwards-compatibility-and-maintenance-for-2-x).

## 1.0.2 - 2017-12-11

### Changes
- Updated to require `craftcms/cms ^3.0.0-RC1`.
- Switched to `Craft::$app->view->registerTwigExtension` to register the Twig extension.

## 1.0.1 - 2017-11-07

### Changes
- Updated `composer.json`.

## 1.0.0 - 2017-11-06

### Added
- Initial release.