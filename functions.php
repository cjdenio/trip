<?php

add_theme_support('post-thumbnails');
add_theme_support('title-tag');

function enqueue_styles()
{
    wp_enqueue_style("tailwind", get_template_directory_uri() . "/dist/tailwind.css");
}

function register_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
        )
    );
}

add_action("wp_enqueue_scripts", "enqueue_styles");
add_action('init', 'register_menus');
