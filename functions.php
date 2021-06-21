<?php

add_theme_support("post-thumbnails");
add_theme_support("title-tag");

function enqueue_styles(): void
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

function register_menus(): void
{
    register_nav_menus([
        "header-menu" => __("Header Menu"),
    ]);
}

/**
 * @param array<string, mixed> $fields
 * @return array<string, mixed>
 */
function comment_form_fields(array $fields): array {
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
   
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

// Send posts to Slack (stolen in part from https://davidwalsh.name/wordpress-publish-post-hook)
function send_new_post(string $new_status, string $old_status, WP_Post $post) {
  if('publish' === $new_status && 'publish' !== $old_status && $post->post_type === 'post') {
    // Do something!
    $thumbnail = get_the_post_thumbnail_url($post);
    $permalink = get_permalink($post);

    $env = json_decode(file_get_contents(__DIR__ . "/env.json"));

    foreach ($env->slack as $webhook ) {
        $blocks = [
            [
                "type" => "section",
                "text" => [
                    "type" => "mrkdwn",
                    "text" => "*" . $post->post_title . "*"
                ]
            ],
            [
                "type" => "section",
                "text" => [
                    "type" => "mrkdwn",
                    "text" => "<" . $permalink . "|view on trip.calebden.io>"
                ]
            ],
            [
                "type" => "image",
                "image_url" => $thumbnail,
                "alt_text" => "a cool image"
            ]
        ];

        $body = json_encode(array(
            "blocks" => $blocks,
            "username" => $webhook->username,
            "icon_url" => $webhook->icon_url
        ));

        wp_remote_post($webhook->webhook, array(
            "body" => $body,
            "headers" => array(
                "Content-Type" => "application/json"
            )
        ));
    }
  }
}
 
add_filter('comment_form_fields', 'comment_form_fields');

add_action("wp_enqueue_scripts", "enqueue_styles");
add_action("init", "register_menus");

add_action('transition_post_status', 'send_new_post', 10, 3);
