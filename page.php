<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>" type="text/css" />
    <?php wp_head(); ?>
</head>

<body class="text-center">
    <?php get_header() ?>

    <?php the_post(); ?>
    <div class="inline-flex flex-col">
        <?php the_content(); ?>
    </div>
    <?php wp_footer(); ?>
</body>

</html>