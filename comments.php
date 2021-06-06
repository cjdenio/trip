<?php
function comment_callback($comment)
{
?>
    <div class="mt-3 mb-7">
        <div class="flex items-center">
            <img class="rounded-full shadow-lg w-10" src="<?php echo get_avatar_url($comment) ?>" alt="avatar" />
            <h3 class="ml-4"><?php comment_author(); ?></h3>
        </div>

        <div class="mt-4 pl-3">
            <?php comment_text(); ?>
        </div>
    </div>
<?php
} ?>

<div id="comments" class="comments-area mt-10">

    <?php if (have_comments()): ?>
        <h2 class="comments-title uppercase text-gray-400 font-bold">
            <?php printf(
                _n("1 comment", '%1$s comments', get_comments_number()),
                number_format_i18n(get_comments_number())
            ); ?>
        </h2>

        <ol class="comment-list">
            <?php wp_list_comments([
                "style" => "ol",
                "short_ping" => true,
                "avatar_size" => 74,
                "callback" => "comment_callback",
            ]); ?>
        </ol>

        <?php // Are there comments to navigate through?
        if (get_comment_pages_count() > 1 && get_option("page_comments")): ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e(
                    "Comment navigation",
                    "twentythirteen"
                ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(
                    __("&larr; Older Comments", "twentythirteen")
                ); ?></div>
                <div class="nav-next"><?php next_comments_link(
                    __("Newer Comments &rarr;", "twentythirteen")
                ); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif;
        // Check for comment navigation
        ?>

        <?php if (!comments_open() && get_comments_number()): ?>
            <p class="no-comments"><?php _e(
                "Comments are closed.",
                "twentythirteen"
            ); ?></p>
        <?php endif; ?>

    <?php endif;
?>

</div><!-- #comments -->