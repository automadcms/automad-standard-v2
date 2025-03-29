# Automad Theme Naming Conventions

This guide outlines the naming conventions to follow when developing an Automad theme. Consistent naming helps maintain readability and ensures seamless integration with Automad’s UI and functionality.
Following these conventions ensures better organization, readability, and consistency across Automad themes.

## PHP Files

> [!IMPORTANT]
> These naming conventions differ significantly from those used in the main Automad source code. Theme files follow specific formatting rules to ensure proper UI integration.

PHP files in Automad themes are potentially exposed to the UI. The character `_` is used to identify whitespace. Therefore, unlike the naming convention in the main Automad source, all PHP files have to be named using snake casing. That way, when selecting files in the Dashboard, their file name is converted to a human-readable form, such as `masonry_large.php` being displayed as `Masonry Large`.

## TypeScript Files

TypeScript files that define a single class must use PascalCase, while regular TypeScript files, such as modules and utilities, must use camelCase. For example, `MyElement.ts` represents a single class, whereas `myModule.ts` is a regular module.

## CSS and LESS Files

Stylesheets should only contain a single class, and file names must be CSS-compliant. All style files follow kebab-case, and the filename should match the included CSS class, prefixed with .std- in the class name. For example, `.my-class.less` defines `.std-my-class`, and `.hero-banner.less` defines `.std-hero-banner`.
