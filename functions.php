<?php add_theme_support('post-thumbnails');

add_action("wp_enqueue_scripts", "enqueue_styles");

function enqueue_styles()
{
    wp_enqueue_style("tailwind", "https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css");
}
