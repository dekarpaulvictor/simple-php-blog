# About

This is a simple "flat-file" (no database) PHP blog written using plain PHP, Twig and
Bootstrap.

Blog posts are stored as Markdown files in the `posts` folder using the
following file name pattern: `yy-mm-dd_awesome-title.md`. In the `includes`
folder there is a `funcs.php` file that contains the post-parsing logic.

## Local Installation

1. Make sure you have `composer` in your PATH. `composer` is a dependency
   manager for PHP projects. We've used `Twig` (a templating library),
   `Parsedown` (a library to help render Markdown content to HTML for display on
   the blog posts) and `Bramus Router` (a routing library).

2. Clone this repository: `git clone
   https://github.com/dekarpaulvictor/simple-php-blog.git`

3. Run `composer install` in the repository's root directory to download and install the dependencies.

4. Copy the project folder to your `Apache` or `Nginx` root server directory and open
   it in your browser just like you would any other local PHP project, e.g. by
   typing `http://localhost/simple-php-blog` in your browser's url bar.

# TODO

1. Add controllers to edit, update and delete blog posts
2. Store posts in a database
3. Let a user with `admin` or `edit` roles log in and create blog content
