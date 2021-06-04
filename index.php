<?php get_header() ?>

<div class="inline-flex flex-col">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="inline-flex flex-col items-stretch mb-20">

                <div class="flex mb-5 justify-between items-end">
                    <h1 class="inline font-light text-5xl"><?php the_title(); ?></h1>
                    <h1 class="inline font-light text-gray-600"><?php echo get_the_date("F j, Y"); ?></h1>
                </div>

                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php echo esc_url(get_permalink()); ?>">
                        <div class="group inline-block relative shadow-xl hover:shadow-2xl rounded-lg transform transition duration-100 hover:scale-102 overflow-hidden">
                            <div class="absolute top-0 right-0 z-10 text-white p-7 px-10 bg-opacity-50 bg-gray-800 rounded-bl-lg text-xl duration-100 transition opacity-0 group-hover:opacity-80">Expand &gt;</div>
                            <img width="1024" src="<?php echo get_the_post_thumbnail_url(); ?>" />
                        </div>
                    </a>
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
<?php get_footer(); ?>