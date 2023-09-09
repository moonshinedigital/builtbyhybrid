# Moonbase Wordpress Theme

- `cd into app/public/app/themes` and create a symlink.
- `ln -s ~/Developer/projectname/dist projectname`
- Will create a symlink called `projectname` within the themes directory that connects to the project `dist` directory.

Ultra-minimal WordPress theme intended to be used as a base theme for client websites:

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

Clone or download this repository, change its name to something else, and then you'll need to also run and search and replace for the `mb` prefix, changing it to your own.

### Setup

To start using all the tools that come with `moonbase` you need to install the necessary Node.js and Composer dependencies :

```sh
composer install
npm install
```

### Available CLI commands

- `composer lint:php` : checks all PHP files for syntax errors.
- `composer make-pot` : generates a .pot file in the `languages/` directory.
- `npm run start` : watches all style and javascript files and recompiles them when they change.
- `npm run lint` : checks all files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/) and [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run dev` : builds and minifies all development files into the `theme` directory for distribution.
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.
