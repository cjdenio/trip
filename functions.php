<?php

add_theme_support("post-thumbnails");
add_theme_support("title-tag");

function enqueue_styles()
{
    wp_enqueue_style(
        "tailwind",
        get_template_directory_uri() . "/dist/tailwind.css"
    );
    wp_enqueue_script(
        "fontawesome",
        "https://kit.fontawesome.com/921bd8fdbd.js"
    );
}

function register_menus()
{
    register_nav_menus([
        "header-menu" => __("Header Menu"),
    ]);
}

function comment_form_fields($fields) {
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $cookies_field = $fields['cookies'];
    
    unset( $fields['comment'] );
    unset( $fields['author'] );
    unset( $fields['email'] );
    unset( $fields['url'] );
    unset( $fields['cookies'] );
    
    $fields['author'] = $author_field;
    $fields['email'] = $email_field;
    $fields['comment'] = $comment_field;
    
    return $fields;
}
 
add_filter('comment_form_fields', 'comment_form_fields');

add_action("wp_enqueue_scripts", "enqueue_styles");
add_action("init", "register_menus");
