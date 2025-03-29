# Automad Theme Naming Conventions

This guide outlines the naming conventions to follow when developing an Automad theme. Consistent naming helps maintain readability and ensures seamless integration with Automad’s UI and functionality.
Following these conventions ensures better organization, readability, and consistency across Automad themes.

## PHP Files

The names of templates in the root of this repository as well as block-templates in the `blocks/` and `snippets/` directories are exposed to the UI. The character `_` is used to identify whitespace. Therefore, unlike the naming convention for other PHP files, these files must be named using snake casing. This allows the Dashboard to convert filenames into a human-readable form, such as `masonry_large.php` being displayed as `Masonry Large`.

All other PHP files in an Automad theme that are not exposed to the UI should follow the standard camelCasing style.

## TypeScript Files

TypeScript files that define a single class must use PascalCase, while regular TypeScript files, such as modules and utilities, must use camelCase. For example, `MyElement.ts` represents a single class, whereas `myModule.ts` is a regular module.

## CSS and LESS Files

Stylesheets should only contain a single class, and file names must be CSS-compliant. All style files follow kebab-case, and the filename should match the included CSS class, prefixed with .std- in the class name. For example, `.my-class.less` defines `.std-my-class`, and `.hero-banner.less` defines `.std-hero-banner`.
