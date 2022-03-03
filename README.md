# About

This is a simple "flat-file" PHP blog written using plain PHP, Twig and
Bootstrap.

Blog posts are stored as Markdown files in the `posts` folder using the
following file name pattern: `yy-mm-dd_awesome-title.md`.

## Local Installation

1. Make sure you have `composer` in your PATH. `composer` is a dependency
   manager for PHP projects. We've used `Twig` (a templating library),
   `Parsedown` (a Markdown renderer) and `Bramus Router` (a routing library).

2. Clone this repository: `git clone
   https://github.com/dekarpaulvictor/simple-php-blog.git`

3. Run `composer install` in the repository's root directory to download and install the dependencies.

4. Copy the project folder to your `Apache` or `Nginx` root server directory and open
   it in your browser just like you would any other local PHP project, e.g. by
   typing `http://localhost/simple-php-blog` in your browser's url bar.
