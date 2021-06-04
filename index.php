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

    <div class="inline-flex flex-col">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="inline-flex flex-col items-stretch mb-20">

                    <div class="flex mb-3 justify-between items-end">
                        <h1 class="inline font-light text-5xl"><?php the_title(); ?></h1>
                        <h1 class="inline font-light text-gray-600"><?php echo get_the_date("F j, Y"); ?></h1>
                    </div>

                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php echo wp_get_shortlink(); ?>"><img class="shadow-xl rounded-lg inline-block" width="1024" src="<?php echo get_the_post_thumbnail_url(); ?>" /></a>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>

            <?php
            if (get_next_posts_link()) {
                next_posts_link();
            }
            ?>
            <?php
            if (get_previous_posts_link()) {
                previous_posts_link();
            }
            ?>

        <?php else : ?>

            <p>No posts found. :(</p>

        <?php endif; ?>
    </div>
    <?php wp_footer(); ?>
</body>

</html>