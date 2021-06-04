<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>" type="text/css" />
    <?php wp_head(); ?>
</head>

<body class="text-center">

    <div class="py-40">
        <a href="<?php echo get_home_url() ?>">
            <h1 class="text-5xl inline-block"><?php bloginfo('name'); ?></h1>
        </a>
        <h2><?php bloginfo('description'); ?></h2>

        <?php wp_nav_menu(array(
            'theme_location' => 'header-menu',
            'fallback_cb' => false
        )); ?>
    </div>