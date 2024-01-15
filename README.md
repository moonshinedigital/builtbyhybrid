# Built By Hybrid WP Theme

Based on Moonbase, the Moonshine WordPress theme intended to be used as a base theme for client websites:

- Smartly organized starter CSS using Tailwind, with automatic bundling via `eslint`.
- Lean, well-commented, modern, HTML5 templates.
- Custom layout templates in `template-parts/`.
- Custom template tags in `inc/template-tags.php` that keep your theme neat and prevent duplication.
- Custom cleanup function in `inc/template-cleanup.php` to remove non-essential WP injections.
- Some small tweaks in `inc/template-functions.php` that can improve the theming experience.
- Uses `@dir-archiver` to bundle theme files as an easy to upload `zip` file.

## Installation

### Requirements

`moonbase` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)

### Quick Start

Clone or download this repository.


### Available CLI commands

- `npm run lint` : checks all PHP files for syntax errors.
- `npm run build` : builds and minifies all development files into the `build` directory for build distribution.
- `npm run package` : generates a .zip archive for build distribution, excluding development and system files.
