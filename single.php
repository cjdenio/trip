<?php get_header(); ?>

<div class="inline-flex flex-col items-stretch">

    <div class="flex mb-5 justify-between items-end">
        <h1 class="inline font-light text-5xl text-left"><?php the_title(); ?></h1>
        <h1 class="inline font-light text-gray-600"><?php echo get_the_date(
            "F j, Y"
        ); ?></h1>
    </div>

    <?php if (has_post_thumbnail()): ?>
        <div class="inline-block relative shadow-xl hover:shadow-2xl rounded-lg transform transition duration-100 hover:scale-102 overflow-hidden">
            <img class="w-full" src="<?php echo get_the_post_thumbnail_url(); ?>" />
        </div>
    <?php endif; ?>
</div>

<div class="mt-20 mx-auto" style="max-width: 1024px; width: 100%"><?php the_content(); ?></div>

<div class="text-left">
    <?php // If comments are open or we have at least one comment, load up the comment template.
if (comments_open() || get_comments_number()):
        comments_template();
    endif; ?>
</div>

<div class="mt-10">
    <a href="<?php echo get_home_url(); ?>"><i class="fas fa-chevron-left mr-1"></i> Go back</a>
</div>

<?php get_footer();
?>
