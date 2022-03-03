<?php

// Require composer's autoloader
require __DIR__ . '/vendor/autoload.php';

// Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);

// Require functions for reading, creating, editing
// and deleting blog posts
include 'includes/funcs.php';

// Define routes to get, post, edit and delete blog posts
$router = new \Bramus\Router\Router();

// Home page route
$router->get('/', function() {
    // Get the top 3 posts
    $posts = get_posts();

    global $twig;
    echo $twig->render('index.html', [
        'title' => 'Home',
        'posts' => array_slice($posts, 0, 3) // Return top 3 posts
    ]);
});

// Blog page route
$router->get('/blog', function() {
    // Get all the posts
    $posts = get_posts();

    global $twig;
    echo $twig->render('blog.html', [
        'title' => 'Blog',
        'posts' => $posts // pass the variable containing all the posts
    ]);
});

// Route to match a url pattern such as '/blog/Y/m/d/slug'
// The year, month and day part of the url is optional
$router->get(
    '/blog(/\d+)?(/\d+)?(/\d+)?(/[a-z0-9_-]+)?',
    function($year = null, $month = null, $day = null, $slug = null) {
        
        $matched_route = 'blog' . '/' . $year . '/' . $month . '/' . $day . '/' . $slug;

        $assets_dir = end(explode('/', __DIR__)) . '/' . 'assets';

        // Get the post whose url matches the route
        $posts = get_posts();
        foreach ($posts as $post) {
            if ($matched_route == $post->url) {
                global $twig;
                echo $twig->render('blogpost.html', [
                    'post' => $post,
                    'assets_dir' => $assets_dir
                ]);

                // break out of this loop
                break;
            }
        }
    }
);


// About page route
$router->get('/about', function() {
    global $twig;
    echo $twig->render('about.html', [
        'title' => 'About'
    ]);
});

$router->set404('/.*', function() {
    header('HTTP/1.1 404 Not Found');
    echo "Page not found";
});

// Execute the router
$router->run();




