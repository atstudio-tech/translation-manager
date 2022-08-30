# Changelog

All changes to the `translation-manager` package will be documented in this file.

### 1.0.2 – 2022-08-30

#### Added
- Sorting in alphabetical order (asc or desc). From GUI only.
- Added a new `tm.source_locale` configuration option. This option is used to set the source locale for the translation manager.

### 1.0.1 – 2022-08-24

#### Added
- Improved parser with a wider range of supported translation strings.

#### Fixed
- Prefixed `ATStudio\TranslationManager\TranslationManager` with `Facades` to call `TranslationManager::scan()` statically.

### 1.0.0 - 2022-04-01

Initial release.
