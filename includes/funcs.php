<?php

// Functions to get post titles, content and render posts
// that are written in Markdown

function get_post_titles() {

    static $tempStore = array();

    if(empty($tempStore)){

        // Get the titles of all the blog posts
        // Sorted by date created

        $tempStore = array_reverse(glob('posts/*.md'));
    }

    return $tempStore;
}

// Return an array of the blog posts
function get_posts() {

    $post_titles = get_post_titles();

    $tempStore = array();

    // Create a new instance of the Parsedown markdown parser
    $pd = new Parsedown();

    foreach($post_titles as $k => $v) {
        // Create an empty object that will hold post content
        $post = new stdClass;

        // Extract the date from the post title
        $arr = explode('_', $v);
        $post->date = strtotime(str_replace('posts/','',$arr[0]));
        $post->pretty_date = date('Y-m-d', $post->date);

        // The post URL
        $post->url = 'blog/' . date('Y/m/d', $post->date) . '/' .str_replace('.md','',$arr[1]);

        // Render the Markdown content as HTML
        $content = $pd->text(file_get_contents($v));

        // Extract the title and body
        $arr = explode('</h1>', $content);
        $post->title = str_replace('<h1>','',$arr[0]);
        $post->body = strip_tags($arr[1]);
        $post->excerpt = explode('.', $post->body)[0];

        array_push($tempStore, $post);
    }

    return $tempStore;
}

// TODO
// Write controller functions to edit, update and delete posts
