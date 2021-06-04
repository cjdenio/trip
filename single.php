<?php get_header(); ?>

<div class="inline-flex flex-col items-stretch mb-20">

    <div class="flex mb-5 justify-between items-end">
        <h1 class="inline font-light text-5xl"><?php the_title(); ?></h1>
        <h1 class="inline font-light text-gray-600"><?php echo get_the_date("F j, Y"); ?></h1>
    </div>

    <?php if (has_post_thumbnail()) : ?>
        <div class="inline-block relative shadow-xl hover:shadow-2xl rounded-lg transform transition duration-100 hover:scale-102 overflow-hidden">
            <img width="1024" src="<?php echo get_the_post_thumbnail_url(); ?>" />
        </div>
    <?php endif; ?>
</div>

<div class="mt-20 mx-auto" style="max-width: 1024px; width: 100%"><?php the_content(); ?></div>

<div class="mt-10">
    <a href="<?php echo get_home_url() ?>"><i class="fas fa-chevron-left mr-1"></i> Go back</a>
</div>

<?php get_footer(); ?>